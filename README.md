# DV1440 project: Blog site in Lumen

This project is created to complete my grade for the course DV1440 at BTH.

## Run locally
Build docker container `$ docker build -t blog-project . --load`

Run the image `$ docker run --name blog-project-site -d -p 8080:80 -v $PWD:/usr/share/nginx/blog-project blog-project`

Run composer `docker run --rm --interactive --tty --volume $PWD:/app --user $(id -u):$(id -g) composer:latest <command>`

Run artisan `docker run --rm --interactive --tty --volume $PWD:/app -w /app --user $(id -u):$(id -g) php:8.1.10-cli php artisan <command>`

## Run tests and linting
Run unit tests `$ composer run unit-tests`

## Functionality
* *Create account*:
* *Login*:
* *Profile setup*:

## Additional notes
This project is based on the Laravel framework and as such is subject to the MIT license.
