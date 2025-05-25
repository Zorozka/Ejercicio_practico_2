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
RUN echo "APP_NAME=Laravel\nAPP_ENV=local\nAPP_KEY=\nAPP_DEBUG=true\nAPP_URL=https://ejercicio-practico-2.onrender.com\nDB_CONNECTION=pgsql\nDB_HOST=dpg-d0pi4o0dl3ps73aqk4q0-a\nDB_PORT=5432\nDB_DATABASE=ejercicio_db\nDB_USERNAME=ejercicio_db_user\nDB_PASSWORD=IeIIMakVOSF8olZ8KU30gjdF8eCsR8s2" > .env


# Expone el puerto
EXPOSE 8080

# Comando final
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8080"]
