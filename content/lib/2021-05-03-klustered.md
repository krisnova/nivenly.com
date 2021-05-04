---
title: "Breaking Klustered"
date: "2021-05-03"
author: "kris nóva"
keywords: "kubecon eu kubernetes cncf linux kube con klustered rawkode @rawkode"
summary: "notes on the klustered breaking and how i did what i did"
---
---

yes. hi. hello. me again.

recentely i had someone on twitter say the following phrase to me:

 > You’ll be given SSH access and a kubeconfig to a Kubernetes cluster on Monday. You can break it however you want, as long as the OS can still boot and Teleport continues to function. 

---

so naturally - let's break it 😊

let's see what we found

# gaining access

we were given a kube config file and SSH access to the cluster - but we only needed the kube config.

# privilege escalation

we found that we were able to privilege escalate from a container to the nodes in the cluster

```bash
[local]  $ git clone git@github.com:kris-nova/hack.git
[local]  $ cd hack
[local]  $ make
[local]  $ sudo make install
[local]  $ hack it
[pod]    $ hostenter
[remote] $ cat /dev/null > ~/.bash_history && exit
exit
[pod]    $ exit
[local]  $ # hi welcome back :)
[local]  $
```

which means we had access to the following host namespaces

 - IPC
 - Mount
 - Net
 - Pid

# cluster

we discovered the cluster had a deployment running called `klustered` and we found the source of the deployment [here](https://github.com/rawkode/klustered/tree/main/000-workload) in [@rawkode](https://github.com/rawkode)'s github.

we saved all of the cluster raw yaml [here](https://nivenly.com/assets/docs/klustered.yaml)

