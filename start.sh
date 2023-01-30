#!/usr/bin/env sh

set -eu

PORT_TO_USE="8080"
PROJECT_NAME="blog-project"

info () {
  color='\033[1;34m'
  nc='\033[0m' # No Color
  printf "${color}$1${nc}\n"
}

main () {
    info "Hello there, let's get you blogging."

    # Copy .env file
    if [ ! -f ".env" ]; then
        info "Copying the example .env.local config file to .env"
        cp .env.local .env
    fi

    # Build the image
    info "Building the docker file to the image name $PROJECT_NAME"
    docker build -t "$PROJECT_NAME" ./

    # Build the assets
    info "Building the assets using node:current-alpine3.16 and the built in vite"
    docker run --rm -it --volume $PWD:/app -w /app --user "$(id -u)":"$(id -g)" node:current-alpine3.16 sh -c "yarn install && yarn run build"

    # Composer install
    info "Install using composer:latest along with the predefined post-install hooks"
    docker run --rm -it --volume $PWD:/app --user "$(id -u)":"$(id -g)" composer:latest install

    # Start containers
    info "Deploying the project using docker-compose"
    PORT_TO_USE="$PORT_TO_USE" docker-compose up -d

    # Migrating and seeding
    info "Migrating and seeding the database"
    docker exec -t blog-project-site_1 php artisan migrate --seed

    # Print final info
    info "The site can now be accessed at http://localhost:$PORT_TO_USE"
}

main "$@"
