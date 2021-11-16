---
title: "Arch Linux NVIDIA Driver Beta - Module has invalid ELF Structures"
date: "2021-11-16"
author: "Kris Nóva 🖊"
tags: ["Kris", "Nova", "Nóva", "Kris Nova", "Nivenly", "Nivenly.com", "Blog", "Writing", "Arch Linux", "Graphics Driver", "Video Driver", "NVIDIA", "ELF", "Kernel", "Error"]
summary: "Debugging video drivers on 5.15.2 kernel"
---
---

Hi 👋

Me again.

---

# Updating Kernel to 5.15.2

So I run Arch linux and updated my kernel last night.
When I restarted my computer this morning I was welcomed by the following error message.

```
[FAILED] Failed to start Light Display Manager.
Module has invalid ELF structures
Module has invalid ELF structures
Module has invalid ELF structures
Module has invalid ELF structures
Module has invalid ELF structures
```

I was able to start a terminal session using a very old (and extremely handy) Linux trick.

### Linux Concurrent Sessions (ctrl + alt + F1-F7)

On Linux based operating systems you can combine `[ctrl]` + `[alt]` + `[F1]-[F7]` to open concurrent text based sessions.
It's really nice because you can open multiple sessions even if there is a GUI desktop running.
I suggest jumping around on these at any time on a Linux desktop. 
These can be useful to use even when your shit isn't broken.


| Screen (ctl + alt +) |      Command      |    Description    |
| -----------------    | ----------------- | ----------------- |
| `F1`  | `journalctl -f`   | I use the 1st session to just watch the system logs as I debug in other sessions |
| `F2`  |        `$`      | I use the 2nd session as my main working session. Here is where I do all my commands |
| `F3`  |       unused      | |
| `F4`  |       unused      | | 
| `F5`  |       unused      | | 
| `F6`  |       unused      | | 
| `F7`  | 👀 | 👀 |


### Debugging lightdm

I use lightdm for my desktop manager (I just think it's pretty - literally the only reason I use it). 
I tried to check the lightdm systemd service to see what was going on.

```
journalctl -fu lightdm
```

I found logs in `/var/log/lightdm`

```
lightdm.log  lightdm.log.old  seat0-greeter.log  seat0-greeter.log.old  x-0.log  x-0.log.old
```

I looked in the `lightdm.log` file and found the error I was looking for.

```
[+0.29s] DEBUG: Process 679 exited with return value 1
[+0.29s] DEBUG: XServer 0: X server stopped
[+0.29s] DEBUG: Releasing VT 7
[+0.29s] DEBUG: XServer 0: Removing X server authority /run/lightdm/root/:0
[+0.29s] DEBUG: Seat seat0: Display server stopped
[+0.29s] DEBUG: Seat seat0: Stopping session
[+0.29s] DEBUG: Seat seat0: Session stopped
[+0.29s] DEBUG: Seat seat0: Stopping display server, no sessions require it
[+0.29s] DEBUG: Seat seat0: Stopping; greeter display server failed to start
[+0.29s] DEBUG: Seat seat0: Stopping
[+0.29s] DEBUG: Seat seat0: Stopped
[+0.29s] DEBUG: Required seat has stopped
[+0.29s] DEBUG: Stopping display manager
[+0.29s] DEBUG: Display manager stopped
[+0.29s] DEBUG: Stopping daemon
[+0.29s] DEBUG: Exiting with return value 1
```

The line that connects a failing `lightdm` to `Xorg` is this one.

```
[+0.29s] DEBUG: XServer 0: X server stopped
```

I just knew that `X Server` corresponded to `Xorg`.

I also knew that good old `starx` should be able to tell me more. 
As expected the `starx` command did not work.

I then checked the `Xorg` logs directly and found the source of the problem.

```
cat /var/log/Xorg.0.log
...
[    18.704] (II) LoadModule: "nouveau"
[    18.707] (WW) Warning, couldn't open module nouveau
[    18.707] (EE) Failed to load module "nv" (module does not exist, 0)
```

I have an NVIDIA graphics card (an old one...)

```
lspci -v | grep -i nvidia
03:00.0 VGA compatible controller: NVIDIA Corporation GP106 [GeForce GTX 1060 6GB] (rev a1) (prog-if 00 [VGA controller])
```

I checked the `nvidia` package just to see if I missed an update.

```
pacaur -S nvidia
```

I discovered I was running the `nvidia-beta` package. I replaced with the `nvidia` regular package.

```
pacaur -Ss nvidia-beta
aur/nvidia-beta 495.44-1 (348, 2.403939) [installed]
    NVIDIA drivers for Arch's official 'linux' package (beta version)
pacaur -S nvidia
```

I replaced `nvidia-beta` with `nvidia`. 
Restarted the computer

```
sudo reboot now
```

and we were off to the races as they say.

All in all this blog took more time to write, than the computer took to fix. Whatever -- here is a blog. Hopefully it helps someone.