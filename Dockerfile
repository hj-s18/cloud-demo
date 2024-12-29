FROM php:7.3-apache
COPY *.php /var/www/html/
RUN docker-php-ext-install mysqli
# docker-php-ext-install mysqli : PHP가 MySQL 데이터베이스와 상호작용할 수 있도록 mysqli 확장을 설치하는 명령어
