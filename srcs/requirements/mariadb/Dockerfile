# Use Debian as the base image
FROM debian:bookworm

# Set environment variables for MariaDB
ENV MYSQL_ROOT_PASSWORD=123

# Install MariaDB dependencies and clean up apt cache
RUN apt-get update && apt-get install -y \
    mariadb-server \
    mariadb-client \
    && rm -rf /var/lib/apt/lists/*

# Set permissions for MariaDB directories
RUN chown -R mysql:mysql /var/lib/mysql

# Create the required directory for the Unix socket
RUN mkdir -p /run/mysqld && chown mysql:mysql /run/mysqld

# Expose MariaDB default port
EXPOSE 3306

# Copy the initialization SQL script to the appropriate directory
COPY ./init.sql /docker-entrypoint-initdb.d/

# Switch to the mysql user and start the MariaDB server
USER mysql
CMD ["mysqld"]