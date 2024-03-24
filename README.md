# WE DO THAT - HooHacks-2024
Project for HooHacks 2024


## Inspiration
For many years now, we feel like there has been a drift away from community and lasting relationships. We think things like Social Media, COVID-19, and political polarization have only furthered the divide between people.  Even our recent graduate friends are experiencing how hard it is to build friendships outside of the workplace.  This web application solves this issue. 

## What it does
It allows people to attend and host events in their local communities. With the hopes that such events will create spaces for people to bond, feel a sense of community, and foster their support system.

## How we built it
We used a HTML5/CSS static template, that we modified to become a dynamic web application. We used MySQL to create a database that would support the website and used PHP to interact with the data that we gathered. We wanted to create a cohesive and holistic user experience so we focused on multiple aspects of the web application.

We furthermore understood the importance of UX, so we focused a lot on the interface and the aesthetics of the application.

## Challenges we ran into
Coding comes not without its challenges: spending hours and hours working to solve dependencies that were one line away; reaching out to mentors to share in the struggles of debugging from 4 PM to 12 AM hopes seemed almost at a loss. When my partner and I teamed up with a wonderful mentor Aidan - and cracked the solution. Electricity filled the air. Hugs and celebrations were had.  A moment to remember. That is what coding is about. 

Other problems: Integration of API and web application, using a database, learning PHP, and constructing a dynamic website, troubles with servers.

## Accomplishments that we're proud of
One of the accomplishments that we are the most proud of is having an almost fully functional website that accomplishes everything we set out to do in the first hour of the Hackathon. Of course, there are many more features we would've liked to include but the foundation was set. 

We are proud of stepping out of our comfort zones and picking up tools that we have never used before and through many failures finding success.  

## What we learned
This was one of the first projects we tried to do with an iterative development approach.  We saw a lot of benefits of this.

We learned many new tools, like MySQL, PHP, HTML, and XAMPP. We also learned how to work with servers and databases, as well as how to process data that the user puts in.  We learned new terminal commands and learned from each other's workflows. 

We also honed our skills of debugging especially in little places like dependencies and learning how to check logs of external applications. 

## What's next for We Do That
Firstly, there are two main features we would like to implement. One is the LLM suggestions for possible events and suggestions. The second one is expanding on the profile of the user and implementing proper authorization to ensure the safety of the users. 

With these two out of the way, there are many more ideas we would like to pursue with this project:
- Implementing search by location and an option to choose the radius of the search.
- Implementing nearby events from 'traditional' venues as suggestions. 
- Implementing more filters and more choices when creating events, like focusing on certain hobbies or volunteered-focused events, etc.
- Working on the UX.
- Launching the website / working on an app implementation. 

Set UP:
- For setting up of XAMPP follow this tutorial https://www.freecodecamp.org/news/how-to-get-started-with-php/#:~:text=Click%20on%20the%20%E2%80%9Cenvironment%20variables,ok%20for%20all%20of%20them
- Set up MySQL databases like this:
```sql
CREATE DATABASE IF NOT EXISTS your_database_name;
CREATE TABLE IF NOT EXISTS events (
    id INT AUTO_INCREMENT PRIMARY KEY,
    event_name VARCHAR(255) NOT NULL,
    location VARCHAR(255) NOT NULL,
    event_date DATE NOT NULL,
    category VARCHAR(255) NOT NULL,
    num_people INT NOT NULL,
    image_url VARCHAR(255) NOT NULL
);
```
  
Sources:

- https://www.free-css.com/free-css-templates/page295/makaan
- https://unsplash.com/photos/a-group-of-people-holding-hands-on-top-of-a-tree-DNkoNXQti3c
- https://pixabay.com/photos/friendship-fun-backlighting-2366955/
- https://www.pinterest.com/pin/94575660918862542/
