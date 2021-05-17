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

package interpolate

import (
	"fmt"
	"html/template"
	"io/fs"
	"io/ioutil"
	"net/http"
)

// File is the file magic sauce here.
//
// This will implement the http.File interface and
// can be used in place of a good old http.File in
// the standard library.
//
// However we can also call proprietary methods on
// an IFile so we can do the hacky ass interpolating
// we want to do so we can have dynamic content
// in our static workflow.
//
// Why? Because Kris Nóva is insane.
//
// type File interface
//	io.Closer
//	io.Reader
//	io.Seeker
//	Readdir(count int) ([]fs.FileInfo, error)
//	Stat() (fs.FileInfo, error)
//
type File struct {
	file             http.File
	rawData          []byte
	interpolatedData []byte

	// We are changing a file.
	// This is an atomic operation so once
	// The file is "changed" in memory we
	// should never consider the "old" content.
	// Once this is flipped - we effectively have
	// a "new" file.
	interpolated bool
}

// NewFile essentially "extends" the base http.File
//
// Everything you can do with an http.File you can now also
// do with an
func NewFile(file http.File) *File {
	return &File{
		file: file,
	}
}

func (f *File) Interpolate(values interface{}) (*File, error) {
	// We calculate a name and begin to cache
	stat, err := f.Stat()
	if err != nil {
		return nil, fmt.Errorf("unable to stat: %v", err)
	}
	name := stat.Name()
	// Read the raw file
	rawBytes, err := ioutil.ReadAll(f)
	if err != nil {
		return nil, fmt.Errorf("unable to read raw file bytes: %v", err)
	}
	t, err := template.New(name).Parse(string(rawBytes))
	if err != nil {
		return nil, fmt.Errorf("unable to build raw template: %v", err)
	}
	t.Execute(f, values)
	f.interpolated = true
	return f, nil
}

func (f *File) Bytes() []byte {
	return f.interpolatedData
}

func (f *File) Readdir(count int) ([]fs.FileInfo, error) {
	return f.file.Readdir(count)
}

func (f *File) Stat() (fs.FileInfo, error) {
	return f.file.Stat()
}

func (f *File) Close() error {
	return f.file.Close()
}

func (f *File) Read(p []byte) (n int, err error) {
	return f.file.Read(p)
}

// Write is used by text/template to write the interpolated
// bytes to the data structure.
//
// Ideally we shouldn't ever be using this for anything other
// than that.
//
// Write will always append... ye be warned... here be dragons...
func (f *File) Write(p []byte) (n int, err error) {
	f.interpolatedData = append(f.interpolatedData, p...)
	return len(p), nil
}

func (f *File) Seek(offset int64, whence int) (int64, error) {
	return f.file.Seek(offset, whence)
}
