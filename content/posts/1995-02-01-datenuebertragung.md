---
author: isotopp
date: "1995-02-01T09:00:00Z"
feature-img: rijksmuseum.jpg
published: true
tags:
- lang_de
- publication
- internet
title: "Grundlagen der Datenübertragung"
---

**von: Kristian Köhntopp, aus: DOS Sonderheft DFÜ, DMV Verlag**

# Grundlagen der Datenübertragung

#### Der Einsteiger in das Gebiet der Datennah- und fernübertragung wird zunächst einmal mit einer verwirrenden Vielfalt neuer Konzepte und Begriffe konfrontiert. Wir wollen hier versuchen, einen allgemeinen Überblick über das Gebiet der Datenübertragung zu geben und die wichtigsten Ideen und Ausdrücke darzustellen.

Die Grundaufgabe bei der Datenübertragung ist es, eine Menge an
Informationen von einem Gerät zu einem anderen zu übertragen. Diese
Formulierung ist mit Absicht genauso allgemein gewählt, wie sich das
Problem in der Wirklichkeit darstellen kann. Bei dem zu lösenden
Problem kann es sich um die einfache Übermittlung einer Grafikdateien
vom Rechner zum Drucker handeln, aber genausogut kann es sein, daß die
kompletten Konstruktionspläne eines Containerfrachters vom
koreanischen Konstruktionsbüro an eine Werft in Bremen oder Kiel
übermittelt werden müssen. Entsprechend vielfältig sind die Lösungen,
die für das jeweilige Problem gefunden werden und entsprechend
unterschiedlich ist nicht nur die verwendete Hard- und Software,
sondern auch die Begriffswelt, die die entsprechenden Personen
verwenden.

## Das OSI-Modell

Um dieses Problem in den Griff zu bekommen, hat sich die
Normungskommision ISO zusammengesetzt und ein sogenanntes
*Referenzmodell* für die Datenübertragung ausgearbeitet. Dieses
Referenzmodell wird allgemein als
*Open Systems Interconnect (OSI) Modell* bezeichnet. Das Modell
gibt keine konkrete Lösung zur
Datenübertragungsproblemen an, sondern versucht das komplizierte
Problem Datenübertragung in kleine, leichter zu lösende Teilprobleme
zu unterteilen, die aufeinander aufbauen. Hat man ein Teilproblem im
Griff, kann man sich dem nächstkomplizierten Problem zuwenden. Das
OSI-Modell besteht insgesamt aus sieben Schichten, mit denen man
versucht, die Aufgabe zu strukturieren.

