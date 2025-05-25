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

# Genera .env y prepara Laravel


# Expone el puerto para Laravel
EXPOSE 8080

# Comando de inicio
CMD "php", "artisan", "serve", "--host=0.0.0.0", "--port=8080"
