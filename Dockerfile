FROM nginx:latest
COPY public /usr/share/nginx/html
COPY alice/nginx.conf /etc/nginx/nginx.conf