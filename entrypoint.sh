#!/bin/bash

# Caminho do banco de dados definido na ENV do Render
DB_FILE="/var/www/html/database/database.sqlite"

# 1. Garante que o diretório exista (o disco do Render estará montado aqui)
mkdir -p $(dirname "$DB_FILE")

# 2. Cria o arquivo SQLite SE ele não existir.
# Isso é crucial no primeiro deploy, quando o disco está vazio.
if [ ! -f "$DB_FILE" ]; then
    echo "Criando arquivo SQLite: $DB_FILE"
    touch "$DB_FILE"
fi

# 3. Roda Migrations e Seeders
# O --force é vital em produção. O || true garante que o deploy não falhe se o comando falhar
# (Embora não seja recomendado, pode ser útil para testes iniciais)
echo "Rodando Migrations e Seeders..."
php artisan migrate --seed --force

# 4. Inicia o servidor principal do Apache
echo "Iniciando Apache..."
exec apache2-foreground