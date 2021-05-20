package main

import (
	"encoding/json"
	"fmt"
	"time"

	"github.com/kris-nova/logger"
	"github.com/kris-nova/nivenly.com/app/lib"
)

func main() {
	for i := 0; i < 10; i++ {
		result := lib.ScanAddr("96.82.77.33")
		bytes, err := json.Marshal(&result)
		if err != nil {
			logger.Critical(err.Error())
		}
		fmt.Println(string(bytes))
		time.Sleep(4 * time.Second)
	}
}
