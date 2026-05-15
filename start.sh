#!/bin/bash

# Wait a bit for the database
sleep 5

# Start Laravel server
php artisan serve --host=0.0.0.0 --port=$PORT