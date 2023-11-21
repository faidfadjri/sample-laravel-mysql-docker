FROM php:8.2-fpm-alpine

WORKDIR /var/www/app

RUN apk update && apk add \
    curl \
    libpng-dev \
    libxml2-dev \
    zip \
    unzip

RUN docker-php-ext-install pdo pdo_mysql \
    && apk --no-cache add nodejs npm

COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

# Change ownership and permissions for the application
RUN adduser -D -u 1000 -G www-data www-data \
    && chown -R www-data:www-data /var/www/app \
    && chmod -R 777 /var/www/app/storage

USER www-data

CMD ["php-fpm"]
