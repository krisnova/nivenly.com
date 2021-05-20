// Copyright © 2021 Kris Nóva <kris@nivenly.com>
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
	"encoding/json"
	"fmt"
	"net/http"

	"github.com/kris-nova/logger"

	"github.com/kris-nova/nivenly.com/app/lib"
)

// NovaProxy:
//
// proxy_set_header   NovaProxy-For      $proxy_add_x_forwarded_for;
// proxy_set_header   NovaProxy-Host     $host;
// proxy_set_header   NovaProxy-Client   $remote_addr;
// proxy_set_header   NovaProxy-Proto    $scheme;
// proxy_set_header	  NovaProxy-Port     "30000";
//
const (
	ProxyFor    = "NovaProxy-For"
	ProxyClient = "NovaProxy-Client"
)

// Client is you
type Client struct {

	// Addr is your name
	Addr string

	// NMAP is the raw NMAP results
	PortScan *lib.ScanResults

	ClientString string
}

type ClientHandler struct {
	Clients map[string]Client
}

func (v ClientHandler) ServeHTTP(w http.ResponseWriter, r *http.Request) {
	bytes, err := json.Marshal(v.GetClient(r))
	if err != nil {
		eBytes, _ := json.Marshal(Message{
			Value: fmt.Sprintf("Unable to JSON client: %v", err),
			Code:  500,
		})
		w.WriteHeader(http.StatusInternalServerError)
		w.Write(eBytes)
		return
	}
	w.WriteHeader(http.StatusOK)
	w.Write(bytes)
	return
}

// GetClient will hit the cache and return a client if it exists
// Otherwise it will create a new client in memory.
//
// TODO we should cap the buffer and implement a timeout. DoS is real.
func (v *ClientHandler) GetClient(r *http.Request) Client {
	clientAddr := ClientAddr(r)
	if client, ok := v.Clients[clientAddr]; ok {
		return client
	}
	scanResults := lib.ScanAddr(clientAddr)

	// Build client string here
	cStr := ""
	if scanResults.NMAPRun != nil {
		logger.Debug(scanResults.NMAPRun.Scanner)
		logger.Debug("%d scanned hosts", len(scanResults.NMAPRun.Hosts))
		for _, host := range scanResults.NMAPRun.Hosts {

			// List ports if we have them
			for _, port := range host.Ports {
				line := fmt.Sprintf("Port %d/%s %s %s\n", port.ID, port.Protocol, port.State, port.Service.Name)
				logger.Info(line)
				cStr = fmt.Sprintf("%s%s", line, cStr)
			}

			// List addresses if we have them
			for _, addr := range host.Addresses {
				line := fmt.Sprintf("\t%s %s %s\n", addr.Addr, addr.AddrType, addr.Vendor)
				logger.Info(line)
				cStr = fmt.Sprintf("%s%s", line, cStr)
			}

			// Hostnames if we have them
			for _, hostName := range host.Hostnames {
				line := fmt.Sprintf("\t%s %s\n", hostName.Name, hostName.Type)
				logger.Info(line)
				cStr = fmt.Sprintf("%s%s", line, cStr)
			}
		}
	}

	return Client{
		Addr:         clientAddr,
		PortScan:     scanResults,
		ClientString: cStr,
	}
}

// ClientAddr is the logic that will respect the NovaProxy headers
// and pull the true client addr from the proxy (if it exists)
func ClientAddr(r *http.Request) string {
	proxyClient := r.Header.Get(ProxyClient)
	if proxyClient != "" {
		return proxyClient
	}
	return r.RemoteAddr
}
