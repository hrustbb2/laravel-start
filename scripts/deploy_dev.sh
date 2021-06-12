#!/usr/bin/env bash

cp /var/www/html/.env_dev /var/www/html/.env
cd /var/www/html
COMPOSER_MEMORY_LIMIT=-1 composer install
chmod -R 777 storage
php artisan key:generate
php artisan migrate