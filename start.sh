#!/bin/bash

# Create database directory
mkdir -p /app/database

# Create SQLite database file
touch /app/database/database.sqlite

# Create storage directories
mkdir -p storage/framework/sessions
mkdir -p storage/framework/views
mkdir -p storage/framework/cache
mkdir -p bootstrap/cache

# Set permissions
chmod -R 775 storage
chmod -R 775 bootstrap/cache
chmod 777 /app/database
chmod 777 /app/database/database.sqlite

# Run migrations
php artisan migrate --force

# Start Laravel server
php artisan serve --host=0.0.0.0 --port=$PORT