# 🏆 CRUD Copa do Mundo — PHP · MVC · PDO · MySQL

> Projeto educacional Firjan SENAI

---

## 📋 Pré-requisitos

- PHP 8.0 ou superior
- MySQL 5.7 ou superior
- Apache com `mod_rewrite` ativado (ou PHP Built-in Server)

---

## 🚀 Instalação passo a passo

### 1. Configurar o banco de dados

Acesse seu MySQL (phpMyAdmin, DBeaver, terminal, etc.) e execute o arquivo:

```
setup.sql
```

Isso criará o banco `copa_db` e a tabela `selecoes` com dados de exemplo.

### 2. Configurar a conexão

Abra `config/database.php` e ajuste as credenciais:

```php
private string $host     = 'localhost';
private string $dbName   = 'copa_db';
private string $user     = 'root';      // seu usuário MySQL
private string $password = '';          // sua senha MySQL
```

### 3a. Rodar com XAMPP / WAMP / MAMP

- Copie a pasta `copa-do-mundo/` para `htdocs/` (XAMPP) ou `www/` (WAMP)
- Certifique-se de que o `mod_rewrite` está ativado no Apache
- Acesse: `http://localhost/copa-do-mundo/public/`

### 3b. Rodar com o servidor embutido do PHP (mais simples!)

```bash
cd copa-do-mundo/public
php -S localhost:8000
```

Acesse: `http://localhost:8000/`

> ⚠️ Com o servidor embutido, o roteamento precisa de um pequeno ajuste.
> Execute dentro de `public/` e acesse as rotas diretamente:
> - `http://localhost:8000/` → lista
> - `http://localhost:8000/?_route=/selecoes/criar` → criar

---

## 📁 Estrutura do projeto (MVC)

```
copa-do-mundo/
├── config/
│   └── database.php          # Conexão PDO com o MySQL
├── controllers/
│   └── SelecaoController.php # Coordena requisições e respostas
├── models/
│   └── Selecao.php           # CRUD no banco de dados
├── views/
│   ├── index.php             # Lista de seleções (com filtro por grupo)
│   ├── create.php            # Formulário de cadastro
│   └── edit.php              # Formulário de edição
├── public/
│   ├── index.php             # Ponto de entrada / roteador
│   └── .htaccess
├── .htaccess
├── setup.sql                 # Script SQL de configuração
└── README.md
```

---

## ✅ Funcionalidades implementadas

| Operação | Rota             | Descrição                          |
|----------|------------------|------------------------------------|
| Read     | `/selecoes/listar` | Lista todas as seleções            |
| Create   | `/selecoes/criar`  | Formulário para nova seleção       |
| Update   | `/selecoes/editar` | Editar seleção existente           |
| Delete   | `/selecoes/excluir`| Remover seleção                    |

### Extras implementados
- ✅ Filtro por Grupo (A–H)
- ✅ Agrupamento visual por grupo na listagem
- ✅ Validação de campos obrigatórios (nome e grupo)
- ✅ Prepared Statements (proteção SQL Injection)
- ✅ Mensagens de sucesso após operações
- ✅ Design responsivo com tema Copa do Mundo
