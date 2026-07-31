FROM php:8.2-apache

ARG APP_DIR=/var/www/html

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
ENV APACHE_DOCUMENT_ROOT=${APP_DIR}/public
RUN sed -ri -e "s!/var/www/html!${APACHE_DOCUMENT_ROOT}!g" /etc/apache2/sites-available/000-default.conf /etc/apache2/sites-available/default-ssl.conf \
    && printf '<Directory %s>\n    AllowOverride All\n    Require all granted\n</Directory>\n' "${APACHE_DOCUMENT_ROOT}" > /etc/apache2/conf-available/codeigniter.conf \
    && a2enconf codeigniter

COPY . ${APP_DIR}/

RUN mkdir -p ${APP_DIR}/writable \
    && chown -R www-data:www-data ${APP_DIR}

WORKDIR ${APP_DIR}

EXPOSE 80