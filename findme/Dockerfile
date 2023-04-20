FROM php:8.2.4-apache

COPY ./app /var/www/html/app
COPY ./public_html /var/www/html/public_html

RUN chown www-data:www-data /var/www/html/app -R
RUN chown www-data:www-data /var/www/html/public_html -R

COPY ./apache_config/000-default.conf /etc/apache2/sites-available/000-default.conf
COPY ./apache_config/apache2.conf /etc/apache2/conf-available/docker-apache2.conf
RUN a2enmod rewrite && a2enmod headers && a2enconf docker-apache2