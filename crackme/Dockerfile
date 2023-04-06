FROM php:8.2.4-apache

RUN apt-get update \
    && apt-get install -y \
    net-tools \
    ncat \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

# RUN mkdir /app
# COPY ./flag.txt /app/flag.txt
# COPY ./start_nc.sh /app/start_nc.sh

COPY ./flag.txt /var/www/html/flag.txt
COPY ./start_nc.sh /var/www/html/start_nc.sh
RUN chmod +x /var/www/html/start_nc.sh

COPY ./apache_config/000-default.conf /etc/apache2/sites-available/000-default.conf
COPY ./apache_config/apache2.conf /etc/apache2/conf-available/docker-apache2.conf
RUN a2enmod rewrite && a2enmod headers && a2enconf docker-apache2

WORKDIR /var/www/html