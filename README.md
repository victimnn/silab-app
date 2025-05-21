#SILAB-APP

## 🚀 Como rodar este projeto Laravel

Siga os passos abaixo para rodar o projeto localmente.

### ✅ Pré-requisitos

Antes de começar, certifique-se de ter instalado:

- [PHP](https://www.php.net/) (versão compatível com o Laravel do projeto)
- [Composer](https://getcomposer.org/)
- [Laravel](https://laravel.com/) (opcional, se usar `laravel` globalmente)
- [MySQL](https://www.mysql.com/) ou outro banco de dados compatível
- [Node.js](https://nodejs.org/) e [npm](https://www.npmjs.com/) ou [Yarn](https://yarnpkg.com/) (para assets front-end)

---

### 📦 Instalando dependências

Clone o repositório e entre na pasta do projeto:

```bash
git clone https://github.com/victimnn/silab-app.git
cd seu-projeto
```

Instale as dependências PHP com o Composer:

```bash
composer install
```

Instale as dependências front-end (caso aplicável):

```bash
npm install
# ou
yarn
```

---

### ⚙️ Configuração do ambiente

Copie o arquivo `.env.example` e renomeie para `.env`:

```bash
cp .env.example .env
```

Gere a chave da aplicação:

```bash
php artisan key:generate
```

Configure as variáveis de ambiente no arquivo `.env`, especialmente:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nome_do_banco
DB_USERNAME=usuario
DB_PASSWORD=senha
```

---

### 🧱 Executando as migrations (e seeders, se houver)

Crie as tabelas no banco de dados:

```bash
php artisan migrate
```

Se houver seeders:

```bash
php artisan db:seed
```

---

### 🖥️ Rodando o servidor local

Inicie o servidor:

```bash
php artisan serve
```

Acesse em: [http://localhost:8000](http://localhost:8000)

---

### 🛠️ Compilando assets (opcional)

Se estiver usando Laravel Mix/Vite:

```bash
npm run dev
# ou
yarn dev
```

---

### 🧪 Rodando os testes (opcional)

```bash
php artisan test
```

---

### 📚 Observações

- Certifique-se de que o banco de dados está rodando.
- Verifique permissões das pastas `storage` e `bootstrap/cache` se tiver problemas.
