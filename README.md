# Lending Simulator

O Projeto consiste na consulta de instituições bancárias e tipos de convênios, a partir de uma carga de dados pré definida. Também é possível realizar a simulação de empréstimos para cada uma das instituições e convênios.

Princípios/Técnicas/Conceitos utilizados:
- Clean Code
- SOLID
- Design Patterns
- Keep It Simple, Stupid (KISS)
- Don't Repeat Yourself (DRY)

Tecnologias/Ferramentas utilizadas:
- Laravel
- Docker
- Kool
- mocky.io

## Instruções 

O projeto foi desenvolvido com a utilização do Docker, junto ao Kool.

O [Kool](https://kool.dev/) é uma ferramenta utlizada para simplificação do uso do Docker e padronização do ambiente de desenvolvimento frente a vários projetos e diferentes desenvolvedores. É recomendável a instalação do mesmo para execução do projeto, porém ela **não é obrigatória**. 

### Criação e Configurações Iniciais

#### Clonando o Projeto

1. `git clone git@github.com:leonakaodev/lending-simulator.git` - Clona o projeto para o seu computador
2. `cd lending-simulator` - Acessa o diretório recém criado do projeto

#### Configurando o projeto

**Usando Kool:**

1. `kool run setup`

**Apenas Docker:**

1. `cp .env.example .env` - Copia as variáveis de ambiente.
2. `docker-compose up --build -d` - Inicializa os containers em background
3. `docker exec lending-simulator_app_1 composer2 install` - Instala as dependências via composer
4. `docker exec lending-simulator_app_1 php artisan key:generate` - Gera uma nova chave do Laravel para a aplicação

*Note:* "lending-simulator_app_1" é o nome do container que está rodando o app, em caso de erros, verifique se ele está correto.

**Considerações Gerais:**

Em caso de problemas com permissões de acesso de diretório, execute: `chmod -R 777 storage`

#### Inicializações Futuras

**Usando Kool:**

1. `kool start`

**Apenas Docker:**

1. `docker-compose up --build -d`

## Aplicação e Considerações

### Arquitetura

O projeto atualmente consistema apenas na exibição de dados de pré carregados e o cálculo de uma simulação de empréstimo para cada instituição em formato de API, sendo assim um serviço que será acessado e consumido seguindo uma arquitetura monolítica.

### Diretórios

Aleḿ dos diretórios padrões seguridos pelo Laravel, foram criados mais 3 diretórios para organizar e separar as funcionalidades dentro do projeto:

1. **Repositories** - Responsável por manter as implementações ligadas às regras de negócios e são consumidos via controllers
2. **Services** - Implementações que podem ser consumidas em diferentes locais da aplicação, e visam forncer um suporte para o desenvolvimento das outras funcionalidades. Podendo ter integração com outras ferramentas ou não.
3. **Utils** - Códigos mais simples que podem ser utilizados em toda a aplicação as realizar alguma ação específica.
