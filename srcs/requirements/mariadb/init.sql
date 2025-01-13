-- Create the WordPress database if it doesn't exist
CREATE DATABASE IF NOT EXISTS wordpress;

-- Create two users: a non-admin user and an admin user
CREATE USER IF NOT EXISTS 'wp_user'@'%' IDENTIFIED BY 'userpassword';
CREATE USER IF NOT EXISTS 'wp_admin'@'%' IDENTIFIED BY 'adminpassword';

-- Grant privileges to the users
GRANT ALL PRIVILEGES ON wordpress.* TO 'wp_user'@'%';
GRANT ALL PRIVILEGES ON wordpress.* TO 'wp_admin'@'%';

-- Flush privileges to apply changes
FLUSH PRIVILEGES;