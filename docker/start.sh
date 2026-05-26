#!/bin/bash
set -e

# Usar el puerto que asigna Render (o 80 por defecto)
PORT=${PORT:-80}

# Configurar Apache para escuchar en el puerto correcto
sed -i "s/Listen 80/Listen $PORT/" /etc/apache2/ports.conf
sed -i "s/<VirtualHost \*:80>/<VirtualHost *:$PORT>/" /etc/apache2/sites-available/000-default.conf

# Crear enlace de storage si no existe
php artisan storage:link --force 2>/dev/null || true

# Ejecutar migraciones
php artisan migrate --force

# Cachear configuración para producción
php artisan config:cache
php artisan route:cache
php artisan view:cache

echo "==> Starting Apache on port $PORT"
exec apache2-foreground
