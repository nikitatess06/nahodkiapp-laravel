FROM php:7.4-apache

# Устанавливаем зависимости
RUN apt-get update && apt-get install -y \
libzip-dev \
zip \
unzip \
git \
&& docker-php-ext-install pdo_mysql zip

# Устанавливаем Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Копируем файлы
COPY composer.json composer.lock /var/www/html/
COPY . /var/www/html/

# Устанавливаем зависимости Composer
RUN composer install --no-interaction --optimize-autoloader --no-dev

# Включаем RewriteEngine
RUN a2enmod rewrite

# Очищаем временные файлы и кэш
RUN apt-get clean && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

# Экспонируем порт 80
EXPOSE 80

# Запускаем Apache в фоновом режиме
CMD ["apache2-foreground"]