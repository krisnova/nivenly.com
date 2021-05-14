package main

import (
	"sync"

	bjorno "github.com/kris-nova/bjorno"
)

func main() {
	cfg := &bjorno.ServerConfig{
		InterpolateExtensions: []string{
			".html",
		},
		BindAddress:    ":1313",
		ServeDirectory: "public",
		DefaultIndexFiles: []string{
			"index.html",
		},
	}
	bjorno.Runtime(cfg, &Nivenly{
		RemoteAddress: "Ok",
	})
}

type Nivenly struct {
	RemoteAddress string
	mutex sync.Mutex
}

func (v *Nivenly) Values() interface{} {
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
