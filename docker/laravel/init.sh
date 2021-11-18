#!/bin/sh

cd /srv/api || exit

composer install
php artisan key:generate
php artisan storage:link
php artisan elfinder:publish
php artisan migrate
