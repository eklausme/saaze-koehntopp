---
author: isotopp
date: "2020-05-25T21:27:26Z"
feature-img: rijksmuseum.jpg
tags:
- lang_en
- iot
title: Air Quality Sensors
---
In an earlier episode I asked for [Plugs with Wi-Fi](../2020-05-12-plugs-with-wifi) and ended up with [Gosund and Tasmota](../2020-05-20-gosund-and-tasmota). Considering this to be a success, I asked the Twitters for Temperature and Humidity Sensors. Of course, this got complicated.

[![](https://blog.koehntopp.info/uploads/2020/05/temp-question.png)](https://twitter.com/isotopp/status/1264943546085322754)
*Now that I have Powermeter Plugs everywhere: What are good sensors for temperature, humidity and CO2 that can be tasmotified? Wi-Fi, http or mqtt?*

I was pointed to [Xiaomi Aqara](https://www.amazon.de/gp/product/B07SB2C327), but these do not do Wi-Fi, but Zigbee - whatever that is, it is spoken by [Zigbee USB Gateway Sticks](https://www.amazon.de/gp/product/B07PZ7ZHG5) and works with Raspi. We'll see.

[Christian Kahlo](https://twitter.com/ckahlo/status/1264953270298173445) mentioned [GY-BME280](https://www.amazon.de/dp/B07FS95JXT) Sensors, which can be connected to any ESP Tasmota device, and work with the "sensors"-Edition of Tasmota just fine. Worth a try. [Jens Dibbern](https://twitter.com/datengaertner/status/1264949436284899328) points to generic NodeMCU modules and BME Sensors again.

[René Kerner](https://twitter.com/rk3rn3r/status/1264948594743836680) recommends [this talk](https://www.youtube.com/watch?v=WuJ2Y9ccVBY), which may be relevant.

[Wickelkranz](https://twitter.com/wickelkranz/status/1264949455050215424) points at the [Aranet 4](https://aranet4.com/), but 150 Euro is too much to play with it randomly. This would need more pre-buy research. [The FAQ](https://aranet4.com/faq/) is not encouraging, but the [Forums](https://forums.aranet.com/viewtopic.php?f=48&t=63) are helpful and point to [Github](https://github.com/Anrijs/Aranet4-Python).

[Sascha Köhler](https://twitter.com/sascha_koe/status/1264952367251939328) recommends the Wemos D1 Mini Development Board and then a DIY sensor build.
