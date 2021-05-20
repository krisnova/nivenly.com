# bjorno

Bjorno is a recursive HTTP web server. 

Bjorno serves static content, and also offers the following features. 

 - Easy way to build custom routes/endpoints on top of static content.
 - Easy way to interpolate static content at runtime.


# Using bjorno 

You can build a custom application in Go and vendor bjorno directly into your program.

#### sample/index.html

```html
<html>
<head>
<title>{{ .Name }}</title>
</head>

<body>
<div align="center">
    <h2>Welcome to {{ .Name }}</h2>
    <p>My nickname is {{ .Nickname }}</p>
</div>
</body>
</html>
```

#### main.go

Build a file and define the webserver components as well as the runtime program components.

```go
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
		ServeDirectory: "sample/",
		DefaultIndexFiles: []string{
			"index.html",
		},
	}
	bjorno.Runtime(cfg, &BjornoProgram{
		Name:     "Björn",
		Nickname: "Pupperscotch",
	})

}

type BjornoProgram struct {
	Name     string
	Nickname string
	mutex    sync.Mutex
}

func (v *BjornoProgram) Values() interface{} {
	return v
}

func (v *BjornoProgram) Refresh() {
	v.Nickname = "butterscotch"
	v.Name = "björn"
}

func (v *BjornoProgram) Lock() {
	v.mutex.Lock()
}

func (v *BjornoProgram) Unlock() {
	v.mutex.Unlock()
}

```

#### Run your web application 

```bash 
go run main.go
```

Now open your browser to `localhost:1313` and you will see your values interpolated on the webpage. 

Simply change your program to do what you need it to do.

Whatever `.Values()` returns in your program will be interpolated according to [text/template](https://golang.org/pkg/text/template/).
