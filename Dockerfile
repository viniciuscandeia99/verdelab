# Usa imagem base com PHP e extensões do Laravel
FROM php:8.2-apache

# Define o diretório de trabalho
WORKDIR /var/www/html

# Copia os arquivos do projeto
COPY . .

# Instala dependências do sistema
RUN apt-get update && apt-get install -y \
    unzip \
    libsqlite3-dev \
    && docker-php-ext-install pdo pdo_sqlite

# Instala o Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Instala dependências do Laravel
RUN composer install --no-dev --optimize-autoloader

# Gera APP_KEY e roda migrations + seed automaticamente
RUN php artisan key:generate && \
    php artisan migrate --seed --force || true

# Ajusta permissões das pastas necessárias
RUN chmod -R 775 storage bootstrap/cache

# Expõe a porta usada pelo Apache
EXPOSE 80

# Inicia o Apache
CMD ["apache2-foreground"]