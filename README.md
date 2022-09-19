# DV1440 project: Blog site in Lumen

This project is created to complete my grade for the course DV1440 at BTH.

## Run locally
Build docker container `$ docker build -t blog-project . --load`

Run the image `$ docker run --name blog-project-site -d -p 8080:80 -v $PWD:/usr/share/nginx/blog-project blog-project`

Run composer `docker run --rm --interactive --tty --volume $PWD:/app --user $(id -u):$(id -g) composer:latest <command>`

Run artisan `docker run --rm --interactive --tty --volume $PWD:/app -w /app --user $(id -u):$(id -g) php:8.1.10-cli php artisan <command>`

Run node/yarn `docker run --rm --interactive --tty --volume $PWD:/app -w /app --user $(id -u):$(id -g) node:current-alpine3.15 <command>`

## Run tests and linting
Run unit tests `$ composer run unit-tests`

## Functionality
* *Create account*:
* *Login*:
* *Profile setup*:

## Report


#### Facades
I really do not like using the facades system that laravel has implemented. The fact that they have to be building their own extensions to the testing framework to enable mocking is enough to raise some red flags for me.

Therefore I am going to be avoiding facades like covid-19.

#### Frontend framework
I decided to go for the good old bootstrap framework for my frontend. Mostly because it is just wildly convenient and simple to use, and since that is not an important part of this project I even went so far as to only use the CDN version. Which is even simpler, however that is not a super great plan for a production setup, for reliability and perhaps load times.

## Additional notes
This project is based on the Laravel framework and as such is subject to the MIT license.
