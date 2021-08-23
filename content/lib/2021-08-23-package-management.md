---
title: "Package Management in Kubernetes (Go vs YAML)"
date: "2021-08-23"
author: "kris nóva"
keywords: "go, kubernetes, naml, yaml, package management, yaml, converting yaml to go, release, deployment"
summary: "This article highlights the nuance with running Go as an alternative to YAML. YAML vs Go."
---
---

Today let's talk about package management in Kubernetes.

---


# Package Management in Kubernetes

Over the past 2 months I wrote a small insignificant open source project [naml](https://github.com/kris-nova/naml) which served as a proof of concept for maintaining Kubernetes packages with Go.

The project attempts to offer a few things to anyone interested in deploying applications to Kubernetes.

- Combine best practices for Linux and Kubernetes package management
- Versioning and Grouping of applications
- Shipping Authentic Applications
- Extensibility with other paradigms (Controllers, Operators, APIs, Web Services, etc)
- Testing
- Low barrier to entry


So after a few months of work, and prototyping the project I wanted to spend some time and write down my experience. Particularly with regard to the items listed above.

---

## Linux vs Kubernetes

I did quite a bit of research in 2 main domains.

- Kubernetes Package Management
- Linux Package Management

Here are the key take aways I found with Linux package management vs Kubernetes package management.

#### Runtime (Linux vs Kubernetes)

Kubernetes assumes runtime. Linux traditionally does not. In other words Linux typically assumes that the act of installing a service, and starting the service are two different steps. Where Kubernetes assumes they are the same step.

```bash 
# linux
apt-get install mysql
systemctl start mysql

# kubernetes
helm install mysql
```

#### Management (Linux vs Kubernetes)

Kubernetes assumes that the same tool that is used to install the package is the same tool that is used to configure a package. This ultimately lead to workflows such as the git ops workflow where mutating packages via git was preferred over discreet releases.

```bash 
# linux 
yum install redis
curl http://company.com/configs/redis.conf -o /etc/redis/redis.conf -s
systemctl start redis

# kubernetes
kustomize edit redis.yaml
# git commit
# git push
kubectl apply -k redis.yaml # Typically ran via remote server tooling
```

#### Turing Completion (Linux vs Kubernetes)

This one was the main area of my concern. It seems that both Linux and Kubernetes have entertained the idea of having static packages -- and both have been unable to do so.

For instance Arch linux uses [ztsd](https://github.com/facebook/zstd) with it's default tool [makepkg](https://wiki.archlinux.org/title/makepkg#Usage) with is used by `pacman`. `ztsd` was built by Facebook and has very high performance with compressing and decompressing files and file lists.

In other words, a "package" in Arch linux is typically just a set of files that are mapped to corresponding locations on the filesystem.

The caveat here is that at some point in the installation lifecycle we cross the boundary of Turing completion. Somewhere between decompressing files and installing them in specific locations we must start installing, compiling, running, downloading, etc, etc.

Once the boundary of Turing completion is crossed, we no longer have static packages and we have entered the realm of application management.

It appears other package managers in Linux such as [RPM](https://rpm-packaging-guide.github.io/#working-with-spec-files) have also found themselves needing to template files and use primitives like [macros](https://rpm-packaging-guide.github.io/#more-on-macros) to introduce Turing completion.

It was becoming more and more evident with tools like [helm](https://github.com/helm/helm) and [kustomize](https://github.com/kubernetes-sigs/kustomize) that Turing completion was going to be needed.

It was also becoming more and more apparent that **Helm** and **Kustomize** were in a healthy competition with each other for who would become the best YAML templator (or in the case of **Helm**'s language who would become "_The Kubernetes Package Manager_").

Given that both Linux and Kubernetes have ended up building Turing complete mechanisms for Package Management meant that I disliked any tool that prescribed templating immediately.

### Takeaways from Linux and Kubernetes

For **Runtime** I wanted to embrace the separation of "Installing" and "Running". This could be approached fairly easily with Kubernetes paradigms such as `Replica=0` however we could certainly do better.

For **Management** I wanted to break the paradigm that installing a package should be done via the same tool that mutates a package. To be honest I wanted to call package mutation out of scope all together. Linux doesn't seem to be very fond of paradigms like `apt edit`, and I greatly appreciated this decision.

**Note**: I do think that packages will need "dynamic options", however I do not think we want users making forks of a base package and using a package manager to deal with the fallout.

I am convinced that any viable Kubernetes package manager will need to be **Turing Complete** to reason about the small amount of options a package will need to expose.

### Findings with `naml`.

For **Runtime** I quickly learned that Go made it difficult (but not impossible) to offer dynamic inputs into a program at Runtime. We see patterns with tools like [cobra](https://github.com/spf13/cobra) and [urfave/cli](https://github.com/urfave/cli) that can address this. Even the [helm](https://helm.sh/docs/helm/helm_install/) `--set` solves the problem of dynamic input, however doesn't seem to limit the inputs.

**Finding 1:** Ultimatelly we need a way to add arbitrary inputs to our logical systems, but we do not want to allow for total dynamic control.

We used examples like `NewApp()` with [NAML](https://github.com/naml-examples/simple/blob/main/cmd/main.go#L36) to allow for dynamic inputs, but have not exposed these values to a user.

In a more production like environment we should enforce immutable applications and allow the arguments sent to `New()` functions to be injested at runtime.

For **Management** I very much did not want to enable folks to "edit" and Application. Having immutable applications with limited fields exposed seemed to be the right blend of Turing completion with discreet package definitions. We know we wanted logic, but we didn't want to total anhilation.

The `naml` project was able to proove this with the `New()` functions coupeld with `Install(client)` where the inputs were set upon itialization and the logic was processed during `Install(client)`.

For **Turing Completion** we used Go.

**Finding 2**: Go was substantially better suited for building Turing complete logical systems than any templating option.


--- 

## Versioning and Grouping of Packages

An important thing to hold in mind is to understand the difference between releasing a specific version of a base package, and a team editing a base package for their needs.

I believe that we have done ourselves a great disservice by convulting a package "release" with a team's current "usage".

Teams should be able to change some options, but not all options.

In the event when a team needs to "quickly edit" a package I do not see any value in being able to "quickly edit" a YAML file or a template, push it through a git ops workflow and have it "pushed out to production". That seems to introduce more complexity to the process, and probably should probably just be a direct in-place edit. This should alarm users, because it should alarm users. Having a "quick edit" go through a pipeline is just as dangerous as editing the resource directly, but with added complexity. GitOps doesn't seem to make the exercise any safer or less worrisome.

In the event that a well defined option needs to be changed, or the logic around an option needs to be changed then a new version of the package should be released, and teams should upgrade.

Building an artifact (such as a static binary with Go) should be no more complicated than a GitOps workflow, and should introduce more reseliency with a traditional software release paradigm (tests, signing, hosting, etc).

### Findings with `naml`.

The barrier to entry with editing Go is certainly high, however it is debatably no higher than learning a Turing complete templating language as well.

**Finding 3**: The ability to use software to "generate" an application's static definition based on given input paremeters seems to be the right balance of logical systems with static representation. The artifact itself is the tool that can create the static representation. The artifact is then versioned as changes are needed.

Grouping packages together is now an exercise of vendoring Go projects together. The `naml.Register()` method allows the ability to hold applications in memory given their various inputs.

---


## Shipping Authentic Applications

This is a major concern with Kubernetes package management today, that was solved well with Linux.

The problem can best be demostrated with a simple question.

> What does <application> mean to you?
>
> EG: What does MySQL mean to you?
> EG: What does Wordpress mean to you?

Despite tools like `helm` attempting to prescribe defacto [charts](https://github.com/helm/charts) it became aparent that Kubernetes was going to be very good at not having an opinion.

In other words -- Kubernetes itself was never going to prescribe what "MySQL" meant (or how to install it).

So the need for someone (or something) to produce a definition of what "MySQL" (or any other application) meant seemed important.

So how do we authenticate that a user is actually getting an application that was designed by a given organization?

This is where package repositories in Linux can be useful.

`apt-get install mysql` is another way of saying "please install what Debian calls MySQL on my Linux system".

There seems to be a need to actually ship artifacts that correspond to a specific version of an application.

**Finding 4**: Shipping versioned artifacts that can be signed, and hash validated will be crucial for offering authenticate applications. Releasing Go binaries, docker images, and other artifacts can be much more useful than hosting a YAML file somewhere.

The `naml` project implemented an RPC mode that allowed a runtime API over RPC to "stitch" various binaries together. This follows a shared object like model where each object can be authenticated, while mainting each objects ability to be independently executed.

If `naml` was ever moved to production, these binaries should be authenticated at runtime using the `naml` libraries if so desired.


## Extensibility

Defining logical systems and allowing for abstracted inputs to those systems is no secret in Kubernetes.

The CRD and operator/controller patterns are built around this fundamental.

**Finding 5**: The need to represent an application via an operator is well known. Having an applications core representation in YAML offered an enormous barrier to entry in shifting to an operator pattern.

YAML seems to be a convenient shorthand, and not a good "true definition". Offering an applications definition in YAML seemed to be an anti pattern when it came time to introducing complex logic to the application.

## Testing

This one will be short and sweet.

**Finding 6**: Unit tests, and integration tests are virtually impossible with text templating.

It looks like other tools have attempted to address testing by asking users to build test containers that validate the original application. This seems odd especially being that the test application would then itself require tests.

Testing Go, and testing locally using tools like [kind](https://github.com/kubernetes-sigs/kind) seem like a much better way of validating that applications do what we expect them to do.

- See [example unit tests](https://github.com/naml-examples/simple/blob/main/app_test.go) with `naml`.

---

## Barrier to entry

Specifically, the application maintainers barrier

YAML will always be a useful way of sending human inputs into a computer system. Therefore YAML will never go away with Kubernetes.

I believe that YAML (and other encoding langauges such as JSON) are necessary communication channels to and from systems. However just because that is the tool we use to engage with a system, doesn't mean it should be the tool we use to represent applications. If anything it should be an ouput of an application's definition in the same way it's an output of Kubernetes itself.

The question is

> How do we easily go from static configuration to Turing complete software?


The `naml codify` feature is my [favorite feature of the project](https://github.com/kris-nova/naml#convert-yaml-to-go).

It will dynamically generate valid Go source code from Kubernetes objects.

**Finding 5**: Removing the manual task of data entry will greatly increase our ability to iterate and migrate away from YAML. We should be able to quickly move from YAML to Go so we can focus on interating on the application instead of merely representing it.

By removing propritary tooling such as `helm` and [Sprig templating](http://masterminds.github.io/sprig/), we simplify our applications and lower the barrier to entry.


---

# Conclusion

I do think [naml](https://github.com/kris-nova/naml) is a great proof of concept that illustrates some important paradigms with Package Management in Kubernetes. However I think there are certainly some things to do before it is what I would be considered "Production Ready".

I think 2 months of my own personal time was worth it to demonstrate that using Go to manage packages in Kubernetes could be a viable option to pursue.

### What went well?

Being able to generate literal objects in Go from YAML is probably the most valuable feature of the project.

Once an application is defined in Go it is then very easy to add features and small logical systems to the application development. Furthermore it makes it easy to not only test the logic, but also to test that the application does what we expect it to do in Kubernetes.

- We can test that the application generates the right definition given certain inputs.
- We can test that the application actually does what we want it to do in Kubernetes.

Being able to reason about inputs and produce a definition is another valuable lesson learned. It turns out that we will forever need logic in our application installation tooling. Being able to produce a truly static list of Kubernetes objects is critical. It would appear that Go is better suited at doing this than templating, particularly when we look at building complex applications such as controllers, operators, web services, and command line tools.

I told myself that if a typical devops engineers was unable to migrate a YAML file to a Go program in 5 minutes or less this effort was a failure. I am pleased to report this is very much a real possibility! :tada:

### What went not so well?

The `naml codify` feature is harder than it seems to support. There are a lot of complications with generating Go code. Particularly challenging was our ability to support package alias's such as `metav1` and `corev1`.

**If naml ever makes it to production code, this will need to be addressed properly**.

Compiling Go can be frustrating. The new [Go module](https://go.dev/blog/using-go-modules) system is far from user friendly and adopting it as a dependency for package management is worrisome.

However, in the grand scheme I believe that I would trust `go mod` more than I would trust many other projects at supporting our use case if we did advertise it well to what's left of the Go community.

The pattern of having `app.go` and `app_test.go` for every application seems very healthy, and conceptually isn't much harder to maintain than a YAML file. Furthermore this new paradigm offers much more value than just a YAML file.

### What is worth considering?

Polymorphism is hard in Go. Kubernetes was able to workaround this limitation by spending the time to encapsulate all of the various objects literally. Reasoning about "generic" `runtime.Object`'s will be a major part of Kubernetes package management. Doing this with Go will take investment.

We will need a way to dynamically generate gRPC and HTTP(s) servers and clients to generate manifests from Go applications. This same mechanism should probably also allow for runtime flags via the command line.

The real value of a framework like `naml` will be its ability to be deterministic from `YAML -> Go -> YAML` to get an application maintainer started. Over time the Go system will become the source of truth for the application.

Versioning Kubernetes objects is something that can be easily overlooked. A kubernetes Deployment is fluid and can change from 1 version of Kubernetes to the next. Creating "wrapper" objects in other languages such as Ruby or Python create a dependency burden that the maintainers will need to support Kubernetes moving forward. By using Go we can hard code a specific version of Kubernetes directly in the `go.mod` for each application.


### What is next?

Personally, I am convinced this idea is worthwhile to pursue for production. I plan on starting to push applications in production with `naml` (or similar that has yet to be written).

If you are interested in trying to encapsulate your application in Go with `naml` and would like support please [open an issue](https://github.com/kris-nova/naml/issues/new).

### How is this different than Pulumi, etc?

The main difference is that I have no interest in taking your money or listening to you. I built this project for the sake of computer science and I built this project in anger.

These are real problems faced by Kubernetes application developers every day, and frankly I don't think have ever been solved "well" with the tooling in the ecosystem. Pulumi seems to be an exception to this rule.

If you want first class support, a thriving ecosystem, and humans who are happy to talk to you please consider finding a more enterprise focused tool like [Pulumi](https://www.pulumi.com/) who I am sure is happy to take your money and take your use cases into consideration.

 
--- 

# Reference Workflow

In this example we use Helm to demonstrate a Turing complete application installer. Then we can deploy the binary, validate the binary and use it generate YAML.

Note that the RPC feature would alow to add the signed binary as a discreet layer in a container image and reference the binary at runtime. Useful for exposing the logic via HTTP or gRPC as a web service, or baking the installer directly into a controller or operator.

 ```bash
 
 # Reason about the application and produce static YAML
 helm template /chart > deploy.yaml
 
 # Migrate existing YAML applications to Go
 cat deploy.yaml > naml codify > main.go
 
 
 # Push the code to version control, and deploy artifacts
 # Version 1.0.0 is now released
 git commit
 git push
 
 # Download the installer for your architecture
 wget https://github.com/naml-examples/simple/releases/download/v1.0.0/deploy-darwin-amd64
 # Check binary with pgp, elfsign, etc
 mv deploy-darwin-amd64 /usr/local/bin/deploy
 
 # Generate YAML for production
 deploy --name="prod" --tls=true output > production.yaml
 
 # Generate YAML for dev
 deploy --name="dev" --tls=false output > development.yaml
  
 # Use any existing tool to deploy the YAML
 kubectl apply -f production.yaml
 
 # Update the application
 emacs main.go
 git commit
 git push
 
 # Repeate the deployment process with
 wget https://github.com/naml-examples/simple/releases/download/v1.1.0/deploy-darwin-amd64
 # Check binary with pgp, elfsign, etc
 mv deploy-darwin-amd64 /usr/local/bin/deploy
 ```