# Gunakan image resmi PHP dengan versi 7.4
FROM php:8.1.2-fpm

# Install dependensi yang diperlukan oleh Laravel
RUN apt-get update && apt-get install -y \
    libzip-dev \
    unzip \
    && docker-php-ext-install zip pdo pdo_mysql

# Instal Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Pindahkan ke direktori aplikasi Laravel
WORKDIR /var/www/html

# Salin file-fil Laravel ke dalam container
COPY . .

# Install dependensi menggunakan Composer
RUN composer install --optimize-autoloader --no-dev

# Set permissions
RUN chown -R www-data:www-data storage bootstrap/cache

# Expose port 9000 dan jalankan PHP-FPM
EXPOSE 80
CMD ["php-fpm"]

