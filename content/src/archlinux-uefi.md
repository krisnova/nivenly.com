---
title: "The Official Kris Nóva Archlinux Installation Guide"
date: "2021-03-01"
author: "kris nóva"
---

I have been deploying Archlinux on some baremetal machines in my home cabinet recently.
I noticed there wasn't a very comprehensive guide/walk-thru out there that met my standards for the considerations of deploying Arch on metal.

So naturally -- here we are.

---

# My Hardware 

 - [1X] Dell PowerEdge R630 with LED display 
   - [2X] 200Gb Solid State drives in RAID 1
   - [4X] 1Tb Solid State Drives in RAID 1 (Dual striped at 2Tb)
 - [3X] Dell PowerEdge R620
   - [2X] 600Gb Solid State drives in RAID 1
 - [1X] Ubiquiti EdgeRouter 10x
 - [1X] Ubiquiti Managed 48 port switch
 - [1X] Ubiquiti Managed 8 port PoE switch

I also have a `/29` block I get from Comcast Business (Fiber) at the house in San Francisco. 

# UEFI vs BIOS

Okay let's talk about this because not enough people do. This is important.

### BIOS and UEFI are two firmware interfaces to boot your shit.

 - BIOS (Basic Input/Output System): This is older, and uses your MBR (Master boot record) to store the data needed to boot your OS.
 - UEFI (Unified Extensible Firmware Interface): This is newer, and uses your GPT (GUID partition table) to store the data needed to boot your OS.

Older computers will usually have BIOS only.

Newer computers will usually have both UEFI and BIOS available.

> NOTE: Whatever you will use to boot your USB, will affect what you can install. 
> In other words if you boot a USB stick using the BIOS, you will not be able to install a UEFI operating system.

# Bootable USB

Whatever firmware interface you plan on using, you will create the USB the same way.

Go to the [official download page](https://archlinux.org/download/) and find a local server near you.

For instance, I live in San Francisco, so I chose Berkeley which is just across the bay.
Obviously you will have to make sure you are downloading the most recent version as well.


```bash
ISO=https://download/file.iso # <-- Change this
```

```bash
cd /usr/src
wget $ISO
sudo fdisk -l #<-- Use this to find your USB "device"
```

I noticed mine happens to be `/dev/sdc`.
Unmount `/dev/sdc` if it is not already.

```bash
umount /dev/sdc
```

Now use the `dd` (data description) command to make the bootable USB.
Note that `if=` and `of=` stand for `input file` and `output file` respectively. 
You can also pass `status=progress` to `dd` to get a progress bar in the terminal.

> Protip: Behind the scenes dd uses the pv tool and associated libraries. 
> If you haven't installed pv you should do it now and impress your friends
> You can pipe any command to pv to see how far along it is. Useful for many things.

```bash
sudo dd if=archlinux-2021.02.01-x86_64.iso of=/dev/sdc bs=1M status=progress
# - or - with pv
sudo dd if=archlinux-2021.02.01-x86_64.iso of=/dev/sdc bs=1M | pv -p
```

# Boot to the USB

Plug the USB into the machine you are trying to install Archlinux UEFI on and reboot the machine.

Now you will have to *somehow tell the computer to UEFI boot from the USB (if it does not automatically)

To do this you will confusingly try to access a control panel commonly known as the BIOS. (Yes even though we are using UEFI)
This can usually be done by rebooting the computer and pressing a certain key when the computer first powers on.

 - delete
 - F2
 - F10
 - F11

This will be different for everyone, so you might have to do some research here.


