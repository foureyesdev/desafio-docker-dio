# Desafio Docker: Infraestrutura PHP & MySQL

Este projeto demonstra a orquestração de um ambiente de desenvolvimento utilizando **Docker** e **Docker Compose**. A infraestrutura automatiza a configuração de um servidor web PHP, um banco de dados MySQL e uma interface de gerenciamento via phpMyAdmin.

## 🛠️ Tecnologias e Ferramentas

**PHP 8.0 (Apache)**: Servidor web configurado com a extensão `mysqli`.
**MySQL 8.0**: Banco de dados relacional para persistência de informações.
**phpMyAdmin**: Interface gráfica para administração do banco de dados.
**Docker & Docker Compose**: Ferramentas para criação e orquestração de containers.

## 📂 Estrutura do Projeto

* `Dockerfile`: Define a imagem base PHP e instala dependências necessárias.
* `compose.yaml`: Define os serviços, volumes, redes e variáveis de ambiente.
* `.env`: Arquivo para definição das variáveis de ambiente.
* `index.php`: Script principal que gerencia a conexão, criação de tabelas e exibição de dados.

## 🚀 Como Executar o Projeto

### 1. Clonar o Repositório

```bash
git clone https://github.com/foureyesdev/desafio-docker-dio.git
cd desafio-docker-dio

```

### 2. Configurar Variáveis de Ambiente

Edite o arquivo `.env` preenchendo as seguintes chaves:

* `MYSQL_ROOT_PASSWORD`
* `MYSQL_DATABASE`
* `MYSQL_USER`
* `MYSQL_PASSWORD`

### 3. Subir a Infraestrutura

Execute o comando abaixo para iniciar todos os serviços em segundo plano:

```bash
docker-compose up -d

```

## 🖥️ Acesso aos Serviços

Após a inicialização, os serviços estarão disponíveis nos seguintes endereços:

| Serviço | URL | Porta Local |
| --- | --- | --- |
| **Aplicação PHP** | `http://localhost:8080` | `8080` |
| **phpMyAdmin** | `http://localhost:8081` | `8081` |
| **MySQL** | Direct Access | `3306` |

## 🔍 Detalhes de Implementação

**Automação de Banco de Dados**: Ao acessar o `index.php`, o sistema verifica automaticamente se a tabela `student` existe. Caso contrário, ela é criada e populada com dados iniciais (Alice, Bob e Carol) para facilitar o teste imediato.

**Segurança**: O projeto utiliza variáveis de ambiente para garantir que credenciais sensíveis não fiquem expostas diretamente no código-fonte.

**Persistência**: O código fonte local é mapeado via volumes para dentro do container, permitindo atualizações em tempo real durante o desenvolvimento.

---

Desenvolvido como parte de um desafio prático de containers.
