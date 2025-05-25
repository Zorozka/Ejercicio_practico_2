FROM php:8.3-fpm

# Instala dependencias
RUN apt-get update && apt-get install -y \
    git curl zip unzip libpq-dev libonig-dev libxml2-dev \
    && docker-php-ext-install pdo pdo_pgsql

# Instala Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

COPY . .

# No ejecutamos NADA aún: Artisan y Composer correrán después del build

CMD php artisan serve --host=0.0.0.0 --port=8080