FROM php:8.3-fpm

# Instala extensiones necesarias
RUN apt-get update && apt-get install -y \
    git curl zip unzip libpq-dev libonig-dev libxml2-dev \
    && docker-php-ext-install pdo pdo_pgsql

# Instala Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

# Copia todos los archivos del proyecto
COPY . .

# ¡NO! ejecutamos Composer aquí
CMD php artisan serve --host=0.0.0.0 --port=8080
