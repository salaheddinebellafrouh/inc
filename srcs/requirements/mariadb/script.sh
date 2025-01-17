#!/bin/sh

# Check if MariaDB data directory exists
if [ ! -d "$DATA_DIR/mysql" ]; then
    echo "Initializing MariaDB data directory..."
    mysql_install_db --user=$MYSQL_USER --datadir=$DATA_DIR > /dev/null 2>&1
fi

# Start the MariaDB server in the background
echo "Starting MariaDB server..."
mysqld --user=$MYSQL_USER --datadir=$DATA_DIR > /dev/null 2>&1 &
MYSQL_PID=$!

# Wait for the MariaDB server to be ready
echo "Waiting for MariaDB to be ready..."
sleep 5

# Set up the WordPress database and users
mysql --user=root <<EOF
CREATE DATABASE IF NOT EXISTS $DB_NAME;

CREATE USER IF NOT EXISTS '$WP_USER'@'%' IDENTIFIED BY '$WP_USER_PASSWORD';
CREATE USER IF NOT EXISTS '$WP_ADMIN'@'%' IDENTIFIED BY '$WP_ADMIN_PASSWORD';

GRANT ALL PRIVILEGES ON $DB_NAME.* TO '$WP_USER'@'%';
GRANT ALL PRIVILEGES ON $DB_NAME.* TO '$WP_ADMIN'@'%';
FLUSH PRIVILEGES;
EOF

# Stop the MariaDB server gracefully
kill $MYSQL_PID
wait $MYSQL_PID

# Start MariaDB server with networking enabled
exec mysqld --user=$MYSQL_USER --datadir=$DATA_DIR --port=3306 --bind-address=0.0.0.0 --skip-networking=0
