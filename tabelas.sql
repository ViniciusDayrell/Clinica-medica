-- ==============================================
-- Tabela de Funcionários (área restrita, login)
-- ==============================================
CREATE TABLE Funcionario (
    Id INT AUTO_INCREMENT PRIMARY KEY,
    Nome VARCHAR(100) NOT NULL,
    Email VARCHAR(100) UNIQUE NOT NULL,
    Senhahash VARCHAR(255) NOT NULL,
    EstadoCivil VARCHAR(20),
    DataNascimento DATE,
    Funcao VARCHAR(50) NOT NULL
);

-- ==============================================
-- Tabela de Médicos
-- ==============================================
CREATE TABLE Medico (
    Id INT AUTO_INCREMENT PRIMARY KEY,
    Nome VARCHAR(100) NOT NULL,
    Especialidade VARCHAR(100) NOT NULL,
    CRM VARCHAR(30) UNIQUE NOT NULL
);

-- ==============================================
-- Tabela de Pacientes (parte pública)
-- ==============================================
CREATE TABLE Paciente (
    Id INT AUTO_INCREMENT PRIMARY KEY,
    Nome VARCHAR(100) NOT NULL,
    Sexo ENUM('Masculino','Feminino','Outro') NOT NULL,
    Email VARCHAR(100) NOT NULL,
    Telefone VARCHAR(20) NOT NULL
);

-- ==============================================
-- Tabela de Agendamentos (ligando Paciente e Médico)
-- ==============================================
CREATE TABLE Agendamento (
    Id INT AUTO_INCREMENT PRIMARY KEY,
    DataHora DATETIME NOT NULL,
    IdMedico INT NOT NULL,
    IdPaciente INT NOT NULL,
    FOREIGN KEY (IdMedico) REFERENCES Medico(Id)
        ON DELETE CASCADE
        ON UPDATE CASCADE,
    FOREIGN KEY (IdPaciente) REFERENCES Paciente(Id)
        ON DELETE CASCADE
        ON UPDATE CASCADE
);

-- ==============================================
-- Tabela de Mensagens de Contato (parte pública)
-- ==============================================
CREATE TABLE Contato (
    Id INT AUTO_INCREMENT PRIMARY KEY,
    Nome VARCHAR(100) NOT NULL,
    Email VARCHAR(100) NOT NULL,
    Telefone VARCHAR(20),
    Mensagem TEXT NOT NULL,
    DataHora TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
