#!/bin/bash

# Set environment
export PORT=${PORT:-8000}

# Run migrations
php artisan migrate --force

# Start Laravel server
php artisan serve --host=0.0.0.0 --port=$PORT