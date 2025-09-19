<?php

require "../PublicoGeral/conexaoMysql.php";
require "sessionVerification.php";

session_start();
exitWhenNotLoggedIn();

$pdo = mysqlConnect();

$sql = <<<SQL
SELECT * FROM Medico m JOIN Pessoa p ON m.Codigo = p.Codigo WHERE p.Email = ?
SQL;

$stmt = $pdo->prepare($sql);
$stmt->execute([$_SESSION['user']]);
$user = $stmt->fetch();

if ($user) {
  $_SESSION['is_doctor'] = true;
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial scale=1">
    <meta name="description" content="Página Principal da Clínica">
    <link rel="stylesheet" href="../PublicoGeral/css/stylePadrao.css">
    <link rel="stylesheet" href="./css/styleHome.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Clínica Médica COMP</title>
</head>

<body>
  <header>
        <div>
            <div class="item_header">
                <img src="./imagens/logo1.png" alt="Logo Clínica" id="logo">
            </div>
        </div>
    </header>

  <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">

            <button class="btn navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <div class="navbar-nav me-auto">
                    <a class="nav-link" href="Cadastros/cadastroFuncionario.php">Cadastro de Funcionarios</a>
                    <a class="nav-link" href="Cadastros/cadastroPaciente.php">Cadastro de Pacientes</a>
                    <a class="nav-link" href="Dados/dados.php">Listagem de Dados</a>
                </div>
                
                <div class="navbar-nav">
                    <a id="login-link" class="nav-link" href="../PublicoGeral/Login/logout.php">SAIR</a>
                </div>
            </div>
        </div>
    </nav>

  <main>
    <h2>Área Restrita</h2>
    <h3>Bem Vindo, <?php echo $_SESSION['user'] ?>! Aqui você consegue:</h3>
    <ul>
      <li>Cadastrar Funcionários</li>
      <li>Cadastrar Paciente</li>
      <li>Ver Listagem de Dados</li>
    </ul>
    <a class="btnSair" href="../PublicoGeral/Login/logout.php">SAIR</a>
  </main>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>