#!/bin/sh
set -e

if [ -z "$APP_KEY" ]; then
    echo "APP_KEY is not set. Generate one with 'php artisan key:generate --show' and put it in deploy/.env." >&2
    exit 1
fi

echo "Waiting for the database at ${DB_HOST}:${DB_PORT}..."
until php -r "new PDO('mysql:host=${DB_HOST};port=${DB_PORT}', '${DB_USERNAME}', '${DB_PASSWORD}');" 2>/dev/null; do
    sleep 1
done

php artisan config:cache
php artisan route:cache
php artisan storage:link || true
php artisan migrate --force
php artisan db:seed --force
exec "$@"
