FROM php:7.4-fpm

RUN apt-get update --fix-missing && \
    apt-get install -y \
    nano vim procps git iproute2 wget unzip\
    libzip-dev && rm -r /var/lib/apt/lists/*

    # установка модулей
RUN pecl install xdebug-2.8.1 \
    && docker-php-ext-enable xdebug \
    && docker-php-ext-install zip \
    && pecl install dbase

# Composer
COPY --from=composer:1.10.19 /usr/bin/composer /usr/bin/composer

# Additional ini settings
COPY ./php/php-additional.ini /usr/local/etc/php/conf.d/php-additional.ini

# В соответствие с dev/боем
RUN sed -i 's|DEFAULT@SECLEVEL=2|DEFAULT@SECLEVEL=1|g' /etc/ssl/openssl.cnf

WORKDIR /var/www/html/fias

