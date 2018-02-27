FROM webdevops/php-apache-dev:7.1

RUN apt-get update && apt-get install vim -y
ADD ltvplus.conf /etc/apache2/sites-available/ltvplus.conf
ADD ltvplus.conf /etc/apache2/sites-enabled/ltvplus.conf
WORKDIR /var/www/html

RUN echo error_log = /var/log/php_errors.log >> /opt/docker/etc/php/php.ini
RUN touch /var/log/php_errors.log
RUN touch /var/log/location_error.log
RUN chmod 777 /var/log/php_errors.log
RUN chmod 777 /var/log/location_error.log