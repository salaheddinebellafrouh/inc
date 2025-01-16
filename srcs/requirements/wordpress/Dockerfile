FROM debian:bookworm

# Install necessary PHP packages, curl, mariadb-client, and other dependencies
RUN apt update -y \
    && apt install -y \
    php-fpm \
    php-mysqli \
    php-zip \
    php-gd \
    curl \
    unzip \
    mariadb-client \
    && apt clean

# Copy the PHP-FPM configuration file and WordPress installation script
COPY www.conf /etc/php/8.2/fpm/pool.d/.
COPY script.sh /script.sh
COPY ./wp-config.php /var/www/html/

# Ensure the script is executable
RUN chmod +x /script.sh

# Set ownership and permissions for the WordPress directory
RUN chown -R www-data:www-data /var/www/html

# Set working directory
WORKDIR /var/www/html

# Set proper permissions for the copied files (adjust as needed)
RUN chmod -R 755 /var/www/html

# Start PHP-FPM using the script
ENTRYPOINT ["/script.sh"]
