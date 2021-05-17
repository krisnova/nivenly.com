package nivenly

import (
	"encoding/json"
	"fmt"
	"net/http"
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

type Client struct {
	Addr string
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
	return Client{
		Addr: clientAddr,
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
