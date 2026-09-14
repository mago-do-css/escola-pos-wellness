FROM node:20-alpine AS assets

WORKDIR /app
COPY package.json ./
RUN npm install --no-audit --no-fund
COPY tailwind.config.js ./
COPY resources ./resources
COPY app ./app
RUN mkdir -p public/assets/css && npm run build

FROM php:8.3-apache

RUN a2enmod rewrite headers
COPY docker/apache-vhost.conf /etc/apache2/sites-available/000-default.conf
COPY . /var/www/html
COPY --from=assets /app/public/assets/css/app.css /var/www/html/public/assets/css/app.css

WORKDIR /var/www/html
EXPOSE 80
