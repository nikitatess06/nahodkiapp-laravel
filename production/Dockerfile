FROM php:8.2-apache

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
COPY ../ /var/www/html/public


# Устанавливаем зависимости Composer
RUN composer install --no-interaction --optimize-autoloader --no-dev

# Включаем RewriteEngine
RUN a2enmod rewrite

# Очищаем временные файлы и кэш
RUN apt-get clean && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*
