
# 🚀 Sistema de Gestão de Demandas (Projetos e Tickets)

Aplicação web full-stack desenvolvida para gestão de projetos e suas respectivas tarefas (tickets). O projeto demonstra a construção de uma **API RESTful** robusta com Laravel, consumida de forma assíncrona por um frontend leve em **JavaScript Vanilla**.

## 📋 Índice

* [Tecnologias Utilizadas](https://www.google.com/search?q=%23-tecnologias-utilizadas)
* [Arquitetura](https://www.google.com/search?q=%23-arquitetura)
* [Pré-requisitos](https://www.google.com/search?q=%23-pr%C3%A9-requisitos)
* [Instalação e Execução](https://www.google.com/search?q=%23-instala%C3%A7%C3%A3o-e-execu%C3%A7%C3%A3o)
* [Documentação da API](https://www.google.com/search?q=%23-documenta%C3%A7%C3%A3o-da-api)
* [Estrutura do Banco de Dados](https://www.google.com/search?q=%23-estrutura-do-banco-de-dados)
* [Licença](https://www.google.com/search?q=%23-licen%C3%A7a)

---

## 🛠️ Tecnologias Utilizadas

### **Backend**

* **PHP 8.2+**
* **Laravel 11/12** (Framework MVC/API)
* **MySQL** (Banco de dados Relacional)

### **Frontend**

* **JavaScript Vanilla** (Fetch API para consumo assíncrono)
* **Blade Templates** (Estrutura base das views)
* **CSS3** (Estilização e Responsividade)

---

## 🏗️ Arquitetura

O projeto foi desenvolvido seguindo padrões modernos de desenvolvimento:

* **API-First Design:** O backend funciona como um provedor de dados independente através de `routes/api.php`.
* **SPA-like Experience:** Atualizações de interface sem recarregamento de página (AJAX/Fetch).
* **Integridade de Dados:** Configuração de **Foreign Keys** com `onDelete('cascade')`, garantindo que ao excluir um projeto, seus tickets sejam removidos automaticamente.
* **Validation Layer:** Uso de *Form Requests* do Laravel para garantir a consistência dos dados enviados.

---

## ⚙️ Pré-requisitos

* PHP ≥ 8.2
* Composer
* MySQL 5.7+
* Git

---

## 🚀 Instalação e Execução

### 1. Clone o Repositório

```bash
git clone https://github.com/SEU_USUARIO/NOME_DO_REPOSITORIO.git
cd NOME_DO_REPOSITORIO

```

### 2. Instale as Dependências

```bash
composer install

```

### 3. Configuração de Ambiente

```bash
cp .env.example .env
php artisan key:generate

```

> **Nota:** Edite o arquivo `.env` e insira as credenciais do seu banco de dados MySQL.

### 4. Migrações e Servidor

```bash
php artisan migrate
php artisan serve

```

Acesse: `http://127.0.0.1:8000`

---

## 📡 Documentação da API

Todas as requisições devem conter o cabeçalho `Accept: application/json`.

### **Projetos**

| Método | Endpoint | Descrição |
| --- | --- | --- |
| **GET** | `/api/projects` | Lista projetos (Suporta `?q=` para busca) |
| **POST** | `/api/projects` | Cria um novo projeto |
| **GET** | `/api/projects/{id}` | Retorna detalhes de um projeto |
| **PUT** | `/api/projects/{id}` | Atualiza um projeto existente |
| **DELETE** | `/api/projects/{id}` | Remove projeto e seus tickets |

### **Tickets**

| Método | Endpoint | Descrição |
| --- | --- | --- |
| **GET** | `/api/projects/{id}/tickets` | Lista tickets de um projeto específico |
| **POST** | `/api/projects/{id}/tickets` | Adiciona ticket a um projeto |
| **PATCH** | `/api/tickets/{id}` | Atualiza status/dados de um ticket |
| **DELETE** | `/api/tickets/{id}` | Remove um ticket específico |

---

## 📊 Estrutura do Banco de Dados

### **Tabela `projects**`

* `id`: Primary Key (BigInt)
* `name`: String (Nome do projeto)
* `description`: Text (Opcional)

### **Tabela `tickets**`

* `id`: Primary Key (BigInt)
* `project_id`: Foreign Key (Referencia `projects.id`)
* `title`: String
* `description`: Text


### Dica Extra:

Gostaria que eu gerasse o código de um **Controller** específico ou de uma **Migration** para garantir que a lógica de exclusão em cascata que mencionei no README esteja correta?
