# Teste técnico GS3 Tecnologia – Backend Laravel

Este projeto foi desenvolvido como parte do processo seletivo da GS3 Tecnologia. Ele representa a API backend do case, integrada ao projeto mobile. O backend foi construído utilizando Laravel e segue boas práticas modernas de desenvolvimento.

## ⚙️ Tecnologias utilizadas

- Laravel 10.x
- PHP 8.2+
- PostgreSQL
- Livewire
- Autenticação via Sanctum e JW
- Migrations, Seeders e Factories

## 📁 Estrutura do projeto

O projeto segue a estrutura padrão do Laravel, com algumas personalizações:
- `app/Repository`: Repositories do sistema e base repository
- `app/Factory`: Padronização na resposta da API
- `app/Services`: Services centralizadas
- `app/Livewire`: Todos componentes
- `routes/api.php`: Todas as rotas da API

## ✅ Requisitos

Antes de iniciar, verifique se você possui instalado:

- [PHP 8.2+](https://www.php.net/downloads.php)
- [Composer](https://getcomposer.org/)
- [Laravel CLI](https://laravel.com/docs/10.x/installation)
- [PostgreSQL ou SQLite](https://www.sqlite.org/)

## 🚀 Executando o projeto

Clone o repositório e instale as dependências:

```bash
git clone git@github.com:mard3nnn/gs3_backoffice.git
cd gs3_backoffice
composer install
```

Copie o arquivo `.env.example` para `.env` e configure suas variáveis:

```bash
cp .env.example .env
php artisan key:generate
```

Ajuste o driver do banco de dados conforme seu ambiente (`sqlite`, `pgsql`, etc.) no `.env`.

### Banco de dados SQLite (rápido para testes locais):

```bash
touch database/database.sqlite
# e no .env, configure:
DB_CONNECTION=sqlite
DB_DATABASE=/caminho/absoluto/para/database/database.sqlite
```

### Rodando migrations e seeders:

```bash
php artisan migrate --seed
```

### Subindo o servidor:

```bash
php artisan serve
```

A API estará disponível em: `http://127.0.0.1:8000`
