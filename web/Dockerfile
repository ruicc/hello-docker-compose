FROM php:5.6-apache

RUN docker-php-ext-install mbstring mcrypt
# PDO extension
RUN docker-php-ext-install pdo pdo_mysql
# mysqli extension
RUN docker-php-ext-install pdo mysqli
# APCu
RUN pecl install channel://pecl.php.net/apcu-4.0.6
RUN echo "extension=apcu.so" > /usr/local/etc/php/conf.d/apcu.ini
