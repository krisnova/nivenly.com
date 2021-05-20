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
