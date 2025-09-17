<?php

require "../conexaoMysql.php";
$pdo = mysqlConnect();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

// Resgata os dados de Pessoa
$nome = $_POST["nome"] ?? "";
$sexo = $_POST["sexo"] ?? "";
$email = $_POST["email"] ?? "";
$telefone = $_POST["telefone"] ?? "";
$cep = $_POST["cep"] ?? "";
$logradouro = $_POST["logradouro"] ?? "";
$cidade = $_POST["cidade"] ?? "";
$estado = $_POST["estado"] ?? "";

// Resgata os dados de Paciente
$peso = $_POST["peso"] ?? "";
$altura = $_POST["altura"] ?? "";
$tipo_sanguineo = $_POST["tipo_sanguineo"] ?? "";

}

// --- INSERÇÕES NO BANCO DE DADOS ---

try {
  $pdo->beginTransaction();

  $sql = <<<SQL
  INSERT INTO Pessoa (Nome, Sexo, Email, Telefone)
  VALUES (?, ?, ?, ?)
  SQL;

  $stmt = $pdo->prepare($sql);
  $stmt->execute([$nome, $sexo, $email, $telefone]);
  $codNovoPaciente = $pdo->lastInsertId();
  
  // Insere dados na tabela Endereco
  $sql = <<<SQL
  INSERT INTO Endereco (Codigo, CEP, Logradouro, Cidade, Estado)
  VALUES (?, ?, ?, ?, ?)
  SQL;
  $stmt = $pdo->prepare($sql);
  $stmt->execute([$codNovoPaciente, $cep, $logradouro, $cidade, $estado]);

  // Insere dados na tabela Paciente
  $sql = <<<SQL
  INSERT INTO Paciente (Peso, Altura, TipoSanguineo, Codigo)
  VALUES (?, ?, ?, ?)
  SQL;
  $stmt = $pdo->prepare($sql);
  $stmt->execute([$peso, $altura, $tipo_sanguineo, $codNovoPaciente]);
  

  // --- FIM DAS INSERÇÕES NO BANCO DE DADOS ---

  // Efetiva as operações
  $pdo->commit();
  echo "Cadastro realizado com sucesso!";
  header("location: cadastroPaciente.php");
  exit();
} catch (PDOException $e) {
  
  /* $pdo->rollBack();
    if ($stmt1->errorInfo()[1] === 1062) {
      exit('Dados duplicados: ' . $e->getMessage());
    } else {
      exit('Falha ao cadastrar os dados do Paciente: ' . $e->getMessage());
      } */
     
  $pdo->rollBack();
  echo "Erro: " . $e->getMessage();
}
?>
