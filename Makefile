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
secretsmount     =             /home/$(user)/nivenly.com/secrets
pagesmount       =             /home/$(user)/nivenly.com/pages
devlistenport    =             8000
registry         =             krisnova
image            =             nivenly.com

default: all

submodules: submodule ## Alias for submodule
submodule: ## Make submodules
	@git submodule update --init --recursive
	@git submodule update --remote --rebase

base: ## Build the base container
	sudo -E docker build -t $(registry)/grav:latest -f images/Dockerfile.base .

container: ## Build the nivenly.com container
	sudo -E docker build -t $(registry)/$(image):latest -f images/Dockerfile.nivenly .

dev: ## Run the website locally in development mode
	sudo -E docker run -it -p $(devlistenport):80 -v $(bindmount):/var/www/html -v $(secretsmount)/nivenly.com/user:/var/www/html/user -v $(pagesmount):/var/www/html/user/pages $(registry)/$(image):latest
	sudo -E chown -R nova: public/*
	sudo -E chown -R nova: secrets/*
	sudo -E chown -R nova: pages/*

exec: ## Exec into the container in its "final form"
	sudo -E docker run -it --entrypoint /bin/bash -p $(devlistenport):80 -v $(bindmount):/var/www/html -v $(secretsmount)/nivenly.com/user:/var/www/html/user -v $(pagesmount):/var/www/html/user/pages $(registry)/$(image):latest || true
	sudo -E chown -R nova: public/*
	sudo -E chown -R nova: secrets/*
	sudo -E chown -R nova: pages/*

perms: ## Fix local permissions
	sudo -E chown -R nova: public/*
	sudo -E chown -R nova: secrets/*
	sudo -E chown -R nova: pages/*

push: ## Build the website
	sudo -E docker push $(registry)/grav:latest
	sudo -E docker push $(registry)/$(image):latest

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
