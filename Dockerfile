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
RUN echo "APP_NAME=Laravel\nAPP_ENV=local\nAPP_KEY=\nAPP_DEBUG=true\nAPP_URL=http://localhost\nDB_CONNECTION=pgsql\nDB_HOST=localhost\nDB_PORT=5432\nDB_DATABASE=laravel\nDB_USERNAME=postgres\nDB_PASSWORD=yourpassword" > .env


# Expone el puerto
EXPOSE 8080

# Comando final
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8080"]
