#!/bin/sh

mysqld --user=mysql --datadir=/data > /dev/null 2>&1 &

sleep 5

mysql --user=root <<EOF
CREATE DATABASE IF NOT EXISTS wordpress;
CREATE USER IF NOT EXISTS 'wp_user'@'%' IDENTIFIED BY 'userpassword';
CREATE USER IF NOT EXISTS 'wp_admin'@'%' IDENTIFIED BY 'adminpassword';
GRANT ALL PRIVILEGES ON wordpress.* TO 'wp_user'@'%';
GRANT ALL PRIVILEGES ON wordpress.* TO 'wp_admin'@'%';
FLUSH PRIVILEGES;
EOF

kill $(jobs -p)

cat << 'EOF' > script.sh
#!/bin/sh
exec mysqld --user=mysql --datadir=/data --port=3306 --bind-address=0.0.0.0 --skip-networking=0
EOF

chmod +x script.sh

exec  script.sh
