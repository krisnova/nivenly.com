package nivenly

import (
	"github.com/kris-nova/logger"
	"net/http"
)

func (v *Nivenly) Request (request *http.Request) error {

	// System for finding out who our client is
	logger.Debug("Looking for proxy header 'X'")
	proxyClientAddr := request.Header.Get("X")
	v.RemoteAddress = proxyClientAddr
	if v.RemoteAddress == "" {
		logger.Debug("Looking for remote addr")
		remoteAddr := request.RemoteAddr
		v.RemoteAddress = remoteAddr
	}
	if v.RemoteAddress != "" {
		logger.Info("RemoteAddress: %s", v.RemoteAddress)
	}
	return nil
}
