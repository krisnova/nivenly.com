package nivenly

import (
	"github.com/kris-nova/logger"
	"net/http"
	"sync"

	bjorno "github.com/kris-nova/bjorno"
)

func main() {
	cfg := &bjorno.ServerConfig{
		InterpolateExtensions: []string{
			".html",
		},
		// BindAddress is the container port
		BindAddress:    ":1313",
		// This is a known convention Nóva
		// We have the following structure
		// both locally AND in the container!
		//
		//   /public/index.html
		//   /app/nivenly.go
		//   /app/app
		ServeDirectory: "../public",
		DefaultIndexFiles: []string{
			"index.html",
		},
	}
	bjorno.Runtime(cfg, GetInstance())
}

// cache is the ugly almighty singleton
var cache *Nivenly

// GetInstance is here mostly for nostalgia
// oh how i miss object oriented programming
func GetInstance() *Nivenly {
	if cache == nil {
		cache = &Nivenly{}
	}
	return cache
}

type Nivenly struct {
	RemoteAddress string
	Status string
	mutex sync.Mutex
}

func (v *Nivenly) Values(request *http.Request) interface{} {

	// Request parsing
	err := v.Request(request)
	if err != nil {
		logger.Critical("Error parsing request: %v", err)
		return DefaultValues()
	}

	return v
}

func (v *Nivenly) Refresh() {

}

func (v *Nivenly) Lock() {
	v.mutex.Lock()
}

func (v *Nivenly) Unlock() {
	v.mutex.Unlock()
}

func DefaultValues() *Nivenly {
	return &Nivenly{
		RemoteAddress: "Remote Addr",
		Status: "Ready",
	}
}
