**Xamariz — Website**

Projeto Laravel para o site Xamariz. Este repositório contém a aplicação back-end, assets e scripts para desenvolvimento e deploy.

**Resumo**: aplicação web construída com Laravel (PHP) que serve um site institucional com posts, serviços, portfólio e contatos.

**Requisitos**

- PHP 8.0+ (extensões: pdo, mbstring, json, openssl, tokenizer, xml)
- Composer
- Node.js 16+ e npm/yarn
- MySQL / MariaDB (ou outra base compatível)

**Instalação rápida (desenvolvimento)**

1. Clone o repositório:

```bash
git clone <repo-url>
cd xamariz_web
```

2. Copie o arquivo de ambiente e ajuste valores:

```bash
cp .env.example .env
# editar .env (DB_CONNECTION, DB_DATABASE, DB_USERNAME, DB_PASSWORD)
```

3. Instale dependências PHP e JS:

```bash
composer install --no-interaction --prefer-dist
npm install
```

4. Gere a chave da aplicação e faça migrações/import do DB:

```bash
php artisan key:generate
php artisan migrate
# ou importar dump SQL localizado em xamariz_web.sql
# mysql -u user -p database < xamariz_web.sql
```

5. Crie link para storage e rode assets em modo dev:

```bash
php artisan storage:link
npm run dev
php artisan serve
```

**Scripts úteis**

- `npm run dev` — compilar assets para desenvolvimento
- `npm run build` — compilar assets para produção
- `php artisan migrate` — executar migrations
- `php artisan db:seed` — popular dados (se existir seeder)
- `php artisan test` — executar testes

**Estrutura principal**

- `app/Models` — modelos Eloquent
- `app/Http/Controllers` — controllers
- `resources/views` — templates Blade
- `routes/web.php` — rotas web
- `public/` — assets públicos e ponto de entrada

**Banco de dados**
Um dump de exemplo do banco encontra-se em `xamariz_web.sql` na raiz do projeto. Ajuste `.env` e importe conforme necessário.

**Deploy (nota rápida)**

- Ajustar `.env` com credenciais de produção
- `composer install --optimize-autoloader --no-dev`
- `php artisan migrate --force`
- `npm run build`
- `php artisan config:cache && php artisan route:cache && php artisan view:cache`

**Testes**
Execute os testes com:

```bash
php artisan test
```

**Contribuição e contato**
Abra issues para problemas/bugs ou envie pull requests. Para dúvidas, contate a equipe responsável pelo projeto.

**Licença**
MIT

---

Arquivo editado automaticamente pelo assistente. Se deseja que eu inclua instruções adicionais (Docker, CI, deploy VPS), diga qual formato prefere.
