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

cd /usr/src
wget $ISO
sudo fdisk -l #<-- Use this to find your USB "device"
```

I noticed my recently connected USB drive happens to be `/dev/sdc`.
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

Using your intellect, research, and a bit of good luck you should get a screen that looks like this.

![Boot Menu](/assets/img/boot.png)

 > Make sure you see the phrase `UEFI`! 
 > A BIOS boot will have a different menu than the one above.

# Setup the Disks

I could write an entire book on this to be honest. 
For now here is what you care about.

 > Note: Kubernetes will not run on SWAP so you can skip that

From the `archiso` command line type `cfdisk`.

 > Note: There are many commands/tools/utilities you can use instead of `cfdisk`

Here is what our intended state of the disks are. You will need to change `type`.

 > Note: if you are prompted when you first start `cfdisk` choose GPT.

 - /dev/sdc1 FAT32 (EFI) 512Mb+
 - /dev/sdc2 ext4 (linux filesystem) 1gb+ 

So for my RAID 1 200Gb drive I set up 

 - /dev/sdc1 FAT32 (EFI) 512Mb
 - /dev/sdc2 ext4  (linux filestyme) 199.488Gb

You can now format the paritions you have created.

```bash 
mkfs.fat -F32 /dev/sdc1
mkfs.ext4 /dev/sdc2
```

You are now ready to install Linux!

# Pacstrap

Mount and `pacstrap` the root parition.


```bash
mount /dev/sdc2 /mnt
# pacstrap /mnt <packages>
#
# Feel free to add 
# Feel free to remove anything other than linux, linux-firmware, and base
pacstrap /mnt base base-devel linux \
  linux-headers linux-firmware \
  net-tools wget curl nano sudo \ 
  grub efibootmgr dosfstools \
  os-prober mtools openssh \
  networkmanager nmap pacman
```

# Access your Linux installation

Here we get to use one of the underlying kernel features that brings us containers/Kubernetes.

```bash 
arch-chroot /mnt
```

You should now see a different prompt.

# Configure your new system

Here there are two main things you want to make sure you do.

 1. Create a bootloader
 2. Configure time/locale

I wrote a bashscript to simplify this for my needs. I live on the West coast and am comfortable reading/writing English.

```bash
# setup.sh
#!/bin/bash
# -------------------------------
#  [Setting up the Locale]
# 
#
HOSTNAME="yakko"
USER="yakko"
LANG="en_US.UTF-8"
CHAR="UTF-8"
LOCALE="${LANG} ${CHAR}"
ISO="en_US ISO-8859-1"


# -------------------------------
#  [Setting up the Locale]
# 
#
echo "#" >> /etc/locale.gen
echo "#" >> /etc/locale.gen
echo "# ***** [Nova Boot] ******" >> /etc/locale.gen
echo "#" >> /etc/locale.gen
echo "${LOCALE}" >> /etc/locale.gen
echo "${ISO}" >> /etc/locale.gen
echo "#" >> /etc/locale.gen
locale-gen
echo LANG=${LANG} > /etc/locale.conf
export LANG=${LANG}
echo $HOSTNAME > /etc/host 
systemctl set-hostname $HOSTNAME #<-- Needed for Kubernetes


ln -s /usr/share/zoneinfo/America/Los_Angeles /etc/localtime
hwclock --systohc --utc

passwd # <-- Set the root password
useradd -mg users -G wbeel,storage,power -s /bin/bash ${USER}
passwd ${USER} # <-- Set the $USER password
chage -d 0 ${USER}
EDITOR=nano visudo # <-- Use nano for editor and uncomment the %wheel line

# Needed so you can access your server later
systemctl enable sshd
# Archlinux ships with the systemd-networkd, but i prefer this:
systemctl enable NetworkManager 
# Needed for NTP (automatic time keeping)
systemctl enable systemd-timesyncd
```

# Anything else?

Think about what else you want on your system. 
You have internet now so making sure the system is fully configured is important. 
 
 - Do you need/want any other packages? 
 - Do you want `go`? `python`? `git`?
 - Do you want any network tools like `nmtui`?
 - Do you enable your services?

# The Bootloader

Now for the simple/fun part. Let's generate a bootloader for the system.

```bash 
mkdir /boot/EFI
mount /dev/sdc1 /boot/EFI
grub-install --target=x86_64-efi  --bootloader-id=GRUB --recheck
grub-mkconfig -o /boot/grub/grub.cfg
```

# Reboot

Last chance for any other changes before a reboot! 
If you did everything right you should be able to reboot into a new system!

```bash 
exit # <-- Leave the chroot
reboot now # <-- Reboot
```