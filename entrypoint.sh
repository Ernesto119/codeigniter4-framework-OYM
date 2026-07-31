#!/bin/bash
set -e

# Se posiciona en la carpeta de CodeIgniter y corre las migraciones
cd /var/www/html
php spark migrate --all

# Inicia Apache (comando por defecto)
exec apache2-foreground