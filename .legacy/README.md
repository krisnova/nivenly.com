# Nivenly.com


The official source code for nivenly.com

**Author**: Kris Nóva <_kris@nivenly.com_>

### About

Nivenly.com is my website. Here on my website we do whatever I want, whenever I want because it is mine.

The website a touring complete web application that is managed with a static content generator. 

The static content lives in the `/content` directory. 

The application lives in the `/app` directory. 

The server is the [bjorno](https://github.com/kris-nova/bjorno) web server which allows the Nivenly.com application to interpolate the website at runtime. 

The spirit of the website is to accomplish a few simple tasks. 

 - [X] I would like to be able to blog quickly, using markdown.
 - [X] I would like to run the entire website in a container.
 - [X] I would like to have a Go application on the "backend".
 - [X] I don't really want to "learn" any other tools.

### Adding a blog 

To add a new blog called "meeps" you would run the following command. 

```bash 
./run-new meeps
```

Then you would have a file created with todays date in `/content/lib` such as

``` 
/content/lib/2021-05-01-meeps.md
```

### Adding an endpoint to the application 

Edit `/app/nivenly.go` and define a new `bjorno.Endpoint` such as `empty`.

```go 
		Endpoints: []*bjorno.Endpoint{
			{
				Pattern: "/client",
				Handler: &ClientHandler{},
			},
			{
				Pattern: "/empty",
				Handler: &EmptyHandler{},
			},
		},
```

### Adding a field to the API 

all fields are defined in the `NivenlyAPI` in `/app/nivenly_api.go`.

add a field here and then you can reference it in `config.toml`.

```go 
type NivenlyAPI struct {
    // ...
    
    // Beeps is a very important string
    Beeps string
    
    // Boops is a very important string
    Boops string 
    
    // ...
}
```

then you can reference it in `config.toml`

```toml 
[params]

  beepsBoops = "{{ .Beeps }} has the {{ .Boops }}"


```

and whatever `.Beeps` and `.Boops` amounts to at runtime... will be what is rendered on the page.

⚠ **Note**: if `.Beeps` or `.Boops` doesn't exist - the page is liable to break! 

