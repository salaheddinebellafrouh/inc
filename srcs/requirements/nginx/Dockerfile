FROM debian:bookworm

RUN apt-get update && apt-get upgrade -y && apt-get install -f -y \
    nginx \
    openssl \
    && apt-get clean


# Create the nginx group and user
# RUN groupadd nginx && useradd -r -g nginx -s /bin/false nginx

# COPY nginx.conf /etc/nginx/nginx.conf

CMD ["nginx", "-g", "daemon off;"]
