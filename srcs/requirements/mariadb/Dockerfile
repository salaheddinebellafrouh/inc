FROM	debian:bookworm

COPY	script.sh /

RUN	apt-get update && apt-get install -y mariadb-server \
	mariadb-client && mkdir -p /data /run/mysqld && \
	chown -R mysql:mysql /data /run/mysqld && \
	chmod +x script.sh && apt-get clean && rm -rf /var/lib/apt/lists/* 

ENTRYPOINT	["/script.sh"]
