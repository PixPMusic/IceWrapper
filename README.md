#IceWrapper

##This is a nice little PHP script I made by mashing a bunch of StackOverflow and PHP docs together...

...just like any other good coder!

##That's all fine and dandy, but what is it for?

Well, I'm glad you asked

###I'm working on an app for [91.8 The Fan](http://98thefan.com/) and their version of *BOTH* Icecast2 and Shoutcast DNAS.

####Neither server had a nice API.

#####Shoutcast had no icy-metadata for the song, and Icecast wouldn't give me the stream in PHP, and I couldn't get Streamscraper to work on Android

###Solution? I could parse the HTML on the mobile end, but what fun is that? I MADE SOME JSON!!!

####Basically, change the URL variable to point at your Icecast 2 (2.3.2) homepage, and put the file somewhere on your webserver

####You end up with a nice two-key array, title (index 0), and artist (index 1).

####They're echoed on page load. Have fun.