FROM php:7.3-fpm

RUN curl -sS https://getcomposer.org/installer | php -- \
  --install-dir=/usr/bin/ --filename=composer

RUN apt-get update && \
    apt-get upgrade -y && \
    apt-get install -y git && \
    apt-get install -y wget git unzip && \
    pecl install xdebug-2.7.1 && \
    docker-php-ext-enable xdebug

COPY xdebug.ini /etc/php/7.3/mods-available/xdebug.ini

WORKDIR /code
