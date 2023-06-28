FROM php:8.1-apache

# Habilitar el módulo headers
RUN a2enmod headers

# Habilitar el módulo de reescritura
RUN a2enmod rewrite

# Habilitar el módulo de compresión
RUN a2enmod deflate

# Copiar el archivo de configuración
COPY rest.conf /etc/apache2/sites-enabled/000-default.conf

# Reiniciar Apache
CMD ["apache2ctl", "-D", "FOREGROUND"]

# Establecer la variable de entorno del puerto
ENV PORT=8081

# Copiar los archivos de la aplicación al directorio de Apache
COPY www /var/www/html

# Exponer el puerto
EXPOSE ${PORT}
