# --- Stage 1: install PHP dependencies ---
FROM composer:2 AS vendor

WORKDIR /app

COPY composer.json composer.lock ./
RUN composer install \
    --no-dev \
    --no-interaction \
    --no-scripts \
    --no-progress \
    --optimize-autoloader

COPY . .
RUN composer dump-autoload --optimize --no-dev

# --- Stage 2: runtime image (nginx + php-fpm) ---
FROM php:8.4-fpm-alpine

RUN apk add --no-cache nginx supervisor icu-libs \
    && apk add --no-cache --virtual .build-deps oniguruma-dev libxml2-dev icu-dev $PHPIZE_DEPS \
    && docker-php-ext-install pdo_mysql mbstring bcmath xml intl opcache \
    && apk del .build-deps

COPY --from=vendor /app /var/www/html

WORKDIR /var/www/html

RUN mkdir -p storage/framework/{cache,sessions,testing,views} storage/logs bootstrap/cache \
    && chown -R www-data:www-data storage bootstrap/cache

COPY docker/nginx.conf /etc/nginx/http.d/default.conf
COPY docker/supervisord.conf /etc/supervisor/conf.d/supervisord.conf
COPY docker/entrypoint.sh /entrypoint.sh
RUN chmod +x /entrypoint.sh

EXPOSE 80

ENTRYPOINT ["/entrypoint.sh"]
CMD ["supervisord", "-c", "/etc/supervisor/conf.d/supervisord.conf"]
