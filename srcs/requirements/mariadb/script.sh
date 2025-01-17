#!/bin/sh



# Check if MariaDB data directory exists
if [ ! -d "$DATA_DIR/mysql" ]; then
    echo "Initializing MariaDB data directory..."
    mysql_install_db --user=$MYSQL_USER --datadir=$DATA_DIR > /dev/null 2>&1
    echo "MariaDB data directory initialized."
else
    echo "MariaDB data directory already exists."
fi

# Start the MariaDB server in the background
echo "Starting MariaDB server..."
mysqld --user=$MYSQL_USER --datadir=$DATA_DIR > /dev/null 2>&1 &
MYSQL_PID=$!

# Wait for the MariaDB server to be ready
echo "Waiting for MariaDB to be ready..."
sleep 5

# Set up the WordPress database and users
echo "Setting up the database and users..."
mysql --user=root <<EOF
CREATE DATABASE IF NOT EXISTS $DB_NAME;

CREATE USER IF NOT EXISTS 'root'@'%' IDENTIFIED BY '';
GRANT ALL PRIVILEGES ON *.* TO 'root'@'%' WITH GRANT OPTION;

CREATE USER IF NOT EXISTS '$WP_USER'@'%' IDENTIFIED BY '$WP_USER_PASSWORD';
CREATE USER IF NOT EXISTS '$WP_ADMIN'@'%' IDENTIFIED BY '$WP_ADMIN_PASSWORD';

GRANT ALL PRIVILEGES ON $DB_NAME.* TO '$WP_USER'@'%';
GRANT ALL PRIVILEGES ON $DB_NAME.* TO '$WP_ADMIN'@'%';
FLUSH PRIVILEGES;
EOF

if [ $? -eq 0 ]; then
    echo "Database and users set up successfully."
else
    echo "Error occurred while setting up database and users." >&2
fi

# Stop the MariaDB server gracefully
echo "Stopping MariaDB server..."
kill $MYSQL_PID
wait $MYSQL_PID

# Start MariaDB server with networking enabled
echo "Starting MariaDB server in production mode..."
exec mysqld --user=$MYSQL_USER --datadir=$DATA_DIR --port=3306 --bind-address=0.0.0.0 --skip-networking=0