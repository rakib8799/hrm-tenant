#!/bin/sh

ssh -o StrictHostKeyChecking=no $USER@$HOST << 'ENDSSH'
  set -e  # Exit immediately if any command fails
  cd /var/www/html/muhuri-tenant
  echo "$PWD"
  git stash -u
  git pull
  echo "Pulled latest changes"

  composer install --no-interaction --prefer-dist --optimize-autoloader
  composer update --no-interaction
  echo "Installed composer dependencies"

  php artisan migrate --no-interaction
  echo "============================migrated============================"
  sudo systemctl reload nginx
  echo "Deployed!"
ENDSSH
