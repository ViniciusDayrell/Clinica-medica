# 🏥 Clínica Médica COMP

> Projeto final acadêmico desenvolvido para a disciplina de Desenvolvimento Web 1, cursada no sexto período do curso de Sistemas de Informação da Universidade Federal de Uberlândia (UFU).

![PHP](https://img.shields.io/badge/PHP-72.3%25-777BB4?style=flat)
![HTML](https://img.shields.io/badge/HTML-15.4%25-E34F26?style=flat)
![CSS](https://img.shields.io/badge/CSS-10.0%25-1572B6?style=flat)
![JavaScript](https://img.shields.io/badge/JavaScript-2.3%25-F7DF1E?style=flat)
![SQL](https://img.shields.io/badge/SQL-008080?style=flat)

## 📌 Sobre o projeto

A **Clínica Médica COMP** é uma aplicação web desenvolvida para representar o funcionamento de uma clínica médica, reunindo uma área pública para pacientes e visitantes e uma área restrita destinada aos funcionários.

Na área pública, o usuário pode conhecer a clínica, acessar a galeria de imagens e realizar o agendamento de consultas. Já a área restrita oferece autenticação de funcionários, cadastro de pacientes e profissionais, consulta dos dados registrados e visualização dos agendamentos.

O projeto integra interface web, regras de negócio em PHP e persistência de dados em MySQL, contemplando desde a navegação pública até o controle de acesso por sessão.

## ✨ Funcionalidades

### Área pública

- Página inicial institucional da clínica;
- galeria de imagens das instalações;
- formulário para agendamento de consultas;
- seleção de médicos por especialidade;
- carregamento dinâmico dos médicos disponíveis;
- consulta dos horários já ocupados para determinado médico e data;
- bloqueio dos horários indisponíveis no formulário;
- acesso à página de login dos funcionários.

### Área restrita

- Autenticação de funcionários por e-mail e senha;
- proteção das páginas internas por sessão;
- identificação do funcionário autenticado;
- diferenciação entre funcionários comuns e médicos;
- cadastro de funcionários;
- cadastro adicional de especialidade e CRM quando o funcionário é médico;
- cadastro de pacientes;
- armazenamento de endereço, dados pessoais e informações clínicas;
- listagem de funcionários;
- listagem de pacientes;
- listagem de endereços;
- listagem geral de agendamentos;
- visualização dos próprios agendamentos pelo médico autenticado;
- encerramento da sessão por logout.

## 🔄 Fluxo da aplicação

1. O acesso à raiz do projeto redireciona o visitante para a página inicial pública.
2. O visitante pode navegar pela página inicial, visualizar a galeria ou acessar o agendamento.
3. Durante o agendamento, a especialidade selecionada determina quais médicos serão exibidos.
4. Após a escolha do médico e da data, a aplicação consulta os horários já ocupados e mantém disponíveis apenas os demais.
5. Funcionários acessam a área interna por meio da página de login.
6. Após a autenticação, uma sessão é criada e o usuário é direcionado ao painel restrito.
7. Na área interna, é possível cadastrar funcionários e pacientes, além de consultar os dados armazenados.
8. Quando o funcionário autenticado é um médico, a opção de consultar os próprios agendamentos também é disponibilizada.

## 🛠️ Tecnologias utilizadas

- **PHP:** processamento no servidor, autenticação, sessões, regras de negócio e acesso ao banco de dados;
- **MySQL:** armazenamento das informações da clínica;
- **PDO:** conexão com o banco e execução de consultas preparadas;
- **HTML:** estrutura das páginas e dos formulários;
- **CSS:** estilização das áreas pública e restrita;
- **JavaScript:** validações, redirecionamentos e requisições assíncronas;
- **Bootstrap 5:** componentes visuais e adaptação das páginas a diferentes tamanhos de tela;
- **JSON:** comunicação entre os scripts PHP e o JavaScript nas consultas dinâmicas.

## 🗃️ Banco de dados

O banco de dados foi organizado em entidades relacionadas que representam as principais informações utilizadas pela aplicação.

| Tabela | Finalidade |
|---|---|
| `Pessoa` | Armazena os dados pessoais compartilhados por funcionários e pacientes. |
| `Funcionario` | Registra dados profissionais e a senha de acesso dos funcionários. |
| `Medico` | Complementa o cadastro do funcionário com especialidade e CRM. |
| `Paciente` | Armazena peso, altura e tipo sanguíneo do paciente. |
| `Endereco` | Registra CEP, logradouro, cidade e estado de uma pessoa. |
| `Agenda` | Armazena as consultas, incluindo paciente, data, horário e médico responsável. |

A estrutura utiliza chaves primárias, chaves estrangeiras e relacionamentos entre as tabelas para manter a associação entre pessoas, funcionários, médicos, pacientes, endereços e agendamentos.

## 🔐 Autenticação e segurança

O projeto implementa diferentes mecanismos para proteger os dados e a área administrativa:

- armazenamento de senhas por meio de `password_hash`;
- verificação das credenciais com `password_verify`;
- consultas preparadas com PDO;
- desativação da emulação de prepared statements;
- controle de acesso por sessão;
- cookie de sessão configurado como `HttpOnly`;
- transações nas operações que inserem dados em várias tabelas;
- tratamento de falhas com confirmação ou reversão da transação;
- escape de dados exibidos nas listagens;
- redirecionamento de usuários não autenticados para a página de login.

## 📁 Estrutura do projeto

```text
clinica-medica-ufu/
├── .vscode/
├── PublicoGeral/
│   ├── Agendamento/
│   │   ├── agendarConsulta.php
│   │   ├── cadastra-agendamento.php
│   │   ├── horarios-disponiveis.php
│   │   └── medicos-por-especialidade.php
│   ├── Galeria/
│   │   └── Galeria.html
│   ├── Home/
│   │   └── Home.html
│   ├── Login/
│   │   ├── login.html
│   │   ├── logout.php
│   │   ├── realizarLogin.php
│   │   └── redirecionamentoLogin.js
│   ├── css/
│   ├── imagens/
│   └── conexaoMysql.php
├── PublicoRestrito/
│   ├── Cadastros/
│   │   ├── cadastroFuncionario.php
│   │   ├── cadastroPaciente.php
│   │   ├── cadastraFunc.php
│   │   ├── cadastra-pac.php
│   │   ├── baseEndereco.php
│   │   └── script.js
│   ├── Dados/
│   │   ├── agendamentos/
│   │   ├── endereco/
│   │   ├── funcionarios/
│   │   ├── meusAgendamentos/
│   │   ├── pacientes/
│   │   ├── dados.php
│   │   └── redirecionamento.js
│   ├── css/
│   ├── imagens/
│   ├── conexaoMysql.php
│   ├── criarAdmin.php
│   ├── homeRestrito.php
│   └── sessionVerification.php
├── Sql/
├── index.php
├── tabelas.sql
└── README.md
```

### Organização das áreas

- `PublicoGeral`: páginas que podem ser acessadas por visitantes, incluindo home, galeria, agendamento e login;
- `PublicoRestrito`: painel interno protegido por autenticação;
- `Cadastros`: formulários e scripts responsáveis pela inclusão de funcionários e pacientes;
- `Dados`: classes, consultas e páginas de listagem;
- `css`: estilos separados conforme a finalidade das páginas;
- `imagens`: recursos visuais utilizados pela interface;
- `tabelas.sql`: criação da estrutura relacional do banco de dados;
- `index.php`: ponto inicial que encaminha o visitante para a página pública.

## 🚀 Como executar

### Pré-requisitos

Para executar o projeto localmente, é necessário possuir:

- servidor web com suporte a PHP;
- MySQL ou MariaDB;
- navegador atualizado;
- ambiente local como XAMPP, WampServer, MAMP ou uma configuração equivalente.

### Configuração

1. Coloque a pasta do projeto no diretório servido pelo seu ambiente PHP.
2. Crie um banco de dados no MySQL.
3. Execute o arquivo `tabelas.sql` para criar as tabelas necessárias.
4. Configure os dados de conexão nos arquivos:
   - `PublicoGeral/conexaoMysql.php`;
   - `PublicoRestrito/conexaoMysql.php`.
5. Inicie o servidor web e o serviço do banco de dados.
6. Acesse a pasta do projeto pelo navegador. O arquivo `index.php` encaminhará a aplicação para a página inicial.
7. Quando necessário, utilize o script `PublicoRestrito/criarAdmin.php` apenas para inicializar o primeiro acesso administrativo.

> **Importante:** depois da criação inicial do administrador, remova ou desative o arquivo `criarAdmin.php`, altere as credenciais padrão e não mantenha senhas ou dados reais de conexão diretamente no código. Em uma implantação, prefira variáveis de ambiente.

## 🧩 Decisões de implementação

### Agendamento dinâmico

A tela de agendamento utiliza requisições assíncronas para consultar o servidor sem recarregar toda a página. A especialidade escolhida filtra a lista de médicos e, posteriormente, a combinação de médico e data determina os horários indisponíveis.

### Cadastros relacionados

Funcionários e pacientes compartilham informações da tabela `Pessoa`. Por isso, os cadastros utilizam transações para inserir os dados pessoais e, em seguida, registrar as informações específicas nas tabelas correspondentes.

No cadastro de um médico, a aplicação também inclui especialidade e CRM na tabela `Medico`.

### Controle de acesso

O login consulta o funcionário pelo e-mail, verifica a senha armazenada e cria a sessão utilizada pelas páginas internas. As rotas restritas verificam essa sessão antes de exibir o conteúdo.

### Consultas administrativas

As páginas da área interna recuperam os registros do banco e os apresentam em tabelas separadas por categoria. Médicos autenticados também possuem uma consulta específica que utiliza o e-mail da sessão para localizar apenas os agendamentos relacionados ao profissional.





