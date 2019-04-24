FROM php:7.0-apache

#RUN apk update; \
 #   apk upgrade;


RUN apt-get update && \
    apt-get install -y libmemcached-dev zlib1g-dev && \
    docker-php-ext-install pdo pdo_mysql && \
    pecl install \
        xdebug-2.6.0 \
        memcached-3.0.4
RUN echo extension=memcached.so >> /usr/local/etc/php/conf.d/memcached.ini

COPY project1.conf /usr/local/apache2/conf/demo.apache.conf

RUN echo "Include /usr/local/apache2/conf/demo.apache.conf" \
    >> /usr/local/apache2/conf/httpd.conf

RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli


