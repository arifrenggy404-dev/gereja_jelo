# Stage 1: Build Assets (Node.js)
FROM node:20-alpine AS assets-builder
WORKDIR /app
COPY package*.json ./
RUN npm install
COPY . .
RUN npm run build

# Stage 2: Production Environment (PHP)
FROM php:8.3-cli-alpine

# Install tools dan ekstensi yang diperlukan Laravel
RUN apk add --no-cache git unzip bash libpng-dev libzip-dev zip \
    && docker-php-ext-install pdo pdo_mysql gd zip

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /app

# Menyalin file konfigurasi composer
COPY composer.json composer.lock ./

# Jalankan Composer Install
RUN composer install --no-dev --optimize-autoloader --no-interaction --no-scripts

# Menyalin seluruh file project
COPY . .

# Menyalin assets yang sudah di-build dari Stage 1
COPY --from=assets-builder /app/public/build ./public/build

# Generate autoload dan cache
RUN composer dump-autoload --optimize \
    && php artisan view:cache

# Memastikan izin folder storage dan cache (lebih aman dengan chown)
RUN chown -R www-data:www-data /app/storage /app/bootstrap/cache \
    && chmod -R 775 /app/storage /app/bootstrap/cache

# Port default
EXPOSE 8080

# Jalankan migrasi dan start server
CMD php artisan migrate --force && php artisan serve --host=0.0.0.0 --port=${PORT:-8080}
