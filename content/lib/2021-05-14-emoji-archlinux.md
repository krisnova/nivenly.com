---
title: "emoji-archlinux"
date: "2021-05-14"
author: "kris nóva"
keywords: ["Archlinux", "Emojis"]
summary: "Setting up emojis in intellij on Arch"
---
---

yes. hi. hello. me again. wow i really love this intro.

anyway i want to start using emojis more in my writing. 

i installed an emoji plugin in my text editor and i would like it if i could start to use emojis more in my writing for hilarious dramatic effect 🎉.

---

### problem

they aren't fucking showing up 😠

 - 🎉 hooray
 - 🙂 smile 
 - 🏴‍☠️ pirate flag

### tldr;

if you want emojis in goland type this

```bash 
pacaur -R goland
pacaur -S goland goland-jre
pacaur -S ttf-fira-code symbola noto-fonts-emoji-apple terminus-font
fc-cache -fvr
sudo reboot now 
```

{{< twitter >}}

### solution

so i run arch linux and here is how i solved the problem of having fabulous emojis in **any** intellij/goland/clion like IDE

if you check the arch packages - you can notice that there are specific Java Runtime Environments (JRE) packages for different IDEs

(this is the fucking problem)

i had installed `jre11` and that was what was fucking me up

### install the idea (the right way)

i started with `goland`

so naturally i installed goland via 

```bash
pacaur -S goland
```

and this was the problem - i then used a "normal" JRE and that was 100% why my emojis weren't showing up.

it was an older JRE that didn't support monospace embedded emojis.

here is what you want to do.

#### goland

```bash
pacaur -S goland goland-jre
```

#### clion 

```bash 
pacaur -S clion clion-jre
```

#### intellij

```bash 
pacaur -S intellij-idea-community-edition-jre
```

### fonts

okay now i like shit to be pretty - so here are the fonts that i like the most - and if you want to have pretty arch linux you want these too.

_note_: i like `noto-fonts-emoji-apple` because i think the apple emojis are pretty - however you can substitute `noto-fonts-emoji` if you want

```
pacaur -S ttf-fira-code symbola noto-fonts-emoji-apple terminus-font
```

trust me - you want `terminus-font` and `ttf-fira-code`.

## make your idea pretty

reset your font cache for good measure

```
fc-cache -fvr
sudo reboot now 
```



now you can go to your settings and edit your fonts in `intellij` or `goland` or whatever

i suggest checking out `terminus` or `fira-code` for your main font and `noto-color-emoji` for your emoji font

## pro tip

also grab the [yet another emoji support](https://plugins.jetbrains.com/plugin/12512-yet-another-emoji-support) plugin

now you can type `:` in your ide and it will start to populate emojis just like in slack

{{< twitter >}}
