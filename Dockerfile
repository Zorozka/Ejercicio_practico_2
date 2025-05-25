FROM php:8.3-fpm

# Instala dependencias necesarias
RUN apt-get update && apt-get install -y \
    git curl zip unzip libpq-dev libonig-dev libxml2-dev \
    && docker-php-ext-install pdo pdo_pgsql

# Instala Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

# Copia archivos del proyecto
COPY . .

# Prepara Laravel
RUN cp .env.example .env \
 && php artisan key:generate \
 && composer install --no-dev --optimize-autoloader

CMD php artisan serve --host=0.0.0.0 --port=8080