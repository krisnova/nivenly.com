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
	"fmt"
	"net/http"

	"github.com/kris-nova/logger"

	"github.com/kris-nova/anchovies"
)

// Analytics is a site level analytics structure.
//
// Have fun hacking this shit up!
//
// Everything here is exposed to the website's frontend.
type Analytics struct {
	anchovies.EmbedRecord

	// Client hostname total visits
	ClientVisits map[string]int

	// PageVisits total visits by page
	PageVisits map[string]int

	ThisPageVisits   string
	ThisClientVisits string
}

func GetAnalytics(r *http.Request, client Client) Analytics {
	a := Analytics{
		EmbedRecord: anchovies.EmbedRecord{
			ID: anchovies.U(siteKey),
		},
		ClientVisits:     make(map[string]int),
		PageVisits:       make(map[string]int),
		ThisPageVisits:   "-1",
		ThisClientVisits: "-1",
	}
	page := r.URL.Path
	if string(page) == "/" || string(page) == "" {
		page = "nivenly.com" // do not use siteKey for readability
	}
	logger.Info("Anchovies: %s", page)

	// Get the record if it exists
	err := anchovies.Read(anchovies.U(siteKey), &a)
	if err != nil {
		logger.Warning("nivenly.Read(%v)", err)
	}

	// --------------------------------------------------------
	// Analytics hacking here
	a.PageVisits[page]++
	a.ThisPageVisits = fmt.Sprintf("%d", a.PageVisits[page])
	logger.Debug("---")
	logger.Debug(page)
	logger.Debug("%d", a.ThisPageVisits)

	a.ClientVisits[client.Addr]++
	a.ThisClientVisits = fmt.Sprintf("%d", a.ClientVisits[client.Addr])
	logger.Debug(client.Addr)
	logger.Debug("%d", a.ThisClientVisits)
	logger.Debug("---")

	// --------------------------------------------------------

	err = anchovies.Write(&a)
	if err != nil {
		logger.Warning("nivenly.Write(%v)", err)
	}
	return a
}
