WunderMobility Task

I decided to use the MVC pattern with the CodeIgniter framework. Maybe for this particular task it is redundant in a sense, but still I prefer to work with it. For me, the code is more readable and more easily reusable as the data and business logic are separated from the display. The development process is much faster.

As for optimizations, I can use Ajax to send the data and not reload the page after every step and just show the person the next step of the form. A good additional feature would be the form to be able to return to previous steps.

I could have created a class for the api which to handle the post request, that would have been more cleaner.


To Run the project

Navigate to docker folder, where docker-compose.yml is located.

Run docker-compose build

Then run 
docker-compose up -d

Access on localhost:80