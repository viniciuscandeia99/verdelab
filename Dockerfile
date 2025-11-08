# Usa PHP com Apache
FROM php:8.2-apache

WORKDIR /var/www/html

# Copia todo o projeto
COPY . .

# Instala dependências do sistema e PHP
RUN apt-get update && apt-get install -y \
    unzip \
    libsqlite3-dev \
    # Instala GD para manipulação de imagem, se necessário, e outras extensões comuns
    libpng-dev \
    libjpeg-dev \
    && docker-php-ext-install pdo pdo_sqlite gd

# Instala o Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Instala dependências do Laravel
RUN composer install --no-dev --optimize-autoloader

# Limpeza de caches (mantido no RUN para otimizar o build)
RUN php artisan config:clear && \
    php artisan cache:clear && \
    php artisan view:clear && \
    php artisan route:clear

# A criação do APP_KEY é mantida, pois é necessária para o cache
RUN php artisan key:generate --force

# Corrige permissões
# Mude para 777 apenas para storage e bootstrap/cache, para que o Apache possa escrever
# A pasta 'database' será montada pelo disco do Render, então a permissão deve ser tratada pelo Render.
RUN chown -R www-data:www-data storage bootstrap/cache && \
    chmod -R 775 storage bootstrap/cache

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

# Comando de Início (CMD)
# O Render Web Service não usará este CMD se você definir um "Start Command" no painel.
# Vamos criar um script para o CMD que lida com as migrations.
COPY entrypoint.sh /usr/local/bin/entrypoint.sh
RUN chmod +x /usr/local/bin/entrypoint.sh

CMD ["entrypoint.sh"]