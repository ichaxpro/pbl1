FROM php:8.2-fpm

# Install dependencies
RUN apt-get update && apt-get install -y \
    git unzip libpq-dev \
    && docker-php-ext-install pdo pdo_pgsql

# Copy project
COPY . /var/www/html

# Install Composer
RUN curl -s https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Install Laravel dependencies
RUN composer install --no-dev --optimize-autoloader

# Generate Laravel key (only if not set by env)
RUN php artisan key:generate --force || true

# Set working dir
WORKDIR /var/www/html

# Start Laravel server
CMD php artisan serve --host=0.0.0.0 --port=10000
