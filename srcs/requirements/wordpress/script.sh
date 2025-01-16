#!/bin/bash

cd /var/www/html

# Download WP-CLI if not already present
if [ ! -f wp-cli.phar ]; then
    echo "Downloading WP-CLI..."
    curl -O https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar
    chmod +x wp-cli.phar
fi

# Wait for MariaDB to be ready
echo "Waiting for MariaDB to be ready..."
until mysqladmin ping -h mariadb --silent; do
    sleep 2
done

# Check if WordPress is already installed
if [ ! -f wp-config.php ]; then
    echo "Downloading WordPress core files..."
    ./wp-cli.phar core download --allow-root

    echo "Creating wp-config.php..."
    ./wp-cli.phar config create --dbname=wordpress --dbuser=wp_user --dbpass=userpassword --dbhost=mariadb --allow-root

    echo "Installing WordPress..."
    ./wp-cli.phar core install --url=http://127.0.0.1 --title="Inception" \
        --admin_user=admin --admin_password=adminpassword --admin_email=admin@admin.com --allow-root
else
    echo "WordPress is already installed. Skipping setup."
fi

# Start PHP-FPM
echo "Starting PHP-FPM..."
php-fpm8.2 -F
