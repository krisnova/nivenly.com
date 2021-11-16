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

package anchovies

import (
	"errors"
	"fmt"
	"io/ioutil"
	"os"
	"path/filepath"

	"github.com/kris-nova/logger"
)

const (
	anchovies string      = ".anchovies"
	fileMode  os.FileMode = 0644
)

func Directory() (string, error) {
	if d != "" {
		// ignore errors here - just try to create it
		err := os.Mkdir(d, fileMode)
		if err != nil {
			logger.Debug(err.Error())
		}
		return d, nil
	}

	// return the operating system specific directory
	dir, err := dDirectory()
	if err != nil {
		return dir, err
	}
	return dir, nil
}

func writeFile(dir string, key string, data []byte) error {
	if key == "" {
		return errors.New("empty key")
	}
	path := filepath.Join(dir, key)
	if _, err := os.Lstat(path); os.IsNotExist(err) {
		_, err := os.OpenFile(path, os.O_RDONLY|os.O_CREATE, fileMode)
		if err != nil {
			return fmt.Errorf("unable to create new key file: %v", err)
		}
	}
	return ioutil.WriteFile(path, data, fileMode)
}

func readFile(dir string, key string) ([]byte, error) {
	path := filepath.Join(dir, key)
	return ioutil.ReadFile(path)
}
