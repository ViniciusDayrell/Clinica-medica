<?php
// *** PROTEÇÃO: Só executa se for acesso direto pelo navegador ***
if (basename(__FILE__) == basename($_SERVER['SCRIPT_FILENAME'])) {

    require "conexaoMysql.php";
    $pdo = mysqlConnect();

    // Verifica se já existe admin para não duplicar
    $sqlCheck = "SELECT COUNT(*) FROM Pessoa WHERE Email = 'admin@clinica.com'";
    $exists = $pdo->query($sqlCheck)->fetchColumn();

    if ($exists > 0) {
        die("Administrador já existe! Não é necessário criar novamente.");
    }

    // Dados do administrador
    $nome = "Administrador";
    $sexo = "Masculino";
    $email = "admin@clinica.com";
    $telefone = "(11) 99999-9999";
    $senha = "admin123"; // senha em texto puro
    $senhaHash = password_hash($senha, PASSWORD_DEFAULT); // faz o hash
    $dataAtual = date('Y-m-d'); // Data atual no formato MySQL

    // Inserir na tabela Pessoa
    $sqlPessoa = "INSERT INTO Pessoa (Nome, Sexo, Email, Telefone) VALUES (?, ?, ?, ?)";
    $stmt = $pdo->prepare($sqlPessoa);
    $stmt->execute([$nome, $sexo, $email, $telefone]);
    $codigo = $pdo->lastInsertId();

    // Inserir na tabela Funcionario
    $sqlFunc = "INSERT INTO Funcionario (Codigo, DataContrato, Salario, SenhaHash) VALUES (?, ?, 5000.00, ?)";
    $stmt = $pdo->prepare($sqlFunc);
    $stmt->execute([$codigo, $dataAtual, $senhaHash]);

    echo "Administrador criado com sucesso!<br>";
    echo "Email: $email<br>";
    echo "Senha: $senha<br>";
    echo "<br><strong> DELETE ESTE ARQUIVO POR SEGURANÇA!</strong>";
} else {
    die("Acesso negado!");
}
