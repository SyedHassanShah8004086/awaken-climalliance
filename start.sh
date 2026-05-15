#!/bin/bash

# Show current directory
echo "Current directory: $(pwd)"

# Create database directory
mkdir -p database

# Create SQLite database file
touch database/database.sqlite

# Verify database exists
ls -la database/

# Create storage directories
mkdir -p storage/framework/sessions
mkdir -p storage/framework/views
mkdir -p storage/framework/cache
mkdir -p bootstrap/cache

# Set permissions
chmod -R 775 storage
chmod -R 775 bootstrap/cache
chmod 777 database
chmod 777 database/database.sqlite

# Run migrations
php artisan migrate --force

# Start Laravel server
php artisan serve --host=0.0.0.0 --port=$PORT