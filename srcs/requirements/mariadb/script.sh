#!/bin/bash

# Start the MariaDB service
# Drop the WordPress database if it exists
mysql -u root -p$MYSQL_ROOT_PASSWORD -e "DROP DATABASE IF EXISTS wordpress;"

# Run the original MariaDB entrypoint (this starts MariaDB)
exec mysqld
