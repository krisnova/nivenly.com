---
title: "The Distributed Operating System Void"
date: "2021-04-02"
author: "kris nóva"
keywords: ["Distributed Operating System"]
summary: "The Distributed Operating System Void"
---

_Preface: I will be typing this in proper (capitalized) English. 
Unlike the majority of my other work. 
A substantial portion of this is IP is accredited to the concepts proposed by Andrew Rynhard and his work with Talos Systems. (COSi)_ 

## Thesis

Modern (circa 2021) UNIX based operating systems should be reimagined to support higher level workloads 
that are managed in a distributed environment, such as kubernetes.

The first step in progress towards this goal, is defining an interface.

The Distributed Operating System Interface (`DOSi`) hopes to achieve this.

# Problem Statement 

Over the past 7 years Kubernetes has grown in popularity. 
Kubernetes is built and managed on operating systems optimized for isolated workloads.
Kubernetes mutates operating system level features, concerns, and services.
Some of these services (CNI, Kubelet, Container Runtime, etc) are paramount for Kubernetes to run.

I believe there should be a clear communication and management interface between Kubernetes and the underlying operating system.

This interface does not exist, therefore an operating system implementation does not exist.

# Vocabulary 

#### Distributed Operating System Interface

(_DOSi_) the implementable boundary that is defined and optimized for higher level interaction with the operating system.

Based on the definitions below, `DOSi` is the interface between `kubernetesland` and `userland`.

 - Alternatives (DOS, DOS API, DOSIX)

### Kernelland 

The computational space that exists below the system call API.

### Userland

Also known as `userspace` in the Linux community, this is the operating system layer in which humans can engage. 

Everything above the kernel, that is not managed with Kubernetes.

### Kubernetesland

Everything above `userland` that is managed with Kubernetes

### Node

A kubernetes node. A single instance of a single operating system managing a machine.
A node is a computer, that has a kubernetes-like layer running on top of the operating system.

#### The Stack

The combined layers of `kubernetesland`, `userland`, and `kerneland`

# Summary

I hope to define a clear interface between `kubernetesland` and `userland` that is complimentary to existing interfaces (CNI, CRI, CSI, OCI).
While also considering the clear void that the sum of these existing interfaces do not address. 
In particular management, and security of the operating system and it's components as a whole.


Below, find benefits of defining this interface. 


### Benefits

 - Implementation, control, and management of the non-existent `kubernetes` and `node` security boundary.
 - Clearly defined management of `node` level services and configuration.
 - Finite set of use cases, and capabilities required from an operating system to run Kubernetes.
    - This will define the touch points between an operating system and Kubernetes, thus outlining which operating system features are critical.
    - EX: Do we need POSIX compliant user/group management? Or will Linux capabilities suffice?
 - Management of required `node` level services can be safely controlled from `kubernetesland`
    - EX: CNI mutations
    - EX: Privileged DaemonSets for mutating a host
    - EX: Kernel security controls (Seccomp, SELinux, eBPF, Auth, User Management)
    - EX: Storage providers interacting with the host
    
# Prior Art

It is obvious that there is prior art in the following `node` level services.
There are fundamental flaws, and voids in what the existing interfaces assume.

 ### Network (CNI)

