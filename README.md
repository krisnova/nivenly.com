# Nivenly.com Source Code


The official source code for nivenly.com

**Author**: Kris Nóva <_kris@nivenly.com_>

---

### About

Nivenly.com is the official home of all things Kris Nóva. Here she blogs and holds various online resources about herself and her adventures.

Pull requests are accepted, and sometimes ignored. She ultimately uses this space as a backend store for the majority of things she needs to write down.

This is for lack of a better term, the offical archive of Kris Nóva.

### Development Notes

To create the `/meeps` endpoint:

```bash
mkdir ./content/meeps
touch ./layouts/_default/kubernetes.alice.nova

# To create a "set" of items
touch ./content/meeps/ex1.md # This would use "list.html"
```

### Rules

The following are the rules that Nóva has for her Twitch chat.  

- No talking about Nóva's job
- No homophobia, transphobia, sexism, racism, etc...
- Don't be an asshole
- At most one warning will be provided


### Success

As she builds out the site, there are a few things she wants to make sure she includes.

 - [ ] Easily add `note1.md` files to the archive
 - [ ] All notes are automatically rendered on [nivenly.com](https://nivenly.com)
 - [ ] Common links and URLs (twitter, linkedin, repos, etc)
 - [ ] About me 
 - [ ] Theme to match Nóva (ascii art, red plaid, black, hacker, glow)
 - [ ] Backed up somewhere locally
 - [ ] Operator to update kubernetes cluster