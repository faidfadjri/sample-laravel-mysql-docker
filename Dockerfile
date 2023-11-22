# Use the official PHP image with Alpine Linux
FROM php:8.1.25-fpm-alpine3.17

# Set the working directory
WORKDIR /var/www/app

# Update package repositories
RUN apk update

# Install dependencies
# RUN apk --no-cache add \
#     curl \
#     libpng-dev \
#     libxml2-dev \
#     zip \
#     unzip \
#     nodejs \
#     npm \
#     && docker-php-ext-install pdo pdo_mysql

# Copy Composer binary from the official Composer image
COPY --from=composer:2.6.5 /usr/bin/composer /usr/local/bin/composer
RUN composer install

# Cleanup
# RUN apk del libpng-dev libxml2-dev zip unzip nodejs npm && \
#     rm -rf /var/cache/apk/*

# Set the default command to run php-fpm
CMD ["php-fpm"]