Official [Container Networking Interface](https://github.com/containernetworking/cni) standard.

 - CNI defines the container networking API surface/shape for interacting with networking plugins [via the container runtime](https://github.com/containernetworking/cni/blob/master/SPEC.md#section-2-execution-protocol) in `userland`.
     - CNI does not solve *how* to install and mutate a CNI service in `userland` from a `kubernetesland` perspective.
         - CNI is [required by a container runtime](https://github.com/containernetworking/cni/blob/master/SPEC.md#overview-1), however it is assumed this is installed from `kubernetesland`. This is a paradox. 
     - CNI assumes access to `userland` and more importantly access (and permission) to `fork(2)` and `execve(2)`
     - CNI does not solve *how* access is managed, or acquired. 
 - CNI does not offer a standardized way of reporting, measuring, or limiting resources in `kubernetesland`.
 
### Storage (CSI)

Official [Container Storage Interface](https://github.com/container-storage-interface/spec) standard.

 - CSI defines the container storage API surface/shape for interfacing with block and file storage drivers in `userland`. 
     - More information on [CSI drivers](https://kubernetes.io/blog/2019/01/15/container-storage-interface-ga/)
     - More information on [Kubelet device registration and plugins](https://kubernetes.io/docs/concepts/extend-kubernetes/compute-storage-net/device-plugins/)
 - CSI does not solve *how* to install or manage block or file storage drivers.
 - The Kubelet plugin system does NOT solve how to install or manage Kubelet plugins from Kubernetes. 
     - [Access to the Kubelet API server is required](https://v1-18.docs.kubernetes.io/docs/concepts/extend-kubernetes/compute-storage-net/device-plugins/#device-plugin-registration) to interact with the exposed registration service. 
 - CSI (via the Kubelet registration endpoint and logic) can set limitations and provide status updates in `kubernetesland`.


### Runtime (Compute) (CRI/OCI)

Official [Container Runtime Interface](https://github.com/kubernetes/cri-api) API.
Official [Open Container Interface](https://github.com/opencontainers/runtime-spec) standard.
    - Official [Open Container Image Spec](https://github.com/opencontainers/image-spec)

CRI is a implementation of OCI.
The main difference is scope, in which case OCI also defines the [open container image spec](https://github.com/opencontainers/image-spec).


- OCI and CRI define the container runtime API surface/shape for interfacing with container runtime "engines" from `userland`. 
    - OCI also defines the API surface/shape and interface for packaging container images
- Container runtimes are tightly coupled with Linux features, and therefor are tightly coupled with the operating system. 
- Container runtimes manage permissions, storage, and networking in different ways. 
- Container runtimes are tightly coupled with `storage` and `networking`.
- Container runtimes do not define *how* they are installed or managed. 

# The Void

There are several `userland` components that are not considered from a management perspective. 

Below are demonstrable questions that technically have answers.
I hope to challenge the existing answers to these questions with DOSi.

### Demonstrable Questions

- How is my container network defined?
- How are my storage drivers defined?
- How is my container runtime defined?
    - Which container runtime will I use?
    - How will I upgrade my container runtime?
- Which clients have access to my container runtime?
- How do I mutate my network configuration in `userland`?
- How do I mutate my network configuration in `kubernetesland`?
- How do I mutate kernel configuration? 
    - eBPF
    - Kernel modules
    - IPTables
    - Seccomp filters and Seccomp policy
    - Namespace sharing
    - Linux capabilities
- How can I read kernel runtime values?

# Concrete use cases

Below are some high level examples of concrete use cases that would directly benefit from having a standardized distributed operating system level interface (DOSi).

### Patching openssh 

In 2020 [CVE-2020-15778](https://cve.mitre.org/cgi-bin/cvename.cgi?name=CVE-2020-15778) was announced which allows command injection via `scp` using the `scp.c` function `toremote()` in the `OpenSSH` library.

What is the existing story to update the `userland` libraries? 
How would `kubernetesland` be impacted by this update?

### Managing Access Control and Security Software

Below find concrete examples of security software that will span `kubernetesland`, `userland`, and `kernelland`. 
Currently, there is no clearly (or safely) defined way to manage or mutate these concerns from a single control plane.

 - Seccomp policy
 - Pod Security Policy
 - Kubernetes Admissions Control Policy
 - Falco runtime security
 - AppArmor Policy

### Package Management 

Any `userland` level package is traditionally managed on a per instance basis and is managed via `userland`.
Furthermore, the kernel, operating system, and operating system dependencies also need to be managed. 

### Interprocess Communications 

What does the IPC namespace look like for distributed computing? 

How will multiple `userland` and `kubernetesland` applications manage:

 - mTLS
 - service discovery
 - routing
 - network policy and firewall controls
 - TCP packet level authentication
 - SPIRE/SPIFFE

#### Storage Drivers

By design `kubernetesland` and `userland` security boundaries are violated when a storage driver is mutated from `kubernetesland`.
Furthermore this communication needs to be addressed holistically.

Fundamentally there are multiple node level concerns that would potentially need to be mutated from `kubernetesland`.

# Conclusion 

There is a service management, registry, and discovery void for `userland` level concerns. 
There is a distributed communications void for `userland` and `kubernetesland` interprocess communications.
There is a security void for `userland` as we have learned that we depend on mutating `userland` from `kubernetesland`.
There is inconsistency in the main `userland` pillars of management (storage, networking, runtime)

### DOSi

By defining a clear interface for an operating system running in a distributed environment we take the first step into claiming complete control over `userland` in Kubernetes, instead of partial control of pillars of the operating system as we see it today.

---

# Open Considerations

 - Should the DOS interface consider the [POSIX IEEE standard](https://standards.ieee.org/project/1003_1.html)?
    - _more_: [POSIX Wikipedia](https://en.wikipedia.org/wiki/POSIX)
    
