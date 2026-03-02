🚀 Sistema de Gestão de Demandas (Projetos e Tickets)
Aplicação web full-stack desenvolvida para gestão de projetos e suas respectivas tarefas (tickets). O projeto demonstra a construção de uma API RESTful robusta com Laravel, consumida de forma assíncrona por um frontend leve desenvolvido em JavaScript Vanilla (Fetch API).

📋 Índice
Tecnologias Utilizadas

Arquitetura

Pré-requisitos

Instalação e Execução

Documentação da API

Estrutura do Banco de Dados

Contribuição

Licença

🛠️ Tecnologias Utilizadas
Backend
PHP 8.2+ - Linguagem de programação

Laravel 11/12 - Framework PHP para desenvolvimento da API

MySQL - Sistema de gerenciamento de banco de dados relacional

Frontend
HTML5 - Estruturação das páginas

CSS3 - Estilização responsiva

JavaScript Vanilla - Manipulação do DOM e consumo da API via Fetch

Blade Templates - Template engine do Laravel para views iniciais

🏗️ Arquitetura
O projeto foi desenvolvido seguindo boas práticas e padrões de mercado:

🔄 API-First Design
Backend construído exclusivamente como API RESTful (routes/api.php)

Respostas em formato JSON padronizado

Frontend como cliente independente consumindo a API via Fetch

⚡ Frontend Leve (SPA-like)
Interface dinâmica sem recarregamento de página

Operações CRUD realizadas via requisições assíncronas

Manipulação direta do DOM para atualização em tempo real

🛡️ Tratamento de Erros Robusto
Utilização do Route Model Binding do Laravel para validação automática de recursos

Respostas padronizadas para erros 404 e validações

Tratamento adequado de exceções

🔗 Integridade Referencial
Exclusão em cascata configurada no banco de dados

Ao excluir um projeto, todos os tickets associados são automaticamente removidos

Garantia de consistência dos dados

⚙️ Pré-requisitos
Antes de iniciar, certifique-se de ter instalado em sua máquina:

PHP 8.2 ou superior

Composer - Gerenciador de dependências PHP

MySQL 5.7 ou superior

Git - Controle de versão

🚀 Instalação e Execução
Siga os passos abaixo para executar o projeto em seu ambiente local:

1. Clone o Repositório
bash
git clone https://github.com/SEU_USUARIO/NOME_DO_REPOSITORIO.git
cd NOME_DO_REPOSITORIO
2. Instale as Dependências do PHP
bash
composer install
3. Configure o Ambiente
bash
# Copie o arquivo de exemplo de ambiente
cp .env.example .env

# Gere a chave da aplicação
php artisan key:generate
4. Configure o Banco de Dados
Crie uma base de dados MySQL chamada gestor_demandas e configure o arquivo .env:

env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=gestor_demandas
DB_USERNAME=root
DB_PASSWORD=sua_senha_aqui
5. Execute as Migrações
bash
# Cria as tabelas no banco de dados
php artisan migrate
6. Inicie o Servidor Local
bash
php artisan serve
Acesse a aplicação em: http://127.0.0.1:8000

📡 Documentação da API
A API está disponível sob o prefixo /api e todas as respostas são em formato JSON com o cabeçalho Content-Type: application/json.

📁 Projetos
Método	Endpoint	Descrição	Parâmetros
GET	/api/projects	Lista todos os projetos	?page=1 (paginação)
?q=termo (busca)
POST	/api/projects	Cria um novo projeto	name (obrigatório)
description
GET	/api/projects/{id}	Detalhes de um projeto específico	-
PUT	/api/projects/{id}	Atualiza um projeto	name
description
DELETE	/api/projects/{id}	Remove um projeto e seus tickets	-
Exemplo de Payload (POST/PUT)
json
{
  "name": "Projeto Exemplo",
  "description": "Descrição detalhada do projeto"
}
🎫 Tickets
Método	Endpoint	Descrição	Parâmetros
GET	/api/projects/{id}/tickets	Lista tickets de um projeto	-
POST	/api/projects/{id}/tickets	Adiciona ticket a um projeto	title (obrigatório)
description
GET	/api/tickets/{id}	Detalhes de um ticket específico	-
PATCH	/api/tickets/{id}	Atualiza parcialmente um ticket	Campos a atualizar
DELETE	/api/tickets/{id}	Remove um ticket	-
Exemplo de Payload (POST/PATCH)
json
{
  "title": "Título do Ticket",
  "description": "Descrição da tarefa"
}
📊 Estrutura do Banco de Dados
Tabela: projects
Campo	Tipo	Descrição
id	bigint	Chave primária
name	varchar	Nome do projeto
description	text	Descrição detalhada
created_at	timestamp	Data de criação
updated_at	timestamp	Data de atualização
Tabela: tickets
Campo	Tipo	Descrição
id	bigint	Chave primária
title	varchar	Título do ticket
description	text	Descrição da tarefa
project_id	bigint	Chave estrangeira (projects.id)
created_at	timestamp	Data de criação
updated_at	timestamp	Data de atualização
