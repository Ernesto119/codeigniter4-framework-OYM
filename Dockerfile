FROM php:8.2-apache

# Instalar extensiones requeridas por CodeIgniter 4
RUN apt-get update && apt-get install -y \
    libicu-dev \
    zip \
    unzip \
    git \
    libpq-dev \
    && docker-php-ext-configure intl \
    && docker-php-ext-install intl mysqli pdo pdo_mysql pdo_pgsql pgsql

# Habilitar mod_rewrite para las URLs amigables
RUN a2enmod rewrite

# Cambiar el DocumentRoot a la carpeta public/ de CodeIgniter
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

COPY codeigniter/ /var/www/html/

COPY entrypoint.sh /usr/local/bin/
RUN chmod +x /usr/local/bin/entrypoint.sh

ENTRYPOINT ["entrypoint.sh"]

# 2. Ajustar permisos a la carpeta writable
RUN chown -R www-data:www-data /var/www/html/writable

WORKDIR /var/www/html

EXPOSE 80