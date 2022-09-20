#!/bin/sh

set -e

PG_USER="postgres"
PG_PASS="NotVerySecure123"
DB_NAME="blog"

mkdir /run/postgresql && chown postgres:postgres /run/postgresql
su postgres -c "mkdir /var/lib/postgresql/data && chmod 0700 /var/lib/postgresql/data"
su postgres -c "initdb /var/lib/postgresql/data"
su postgres -c "echo \"host all  all    0.0.0.0/0  md5\" >> /var/lib/postgresql/data/pg_hba.conf "
su postgres -c "pg_ctl start -D /var/lib/postgresql/data"

su postgres -c "psql -U postgres -tc \"SELECT 1 FROM pg_database WHERE datname = '$DB_NAME'\" | grep -q 1 || psql -U postgres -c \"CREATE DATABASE $DB_NAME\""
su postgres -c "psql -c \"ALTER USER $PG_USER WITH ENCRYPTED PASSWORD '$PG_PASS';\""
