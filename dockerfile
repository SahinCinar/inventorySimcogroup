# Use the official PHP image from Docker Hub
FROM php:7.4-fpm

# Set working directory inside the container
WORKDIR /var/www/html

# Install dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    zip \
    unzip \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_mysql

# Install Composer globally
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copy composer.lock and composer.json to container
COPY composer.json composer.json
COPY composer.lock composer.lock

# Install Laravel dependencies
RUN composer install --no-scripts --no-autoloader

# Copy the rest of the application to the container
COPY . .

# Generate the optimized autoload files
RUN composer dump-autoload --optimize

# Set permissions for storage and bootstrap/cache folders
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Expose port 9000 and start PHP-FPM server
EXPOSE 9000
CMD ["php-fpm"]

