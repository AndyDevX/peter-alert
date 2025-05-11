FROM php:8.2-apache

# Copia TODO el proyecto, incluyendo la carpeta assets
COPY . /var/www/html/

# Configura ServerName para Apache
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf

# Habilita módulos necesarios
RUN a2enmod rewrite

# Establece permisos para la carpeta assets
RUN chown -R www-data:www-data /var/www/html/assets