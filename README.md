# DV1440 project: Blog site in Lumen

This project is created to complete my grade for the course DV1440 at BTH.

## Run locally
Build docker container `$ docker build -t blog-project . --load`

Run the project `$ docker-compose up -d`

Run composer `docker run --rm --interactive --tty --volume $PWD:/app --user $(id -u):$(id -g) composer:latest <command>`

Run artisan `docker run --rm --interactive --tty --volume $PWD:/app -w /app --user $(id -u):$(id -g) php:8.1.10-cli php artisan <command>` (Running migrations and that kind of stuff needs to be run from inside a running app-container)

Run node/yarn `docker run --rm --interactive --tty --volume $PWD:/app -w /app --user $(id -u):$(id -g) node:current-alpine3.15 <command>`

## Run tests and linting
Run unit tests `$ composer run unit-tests`

## Functionality
* *Create account*:
* *Login*:
* *Profile setup*:

## Report


#### Facades
I really do not like using the facades system that laravel has implemented. The fact that they have to be building their own extensions to the testing framework to enable mocking is enough to raise some red flags for me. It also makes me a little crazy that I would either need to have quite intimate knowledge of the framework, or some additional tools in my IDE in order to come in cold and start to explore a project that uses laravel. It just doesn't feel right anymore.

The first time I used laravel, I kind of accepted the premise because php was not really mature enough as an OO language to facilitate a smooth option to using a system like facades. It just made working with laravel that much easier in the beginning. But I would have hoped that the framework was going to go in a different direction as php got more support for typing and stuff like that. But BOY that does not seem to have been the case. Rather they seem to have doubled down on the concept.

~~Therefore I am going to be avoiding facades like covid-19.~~ Realizing just how messy it is going to be to make my laravel install as facade-free as I would like. I will instead ot to be lazy and go with the flow. This will probably be the last project that I elect to build with laravel as the base.

Here is an article series that I liked, on the subject of [Laravel without facades](https://medium.com/@frano.sasvari/laravel-without-facades-part-0-intro-190bae09aebe). This is also what prompted me to realize that it was not worth my time for this project, to try and go facade-cold-turkey.

#### Frontend framework
I decided to go for the good old bootstrap framework for my frontend. Mostly because it is just wildly convenient and simple to use, and since that is not an important part of this project I even went so far as to only use the CDN version. Which is even simpler, however that is not a super great plan for a production setup, for reliability and perhaps load times.

I should note that most of the deps I have chosen to add will be loaded through CDNs. I just want to note that, and say that if I was doing this for production, I would go another way.

## Additional notes
This project is based on the Laravel framework and as such is subject to the MIT license.
