    FROM debian:bookworm

# Install necessary packages
RUN apt update -y \
    && apt install -y php-fpm php-mysql curl \
    && apt clean && rm -rf /var/lib/apt/lists/*

# Create directories and set ownership for PHP-FPM
RUN mkdir -p /run/php && mkdir -p /var/log/php82 \
    && touch /var/log/php82/access.log \
    && chown -R www-data:www-data /run/php /var/log/php82

# Copy configuration and scripts
COPY wp-config.php /var/www/html/wp-config.php
COPY ./www.conf /etc/php/8.2/fpm/pool.d/
# COPY ./script.sh /
# RUN chmod +x /script.sh

# Expose PHP-FPM port
EXPOSE 9000

# Start PHP-FPM using the script
ENTRYPOINT ["php-fpm8.2", "-F"]
