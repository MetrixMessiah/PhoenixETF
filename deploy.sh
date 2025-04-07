#!/bin/bash

# Exit on error
set -e

# Create necessary directories if they don't exist
mkdir -p storage/app/public
mkdir -p storage/framework/cache/data
mkdir -p storage/framework/sessions
mkdir -p storage/framework/views
mkdir -p bootstrap/cache

# Set proper permissions
chmod -R 775 storage
chmod -R 775 bootstrap/cache

# Install dependencies
composer install --optimize-autoloader --no-dev

# Clear caches
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear

# Generate app key if not set
if [ -z "$APP_KEY" ]; then
    php artisan key:generate
fi

# Migrate database
php artisan migrate --force

# Seed database
php artisan db:seed --force

# Optimize
php artisan config:cache
php artisan route:cache
php artisan view:cache

echo "Deployment completed successfully!" 