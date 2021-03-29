---
title: "persistent state with ZFS on archlinux with kubernetes"
date: "2021-03-01"
author: "kris nóva"
keywords: "kubernetes, zfs, linux, archlinux, persistent, state, storage, volumes, sshfs, provider, bare metal, metal"
summary: "setting up ZFS for kubernetes on archlinux"
---
---

hi.

me again.

tonight let's talk about a few things. 

 1. ZFS (pronounced "Zed" FS)
 2. Running ZFS on Archlinux (Rolling updates)
 3. Using distributed ZFS as a distributed Kubernetes backend

Yes. This website is running on the infrastructure described below.

---

# ZFS

So for those of you who aren't familiar with ZFS, it's [a lovely "Filesystem" fresh out of the FreeBSD community](https://www.freebsd.org/cgi/man.cgi?zfs(8)).

Note: I intentionally put "Filesystem" in quotes. 

My favorite feature of ZFS is it's ability to create a fascinating abstraction at the kernel and software levels of a stack for underlying file storage.
I sometimes think of it as a software RAID utility that can be mounted to various parts of the filesystem. 
ZFS can take snapshots and do backups. 

It's important to note that ZFS != traditional filesystem. 

In other words, ZFS will never be a replacement for something like `ext4` or `FAT32` or `SWAP`.  

### About my ZFS pool 

I have 4X 1tb drives in a server in the rack dedicated to ZFS. I think of them as 4 disks in "Software" RAID 1. 

     Disk1 ---- [ A1 ] [ A3 ]    (1Tb Mirror 1)
     Disk2 ---- [ A1 ] [ A3 ]    (1Tb Mirror 1)
     Disk3 ---- [ A2 ] [ A4 ]    (1Tb Mirror 2)
     Disk4 ---- [ A2 ] [ A4 ]    (1Tb Mirror 2)

I have the zpool (group of volumes managed by ZFS) mounted to `/data` on the NAS (Network Attached Storage). 

You can see how the mirroring is basically that of RAID 1 between 4 disks with 2 mirrors.

```bash 
	NAME                                  STATE     READ WRITE CKSUM
	data                                  ONLINE       0     0     0
	  mirror-0                            ONLINE       0     0     0
	    ata-CT1000MX500SSD1_1914E1F7DAA6  ONLINE       0     0     0
	    sdd                               ONLINE       0     0     0
	  mirror-1                            ONLINE       0     0     0
	    ata-CT1000MX500SSD1_1914E1F7B15F  ONLINE       0     0     0
	    sdf                               ONLINE       0     0     0
```

This gives us 2Tb (4X 1Tb drives in RAID 1) of total storage so that every block has exactly one copy on another volume.

ZFS takes it a step further and also allows us to use the entire 2Tb pool dynamically.
I mount the pool for each of the users on my filesystem. 
ZFS will manage the differences and file permissions for each asset in each mount automatically!
So you just get 1 big pool of data to use however you want.

Check out my filesystem (notice how everyone seemingly has `1.8T` available but is all using different amounts.:

```bash
[novix@alice]: ~>$ df -h | grep data
data            1.8T  9.5G  1.8T   1% /data
data/falco      1.8T   41M  1.8T   1% /home/falco
data/novix      1.8T  3.0G  1.8T   1% /home/novix
data/mysql      1.8T   43M  1.8T   1% /var/lib/mysql
data/nova       1.8T  128K  1.8T   1% /home/nova
data/nginx      1.8T  216M  1.8T   1% /home/nginx
```

Check out the inode permissions. This is so fucking cool. 

```bash 
[novix@alice]: /home>$ ls -la
total 38
drwxr-xr-x  7 root  root  4096 Mar  2 00:37 ./
drwxr-xr-x 20 root  root  4096 Jan 25 20:51 ../
drwxr-xr-x  4 falco falco    9 May  1  2020 falco/
drwxr-xr-x  2 k8s   k8s   4096 May 11  2020 k8s/
drwxr-xr-x 11 nginx nginx   18 Jan 29 15:24 nginx/
drwxr-xr-x  3 nova  nova     6 May  9  2020 nova/
drwxr-xr-x 15 novix novix   29 Mar  1 21:55 novix/
```

Yes. The permissions are enforced at the kernel level (more on this later!) You can just use the pool however you want.

Everyone shares storage, without me as an adminstrator having to deal with HOW much each person has.

This is true software based redundant multi tenant persistent storage for Linux! 

*drools*

There is a bit of some history I have been following watching this come over from FreeBSD into Linux. Here are some cool resources.

 - [ZFS On Linux](https://zfsonlinux.org/)
 - [ZFS Source Code](https://github.com/openzfs/zfs) Bookmark this because we will be using it later.
 - [Mailing List](https://openzfs.org/wiki/Mailing_list) Join the `developer` mailing list! It's really cool!

# ZFS on Archlinux 

Haha. Just reading that out loud makes me sound completely insane. 

Good thing I am.

Archlinux has a concept of rolling updates. 
This is one of the main "features" of the operating system. 
(Also probably the most criticized).

This means that as open source packages are released, updates are available in Archlinux. 

Yes. I update my system at least once a day, and it keeps me aware of how "alive" open source software really is. 

With this paradigm behind the operating system, keeping packages up to date is a priority.

Naturally I wanted to replicate a FreeBSD like experience on Archlinux. 
So I installed critical parts of the operating system itself on my ZFS pool (remember `/data` from earlier?)

So in order for my ZFS server to fully come online - the zpool needs to be active and mounted. 

### So how do I manage an operating system installed on a filesystem that needs an operating system to run? 

...and more importantly. How do I keep it updated. 

So let's look at what ZFS needs to work.

# The ZFS Kernel Module 

Remember what I showed you earlier? About the filesystem and ZFS managing permissions at the kernel level? 

All of that is managed with the ZFS Linux Kernel module. Check out the [source code](https://github.com/openzfs/zfs/tree/master/module). 

So in Linux, the Linux kernel itself is considered a package. Which means: I am constantly getting Linux kernel updates.

I am running 5.11.1 in production right now. It came out yesterday.

```bash
[novix@alice]: /home>$ uname -a
Linux alice 5.11.1-arch1-1
```
I am also running ZFS on top of a 5.11.1 kernel which means my server automatically updated itself last night while I slept. 

# Managing the ZFS kernel module with Systemd 

If you have never compiled a kernel module manually, you probably assume that it will compile just like any old program.

Kernel modules are slightly more tricky, because you need what we call "The Linux Headers" or the `.h` files in `/lib/modules`.

In Arch linux you can get these by installing:

```bash 
pacman -S linux-headers
```

Now the constraint here is that the `.h` files correspond to some machine code as well. 

Without going into too much detail here is what you care about.

 - That the running kernel matches the headers located in `/lib/modules`

So naturally after you do an Archlinux system update that installs a new version of `linux-headers` you are going to break your shit. 

### The ZFS kernel module will break at runtime, and will break if you try to compile it again. 

Yay! Our first technical constraint! 

So here is what happens. 

 - Running a Linux 2.1.0 kernel
 - Linux releases new version of the kernel (2.1.0 -> 2.1.1) for instance
 - Pacman -Syu detects the new package and installs it
 - We now have a conflict (The running kernel is 2.1.0) and (The kernel headers are for 2.1.1)
 - We also need to compile some of the object files (`.o`) for the kernel headers (`.h`) so the kernel module can link to them
 - We need to reboot the server (scheduled) to bring the new kernel online

As the server comes up Systemd will begin to bring various parts of the system to life. 

I have a custom Systemd service (I call it Novix) that will manage my shit for me. 
Here is the basic bash for the ZFS components.

```bash 
# I run ZFS 2.0.1, and manage this myself.
cd /root/src/zfs-2.0.1

make clean # <---------- Needed to clean the existing object files. 
./configure # <--------- Needed to update to the new kernel version
make -j48 # <----------- I have 48 cores (NBD) but adjust to yours, compile here
make install # <-------- Installs ZFS and kernel module
modprobe zfs # <-------- Install the kernel module
zpool import data  # <-- Bring the zpool back online
zpool status # <-------- Just some debug to show us what we have running
```

The unit file looks like

```bash
# /lib/systemd/system/novix.service

[Unit]
Description="Startup Service for ZFS"

[Service]
ExecStart=/root/zfs.init # <-- the bash script from above

[Install]
WantedBy=multi-user.target
```

Note: the reason I do this is because I have some other logic in here that I want to check (SSH keys, Bashrc, Fail2ban, Falco, etc...)

A lot of that is stored in ZFS and I want my system to freak the fuck out if my line of security fails. Without ZFS online, my system is a brick (by design).

Basically think of my ZFS pool as the "Raptor Fences" for the kernel. If they go down - the whole park is fucked.

# Kubernetes 

I am making the assumption that you will find other resources to install Kubernetes. 

If you need some you can literally just look at my career. 

--- 

So *poof Kubernetes is installed.

---

Okay so we have an updated kernel.

We have ZFS up and running. 

Our directories are mounted. 

Our operating system is happy.

Our security system is in place. 

Systemd was able to mount the ZFS pool.

Systemd was able to start the Kubernetes Kubelet.

Now what? 

Well that's the beauty of this approach. Nothing really. 

No volume controllers. No persistent volume stores. Nothing. I just use [hostPath](https://kubernetes.io/docs/concepts/storage/volumes/#hostpath).

I use `hostPath` when I need persistent storage, and let the kernel manage the file permissions.

It's really nice :)

The `/data/*` subdirectories can be mounted from various users as `read-only` or `read-write` based on my needs.
I can even create new `/home` directories for them and really use Linux the way it was designed to be used.

# Distributed ZFS over the network with Kubernetes 

I mount the ZFS pool over the network using [SSHFS](https://wiki.archlinux.org/index.php/SSHFS).

The control plane (`alice`) and each of the nodes (`yakko` `wakko` and `dot`) all have `/data` mounted. 

 - Alice mounts it directly using ZFS
 - Yakko, Wakko, and Dot mount it using SSHFS

I can now manage ZFS directly from Alice (nightly snapshots, restores, etc)

# Persistent ZFS in Kubernetes

So all of my pods can just use `/data/*` and do whatever I want them do. 
They can be started on any node (including the master) and pick up right where they left off.

That's it. ZFS does the rest. It's fucking amazing. 

---

Anyway I am going to bed and will probably refactor this more later. 

Thanks for your time.   