![](https://blog.koehntopp.info/uploads/1995/02/bild1.gif)

*Bild 1: Das OSI 7-Schichtenmodell*

Weil jede Schicht auf den darunter liegenden Schichten aufbaut, redet
man auch gelegentlich von einem Stapel oder *protocol stack*. Man
kann nicht immer ein Protokoll oder eine Funktion in der realen Welt
genau auf eine Schicht im OSI-Referenzmodell abbilden. Das ist auch nicht
notwendig, denn das Modell stellt nur eine Strukturierungshilfe dar und
repräsentiert keine Gesetzmäßigkeit, nach der ein Protokoll zwangsläufig aufgebaut sein muß.

## Von Punkt zu Punkt

Um Daten übertragen zu können, muß zunächst
einmal eine Verbindung zwischen den beteiligten Geräten
hergestellt werden. Genau damit beschäftigt sich die
unterste Schicht des OSI-Protokollturmes, die
*physical layer*.  Damit eine Verbindung konstruiert werden kann,
ist es notwendig, die verwendeten Kabel und Stecker zu
normieren.  Außerdem müssen die elektrischen
Parameter der Übertragung festgelegt werden und eine
entsprechende Hardware vorhanden sein. Natürlich braucht
man heute für Standardfälle keine solchen
Vereinbarungen mehr zu treffen. Stattdessen existiert eine
reichhaltige Palette von Normen für die unterschiedlichsten
Anwendungsfälle. So legt die CCITT-Norm *V.24* z.B. die
elektrischen Parameter einer seriellen Schnittstelle eines PC
fest, während die parallele Schnittstelle durch eine
Herstellernorm des Druckerherstellers **Centronics*
beschrieben wird.  Andere Normen beschreiben die Hardware zum
Anschluß an ein Ethernet, ein Token-Ring Netzwerk oder an
einen FDDI-Glasfaserring.

Danach kann man sich Gedanken über ein *Übertragungsprotokoll*
machen. Das Protokoll legt eine Verfahrensvorschrift fest, nach der
sich alle an der Übertragung beteiligten Geräte Zeichen auf dem
Übertragungsmedium signalisieren dürfen. Dabei muß nicht nur das wie
der Zeichenübertragung geregelt werden, sondern auch das wann. Das
bedeutet: Man muß nicht nur festlegen, wie und mit welcher
Geschwindigkeit die einzelnen Bits eines Datenbytes codiert werden,
sondern man muß auch festlegen, wie ein Gerät seine Übertragung
anmelden muß. Einerseits verhindert man damit, daß mehrere Sender
gleichzeitig versuchen, einem Empfänger eine Nachricht zu senden und
sich gegenseitig blockieren.
Diesen Teil eines Protokolles nennt man *media access layer*, weil er den Zugriff auf das Datenübertragungsmedium - sprich: das Kabel - regelt.
Andererseits muß der Empfänger die Möglichkeit haben, eine Datenübertragung abzulehnen, weil er z.B. intern noch mit der Verarbeitung einer vorhergehenden Nachricht beschäftigt ist oder weil seine Puffer voll sind und die Daten deswegen nicht entgegen nehmen kann.
Diesen Teil eines Protokolles nennt man *flow control* (Datenflußkontrolle).

## Bitte nicht stören

Jede Datenübertragung in der wirklichen Welt hat mit dem Problem
mehr oder minder starker Störungen zu kämpfen. Nachdem man das Problem
der Datenübertragung erst einmal grundsätzlich gelöst hat, kann man
sich daran machen, das Übertragungsprotokoll so zu verbessern, daß
solche Übertragungsfehler erkannt und korrigiert werden können.
Derartige Spezifikationen werden im OSI-Modell in die zweite Schicht,
die *data link layer*, eingeordnet. Die Korrektur von
Übertragungsfehlern kann auf zwei Arten geschehen: Einmal könnte man
sich für die Übertragung einen speziellen Code definieren, der es
nicht nur möglich macht, Übertragungsfehler zu erkennen, sondern sogar
das ursprüngliche Zeichen zurückzuberechnen. Zum anderen könnte man
sich darauf beschränken, Fehler nur zu erkennen und dem Sender zu
signalisieren, die beschädigten Daten ein weiteres Mal zu übertragen.

Dies ist das gebräuchlichere Verfahren, aber es setzt voraus, daß es
Rückkanal existiert, über den der Empfänger den Sender darüber
informieren kann, ob und wie gut die Übertragung funktioniert hat.
Wenn man sowieso schon dabei ist, mit verschiedenen Codierungen zu
hantieren, fügt man an dieser Stelle oft noch eine Kompression der
Daten für die Dauer der Übertragung mit ein. Dies ist letztendlich
auch nur ein weiteres Umkodieren von Zeichen, wenn auch mit dem Ziel,
eine möglichst kurze und nicht eine möglichst sichere oder leicht zu
verarbeitende Darstellung zu finden. Auf diese Weise kann man die
Übertragungsleistung einer Datenleitung noch beträchlich erhöhen. Je
nach Art der Daten und des verwendeten Kompressionsprogrammes ist eine
Steigerung um 200 % bis 500 % möglich.

## Aus vielen Verbindungen wird ein Netz geknüpft

Auf diese Weise kann man sich eine schnelle und fehlerfreie
Verbindung zwischen zwei Endpunkten konstruieren. Fügt man noch eine
weitere Idee hinzu, gelangt man von Punkt-zu-Punkt Verbindungen zu
echten Rechnernetzen: In einem solchen Rechnernetz sind auch indirekte
Verbindungen möglich. Es besteht also die Möglichkeit, eine Nachricht
oder ein Datenpaket über einen oder mehrere andere Rechner an einen
Zielrechner zu senden. Der erste Rechner auf dem Weg nimmt das Paket
entgegen und stellt fest, über welche seiner Punkt-zu-Punkt
Verbindungen er es zum eigentlichen Zielrechner senden kann. Die
folgenden Rechner leiten das Paket ebenfalls weiter, solange bis es
den Zielrechner endlich erreicht.

![](https://blog.koehntopp.info/uploads/1995/02/bild2.gif)

*Bild 2: Ein Router nimmt ein Paket und leitet es an einen näher am Ziel gelegenen Rechner weiter. Auf diese Weise entstehen indirekte Verbindungen.*

Um aus einem Netz von Punkt-zu-Punkt Verbindungen also ein echtes Rechnernetz zu machen, muß
man eine Route oder einen Pfad festlegen können, auf dem Informationen
übermittelt werden sollen. Dementsprechend muß man seinen Rechnern
*routing* beibringen. In einem gut ausgebauten Rechnernetz kann es
mehr als eine Route geben, auf der man von einem Rechner zu einem
anderen gelangt. Dementsprechend wird ein guter Router nicht einfach
irgendeine Route auswählen, sondern versuchen, eine möglichst schnelle
oder möglichst billige Route zum Ziel zu finden. Routingprotokolle
werden im OSI-Modell in die dritte Schicht eingeordnet, die
dementsprechend *network layer* heißt.

Wenn man routet, kann es nicht nur vorkommen, daß eine Nachricht
über mehr als eine Leitung übertragen werden muß, bis sie am Ziel ist,
sondern es müssen auch Nachrichten von verschiedenen Systemen über
eine Leitung übertragen werden. Die Leitung muß also zwischen
verschiedenen Benutzern aufgeteilt werden. Dies erreicht man durch
*Multiplexen* der Verbindung. Dabei werden die verschiedenen
Datenpakete unterschiedlicher Benutzer entweder nacheinander
übertragen (serielles Multiplexen) oder gleichzeitig, aber in
verschiedenen Frequenzbereichen, übermittelt (paralleles Multiplexen).
Außerdem kann es vorkommen, daß Routen zusammenbrechen, weil ein
Rechner auf dem Weg ausgefallen ist oder ein Kabel beschädigt worden
ist. Dadurch werden Routen ungültig und es kommt zu
Übertragungsfehlern, die korrigiert werden müssen. Dies ist die
Aufgabe der vierten OSI-Schicht, der *transport layer*.

Nach der vierten Ebene des OSI-Protokollturmes hat man ein
Verfahren definiert, daß es zwei beliebigen Programmen über ein
Rechnernetz hinweg erlaubt, einen beliebigen Bytestrom auszutauschen.
Dieser Datenstrom hat noch keine Struktur, so wie eine Datei aus der
Sicht des Betriebssystems zunächst auch nur eine strukturlose
Ansammlung von Bytes ist. In den *weiteren Schichten des OSI-Modells*
macht man sich jetzt daran, Protokolle zu definieren, um diesen
Bytestrom zu strukturieren, gemeinsame Repräsentationen von Daten
festzulegen und ähnliche Verfeinerungen zu definieren. Diese
Protokolle sind aber, genau wie Dateiformate für Dateien, abhängig von
der jeweiligen Anwendung.

## Seriell oder Parallel?

Wir wollen uns deswegen noch einmal den unteren Schichten des
OSI-Modells zuwenden. Bei der "selbstgemachten" Datenübertragung,
etwa über ein Modem oder ein Laplink-Kabel, hat man es meistens mit
den OSI-Schichten 1 und 2 zu tun. Wir wollen uns diejenigen Verfahren,
die in einem PC-Haushalt am gebräuchlichsten sind, einmal genauer
ansehen.

Für kurze Strecken von einigen Metern wird man wegen der größeren
möglichen Geschwindigkeiten meistens eine parallele Datenübertragung
wählen. Bei dieser Form der Übertragung hat man ganzes Bündel von
Datenleitungen, etwa 8 Datenleitungen zur parallelen Übertragung eines
Bytes bei der Centronics-Schnittstelle. Auf je einer Leitung wird
dabei eines der 8 Bits eines Bytes signalisiert. Leider sind
elektronische Bauteile nicht immer gleich schnell, sodaß es sein kann,
daß Bit 3 einer Leitung einen winzigen Bruchteil einer Sekunde eher
verfügbar ist, als etwa Bit 6. Deswegen sieht man noch eine neunte
Leitung vor, die als Steuerleitung (*Strobe*, "Bitte sehr")
fungiert und signalisiert, daß die Inhalte der acht Datenleitungen
gültig sind.

![](https://blog.koehntopp.info/uploads/1995/02/bild3.gif)

*Bild 3: Signal-Zeitdiagramm an einer Centronics Schnittstelle. Die Datenübertragung erfolgt asychron ohne ein Taktsignal. Die Geschwindigkeit der Übertragung regelt sich durch die Bestätigung eines jeden Zeichens selbst.*

Der Empfänger der Daten - bei einer
Centronics-Schnittstelle meistens ein Drucker - liest nach dem Empfang
des Steuersignals die Datenleitungen ab und bestätigt dies mit einem
Impuls (*Acknowledge*, "Danke schön") an den Sender, sobald er
fertig ist.

Auf diese Weise regelt sich nicht nur die
Übertragungsgeschwindigkeit zwischen den beiden Partnern ganz
automatisch, sondern man hat auch ohne Mehraufwand ein Verfahren zur
Flußkontrolle bekommen: Wenn der Drucker keine weiteren Daten annehmen
kann, weil sein Puffer voll ist oder er zur Bearbeitung eines Zeichens
längere Zeit benötigt (um etwa das Papier vorzuschieben), kann er das
Bestätigungssignal verzögern und so den Sender auf die von ihm
benötigte Geschwindigkeit herunterbremsen. Weil sich Sender und
Empfänger frei über die Übertragungsgeschwindigkeit einigen (jeder so
schnell er kann), kann man keine allgemeine
Datenübertragungsgeschwindigkeit für eine Centronics-Schnittstelle
angeben. Sie liegt jedoch je nach Drucker- und Rechnermodell in der
Größenordnung von 60 bis 150 KB pro Sekunde. Noch größere
Geschwindigkeiten erlauben die in der Regel recht trägen
Ausgangsbausteine eines PC nicht.

Parallele Datenübertragung ist relativ aufwendig: Immerhin muß für
jedes Bit, das zu Übertragen ist, eine eigene Leitung verlegt werden.
Das ist bei größeren Entfernungen zu teuer, denn man muß nicht nur
viele Kabel verlegen, sondern diese auch gegeneinander abschirmen,
damit sie sich nicht beeinflussen. Deswegen wird parallele
Datenübertragung nur dort eingesetzt, wo kurze Strecken zu überbrücken
sind: Vom Rechner zum Drucker, von der Festplatte zum Controller, von
der CPU über den Bus zur Peripherie.

Für längere Strecken verwendet man bitserielle Übertragung. Hier
wird jeweils ein Datenbyte in ein Schieberegister geladen und Bit für
Bit auf einer einzelnen Signalleitung übermittelt. Für eine minimale
Verkabelung braucht man bei einer seriellen Schnittstelle nur drei
Leitungen im Gegensatz zu mindestens elf bei einer parallelen
Schnittstelle: Eine Leitung für die Sendedaten, eine für die
Empfangedaten und eine gemeinsame Masseleitung, damit ein elektrischer
Bezugspegel existiert. Und dabei ist bei einer seriellen Schnittstelle
dann schon Kommunikation in beide Richtungen möglich, während eine
Centronics-Schnittstelle nur als Sender betrieben wird.  Doch dadurch,
daß die einzelnen Bits nacheinander über eine einzelne Leitung
übermittelt werden müssen, ist diese Art der Übertragung langsamer:
Ein PC erreicht eine Höchstgeschwindigkeit von 115200 Bit pro Sekunde,
das sind etwa 11.2 KB/Sekunde.

## V.24

![](https://blog.koehntopp.info/uploads/1995/02/bild4.gif)

*Bild 4: Belegung und Bedeutung der Anschlüsse an einer V.24 Schnittstelle.*

Die Leitungen an einer V.24 Schnittstelle, die die eigentliche
Übertragungsarbeit leisten, sind die Pins 2 (Transmit Data,
Sendedaten) und 3 (Receive Data, Empfangsdaten). Dort wird
mit den Pegeln +12V eine logische Null und -12V eine logische 1
signalisiert. Um Zeichen zu übertragen, müssen sich Sender und
Empfänger darüber einig sein, aus wievielen Bits ein Zeichen besteht,
wie schnell die einzelnen Bits signalisiert werden und an welchem Ende
eines Bytes angefangen wird, zu übertragen. Einige dieser Parameter
sind festgelegt, andere sind in gewissen Grenzen variabel. Wenn Sender
und Empfänger nicht auf genau die gleichen Übertragungsparameter
eingestellt sind, wird die Übertragung nicht gelingen.

![](https://blog.koehntopp.info/uploads/1995/02/bild5.gif)

*Bild 5: Bitfolge auf einem V.24 Kabel zur Übertragung eines 7 Bit Zeichens mit gerader Parität: Nach dem Startbit folgenden die 7 Datenbits, das niederwertigste Bit zuerst. Das Paritätsbit sorgt dafür, daß die Anzahl der Einsbits im Datenwort gerade ist. Mit dem Stopbit wird das Ende des Datenwortes signalisiert.*

Das Verfahren zur Übermittlung von Zeichen ist genau wie die
Steckerbelegung und die verwendeten Spannungen in der V.24-Norm
festgelegt. Wenn kein Zeichen zur Übertragung anliegt, soll die
Schnittstelle auf 1-Pegel liegen. Sobald dann ein Zeichen zu
übertragen ist, wird zunächst durch Übermittlung eines 0-Bits
signalisiert, daß jetzt ein Zeichen zu übertragen ist. Dieses 0-Bit
wird als Startbit bezeichnet. Danach werden die einzelnen Bits eines
Bytes übermittelt, und zwar mit dem niederwertigsten Bit zuerst. Nach
dem Byte wird eventuell noch ein Paritätsbit zur Fehlererkennung
mitgesendet und danach wird die Leitung für eine gewisse Mindestdauer
auf den Ruhepegel logisch 1 gelegt. Diese Pause stellt sicher, daß ein
nachfolgendes Startbit sicher erkannt werden kann und wird als Stopbit
bezeichnet.

Zur Übermittlung eines einzelnen Bytes sind 8 Datenbits plus ein
Startbit plus ein Stopbit zu übertragen. Bei einer Datenrate von 9600
Bit pro Sekunde werden pro Sekunde also genau 960 Byte transportiert.
Der Benutzer einer seriellen Schnittstelle kann einige Parameter der
Übertragung frei festlegen.

![](https://blog.koehntopp.info/uploads/1995/02/bild6.gif)

*Bild 6: Nicht alle Parameter einer seriellen Schnittstelle sind konfigurierbar. Einstellbar sind neben der Geschwindigkeit der Übertragung auch die Anzahl der Datenbits pro Datenwort, die Parität und die Anzahl der Stopbits. Übliche Parameterwerte sind 8-N-1 oder 7-E-1.*

Als wichtigster Parameter ist
dort die Übertragungsgeschwindigkeit in Bit pro Sekunde zu nennen. Die
Basis bildet eine Datenrate von 300 Bit pro Sekunde. Die anderen
möglichen Übertragungsgeschwindigkeiten ergeben sich dann durch
Verdoppelung: 300, 600, 1200, 2400, 4800, 9600, 19200 und 38400 Bit
pro Sekunde. Noch höhere Datenraten sind in der V.24 Norm zwar nicht
definiert, aber die meisten Programme können außerdem noch mit 57600
und 115200 Bit pro Sekunde senden.

Ein einzelnes Zeichen besteht heute normalerweise aus 8 Datenbits.
In den Anfangstagen der Datenverarbeitung kam man noch ohne Umlaute
und Sonderzeichen zurecht und nutzte damit nur einen über 7 Bit
definierten ASCII-Zeichensatz aus. Das achte Bit wurde dann nicht zur
Codierung von Daten genutzt, sondern in Form eines Paritätsbits für
eine einfache Fehlerkontrolle verwendet. Die Parität eines Zeichens
berechnet man, indem man die 1-wertigen Bits in der Binärdarstellung
seines Zeichencodes zählt. Ist die Anzahl ungerade, hat das Zeichen
ungerade Parität, ist sie gerade, hat es eine gerade Parität. Bei der
Datenübertragung kann man gerade oder ungerade Parität wählen: Stellt
man gerade Parität ein, wird bei Zeichen mit ungerader Parität das
achte Bit gesetzt, um die Anzahl der 1-Bits im Zeichen wieder auf eine
gerade Anzahl zu bringen.

Auf diese Weise kann man Übertragungsfehler leicht erkennen: Da
nur Zeichen mit gerader Parität übermittelt werden, muß ein Zeichen
mit ungerader Parität einer Störung zum Opfer gefallen sein. Leider
besteht ohne ein Protokoll zur Fehlerkorrektur keine Möglichkeit,
dieses Zeichen erneut übertragen zu lassen, sodaß man zwar die
Information hat, daß ein Fehler aufgetreten ist, aber keine Chance
hat, diesen zu korrigieren. Da Parität als Fehlerkorrektur also nur
von begrenztem Nutzen ist, verwendet man sie heute normalerweise nicht
mehr, sondern nutzt das achte Bit als normales Datenbit mit. Während
man früher als gelegentlich 7 Datenbits, gerade Parität und ein
Stopbit als Schnittstellenparameter gewählt hat, verwenden heute fast
alle Systeme 8 Datenbits, keine Parität und ein Stopbit.

Im Gegensatz zum Protokoll einer Centronics-Schnittstelle bekommt
man bei der V.24 Schnittstelle die Datenflußkontrolle nicht als
Abfallprodukt des Übertragungsprotokolls. Stattdessen müssen
ausdrückliche Vereinbarungen zwischen dem Sender und dem Empfänger
getroffen werden. Für die bereits erwähnte Dreidrahtleitung verwendet
man dazu zwei besondere ASCII-Zeichen, die Zeichen Control-S (XOFF,
ASCII 13h) und Control-Q (ASCII 11h, XON). Wenn der Empfänger keine
weiteren Daten mehr aufnehmen kann, sendet er das Zeichen XOFF an den
Sender. Der Sender muß daraufhin die Übertragung einstellen. Sobald
der Empfänger wieder bereit ist, Daten entgegenzunehmen, signalisiert
er dies dem Sender mit dem Zeichen XON.

Dieses Verfahren ist praktisch, weil es keine weiteren
Steuerleitungen notwendig macht, hat aber den Nachteil, zwei Zeichen
aus dem Zeichensatz zu "verbrauchen". Diese Zeichen werden für
Steuerfunktionen verwendet und können nicht mehr direkt übermittelt
werden. Stattdessen müssen sie durch bestimmte Zeichenfolgen anderer
Zeichen "umschrieben" werden. Eine Leitung, die nicht für alle
ASCII-Zeichen durchlässig ist, nennt man <I>nicht transparent</I>. Auf
einer nicht transparenten Leitung müssen die Zeichen, die nicht direkt
übermittelt werden können mit Hilfe eines <I>Escape-Mechanismus</I>
umschrieben werden.

Eine andere Methode der Flußkontrolle verwendet statt zweier
Zeichen zwei zusätzliche Steuerleitungen an der V.24 Schnittstelle.
Die Leitungen an den Pins 4 (Request to Send, RTS) und 5 (Clear to
Send, CTS) signalisieren für jeweils eine Übertragungsrichtung, ob
gesendet werden darf oder nicht. Solange die zu der jeweiligen
Datenleitung gehörige Steuerleitung 1-Pegel führt, darf gesendet
werden. Sobald der Pegel auf 0 wechselt, muß der Sender seine Arbeit
so lange einstellen, bis der Pegel wieder auf 1 wechselt.
Datenflußkontrolle mit RTS und CTS ist nicht nur transparent, sondern
auch schneller und sicherer als XON/XOFF-Steuerung. Gerade bei höheren
Datenraten sollte man daher dieses Verfahren vorziehen.

## Übertragungsstreß

Hohe Datenraten sind auch aus einem anderen Grund ein Problem:
Normalerweise wird die serielle Schnittstelle in einem PC von einem
Baustein vom Typ 16450 oder einem seiner Verwandten betreut. Diese
Bausteine lösen für jedes empfangene oder gesendete Zeichen eine
Unterbrechung aus. Wird die Schnittstelle also mit 38400 Bit pro
Sekunde unter Vollast betrieben, erzeugt sie um die 8000
Unterbrechungen pro Sekunde. Das bedeutet: 8000 mal pro Sekunde wird
das gerade laufende Programm unterbrochen, um ein Zeichen für den
Schnittstellenbaustein zu lesen oder ihm das nächste Zeichen zum
Senden zu nennen. Gerade bei Betriebssystemen, die den Prozessor im
erweiterten 386-Modus betreiben, können diese Unterbrechungen sehr
aufwendige Umschaltungen in der Betriebsart des Prozessors notwendig
machen. Das kostet wertvolle Rechenzeit und der Rechner wird unnötig
langsam oder verliert bei der Übertragung sogar einzelne Zeichen.
Schnittstellenbausteine vom Nachfolgetyp 16550AF haben deswegen eine
Warteschlange, die mehrere übertragene Zeichen speichern kann. Solche
Bausteine müssen im Durchschnitt nur noch alle 4 Zeichen vom Prozessor
betreut werden und sind gerade unter
Multitasking-Betriebssystemen für einen sicheren Betrieb der seriellen
Schnittstelle bei hohen Geschwindigkeiten unerlässlich. Der 16550AF ist
pinkompatibel zu seinem Vorgänger 16450 und kann, wenn dieser
gesockelt ist, auch leicht ausgetauscht werden.

## Fehlerkorrektur

Bei der Übertragung von Dateien und Programmen ist es sehr
wichtig, daß auch bei schlechten Verbindungen alle Daten unverfälscht
und fehlerfrei übermittelt werden. Schon ein einziges falsch gesetztes
Bit in einer Programmdatei kann fatale Folgen haben. Deswegen schützt
man eine Datenübertragung in der Regel mit einem
Übertragungsprotokoll. Es gibt viele dieser Protokolle, von
unterschiedlicher Datensicherheit und Effizienz, aber das Grundprinzip
ist bei allen gleich: Immer wird ein Block von Daten (z.B. 128 oder
1024 Byte am Stück) gefolgt von einer durch den Sender errechneten
Prüfsumme übermittelt. Der Empfänger liest den Datenblock und
errechnet die Prüfsumme nach demselbem Verfahren selbst. Stimmt die
errechnete Prüfsumme mit der empfangenen Prüfsumme überein, ist der
Datenblock korrekt angekommen und wird bestätigt. Andernfalls wird
eine Fehlermeldung an den Sender zurückgegeben, der daraufhin den
Datenblock noch einmal überträgt.

Das primitivste dieser Protokolle, das im PC-Bereich Anwendung
findet, ist das X-MODEM Protokoll. Es sendet relativ kleine Blöcke von
128 Zeichen und eine einfache Summe der übertragenen Bytes. Summen
sind aber relativ schlechte Indikatoren für Verfälschungen: Sie
registrieren nicht die Einfügung von Nullbytes, sind unempfindlich
gegenüber Vertauschungen von Bytes und können bestimmte Doppelfehler
(eine Erhöhung um Eins an einer Stelle und eine Verminderung um Eins
an anderer Stelle) nicht erkennen. CRC-Prüfziffern (*cyclic
redundancy check*) erkennen alle diese und viele andere
Veränderungen an Daten und werden deswegen in der Computertechnik
immer dann eingesetzt, wenn die Integrität eines Datenblockes
gesichert werden muß.

*XMODEM* ist auch aus anderen Gründen ein relativ schlechtes
Protokoll: Es überträgt keine Informationen über die Datei. Weder der
Dateiname noch die Länge, das Datum oder eventuell vorhandene
Dateieigentümer oder Zugriffsrechte werden übermittelt. Außerdem
wartet XMODEM nach jedem gesendeten Block erst auf die Bestätigung der
Gegenseite, bevor der nächste Datenblock verschickt wird. Ein
Datenpaket muß gewissermaßen erst seine Rundreise auf einer Leitung
beendet haben, bevor das nächste Datenpaket verschickt werden kann.
Man kann sich eine Datenleitung vorstellen, wie einen Gartenschlauch:
Nachdem man das Ventil aufgedreht hat, muß der Schlauch erst
vollaufen, bevor am Ende des Schlauches Wasser austritt. XMODEM
versendet die Daten jetzt nicht als Strom, sondern schickt sie
gewissermaßen schluckweise durch die Leitung. Auf diese Weise wird
möglicherweise ein Großteil der Übertragungskapazität der Leitung
verschenkt.

ZMODEM hat diese Probleme nicht: Nicht nur, daß es Dateinamen,
Länge und andere Informationen mit überträgt. Es ist auch in der Lage,
weitere Datenblöcke zu versenden, bevor die Bestätigungen für
vorhergehende Pakete eingegangen sind.

![](https://blog.koehntopp.info/uploads/1995/02/bild7.gif)

*Bild 7: Der Sender kann dem Empfänger vorauseilen. Er sendet Daten,
deren Empfang der Empfänger noch nicht bestätigt hat. Das bedeutet, für
solche unbestätigten Daten muß der Sender damit rechnen, daß sie nicht
ordnungsgemäß beim Empfänger angekommen sind und noch einmal gesendet werden
müssen. Daten, die bereits als fehlerfrei bestätigt sind, kann der Sender
als erledigt betrachten.*

*Die Frage ist: Wie groß darf soll der Sender das Transferfenster werden
lassen? Läßt er es zu klein, kann es sein, daß er auf die Bestätigungen des
Empfängers warten muß, bevor er weiter senden darf. Läßt der Sender das
Transferfenster zu groß werden, muß er sehr viel Speicher für Puffer
bereitstellen.*

In diesem Fall
entsteht ein Bereich von Datenpaketen, die der Sender zwar schon
abgeschickt hat, für die er aber noch keine positiven
Empfangsbestätigungen gesehen hat. Diese Lücke nennt man das
*Transferfenster* eines Übertragungsprotokolls. Ein gutes
Übertragungsprotokoll wird das Transferfenster gerade so groß halten,
wie die Kapazität der Leitung es erfordert. Bei einem Wasserschlauch
würde man die Kapazität in Litern als Querschnitt mal Länge berechnen.
Bei einer Datenleitung entspricht der Querschnitt der Datenrate in Bit
pro Sekunde und die Länge der Umlaufzeit der Datenpakete in Sekunden.
Das Resultat gibt die Anzahl der Bits an, die auf der Leitung
unterwegs sind und stellt eine minimale Größe für das Transferfenster
dar, wenn der Sender nicht auf den Empfänger warten soll.

## Modulation

Während bei der Datenübertragung über ein einfaches Kabel keine
besondere Codierung der Daten notwendig war, ist dies bei der
Datenfernübertragung nicht mehr möglich. Eine Telefonleitung ist kein
durchgehendes Kabel, sondern vielfach durch Filter, Verstärker und
andere elektrische Dinge unterbrochen. Sie ist für Gleichspannungen
nicht durchlässig, sondern kann nur Wechselspannungen, elektrisch
codierte Töne nämlich, übertragen. Bevor man Daten also über eine
Telefonleitung übertragen kann, muß man sie in hörbare Töne umwandeln.
Diese Umwandlung wird von einem *Modem* vorgenommen. Der Name ist
ein Kunstwort aus den Begriffen Modulator und Demodulator und
beschreibt in etwa die Funktionsweise des Gerätes: Ein gleichmäßiger
Ton, der Datenträgerton, wird abhängig von den zu übertragenden Daten
verändert.

Im einfachsten Fall ordnet man dabei einem Eins-Bit einen Ton und
einem Null-Bit einen anderen Ton zu. Auf diese Weise beeinflußt man
jedoch nur einen einzigen Parameter einer Schwingung, nämlich die
Tonhöhe, die Frequenz.  Außerdem überträgt man so nur ein Bit zur
Zeit.

![](https://blog.koehntopp.info/uploads/1995/02/bild8.gif)

*Bild 8: Das Diagramm zeigt Phasenwinkel und Amplitudenwerte eines
Signals. Der Sender steuert zur Signalisierung eines von 16 Zuständen Phase
und Amplitude seines Signals so, daß er einen der markierten Punkte trifft.
Auf diese Weise können in einem Zustand 4 Bit signalisiert werden.*

*Durch Störungen der Übertragung kommt beim Empfänger nicht genau das Signal
an, das der Sender auf das Kabel schickt. Stattdessen wird der angesteuerte
Punkt nur in der Nähe der markierten Punkte liegen und zwar um so weiter
von den Punkten entfernt, je stärker das Signal gestört wird. Auf schlechten
Leitungen verschwimmen die Punkte also stärker als auf guten Leitungen. Wenn
die Störungen so groß werden, daß die Punkte ineinander verschwimmen, ist
die Leitungsqualität so schlecht, daß keine Datenübertragung mehr möglich
ist.*

Wenn man gleichzeitig mehrere Parameter einer Schwingung
verändert, kann hat man mehr als zwei verschiedene Zustände und kann
so mehrere Bits zur Zeit übertragen. Das Bild zeigt ein Verfahren, bei
dem Phase und Amplitude eines Signales jeweils einen von vier
Zuständen annehmen können. Auf diese Weise ist es möglich, sechzehn
verschiedene Zustände zu codieren und vier Bit parallel zu
übermitteln. Die Geschwindigkeit, mit der ein Modem von einem
Signalzustand zum nächsten wechselt, nennt man die Baudrate. Eine
Geschwindigkeit von einem Baud entspricht einem Zustandswechsel pro
Sekunde. Die Bitrate eines Modems ist gewöhnlich ein Vielfaches seiner
Baudrate.

```
Bezeichnung Geschwindigkeit
            in Bit/s  in Baud	Modulation  duplex  Verwendung
V.17	    14400	2400	TCM	    halb	FAX
	    12000
            9600
            7200	2400 	TCM	    halb	FAX
	    4800	2400	QAM	    halb	FAX
V.21	    300		300	FSK	    voll
V.22	    1200	600	DPSK	    voll
V.22bis	    2400	600	QAM	    voll
V.23	    1200/75	1200/75	FSK	    asymm.	BTX
V.27ter	    4800	1600	DPSK	    halb	FAX
	    2400	1200	DPSK	    halb	FAX
V.29	    9600	2400	QAM	    halb	FAX
	    7200	2400	QAM	    halb	FAX
V.32	    9600	2400	TCM/QAM	    voll
	    4800	2400	QAM	    voll
V.32bis	    14400 	2400	TCM	    voll
	    12000
	    9600
	    7200	2400	TCM	    voll
	    4800	2400	QAM	    voll

Abkürzungen:
FSK	Frequency Shift Keying
DPSK	Differential Phase Shift Keying
QAM	Quadrature Amplitude Modulation
TCM	Trellis Coded Modulation
```

*Bild 9: CCITT-Normen, Datenraten, Baudraten und Modulationsverfahren von Modems im Überblick.*

Es gibt verschiedene CCITT-Normen, die unterschiedlich schneller
Übertragungsverfahren für Modems normen. Während die
meisten Modem-Normen gleichzeitiges Senden und Empfangen von Daten
vorsehen, sehen die CCITT-Normen für FAX-Geräte keine Datenübertragung
im zwei Richtungen vor. Grundsätzlich unterscheidet man drei Fälle:

- Ist die Übertragung *simplex*, wird die Datenrichtung der Übertragung niemals umgeschaltet:
 Der Sender hat nur einen Modulator, der Empfänger nur einen Demodulator.
- Bei einer Übertragung in *halbduplex* sendet immer nur einer der beteiligten Partner.
 Wenn er "ausgeredet" hat, wechselt die Übertragungsrichtung und der jeweils andere Partner kommt an die Reihe.
 FAX-Geräte übertragen ihre Informationen auf diese Weise.
- Die meisten Modemnormen sehen eine *vollduplex*-Übertragung vor.
 Hier können beide Partner gleichzeitig senden und empfangen.
 Damit sich die Signale der beiden Modems leicht getrennt werden, sendet der angerufene Partner bei den Normen V.21, V.22 und V.23 auf einer anderen Frequenz als der Anrufer (*answer mode/originate  mode*).
 Die unterschiedlichen Signale der beiden Modems lassen sich mit einem einfachen Filter voneinander trennen.

Die Normen V.32 und höher sehen vor, daß Anrufer und Angerufener
beide auf denselben Frequenzen senden, sich also quasi "anschreien".
Auf der Leitung vermischen sich beide Signale zu einem nicht
entzifferbaren Datensignal. Da jedoch jedes der beiden Modems weiß,
welche Töne es gesendet hat, kann es diese Daten von den empfangenen
Signalen abziehen und erhält als Differenzsignal die Informationen der
Gegenseite. Dieses als *echo cancellation*  bezeichnete Verfahren
setzt jedoch einen aufwendigen Signalprozessor voraus, der die
entsprechenden Berechnungen auf dem Eingangssignal vornimmt. Da die
entsprechenden Prozessoren lange Zeit sehr teuer waren, waren die
entsprechenden Modems gut doppelt so teuer wie ihre kleineren Brüder
ohne Signalprozessor. Heute existieren für V.32 und V.32bis fertige
Chipsätze mit integrierten Faxoptionen, die in großen Stückzahlen
produziert werden. Entsprechend gibt es Modems für diese
Übertragungsnormen zu relativ günstigen Preisen, obwohl das
Modulationsverfahren sehr aufwendig und rechenintensiv ist.

Für das neue V.34-Verfahren sind solche Chipsätze noch nicht
verfügbar, sodaß diese Modems zur Zeit noch unverhältnismäßig teuer
sind.

```
Norm	Zweck
V.24	Bedeutung der Signale an einer seriellen
	Schnittstelle.
V.28	Elektrische Pegel an einer solchen Schnittstelle.
	(V.24, V.28 und ISO 2110 sind zusammen äquivlaent
	zu EIA RS232.)
V.42	Verfahren zur Sicherung der übertragenen Daten. Im
	wesentlichen nicht von dem unterliegenden
	Modulationsverfahren abhängig. Verwendet ein eigenes
	Protokoll namens LAPM, zwecks Kompatibilität ist ein
	Rückfall auf MNP 2-4 möglich.
V.42bis	Verfahren zur transparenten Kompression von Daten
	während der Übertragung, manchmal auch BTLZ genannt.
	Effizienter als, aber inkompatibel zu MNP5.
	Alle existierenden V.42bis-Modems beherrschen MNP5
	zusätzlich.
```

*Bild 10: Weitere häufig verwendete CCITT-Normen im Zusammenhang mit Modems.*
