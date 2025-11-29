FROM php:8.2-cli

RUN apt-get update && apt-get install -y \
    git curl unzip libpng-dev libonig-dev libzip-dev zip \
    && docker-php-ext-install pdo pdo_mysql mbstring zip

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

COPY . .

RUN composer install --no-dev --optimize-autoloader

# Create SQLite DB file safely
RUN touch database/database.sqlite

# Correct permissions to avoid 500 error
RUN chmod -R 775 storage bootstrap/cache database

# Render uses dynamic port
CMD php artisan serve --host=0.0.0.0 --port=${PORT}
