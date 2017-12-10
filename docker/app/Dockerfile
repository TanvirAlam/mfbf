FROM php:7.1-fpm

RUN pecl install xdebug
RUN docker-php-ext-enable xdebug

RUN apt-get update && apt-get install -y zlib1g-dev libmcrypt-dev \
    mysql-client --no-install-recommends \
    && docker-php-ext-install mcrypt pdo_mysql \
    && docker-php-ext-install zip


RUN apt-get update && apt-get install -y libmcrypt-dev mysql-client git zip \
    && curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer


RUN usermod -u 1000 www-data

WORKDIR /var/www

CMD ["php-fpm"]

EXPOSE 9000
