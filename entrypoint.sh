#!/bin/bash

# Caminho do banco de dados definido na ENV do Render
DB_FILE="/var/www/html/database/database.sqlite"
DB_DIR=$(dirname "$DB_FILE")

# 1. Garante que o diretório exista (o disco do Render estará montado aqui)
mkdir -p "$DB_DIR"

# 2. Cria o arquivo SQLite SE ele não existir.
# Isso é crucial no primeiro deploy, quando o disco está vazio.
if [ ! -f "$DB_FILE" ]; then
    echo "Criando arquivo SQLite: $DB_FILE"
    touch "$DB_FILE"
fi

# =======================================================================
# === PASSO CRUCIAL: CORRIGIR PERMISSÕES APÓS A MONTAGEM DO DISCO ===
# =======================================================================

# 3. Define o dono do diretório e arquivo para o usuário que roda o Apache (www-data)
echo "Ajustando dono do diretório de dados para www-data..."
chown -R www-data:www-data "$DB_DIR"

# 4. Define permissões de escrita para o dono do diretório
echo "Ajustando permissões para www-data (775)..."
chmod -R 775 "$DB_DIR"

# =======================================================================

# 5. Roda Migrations e Seeders
# O --force é vital em produção.
echo "Rodando Migrations e Seeders..."
php artisan migrate --seed --force

# 6. Inicia o servidor principal do Apache
echo "Iniciando Apache..."
exec apache2-foreground