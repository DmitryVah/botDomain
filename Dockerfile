FROM php:8.2-apache

# Устанавливаем расширения PHP
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Копируем файлы проекта в папку сайта Apache
COPY . /var/www/html/

# Включаем модуль Apache для работы с .htaccess
RUN a2enmod rewrite

# Устанавливаем права
RUN chown -R www-data:www-data /var/www/html

# Настраиваем Apache на работу с .htaccess
RUN sed -i 's/AllowOverride None/AllowOverride All/g' /etc/apache2/apache2.conf
