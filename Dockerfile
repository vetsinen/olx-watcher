FROM php:8.1-apache

COPY src/ /var/www/html/
RUN docker-php-ext-install mysqli pdo_mysql