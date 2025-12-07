FROM php:8.2-cli

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git curl unzip libpng-dev libonig-dev libzip-dev zip \
    && docker-php-ext-install pdo pdo_mysql mbstring zip

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

# Copy all project files
COPY . .

# Install PHP dependencies
RUN composer install --no-dev --optimize-autoloader

# Create SQLite DB file safely
RUN touch database/database.sqlite

# Fix permissions to avoid 500 error
RUN chmod -R 775 storage bootstrap/cache database

# IMPORTANT: Clear cache for production
RUN php artisan config:clear && \
    php artisan route:clear && \
    php artisan view:clear

# Render uses dynamic port
CMD php artisan serve --host=0.0.0.0 --port=${PORT}
