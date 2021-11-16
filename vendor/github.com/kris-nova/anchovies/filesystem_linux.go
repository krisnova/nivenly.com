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
	"fmt"
	"os"
	"path/filepath"

	"github.com/kris-nova/logger"

	"github.com/mitchellh/go-homedir"
)

// dDirectory is a deterministic directory that is unique
// to a given environment.
//
// We will need to add one of these for every operating system
// we support.
func dDirectory() (string, error) {
	path, err := homedir.Dir()
	if err != nil {
		return "", fmt.Errorf("unable to find homedir: %v", err)
	}

	dDir := filepath.Join(path, anchovies)
	// ignore errors here - just try to create it
	err = os.Mkdir(dDir, fileMode)
	if err != nil {
		logger.Debug(err.Error())
	}
	// Lstat will follow sym links
	_, err = os.Lstat(dDir)
	if err != nil {
		return "", fmt.Errorf("unable to Stat(): %v", err)
	}
	return dDir, nil
}
