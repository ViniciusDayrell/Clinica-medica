<?php
session_start();
?>


<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial scale=1">
  <meta name="description" content="Clínica Comp - Funcionários">
  <title>COMP - dados</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="../css/stylePadrao.css">
  <link rel="stylesheet" href="../css/styleDados.css">
</head>

<body>
  <header>
    <div>
      <div class="item_header">
        <img src="../imagens/logo1.png" alt="Logo Clínica" id="logo">
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
          <a class="nav-link" href="../Cadastros/cadastroFuncionario.php">Cadastro de Funcionarios</a>
          <a class="nav-link" href="../Cadastros/cadastroPaciente.php">Cadastro de Pacientes</a>
          <a class="nav-link" href="../homeRestrito.php">Home</a>
        </div>

        <div class="navbar-nav">
          <a id="login-link" class="nav-link" href="../../PublicoGeral/Login/logout.php">SAIR</a>
        </div>
      </div>
    </div>
  </nav>

  <main>
    <div class="conteiner2">
      <label for="selecione" class="form-label">Selecione a opção desejada:</label>
      <select name="opc" id="selecione" class="form-select">
        <option value="" selected>Selecione</option>
        <option value="funcionarios/mostra-func.php">Funcionarios Cadastrados</option>
        <option value="pacientes/mostra-pac.php">Pacientes Cadastrados</option>
        <option value="endereco/mostra-enderecos.php">Endereços Auxiliares</option>
        <option value="agendamentos/mostra-agendamentos.php">Agendamentos realizados por
          clientes</option>
        <?php if (isset($_SESSION['is_doctor'])): ?>
          <option value="meusAgendamentos/mostra-agendamentos.php" id="campoMed">Meus Agendamentos</option>
        <?php endif; ?>
      </select>

      <button type="submit" id="btn">OK</button>
    </div>
  </main>

  <footer>
    <address>Avenida João Naves de Ávila 2121, Santa Mônica, Uberlândia</address>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="redirecionamento.js"></script>
</body>

</html>