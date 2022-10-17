---
title: "SSH Tunneling with Kubernetes"
date: "2021-07-05"
author: "kris nóva"
keywords: ["SSH", "SSH Tunnels", "Kubernetes", "Service", "Expose", "SSH Expose"]
summary: "Using SSH Tunnels with Kubernetes"
---
---

Yes. Hello.

I recently wrapped up cutting over to my [PFSense](https://www.pfsense.org/) firewall for my home lab.

So I wanted to share a quick blog about how I completely isolated my Kubernetes cluster on the public internet at the network level.
Furthermore I wanted to share how I use SSH tunneling to have total flexibility with the cluster, while keeping my shit on lock.

I use SSH tunnels for:

 - Accessing the main Kubernetes API server on the go
 - Exposing in cluster services (Blogs, API endpoints, Proxy, etc)
 - Exposing non-Kubernetes services (ZFS, SSHfs, Dashboards, etc)

---

# Applications are the problem

To be very clear the Kubernetes default API is fine as far as I am concerned.
It uses pre share TLS key, and I see no problems here. 
Everyone should feel relatively safe exposing this on the public internet.

However I am a lazy software engineer, and I run questionable applications in my cluster.
I truly believe that **applications in a Kubernetes cluster is the greatest liability** of the cluster.

### Instead of baking TLS and Auth into every application, I just use `Ed25519` keys.

I do a lot of dirty things in my cluster. 

I run a few blogs, I have a lot of small HTTP services that do things like the `/client` endpoint on [nivenly.com/client](https://nivenly.com/client).

Having a small server in the cluster listening on `0.0.0.0` is not entirely unusual for me. 

# Locking down the cluster 

The control plane used to be listening on the public internet. I set up the cluster with `kubeadm`.

```bash 
nivenly.com:6443
```

I closed the Kubernetes endpoints, ingress, and the public API endpoint at the firewall level with PFSense. 

All packets on `TCP/6443` are both `BLOCKED` and `REJECTED`.

Furthermore, the control plane itself is behind both an HTTPs proxy and I use port forwarding in favor of a 1:1 NAT to get traffic onto the main ingress node. 

I made it a point to **never** give Kubernetes the ability to expose anything on the public internet. 

There was just way too much fucking complexity with it, and honestly I don't really think I want (or need) yet even more services to manage that do a lot of weird networking magic.

The thought of having some string annotation somewhere managing ingress and TLS for my cluster seemed like a recipe to get hacked. I know how lazy and careless I am.

# Safety in a closed network.

So that's it. 

I just shut everything down, except for SSH access to a tiny raspberry pi listening on a private NIC behind the PFsense firewall.
I just port forward SSH traffic to the raspberry pi from one of my public IP address.

I use [Cilium](https://cilium.io/) for my CNI and I take full advantage of the packet level auth that Cilium offers. 

I have 0 concerns spinning up a tiny Go server listening unencrypted on `0.0.0.0` in Kubernetes. 
My blood pressure and anxiety thanks me.

# Accessing my cluster on the go (SSH Tunnels!)

I am currently in a hotel room in Portland, Oregan and I wanted to work on my cluster back at the house.

Here is how I use `kubectl` on the go.

## SSH Tunnels are fucking awesome

ssh -L is totally your friend. 

Taken from the man page.

```bash 
 Specifies that connections to the given TCP port or Unix socket on the local (client) host are to be forwarded to the given host and port, or
 Unix socket, on the remote side.  This works by allocating a socket to listen to either a TCP port on the local side, optionally bound to the
 specified bind_address, or to a Unix socket.  Whenever a connection is made to the local port or socket, the connection is forwarded over the
 secure channel, and a connection is made to either host port hostport, or the Unix socket remote_socket, from the remote machine.

 Port forwardings can also be specified in the configuration file.  Only the superuser can forward privileged ports.  IPv6 addresses can be
 specified by enclosing the address in square brackets.

 By default, the local port is bound in accordance with the GatewayPorts setting.  However, an explicit bind_address may be used to bind the
 connection to a specific address.  The bind_address of “localhost” indicates that the listening port be bound for local use only, while an
 empty address or ‘*’ indicates that the port should be available from all interfaces.

```

So I add a quick entry in my laptops `/etc/hosts` that points `nivenly.com` to `127.0.0.1`.

Then I set up an SSH tunnel. I use `Ed25519` public keys on the raspberry pi. These are slightly better than RSA keys, but honestly RSA keys are a great starting point.
`

```bash 
ssh -v -L 6433:10.0.0.186:6443 novix@nivenly.com
```

This translates to 

 - `local-port` The port on my laptop at the hotel in Portland.
 - `internal-ip` The internal IP address of my control plane at the house in San Francisco.
 - `internal-port` The internal TCP port that Kubernetes is listening on (See `~/.kube/config`)
 - `external-ssh` A valid SSH connection command such as `user@host`

```bash 
ssh -V -L [local-port]:[internal-ip]:[internal-port] [external-ssh]
```

# Conclusion 

I can now set up a handful of SSH tunnels through my raspberry pi that I know are fully encrypted to the public internet.
I can use them for internal Kubernetes pods (I don't use ingress, or load balancers)
I like it more than `kubectl port-forward` because it encrypts the data instead of just exposing it locally.
I can use it for other things in the home network such as exposing my PFsense dashboard, or accessing other services outside of Kubernetes.
I run a distributed ZFS clusters that I can also mount using SSH tunnels and systemd called [forfucksake](https://github.com/kris-nova/forfucksake).

Basically what I am saying is that I feel very safe having my lab network locked down, and in a few seconds can easily expose whatever port whenever I want.
I can safely work on the home lab, without exposing a lot of services on the public internet.
This helps me relax, because you would be surprised what MITM tricks hotel wifi enjoy doing to your client session.

I just wanted to share that SSH tunnels are a totally viable solution for exposing Kubernetes itself, as well as the services in cluster.

This works for me, and my tiny use case, and I don't have to manage a lot of complexity with tools like Istio, or cert-manager, or kubernetes access control.

Just something to keep in mind. 

Bastion services, and jump boxes are your friend. Especially when you can come home from your trip and pull the SD card out of them, re-flash it, and move on with your life.

 - More on [SSH tunnels](https://www.ssh.com/academy/ssh/tunneling/example)
 - More on [bastion servers and jump boxes](https://en.wikipedia.org/wiki/Bastion_host)
 - I did a [lot of this with kops originally](https://github.com/kubernetes/kops/pull/694), but my work there has come and gone.


## PS 

Yes. I just deployed this blog to my Kubernetes cluster using an SSH tunnel. It worked great. 