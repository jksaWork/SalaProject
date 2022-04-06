#!/bin/bash
set -e

echo "Deployment started ..."

# Enter maintenance mode or return true
# if already is in maintenance mode
(php artisan down) || true
# remove old env ----------------
rm -rf .env

echo 'old env has discard Successfuly'
# Pull the latest version of the app
git config core.sshCommand 'ssh -i ~/.ssh/cpanel'
git pull origin production
#commit
cp .env.prod .env
# Install composer dependencies
composer install --no-dev --no-interaction --prefer-dist --optimize-autoloader

# Clear the old cache
php artisan clear-compiled

# Recreate cache
php artisan optimize

# Compile npm assets
# npm run prod

# Run database migrations
php artisan migrate --force

# Exit maintenance mode
php artisan up

echo "Deployment finished!"

echo 'Deployment to Prodction  Server Was Done'
