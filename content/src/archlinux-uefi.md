---
title: "The Official Kris Nóva Archlinux Installation Guide"
date: "2021-03-01"
author: "kris nóva"
---

I have been deploying Archlinux on some baremetal machines in my home cabinet recently.
I noticed there wasn't a very comprehensive guide/walk-thru out there that met my standards for the considerations of deploying Arch on metal.

So naturally -- here we are. I present `The Official Kris Nóva Archlinux Installation Guide`.

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

NOTE: Whatever you use to boot your USB, will affect what you can install. In other words if you boot a USB stick using the BIOS, you will not be able to install a UEFI operating system.




