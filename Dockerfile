# Usa imagem base com PHP e Apache
FROM php:8.2-apache

# Define o diretório de trabalho
WORKDIR /var/www/html

# Copia o conteúdo do projeto
COPY . .

# Instala dependências do sistema e extensões necessárias
RUN apt-get update && apt-get install -y \
    unzip \
    libsqlite3-dev \
    && docker-php-ext-install pdo pdo_sqlite

# Instala o Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Instala as dependências do Laravel
RUN composer install --no-dev --optimize-autoloader

# Gera a APP_KEY e executa migrations (não falha se já existir)
RUN php artisan key:generate || true && \
    php artisan migrate --seed --force || true

# Ajusta permissões
RUN chmod -R 775 storage bootstrap/cache

# 🧩 Configura o Apache pra apontar pra pasta 'public'
RUN echo "<VirtualHost *:80>\n\
    DocumentRoot /var/www/html/public\n\
    <Directory /var/www/html/public>\n\
        AllowOverride All\n\
        Options Indexes FollowSymLinks\n\
        Require all granted\n\
    </Directory>\n\
</VirtualHost>" > /etc/apache2/sites-available/000-default.conf

# Ativa o mod_rewrite
RUN a2enmod rewrite

# Expõe porta
EXPOSE 80

# Inicia Apache
CMD ["apache2-foreground"]
