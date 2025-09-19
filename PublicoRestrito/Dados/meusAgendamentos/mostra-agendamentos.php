<?php
require __DIR__ . '/agendamentoMedico.php';
require __DIR__ . '/../../conexaoMysql.php';

$pdo = mysqlConnect();

session_start();
$email = $_SESSION['user'];

$arrayAgendamentosMedico = AgendamentoMedico::GetData($pdo, $email);
?>

<!doctype html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial scale=1">
  <meta name="description" content="Clínica Comp - Agendamentos">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="../../css/stylePadrao.css">
  <link rel="stylesheet" href="../../css/styleTabela.css">
  <title>Clínica Médica COMP - Agendamentos"></title>
</head>

<body>
  <header>
    <div>
      <div class="item_header">
        <img src="../../imagens/logo1.png" alt="Logo Clínica" id="logo">
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
          <a class="nav-link" href="../../homeRestrito.php">Home</a>
          <a class="nav-link" href="../../Cadastros/cadastroFuncionario.php">Cadastro de Funcionarios</a>
          <a class="nav-link" href="../../Cadastros/cadastroPaciente.php">Cadastro de Pacientes</a>
          <a class="nav-link" href="../../Dados/dados.php">Listagem de Dados</a>
        </div>

        <div class="navbar-nav">
          <a id="login-link" class="nav-link" href="../../../PublicoGeral/Login/logout.php">SAIR</a>
        </div>
      </div>
    </div>
  </nav>

  <div>
    <h3>Agendamentos</h3>
    <table class="table table-striped table-hover">
      <tr>
        <!--<th></th>-->
        <th>Nome</th>
        <th>Sexo</th>
        <th>Data</th>
        <th>Horario</th>
        <th>Codigo Medico</th>
      </tr>

      <?php
      foreach ($arrayAgendamentosMedico as $agendamentoMedico) {
        echo <<<HTML
          <tr>
            <!--<td></td>-->
            <td>$agendamentoMedico->nome</td> 
            <td>$agendamentoMedico->sexo</td>
            <td>$agendamentoMedico->data</td>
            <td>$agendamentoMedico->hora</td>
            <td>$agendamentoMedico->codigoMed</td>
          </tr>      
        HTML;
      }
      ?>

    </table>
    <p><a href="../dados.php">Voltar para os dados</a></p>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>