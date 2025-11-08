# Imagem base com PHP + extensões necessárias
FROM php:8.2-cli

# Instala dependências do sistema
RUN apt-get update && apt-get install -y \
    unzip \
    libzip-dev \
    sqlite3 \
    libsqlite3-dev \
    && docker-php-ext-install pdo pdo_sqlite

# Instala o Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Define o diretório de trabalho
WORKDIR /app

# Copia todos os arquivos do projeto
COPY . .

# Instala as dependências do Laravel
RUN composer install --no-dev --optimize-autoloader

# Gera a APP_KEY automaticamente no primeiro start
RUN php artisan key:generate || true

# Expõe a porta usada pelo Render
EXPOSE 8000

# Comando para rodar o servidor Laravel
CMD php artisan serve --host=0.0.0.0 --port=8000
