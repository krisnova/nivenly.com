package nivenly

import (
	"encoding/json"
	"net/http"
)

type Empty struct {
	// Example string
	// Sample int
	// Beeps Boops
	//
	// Add Fields Here
	//
}

type EmptyHandler struct {
}

func (h *EmptyHandler) ServeHTTP(w http.ResponseWriter, r *http.Request) {
	bytes, _ := json.Marshal(&Empty{})
	w.WriteHeader(http.StatusOK)
	w.Write(bytes)
	return
}
