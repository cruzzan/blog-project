FROM nginx:1.22.0-alpine

RUN apk add --no-cache php8-fpm php-mbstring
