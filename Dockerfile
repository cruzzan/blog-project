FROM nginx:1.22.0-alpine

RUN apk add --update --no-cache php8-fpm php-mbstring

COPY docker/php/entrypoint.sh /docker-entrypoint.d/php-entrypoint.sh
COPY docker/nginx/site.conf /etc/nginx/conf.d/default.conf
COPY public/test.php /usr/share/nginx/blog-project/index.php

STOPSIGNAL SIGQUIT
