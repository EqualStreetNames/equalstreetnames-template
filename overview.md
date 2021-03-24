# Equalstreetnames as Seen from Outer Space

This is a very high level overview of this project for people considering to build those beautiful maps for their own city.

Openknowledge Belgium provides the coding (see [the central repo README.md](https://github.com/EqualStreetNames/equalstreetnames/blob/master/README.md)). Activists in their cities only have to add some configuration, and quite some data.

Then some magic happens (php scripts), and the gender data gets combined with the geodata from openstreetmap. And more magic happens (parcel node js), and everything will be presented in a beautiful map.

for the php scripts magic and how data is moved around, see [architecture.ascii](./architecture.ascii)

### How to configure 

See [README.md of the template project](./README.md).

### Get things to run on your machine

You will want to see your map while you are creating it, and this project makes this very easy, see (the Run locally paragraph of the [central project README.md](https://github.com/EqualStreetNames/equalstreetnames/blob/master/README.md#run-locally)

### How to add data 
1. Find your city's source of truth for street naming. 
       1. If it is a person that has a Wikipedia article, add the Wikidata ID to the openstreetname as tag name:etymology:wikidata .
       1. If there's nothing in Wikipedia (or Wikidata), add the gender information to your config.php
       1. If it is not a person, it is up to you if you want to tag it in one in the same way.

This will be a lot of work, for big cities it might take months. On the plus side, you will learn a lot about your city's streetnames.

It will be more fun working in teams. Some local communities that might be interested: openknowledge, gender equality groups or wikidata.   

