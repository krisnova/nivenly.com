+++
title = "src"
date = "2019-01-25"
author = "nóva"
+++

## kubernetes

i work on [kubernetes](https://kubernetes.io)

i also work on 

 - kubicorn
 - kops
 - kubeadm
 - cluster api

## logger

i wrote a go logger

you can download it [here](https://github.com/kris-nova/logger)


```go
package main

import (
	"github.com/kris-nova/logger"
	lol "github.com/kris-nova/lolgopher"
)

func main() {
	//
	logger.Writer = lol.NewLolWriter()          // Sometimes this will work better
	logger.Writer = lol.NewTruecolorLolWriter() // Comment one of these out
	//

	logger.BitwiseLevel = logger.LogEverything
	logger.Always(".....................")
	logger.Always(".....................")
	logger.Always(".....................")
	logger.Always(".....................")
	logger.Always(".....................")
	logger.Always(".....................")
	logger.Debug("Debug logging")
}
```