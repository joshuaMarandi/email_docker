# filepath: c:\Users\HP\Downloads\emailInput_docker\Dockerfile
FROM php:8.0-apache

# Install mysqli extension
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli