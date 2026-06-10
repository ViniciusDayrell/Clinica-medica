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




