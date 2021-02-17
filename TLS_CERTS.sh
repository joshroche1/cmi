#!/bin/bash
# Create TLS certificates for Apache

openssl \
    req \
    -nodes \
    -newkey rsa:2048 \
    -keyout server.key \
    -out server.csr \
    -subj "/C=DE/ST=NRW/L=Berlin/O=My Inc/OU=DevOps/CN=www.example.com/emailAddress=dev@www.example.com"
openssl x509 -req -days 365 -in server.csr -signkey server.key -out server.crt
cp server.crt /etc/ssl/certs
cp server.key /etc/ssl/private

# modify /etc/apache2/sites-available/default-ssl.conf
# /etc/ssl/certs/server.crt
# /etc/ssl/private/server.key

a2enmod ssl
a2ensite default-ssl
systemctl apache2 reload
