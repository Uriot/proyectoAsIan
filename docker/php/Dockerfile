FROM php:8.2-fpm

# Dependencias del sistema
RUN apt-get update && apt-get install -y \
    git curl zip unzip libpq-dev libzip-dev libonig-dev libxml2-dev \
    libicu-dev libssl-dev libpng-dev libjpeg62-turbo-dev libfreetype6-dev \
    libonig-dev libcurl4-openssl-dev pkg-config supervisor \
    && docker-php-ext-configure intl \
    && docker-php-ext-install pdo pdo_mysql mbstring exif pcntl bcmath intl zip

# Opcional: GD
RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd

# Opcional: Redis PHP ext
RUN pecl install redis && docker-php-ext-enable redis

# Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Usuario no root (opcional)
RUN useradd -ms /bin/bash laravel
WORKDIR /var/www

# Supervisord para procesos (cola/scheduler si quieres en esta misma imagen)
COPY --chown=laravel:laravel . /var/www
RUN chown -R laravel:laravel /var/www
USER laravel

# Variables de entorno razonables
ENV COMPOSER_MEMORY_LIMIT=-1
