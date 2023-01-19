FROM php:8.1-fpm as test_php

RUN apt-get update && apt-get install -y \
    curl \
    wget \
    git \
    libonig-dev \
    libmcrypt-dev \
    libzip-dev \
    zip

RUN docker-php-ext-install -j$(nproc) mbstring pdo pdo_mysql exif bcmath zip

WORKDIR /var/www/test_case

COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer
ENV COMPOSER_ALLOW_SUPERUSER=1

FROM nginx AS nginx

ADD docker/nginx/test_case.conf /etc/nginx/conf.d/default.conf

WORKDIR /var/www/test_case