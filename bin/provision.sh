#!/usr/bin/env bash
set -e
PROJECT_DIR=$1

DB_NAME=radphp_db
DB_USER=radphp_user
DB_PASS=rad123

echo "DROP DATABASE IF EXISTS $DB_NAME;" | sudo -u postgres psql
echo "DROP ROLE IF EXISTS $DB_USER;" | sudo -u postgres psql
echo "CREATE USER $DB_USER WITH PASSWORD '$DB_PASS';" | sudo -u postgres psql
echo "CREATE DATABASE $DB_NAME;" | sudo -u postgres psql
echo "GRANT ALL PRIVILEGES ON DATABASE $DB_NAME to $DB_USER;" | sudo -u postgres psql

${PROJECT_DIR}/bin/console.php cake_orm:build
${PROJECT_DIR}/bin/console.php migrations:migrate
${PROJECT_DIR}/bin/console.php migrations:migrate -b Pages
