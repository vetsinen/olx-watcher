FROM php:8.1-apache

WORKDIR /var/www/html
COPY www/ /var/www/html/
RUN docker-php-ext-install mysqli pdo_mysql