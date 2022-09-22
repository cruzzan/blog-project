FROM nginx:1.22.0-alpine

RUN apk add --update --no-cache\
    php81-cli php81-fpm php81-mbstring php81-session php81-openssl php81-tokenizer php81-pdo php81-pdo_pgsql php81-pgsql php81-dom\
    postgresql

COPY docker/php/entrypoint.sh /docker-entrypoint.d/php-entrypoint.sh
COPY docker/postgres/entrypoint.sh /docker-entrypoint.d/postgres-entrypoint.sh
COPY docker/nginx/site.conf /etc/nginx/conf.d/default.conf

STOPSIGNAL SIGQUIT
