FROM vimal13/apache-webserver-php

RUN yum install php-mysqli -y
ADD . /var/www/html/