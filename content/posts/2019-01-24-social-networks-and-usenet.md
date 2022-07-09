---
author: isotopp
title: "Social Networks and USENET"
date: "2019-01-24T14:58:29Z"
feature-img: rijksmuseum.jpg
published: true
tags:
- pluspora_import
- lang_de
- social networking
- usenet
---

Some thoughts on Social Networking and Usenet, in response to [https://jfm.carcosa.net/blog/computing/usenet/](https://jfm.carcosa.net/blog/computing/usenet/).

In the context of the impending shutdown of Google plus, some people reminisce about USENET, especially in the context of social media.

Before being abused as a broadcast protocol for TV series, Porn and illegal copies of software, USENET was a kind of decentralized social media used for discussion.
There was a small number of interoperable server implementations, and a plethora of clients, with different audiences and optimisations.

# How did USENET work?

The idea behind USENET is that you have a very large number of servers that forward articles between each other, so that any user can post any article anywhere to any server, and eventually it would end up with exactly one copy of that article on each server that wants it.
Servers can have one or more connections with other servers, some had hundreds of links to other servers.
Message would ideally still be transported only once, and in no case stored multiple times.

A server keeps a message for a configurable amount of time, and eventually deletes the local copy as the expiration date of this message is being exceeded.

The format of any USENET post was superficially that of a (pre-multimedia) mail.
So a USENET article had a number of header lines as Key-Value pairs, broken according to mail long-line folding rules, and a body, which was ASCII text.
Later additions tried to improve on that, but failed - more about that later.

A somewhat basic usenet header would look somewhat like this:

```
From: user@host (User Name)
Date: Thu, 24 Jan 2019 22:15:15 +0100
Path: news.nntp.dca.giganews.com!news.koehntopp.de!kris
Newsgroups: kiel.allgemein
Message-ID: <treXfsfeg17354@news.koehntopp.de>
In-Reply-To: <eueytdj2625@news.koehntopp.de>
```

A few header keywords were more important than others, because without them the protocol would not work.

The key header is the Message-ID:
It defines the identity of a message for purposes of the protocol -- two instances of a message are considered identical if they have the same ID, different if they ID is different.
It was crucial for all implementations to never modify a messages "Message-ID:" line.

Servers know which messages they have already seen by keeping a list of Message-IDs in a special database, the server history table.
Servers would remember the IDs of messages longer than they would remember articles, and they would reject any message with any Message-ID that is even older than their history reaches back in time.
So a particular server might want to keep messages for 30 days, and a history table for 90 days.
That particular server would roundabout reject any message older than 90 days.

Whenever a server sees a message young enough to qualify for lookup in the history table, it would do that lookup.
If the Message-ID is already known, a decision about this message had already been made in the past and the message is being rejected as a duplicate.

Only when a message qualifies younger than the history, and as as-of-now unknown in the history, a decision about it (keep it, discard it, ...) has to be made.
In any case, the server would store the ID as "seen" in the history table and it would reject any second message with that ID.
That way duplicates from multiple connections are being recognized and eliminated.

This allows a dense and redundant set of connections between servers without the need of any connection management or requirements on the server topology at all.
It would also allow a new server to connect to an existing server and request re-feeding any amount of old messages without the danger of accidentally feeding these old messages a second time to other existing servers over another link.

Of course, it still is possible for a server with a hundred links to get dozens of copies of the same message through different links, all of which except for the first copy are being rejected.

That was particularly common for servers that did not have a live connection on the internet, but were batch fed:
Such servers would have their articles collected in a series of compressed files over the day, would then dial up using a modem and download the compressed batches in one go, multiple times a day.
After disconnection, they would decompress and process these articles, discarding any duplicates based on the Message-IDs and their history.

Interactive transfer on live internet lines was slightly more intelligent, and worked somewhat like two kids comparing collection cards.
One server would post Message-IDs of messages in `IHAVE` statements, and the receiving server would look up these IDs in turn in their history.
Anything missing they would ask for with `SENDME` messages, asking for new files by Message-ID.

One way to optimise this is the "Path" header line, which lists all the servers that have seen this copy of a message in order to traversal.
So a message posted to `news.koehnntopp.de` by the user `kris` would start out with a "`Path: news.koehntopp.de!kris`".
That server would feed it for example to `news.nntp.dca.giganews.com` and to `news.toppoint.de`, so one copy of that message would end up with a "`Path: news.nntp.dca.giganews.com!news.koehntopp.de!kris`", and the other would end up with "`Path: news.toppoint.de!news.koehntopp.de!kris`" in their Path.
Both copies of the original message would have divergent Path header lines, but identical Message-ID lines, and the same message body.

The Path line was being used to detect circles before they happen - you would not even offer anything that already has `news.koehntopp.de` in the Path in any position back to `news.koehntopp.de`.
Also, as a server operator you could do stats on Path lines to see which of your links was fast (brought you copies of messages first) and which would be slower.


# Message Selection

So how would a server operator get connections to other servers, and how would they decide which messages they want and not want?

This is the first of the weak points of USENET, and often glossed over in glorifying USENET.

Setting up a link between two servers was a completely manual process, and it was completely controlled by the upstream server feeding a downstream server with messages.

First, you had to manually discover a server wanting to act as a feed to you.
Often that was done with mailing lists where server operators and wannabe-server operators offered feeds, or asked for peers.

Then, after making contact, you would exchange contact information, and negotiate the parameters of setting up a link.
That required the exchange of login credentials, and the configuration of what the receiving server operator would want from the feed.
The upstream operator would manually configure these selection criteria and then send stuff to the receiver, which may or may not have been what these people wanted, and they could take that or discard it.

This is totally not what anybody would want today or back then.
There was no automated negotiation where the feeding server would advertise what they have, and the receiving server would then state interactively what they would want to subscribe to and what not.

Also, all selection was based on another header line, the Newsgroup header.
So you could not express wishes based on language, author, content type, message-size or any other criteria.
You could only say you want messages "in kiel.allgemein and kiel.uni" or "in any kiel.* newsgroup" or exclusion criteria such as "kiel.*, but not kiel.binaries.*".

Conversely, server operators and end users where guarding newsgroups strongly - the creation and deletion of newsgroups was a heavily guarded process and misposting and crossposting - posting to the wrong newsgroup or posting to too many newsgroups at once - came attached with social stigma and sanctions.

This made USENET very cumbersome for the end user.
Users that wanted social space and reach wanted a newsgroup.
But to get that they had to go through a very slow and formalised discussion process that was designed to keep the number of groups small and audiences in groups large and generalised.
Protected or small spaces, with a designed, non-public audience were frowned upon, making the creation of safe spaces hard or impossible.

# The client dilemma

USENET clients were written as early versions of free software.
Their source was packaged and posted on USENET itself.
You would read a newsgroup that transported packaged software, and would find a new version of an end user client posted there.
You would unpackage the source, configure it for your system and compile it, and then try out the new program.
If it worked, you would roll out the new version on your systems for your end users.

There were many client programs.
Sven Guckes maintains a list at [http://www.guckes.net/newsreaders/](http://www.guckes.net/newsreaders/).

The wide diversity in reading software also was a main cause of impediment in the evolution of USENET.
If a news reading program added features that required additional data in the header or the body of an article, all other reading programs would have problems decoding that.
Simple things as support for Umlauts for example required encoding of characters, because some systems broke Non-ASCII characters.
So "Kristian Köhntopp" was encoded as "Kristian =?iso-8859?Q?K=F6hntopp?=".
While it was displayed properly in readers that supported decoding this, it was shown as "Kristian Iso-something-topp" to everybody else.

Putting rich content, such as formatting in Markup or HTML, or inline-images into messages was even worse, because it made messages completely unreadable to users with clients that did not support these new formats.

Consequently, all extensions got heavy resistance from end-users and operators everywhere, and eventually USENET evolution stopped and everybody moved to web forums.
Essentially, USENET died with the appearance of phpBB and friends.

# How web forum software won

Web Forum software was, in the eyes of USENET users, a big step backwards.
It was not distributed, the client was primitive and put a lot of emphasis on presentation, and it was proscribed by the board operator instead of being a choice of the reader.

But web boards were easy to upgrade:
With an upgrade, the same set of features was available to all users at once, and there was no possible resistance from users who were slow or negligent in upgrading their software.
Also, while you had to go through a slow and lengthy discussion process and voting process to get just one newsgroup, it was easy to get a web server with a copy of phpBB up and running and then you could run any number of groups on that.
Also, you controlled audience and admission, so it was possible to create protected safe spaces - by design an impossibility on USENET.

In the end that made all but the most hardware tech audience move away from USENET rather quickly, and eventually USENET became irrelevant.

# TL;DR

We can not only learn from the successes of USENET, but even more from its failures.
