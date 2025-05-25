FROM php:8.3-fpm

# Instala extensiones necesarias
RUN apt-get update && apt-get install -y \
    git curl zip unzip libpq-dev libonig-dev libxml2-dev \
    && docker-php-ext-install pdo pdo_pgsql

# Instala Composer
RUN curl -sS https://getcomposer.org/installer | php && \
    mv composer.phar /usr/local/bin/composer

WORKDIR /var/www

# Copia archivos del proyecto
COPY . .

# CREA carpetas necesarias y asigna permisos
RUN mkdir -p storage/framework/cache storage/framework/sessions storage/framework/views bootstrap/cache && \
    chmod -R 775 storage bootstrap/cache

# Instala dependencias y configura Laravel
RUN cp .env.example .env && \
    composer install --no-dev --optimize-autoloader && \
    php artisan key:generate

# Expone el puerto
EXPOSE 8080

# Comando final
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8080"]

