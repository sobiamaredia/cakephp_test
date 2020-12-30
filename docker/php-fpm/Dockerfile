FROM php:7.4-fpm-buster

# Install selected extensions and other stuff
RUN apt-get update && apt-get install -y --no-install-recommends \
        git \
        zlib1g-dev \
        libxml2-dev \
        libzip-dev \
    && docker-php-ext-install \
           zip \
           intl \
           mysqli \
           pdo pdo_mysql


WORKDIR "/var/www/myapp"
