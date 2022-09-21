# Copyright © 2021 Kris Nóva <kris@nivenly.com>
#
# Licensed under the Apache License, Version 2.0 (the "License");
# you may not use this file except in compliance with the License.
# You may obtain a copy of the License at
#
#     http://www.apache.org/licenses/LICENSE-2.0
#
# Unless required by applicable law or agreed to in writing, software
# distributed under the License is distributed on an "AS IS" BASIS,
# WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
# See the License for the specific language governing permissions and
# limitations under the License.

user             =             nova
bindmount        =             /home/$(user)/nivenly.com/public
devlistenport    =             8000
registry         =             krisnova
image            =             nivenly.com


default: all

container: ## Build the base container
	sudo -E docker build -t $(registry)/$(image):latest -f images/Dockerfile.base .

dev: ## Run the website locally in development mode
	sudo -E docker run -t -p $(devlistenport):80 -v $(bindmount):/var/www/html $(registry)/$(image):latest
	sudo -E chown -R nova: public/*

exec: ## Exec into the container in its "final form"
	sudo -E docker run -t -i --entrypoint /bin/bash -p $(devlistenport):80 -v $(bindmount):/var/www/html $(registry)/$(image):latest || true
	sudo -E chown -R nova: public/*

all: ## Build the website

clean: ## Clean the project

.PHONY: help
help:  ## Show help messages for make targets
	@grep -E '^[a-zA-Z_-]+:.*?## .*$$' $(firstword $(MAKEFILE_LIST)) | sort | awk 'BEGIN {FS = ":.*?## "}; {printf "\033[32m%-30s\033[0m %s\n", $$1, $$2}'

# Debug
#
# Here are the "official" grav images that can be used for debugging purposes.
#
# Source: https://github.com/getgrav/docker-grav/blob/master/Dockerfile

officialcontainer: ## Build the *default* grav container (mostly unused)
	sudo -E docker build -t krisnova/gravofficial:latest -f images/Dockerfile._grav .

officialexec: ## Exec into the *default* grav container (mostly unused)
	sudo -E docker run -it -p 8001:80 krisnova/gravofficial:latest /bin/bash
