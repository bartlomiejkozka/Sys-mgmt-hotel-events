FROM php:8.2-fpm

ARG user=test
ARG uid=1001

RUN apt update && apt install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    libzip-dev

RUN apt clean && rm -rf /var/lib/apt/lists/*

RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

RUN useradd -G www-data,root -u $uid -d /home/$user $user
RUN mkdir -p /home/$user/.composer && \
    chown -R $user:$user /home/$user

COPY . /var/www/

WORKDIR /var/www

# Fix ownership of working directory
# RUN chown -R $user:$user /var/www

# Make Git trust this directory (avoids "dubious ownership" warnings)
# RUN git config --global --add safe.directory /var/www

USER $user
