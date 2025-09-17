<?php

require "../conexaoMysql.php";
$pdo = mysqlConnect();

$sql = 'SELECT Nome FROM Pessoa INNER JOIN Medico ON Pessoa.Codigo = Medico.Codigo';
$stmt = $pdo->query($sql);
$medicos = $stmt->fetchAll();

$sql2 = 'SELECT DISTINCT Especialidade FROM Medico';
$stmt2 = $pdo->query($sql2);
$especialidades = $stmt2->fetchAll();
?>

<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial scale=1">
    <meta name="description" content="Página Principal da Clínica">
    <link rel="stylesheet" href="../css/stylePadrao.css">
    <link rel="stylesheet" href="../css/styleForms.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Clínica Médica COMP</title>
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
                    <a class="nav-link" href="../Home/Home.html">Home</a>
                    <a class="nav-link" href="../Galeria/Galeria.html">Galerias</a>
                    <a class="nav-link" href="../Agendamento/agendarConsulta.php">Agendamentos</a>
                </div>
                
                <div class="navbar-nav">
                    <a id="login-link" class="nav-link" href="../Login/login.html">Login</a>
                </div>
            </div>
        </div>
    </nav>

    <main class="container mt-5">
        <h2>Agendamento</h2>

        <form name="consulta" action="cadastra-agendamento.php" method="post" class="row g-4">
            <fieldset>
                <legend>Dados Pessoais</legend>

                <div class="col-md-6">
                    <label for="nome" class="form-label">Nome:</label>
                    <input type="text" id="nome" class="form-control" name="nome" minlength="2" maxlength="50" autofocus>
                    <span></span>
                </div>
                <div class="col-md-6">
                    <label for="email" class="form-label">E-mail:</label>
                    <input type="email" id="email" class="form-control" name="email">
                    <span></span>
                </div>
                <div class="col-md-3">
                    <label for="sexo"  class="form-label">Sexo:</label>
                    <select id="sexo" name="sexo" class="form-select">
                        <option value="" selected>Selecione</option>
                        <option value="Masculino">Masculino</option>
                        <option value="Feminino">Feminino</option>
                    </select>
                </div>
            </fieldset>

            <fieldset>
                <div class="col-md-6">
                    <!--Verificar por que o foreach repete duas vezes a especialidade-->
                    <label for="especialidade" class="form-label"> Especialidade médica:</label>
                    <select name="especialidade" id="especialidade" class="form-select">
                        <option value="" selected>Selecione</option>
                        <?php foreach ($especialidades as $especialidade): ?>
                            <option value="<?= $especialidade['Especialidade']; ?>"><?= $especialidade['Especialidade']; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="nomeMed" class="form-label">Nome médico:</label>
                    <select name="nomeMed" id="nomeMed" class="form-select">
                        <option value="" selected>Selecione</option>
                        <?php foreach ($medicos as $medico): ?>
                            <option value="<?= htmlspecialchars($medico['Nome'], ENT_QUOTES, 'UTF-8'); ?>">
                                <?= htmlspecialchars($medico['Nome'], ENT_QUOTES, 'UTF-8'); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="data" class="form-label">Data consulta:</label>
                    <input type="date" id="data" name="data" class="form-control">
                </div>
                <div class="col-md-3">
                    <!--Adicionar horario ao banco de dados-->
                    <label for="horario" class="form-label">Horário:</label>
                    <select name="horario" id="horario" class="form-select">
                        <option value="" selected>Selecione</option>
                        <option value="08:00:00">8:00</option>
                        <option value="09:00:00">9:00</option>
                        <option value="10:00:00">10:00</option>
                        <option value="11:00:00">11:00</option>
                        <option value="12:00:00">12:00</option>
                        <option value="13:00:00">13:00</option>
                        <option value="14:00:00">14:00</option>
                        <option value="15:00:00">15:00</option>
                        <option value="16:00:00">16:00</option>
                        <option value="17:00:00">17:00</option>
                    </select>
                </div>
            </fieldset>

            <!-- Possivel erro por conta da div-->
            <div class="col-12 justify-content-center d-flex">
                <button type="submit" id="botao" class="btn btn-primary">Agendar</button>
            </div>
        </form>

    </main>

    <footer>
        <address>Avenida João Naves de Ávila 2121, Santa Mônica, Uberlândia</address>
    </footer>

    <script>
        async function carregarHorarios() {
            try {
                const selectEspecialidade = document.querySelector("#especialidade");
                const selectMedico = document.querySelector("#nomeMed");
                const data = document.querySelector("#data");
                const response = await fetch(`horarios-disponiveis.php?especialidade=${selectEspecialidade.value}&nomeMed=${selectMedico.value}&data=${data.value}`);
                if (!response.ok) {
                    throw new Error(`HTTP error! status: ${response.status}`);
                }
                const horariosIndisponiveis = await response.json();

                const selectHorario = document.querySelector("#horario");
                selectHorario.innerHTML = '';
                for (let horario of horarios) {
                    if (!horariosIndisponiveis.some(horarioIndisponivel => horarioIndisponivel.Horario === horario.value)) {
                        selectHorario.appendChild(horario.cloneNode(true));
                    }
                }
            } catch (e) {
                alert(e);
            }
        }

        async function carregarMedicos() {
            try {
                const selectEspecialidade = document.querySelector("#especialidade");
                const response = await fetch(`medicos-por-especialidade.php?especialidade=${selectEspecialidade.value}`);
                if (!response.ok) {
                    throw new Error(`HTTP error! status: ${response.status}`);
                }
                const medicosDisponiveis = await response.json();

                const selectMedico = document.querySelector("#nomeMed");

                // Remove all options that are not the "Selecione" option
                for (let i = selectMedico.options.length - 1; i >= 0; i--) {
                    if (selectMedico.options[i].value !== '') {
                        selectMedico.remove(i);
                    }
                }

                for (let medico of medicos) {
                    if (medicosDisponiveis.some(medicoDisponivel => medicoDisponivel.Nome === medico.value)) {
                        selectMedico.appendChild(medico.cloneNode(true));
                    }
                }
            } catch (e) {
                alert(e);
            }
        }

        window.onload = function () {
            const selectHorario = document.querySelector("#horario");
            horarios = Array.from(selectHorario.options);

            const selectMedico = document.querySelector("#nomeMed");
            medicos = Array.from(selectMedico.options);

            const selectEspecialidade = document.querySelector("#especialidade");
            const inputMedico = document.getElementById('nomeMed');
            const inputData = document.getElementById('data');

            inputMedico.onchange = () => carregarHorarios();
            inputData.onchange = () => carregarHorarios();
            selectEspecialidade.onchange = () => carregarMedicos();
        };
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>


</html>