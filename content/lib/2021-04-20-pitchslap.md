---
title: "The Pitch Slap"
date: "2021-04-20"
author: "kris nóva"
keywords: ["Technical Process"]
summary: "My personal favorite way to propose technical concepts to a team"
---
---

yes. hi. hello. me again. happy holidays.

today we will be discussing my least favorite discipline of engineering, the almighty `solutioneering`.

consider this post, a tool to keep with you in your engineering toolbox.

feel free to use this to your advantage.

---

# it's dangerous to go alone! take this.

so. let's get one thing very clear. this tool will only be applicable **after** you have a well-defined problem.

### finding a good problem

(_note: finding a good problem is exceptionally hard to do_)

when i am not writing world-famous great successful blogs, i also spend time answering random questions on the internet. 
below you can find [@SaiyamPathak](https://twitter.com/SaiyamPathak/status/1380045295585665027?s=20)'s tweet where he asked the following:

 > App-> you choose to set up Kubernetes + storage + monitoring + security + CI/CD + chaos
 > You get Kubernetes power but end up spending too many resources for your app? How much is enough?
 > What are cases when you don't and do need Kubernetes beast?
 > #NóvaQuestions

### simplifying a good problem

i am going to attempt to summarize this is the form of a problem question in my own words. 

(_note: what i am doing here is a substantial part of this strategy_)

 > what is a reasonable boundary for when kubernetes makes sense for a use case?

this is a very good problem statement, and alludes to a very concrete or concise outcome. 

we should now all know precisely what it is we are trying to solve or build.

# the bell curve

below is a lovely bell curve `svg` that was kindly donated from [@tgockel](https://twitter.com/tgockel) with the original [source found HERE on wikipedia](https://upload.wikimedia.org/wikipedia/commons/d/df/Bellcurve.svg).

{{< curve >}}

### the 3 pillars

let's talk about the 3 important pillars of the pitch slap. 

 - minimal approach
 - reasonable approach
 - high investment approach 

### the 3 actors

#### the purist

has a beard.

someone who wants to only solve the concrete task at hand, and nothing else. 
these folks enjoy writing functions instead of methods.
these folks enjoy quoting "the unix philosophy".
do one thing, and do it well.
less is more.
keep it simple.

#### the token white girl

_obviously this person doesn't need to smoke weed, be white, or a woman - but you hopefully smiled at the analogy._

this is me. the reasonable chilled out level-headed engineer who spends most of the conversation listening.

#### the hipster

this person drinks iced cold brew and original thought MongoDB was a great idea.

ideally there is a voice in the conversation that is excited about new technology, and encourages the team to be more on the bleeding edge.


### 1. the minimal approach

this should be offensively vague, and ideally this should offend *some* engineers.

a reasonable argument could be that this approach is foolish, naive, or hasty.

this argument favors **right now** over **right**. low investment, immediate reward.

the purist loves this. the hipster hates this.

> kubernetes is an expensive solution, and should be avoided at all costs.
> we should only focus on the concrete needs of our application, and anything else is wasteful.

> if the application takes 2 months to build, that is all we should do.

### 2. the reasonable approach

this should be fair, and at first glance should seem potentially incomplete. 

this is ultimately what we want to "win".

a well-rounded proposal here should ideally love some heavy engineers slightly dissatisfied, while also worrying some of the more purists.

this is "the compromise". 

this argument finds a balance between **right** and **right now**. medium investment, medium reward.

the purist is not THAT offended.
the hipster is not THAT upset.
the token white girl spoke up during this one.

> we should be willing to spend about as much time investing in our application's scale and management
> as we do building the application itself.
 
> if we need to spend 2 months building the app, we should be willing to spend 2 months to support the app.
 
### 3. the high investment

this should be exciting for newer engineers who are delighted to build and use new technology without much consideration for the benefit.

this should offend some purists, and should be fairly dramatic.

this approach favors **right** over **right now**. high investment, high reward.

the hipster is freaking out and yelling with glee.
the purist has left the room.

> everything should run in kubernetes, including kubernetes itself.
> it's worth 12 months of our time to build a system to support an application that will take 2 months to build.
 
# final thoughts

if you draw the boundaries of the scale first, it will make the middle answer much more appealing. 

if you have a solution that you passionately believe in, it is important to draw the extreme examples around it to demonstrate the reasonable approach.

ideally you should have an understanding that you are 

### exchanging cost for risk

in other words if you are willing to invest a lot, you will reduce risk over time.

there is no single answer here, however drawing a scale and breaking it down in 3 arguments makes the solution much easier to accept.

# the prescription

so given our example above, and knowing the 3 levels of the curve i can now prescribe a solution to our friend [@SaiyamPathak](https://twitter.com/SaiyamPathak) which says

> Saiyam i believe you should go with option 2, and only invest as much time and resources 
> as the application gives your team in value in running in kubernetes.

> boil everything down to engineering hours, or business value in dollars and cents.
> be willing to spend about as much investing in kubernetes as you do investing in the application itself.

because of the formula i was able to give our friend a very concrete, and very helpful answer to a very vague problem that i feel confident about.

# tldr

be the token white girl like me and everyone will go along with your ideas and you will find easy solutions to hard problems.

happy 420 every one



