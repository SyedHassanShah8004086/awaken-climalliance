#!/bin/bash

# Create necessary directories
mkdir -p database
mkdir -p storage/framework/sessions
mkdir -p storage/framework/views
mkdir -p storage/framework/cache
mkdir -p bootstrap/cache

# Create SQLite database if not exists
if [ ! -f database/database.sqlite ]; then
    touch database/database.sqlite
fi

# Set permissions
chmod -R 775 storage
chmod -R 775 bootstrap/cache

# Run migrations
php artisan migrate --force

# Clear config cache
php artisan config:clear
php artisan cache:clear

# Start server
php artisan serve --host=0.0.0.0 --port=$PORT