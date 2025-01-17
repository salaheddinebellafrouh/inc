FROM        debian:bookworm

# Install required packages
RUN         apt-get update && apt-get install -y --no-install-recommends \
            nginx openssl && \
            mkdir -p /etc/nginx/ssl /www && \
            openssl genrsa -out /etc/nginx/ssl/nginx.key 2048 && \
            openssl req -batch -new -key /etc/nginx/ssl/nginx.key -out /etc/nginx/ssl/nginx.csr && \
            openssl x509 -req -days 365 -in /etc/nginx/ssl/nginx.csr \
            -signkey /etc/nginx/ssl/nginx.key -out /etc/nginx/ssl/nginx.crt && \
            apt-get clean && rm -rf /var/lib/apt/lists/*

# Copy the nginx configuration
COPY        default /etc/nginx/sites-available/default

# Link the configuration file to the enabled sites
RUN         ln -sf /etc/nginx/sites-available/default /etc/nginx/sites-enabled/default && \
            rm -rf /etc/nginx/sites-enabled/default.conf

EXPOSE      443/tcp

ENTRYPOINT  [ "nginx", "-g", "daemon off;" ]
