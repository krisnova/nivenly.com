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
	"encoding/json"
	"fmt"
)

type UUID string

func (u UUID) String() string {
	return string(u)
}

func U(s string) UUID {
	var u UUID
	u = UUID(s)
	return u
}

type Record interface {
	UUID() UUID
}

type EmbedRecord struct {
	ID UUID
}

func (r *EmbedRecord) UUID() UUID {
	return r.ID
}

var d string

func SetDir(path string) {
	d = path
}

func Write(r Record) error {
	data, err := json.Marshal(r)
	if err != nil {
		return fmt.Errorf("unable to encode record: %v", err)
	}
	dir, err := Directory()
	if err != nil {
		return fmt.Errorf("unable to find anchovies directory: %v", err)
	}
	return writeFile(dir, r.UUID().String(), data)
}

func Read(id UUID, onto interface{}) error {
	dir, err := Directory()
	if err != nil {
		return fmt.Errorf("unable to find anchovies directory: %v", err)
	}
	data, err := readFile(dir, id.String())
	if err != nil {
		return fmt.Errorf("unable to read file: %v", err)
	}
	return json.Unmarshal(data, onto)
}
