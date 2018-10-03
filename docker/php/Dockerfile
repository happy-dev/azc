FROM php:7.1-fpm

USER root

RUN grep -q -E "^php:" /etc/group || $(groupadd --gid 1000 php \
  && useradd --uid 1000 --gid php --shell /bin/bash --create-home php)

COPY config.ini /usr/local/etc/php/conf.d/

RUN apt-get update -y && \
    apt-get install -y openssl zip unzip git zlib1g-dev libjpeg-dev libpng-dev libmcrypt-dev libicu-dev libfreetype6-dev
RUN docker-php-ext-configure gd --with-freetype-dir=/usr/lib64/ --with-jpeg-dir=/usr/lib64/
RUN docker-php-ext-install pdo pdo_mysql zip gd mcrypt intl exif mysqli

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

USER php
RUN composer global require hirak/prestissimo

