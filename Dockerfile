FROM php:8.2-apache

# Copia TODO el contenido del proyecto (incluyendo index.php y assets)
COPY . /var/www/html/

# Habilita módulos de Apache necesarios
RUN a2enmod rewrite headers

# Establece el archivo índice predeterminado
RUN echo "DirectoryIndex index.php" > /etc/apache2/conf-available/directory-index.conf
RUN a2enconf directory-index

# Permisos para el directorio
RUN chown -R www-data:www-data /var/www/html