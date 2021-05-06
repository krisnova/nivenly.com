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

so naturally - let's hack it 🏴🏴‍☠️

let's see what we found

### gaining access

we were given a kube config file and SSH access to the cluster - but we only needed the kube config.

### privilege escalation

we found that we were able to privilege escalate from a container to the nodes in the cluster

which means we had access to the following host namespaces

 - IPC
 - Mount
 - Net
 - Pid

### cluster itself

we discovered the cluster had a deployment running called `klustered` and we found the source of the deployment [here](https://github.com/rawkode/klustered/tree/main/000-workload) in [@rawkode](https://github.com/rawkode)'s github.

we saved all the cluster raw yaml [here](https://nivenly.com/assets/docs/klustered.yaml)

---

# showtime 

links for the show

 - [discord](https://discord.com/invite/ErVgHCN)
 - [youtube](https://www.youtube.com/watch?v=ysfUgYs4YYY)