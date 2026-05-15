#!/bin/bash

# Create database directory if not exists
mkdir -p database

# Create SQLite database file if not exists
if [ ! -f database/database.sqlite ]; then
    touch database/database.sqlite
    echo "Database file created"
fi

# Run migrations
php artisan migrate --force

# Start Laravel server
php artisan serve --host=0.0.0.0 --port=$PORT