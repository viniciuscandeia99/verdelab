# Usa PHP com Apache
FROM php:8.2-apache

WORKDIR /var/www/html

# Copia todo o projeto
COPY . .

# Instala dependências do sistema e PHP
RUN apt-get update && apt-get install -y \
    unzip \
    libsqlite3-dev \
    && docker-php-ext-install pdo pdo_sqlite

# Instala o Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Instala dependências do Laravel
RUN composer install --no-dev --optimize-autoloader

RUN mkdir -p /var/www/html/database && touch /var/www/html/database/database.sqlite
ENV DB_CONNECTION=sqlite
ENV DB_DATABASE=/var/www/html/database/database.sqlite

# Gera APP_KEY e roda migrations + seeders (não quebra se já existir)
RUN php artisan key:generate --force || true && \
    php artisan migrate --seed --force || true && \
    php artisan config:clear && \
    php artisan cache:clear && \
    php artisan view:clear && \
    php artisan route:clear

# Corrige permissões
RUN chmod -R 775 storage bootstrap/cache database

# Configura o Apache pra rodar o Laravel
RUN echo "<VirtualHost *:80>\n\
    DocumentRoot /var/www/html/public\n\
    <Directory /var/www/html/public>\n\
        AllowOverride All\n\
        Options FollowSymLinks\n\
        Require all granted\n\
    </Directory>\n\
</VirtualHost>" > /etc/apache2/sites-available/000-default.conf

RUN a2enmod rewrite

EXPOSE 80

CMD ["apache2-foreground"]
