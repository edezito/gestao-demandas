# 🚀 Sistema de Gestão de Demandas (Projetos e Tickets)

Uma aplicação web full-stack desenvolvida para gerir projetos e as suas respectivas tarefas (tickets). Este projeto demonstra a construção de uma **API RESTful** robusta com Laravel, consumida de forma assíncrona por um frontend leve desenvolvido em **Javascript Vanilla** (Fetch API).

## 🛠️ Tecnologias Utilizadas

* **Backend:** PHP 8.x, Laravel 11/12
* **Frontend:** HTML5, CSS3, Javascript Puro (Vanilla JS), Blade Templates
* **Banco de Dados:** MySQL

## 🏗️ Decisões de Arquitetura

Para evidenciar as melhores práticas de desenvolvimento, o projeto foi desenhado com as seguintes premissas:

* **Separação de Responsabilidades (API-First):** O backend foi construído estritamente como uma API de dados (retornando JSON via `routes/api.php`). O frontend atua como um cliente independente, comunicando via `Fetch API`.
* **Frontend Leve (SPA-like):** Em vez de recarregar a página a cada ação, a interface utiliza Javascript Vanilla para buscar, criar e excluir registros dinamicamente.
* **Tratamento de Erros e Validação:** As requisições inválidas ou pesquisas por IDs inexistentes (404) são tratadas nativamente pelo Laravel (Route Model Binding), garantindo respostas padronizadas em formato JSON.
* **Exclusão em Cascata:** A integridade referencial foi garantida no banco de dados. Ao deletar um projeto, todos os tickets associados são automaticamente removidos.

## ⚙️ Pré-requisitos

Certifique-se de ter os seguintes programas instalados na sua máquina:

* [PHP 8.2 ou superior](https://www.php.net/)
* [Composer](https://getcomposer.org/)
* [MySQL](https://www.mysql.com/) (Servidor rodando na porta 3306)

## 🚀 Como Executar o Projeto Localmente

Siga o passo a passo abaixo para rodar a aplicação no seu ambiente de desenvolvimento:

**1. Clone o repositório:**
```bash
git clone [https://github.com/SEU_USUARIO/NOME_DO_REPOSITORIO.git](https://github.com/SEU_USUARIO/NOME_DO_REPOSITORIO.git)
cd NOME_DO_REPOSITORIO

**2. Instale as dependências do PHP:**
composer install

**3. Configure o arquivo de ambiente:**
Faça uma cópia do arquivo .env.example e renomeie-a para .env:
cp .env.example .env

**4. Gere a chave da aplicação:**
php artisan key:generate

**5. Configure o Banco de Dados (MySQL):**
Crie um banco de dados no seu MySQL chamado gestor_demandas. Depois, no arquivo .env, configure as suas credenciais:
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=gestor_demandas
DB_USERNAME=root
DB_PASSWORD=sua_senha_aqui

**6. Execute as Migrações:**
Para criar as tabelas necessárias no banco de dados:
php artisan migrate

**7. Inicie o Servidor Local:**
php artisan serve

📡 Documentação da API (Endpoints)
A API base do projeto encontra-se no prefixo /api. O sistema responde sempre com o cabeçalho Content-Type: application/json.

📂 Projetos (/api/projects)

Método,Endpoint,Descrição
GET,/api/projects,Lista projetos (suporta parâmetros ?page=1 e ?q=termo)
POST,/api/projects,Cria um novo projeto
GET,/api/projects/{id},Retorna os detalhes de um projeto específico e seus tickets
PUT,/api/projects/{id},Atualiza os dados de um projeto
DELETE,/api/projects/{id},Exclui um projeto (e suas dependências em cascata)

🎫 Tickets (/api/tickets)
Método,Endpoint,Descrição
GET,/api/projects/{id}/tickets,Lista todos os tickets pertencentes a um projeto
POST,/api/projects/{id}/tickets,Adiciona um novo ticket a um projeto
GET,/api/tickets/{id},Retorna detalhes de um ticket específico
PATCH,/api/tickets/{id},Atualiza parcialmente os dados de um ticket
DELETE,/api/tickets/{id},Exclui um ticket