# 🌿 VerdeLab

**VerdeLab** é um sistema web desenvolvido em **Laravel 9**, voltado para o **monitoramento sustentável** de setores e suas ações ecológicas dentro de uma instituição.  
O projeto integra **tecnologia, produção e trabalho** para promover o **desenvolvimento sustentável**, alinhado aos Objetivos de Desenvolvimento Sustentável (ODS) da ONU.

---

## 🌱 Objetivo

O VerdeLab tem como propósito auxiliar empresas, escolas ou órgãos públicos a **gerenciar ações e consumos ambientais**, permitindo o acompanhamento de indicadores como:
- Consumo de energia, água e materiais;
- Setores responsáveis por práticas sustentáveis;
- Ações ecológicas e seus resultados.

---

## 🧩 Tecnologias Utilizadas

| Tipo | Ferramenta |
|------|-------------|
| **Back-end** | Laravel 9 (PHP 8.1) |
| **Front-end** | HTML5, CSS3, JavaScript, Bootstrap 5 |
| **Banco de Dados** | MySQL |
| **Servidor Local** | XAMPP |
| **Controle de Versão** | Git e GitHub |

---

## 💻 Funcionalidades

- 👥 **Gestão de Setores** — Cadastro de setores e responsáveis.  
- ⚡ **Registro de Consumos** — Acompanhamento do uso de energia, água e insumos.  
- 🌍 **Ações Sustentáveis** — Registro e acompanhamento de projetos e práticas ecológicas.  
- 📊 **Painel Administrativo** — Interface intuitiva para o administrador geral.  
- 🔒 **Autenticação de Usuário** — Login seguro com validação de credenciais.  
- 🎨 **Visual ecológico e responsivo**, inspirado na natureza e na sustentabilidade.

---

## 🧠 Estrutura Principal

VerdeLab/
│
├── app/
│ ├── Http/Controllers/
│ │ ├── SetorController.php
│ │ ├── ConsumoController.php
│ │ └── AcaoController.php
│ └── Models/
│ ├── Setor.php
│ ├── Consumo.php
│ └── Acao.php
│
├── database/
│ ├── migrations/
│ ├── seeders/
│ └── factories/
│
├── resources/
│ ├── views/
│ │ ├── layouts/
│ │ ├── setores/
│ │ ├── consumos/
│ │ └── acoes/
│
├── routes/
│ └── web.php
│
└── .env

---

## 🧑‍💻 Instalação Local

> Requisitos: PHP 8+, Composer e XAMPP instalados.

1️⃣ Clone o repositório:
```bash
git clone https://github.com/viniciuscandeia99/verdelab.git


2️⃣ Acesse a pasta:

cd verdelab

3️⃣ Instale as dependências:
composer install

4️⃣ Crie o arquivo .env:

cp .env.example .env


5️⃣ Gere a chave da aplicação:

php artisan key:generate

6️⃣ Configure o banco de dados no .env:

DB_DATABASE=verdelab
DB_USERNAME=root
DB_PASSWORD=root


7️⃣ Rode as migrations e seeds:

php artisan migrate --seed

8️⃣ Inicie o servidor local:

php artisan serve
Acesse:
👉 http://localhost:8000

👤 Acesso padrão
Usuário	             Senha
admin@verdelab.com	 123456

🌍 Impacto Social
O VerdeLab contribui para a construção de ambientes mais conscientes, promovendo:

Eficiência energética;

Redução de desperdícios;

Transparência na gestão ambiental;

Educação e conscientização ecológica.

✨ Desenvolvido para o Curso de Análise e Desenvolvimento de Sistemas
📍 Multivix — Espírito Santo

🪴 Licença
Este projeto está sob a licença MIT — sinta-se livre para utilizá-lo e adaptá-lo para fins educacionais.