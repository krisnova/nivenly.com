// Copyright © 2017 The Kubicorn Authors
//
// Licensed under the Apache License, Version 2.0 (the "License");
// you may not use this file except in compliance with the License.
// You may obtain a copy of the License at
//
//     http://www.apache.org/licenses/LICENSE-2.0
//
// Unless required by applicable law or agreed to in writing, software
// distributed under the License is distributed on an "AS IS" BASIS,
// WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
// See the License for the specific language governing permissions and
// limitations under the License.

package nivenly

import (
	"net/http"
	"os"
	"sync"

	"github.com/kris-nova/anchovies"

	bjorno "github.com/kris-nova/bjorno"
	"github.com/kris-nova/logger"
)

// Nivenly is a container for the Application as an in-memory state machine.
//
// This is relatively simple and should not change very often.
//
// We get a new instance of this during every bootstrap.
type Nivenly struct {
	// clientHandler is the same client handler we pass
	// to bjorno
	clientHandler ClientHandler

	// config is bjorno config
	config *bjorno.ServerConfig

	// mutex is the nivenly mutex that bjorno will lock
	mutex sync.Mutex
}

// Bootstrap will start the application with its very specific
// configuration, and then begin serving content.
func Bootstrap() {
	// We use this in multiple places so let's define it
	// here instead of package state.
	clientHandler := ClientHandler{}

	// We mount /data/anchovies into the pod
	anchovies.SetDir("/data/anchovies")

	// The bjorno config
	cfg := &bjorno.ServerConfig{

		// InterpolateExtensions are the file types that
		// bjorno will interpolate at runtime.
		InterpolateExtensions: []string{
			".html",
		},

		// BindAddress is the bind address and port following
		// the host:port string convention in Go.
		BindAddress: ":1313",

		// ServerDirectory looks weird but it's fine (I promise).
		//
		// We want to be able to "go run" the application for quick
		// development, and we also want to not have to change this
		// in the container image. The dockerfile takes care of
		// dropping off the binary where it needs to go.
		//
		// Always run from the "cmd" directory.
		ServeDirectory: "public",

		// DefaultIndexFiles index.html
		//
		// We started with Hugo for the website, so these are the
		// names of the files to look for in a directory.
		DefaultIndexFiles: []string{
			"index.html",
		},

		// Endpoints are any Nivenly.com API endpoints
		// we want to support.
		//
		// Have fun Nóva you can now put shit online.
		Endpoints: []*bjorno.Endpoint{

			// [/client] is a great way to see who you are
			//           in the off chance that you don't
			//           know what your own network looks
			//           like.
			{
				Pattern: "/client",
				Handler: clientHandler,
			},

			// [/empty] is a just a sample endpoint for us
			//          to copy because we are lazy.
			{
				Pattern: "/empty",
				Handler: &EmptyHandler{},
			},
		},
	}

	// 404 handling

	bytes, err := os.ReadFile("public/404.html")
	if err != nil {
		logger.Warning("Unable to load custom 404 path: %v", err)
		cfg.Content404 = []byte(bjorno.StatusDefault404)
	} else {
		cfg.Content404 = bytes
	}

	// Set the config for the rest of the application
	nivenly := &Nivenly{
		clientHandler: clientHandler,
		config:        cfg,
		mutex:         sync.Mutex{},
	}

	// Nivenly.com is a "stateless" application (by design).
	// So every time we bootstrap the application we start
	// with a very clean instance of our Application.
	bjorno.Runtime(cfg, nivenly)
}

// Values is what we interpolate.
//
// Every request to the server (that needs to be interpolated)
// will pass in the request for consideration.
func (v *Nivenly) Values(r *http.Request) interface{} {
	return v.GetAPI(r)
}

// Refresh is how we Refresh any "long" or "medium" data
// The server calls this before .Values() (usually).
func (v *Nivenly) Refresh() {
	// Nothing
}

// DefaultValues is just sample text to interpolate.
//
// It's wise to return sane defaults in the event of an error.
// so we don't break the underlying website.
func DefaultValues() *Nivenly {
	return &Nivenly{}
}

// Message is an HTTP message we can pass around.
type Message struct {
	Value string
	Code  int
}
