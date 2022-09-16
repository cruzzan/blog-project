FROM nginx:1.22.0-alpine

RUN apk add --update --no-cache php81-fpm php81-mbstring

COPY docker/php/entrypoint.sh /docker-entrypoint.d/php-entrypoint.sh
COPY docker/nginx/site.conf /etc/nginx/conf.d/default.conf

STOPSIGNAL SIGQUIT
