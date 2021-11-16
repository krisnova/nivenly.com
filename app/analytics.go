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

	"github.com/kris-nova/logger"

	"github.com/kris-nova/anchovies"
)

type Analytics struct {
	anchovies.EmbedRecord
	PageCount int
}

func GetAnalytics(r *http.Request) Analytics {
	var a = Analytics{}
	id := anchovies.U(r.URL.Path)
	if string(id) == "/" || string(id) == "" {
		id = anchovies.U("**anchovies**")
	}
	a.ID = id
	logger.Info("Anchovies: %s", id)

	// Get the record if it exists
	err := anchovies.Read(id, &a)
	if err != nil {
		logger.Warning("nivenly.Read(%v)", err)
	}

	// Do the math things
	a.PageCount = a.PageCount + 1

	err = anchovies.Write(&a)
	if err != nil {
		logger.Warning("nivenly.Write(%v)", err)
	}

	return a
}
