<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial scale=1">
    <meta name="description" content="Página de Cadastro para Pacientes">
    <link rel="stylesheet" href="../../PublicoGeral/css/stylePadrao.css">
    <link rel="stylesheet" href="../../PublicoGeral/css/styleForms.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Clínica Médica COMP - Página de Cadastro para Pacientes</title>
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
                    <a class="nav-link" href="../homeRestrito.php">Home</a>
                    <a class="nav-link" href="../Cadastros/cadastroFuncionario.php">Cadastro de Funcionarios</a>
                    <a class="nav-link" href="../Dados/dados.php">Listagem de Dados</a>
                </div>

                <div class="navbar-nav">
                    <a id="login-link" class="nav-link" href="../../PublicoGeral/Login/logout.php">SAIR</a>
                </div>
            </div>
        </div>
    </nav>

    <main>
        <form action="cadastra-pac.php" method="post" class="row g-4">
            <h2>Cadastro de Pacientes</h2>
            <fieldset>
                <legend>DADOS NECESSÁRIOS</legend>

                <div>
                    <label for="nome" class="form-label">Nome completo</label>
                    <input type="text" class="form-control" id="nome" name="nome" required>
                </div>
                <div>
                    <label for="sexo">Sexo</label>
                    <select class="form-control" id="sexo" name="sexo" required>
                        <option value="" selected disabled hidden>Selecione o sexo</option>
                        <option value="masculino">Masculino</option>
                        <option value="feminino">Feminino</option>
                    </select>
                </div>
                <div>
                    <label for="email" class="form-label">E-mail</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div>
                    <label for="telefone" class="form-label">Telefone</label>
                    <input type="tel" class="form-control" id="telefone" name="telefone" pattern="\d{10,11}"
                        required>
                </div>
                <div>
                    <label for="cep" class="form-label">CEP</label>
                    <input type="text" class="form-control" id="cep" name="cep" pattern="\d{5}-\d{3}" required>
                </div>
                <div>
                    <label for="logradouro" class="form-label">Logradouro</label>
                    <input type="text" class="form-control" id="logradouro" name="logradouro" required>
                </div>
                <div>
                    <label for="cidade" class="form-label">Cidade</label>
                    <input type="text" class="form-control" id="cidade" name="cidade" required>
                </div>
                <div>
                    <label for="estado" class="form-label">Estado</label>
                    <select class="form-control" id="estado" name="estado" required>
                        <option value="">Selecione</option>
                        <option value="AC">Acre</option>
                        <option value="AL">Alagoas</option>
                        <option value="AP">Amapá</option>
                        <option value="AM">Amazonas</option>
                        <option value="BA">Bahia</option>
                        <option value="CE">Ceará</option>
                        <option value="DF">Distrito Federal</option>
                        <option value="ES">Espírito Santo</option>
                        <option value="GO">Goiás</option>
                        <option value="MA">Maranhão</option>
                        <option value="MT">Mato Grosso</option>
                        <option value="MS">Mato Grosso do Sul</option>
                        <option value="MG">Minas Gerais</option>
                        <option value="PA">Pará</option>
                        <option value="PB">Paraíba</option>
                        <option value="PR">Paraná</option>
                        <option value="PE">Pernambuco</option>
                        <option value="PI">Piauí</option>
                        <option value="RJ">Rio de Janeiro</option>
                        <option value="RN">Rio Grande do Norte</option>
                        <option value="RS">Rio Grande do Sul</option>
                        <option value="RO">Rondônia</option>
                        <option value="RR">Roraima</option>
                        <option value="SC">Santa Catarina</option>
                        <option value="SP">São Paulo</option>
                        <option value="SE">Sergipe</option>
                        <option value="TO">Tocantins</option>
                    </select>
                </div>
                <div>
                    <label for="peso" class="form-label">Peso</label>
                    <div class="input-group">
                        <input type="text" class="form-control" id="peso" name="peso" placeholder="Escreva em KG"
                            required>
                    </div>
                </div>
                <div>
                    <label for="altura" class="form-label">Altura</label>
                    <div class="input-group">
                        <input type="text" class="form-control" id="altura" name="altura"
                            placeholder="Escreva em CM" required>
                    </div>
                </div>
                <div>
                    <label for="tipo_sanguineo" class="form-label">Tipo sanguíneo</label>
                    <select class="form-control" id="tipo_sanguineo" name="tipo_sanguineo" required>
                        <option value="">Selecione</option>
                        <option value="A+">A+</option>
                        <option value="A-">A-</option>
                        <option value="B+">B+</option>
                        <option value="B-">B-</option>
                        <option value="AB+">AB+</option>
                        <option value="AB-">AB-</option>
                        <option value="O+">O+</option>
                        <option value="O-">O-</option>
                    </select>
                </div>

                <div>
                    <button type="submit" class="btn btn-primary" id="botao">Cadastrar</button>
                </div>
            </fieldset>
        </form>
    </main>

    <footer class="foot">
        <address>Avenida João Naves de Ávila 2121, Santa Mônica, Uberlândia</address>
    </footer>

    <script>
        /*É chamada quando o usuário digita um CEP.
        Se o CEP tiver 9 dígitos faz uma requisição AJAX com XMLHttpRequest para baseEndereco.php.
        O PHP responde com JSON contendo cidade_base, logradouro_base e estado_base.
        O script preenche automaticamente os campos do formulário (logradouro, cidade, estado). */
        function buscaCidade(cep) {

            if (cep.length != 9) return;

            let xhr = new XMLHttpRequest();
            xhr.open("GET", "baseEndereco.php?cep=" + cep);

            xhr.onload = function() {
                if (xhr.status === 200) {
                    var responseData = JSON.parse(xhr.responseText);

                    // Definindo os valores dos elementos com base na resposta do servidor
                    document.querySelector("#logradouro").value = responseData.logradouro_base;
                    document.querySelector("#cidade").value = responseData.cidade_base;

                    var estadoSelect = document.getElementById("estado");

                    // Iterando sobre as opções para encontrar a correspondente ao valor desejado
                    for (var i = 0; i < estadoSelect.options.length; i++) {
                        if (estadoSelect.options[i].value === responseData.estado_base) {
                            // Definindo a opção como selecionada
                            estadoSelect.options[i].selected = true;
                            break; // Saindo do loop, pois já encontramos e selecionamos a opção desejada
                        }
                    }
                } else {
                    console.error('Erro ao carregar dados do servidor.');
                }
            };
            xhr.onerror = function() {
                console.log("Erro de rede");
            };

            xhr.send();
        }

        window.onload = function() {
            const inputCep = document.querySelector("#cep");
            inputCep.onkeyup = () => buscaCidade(inputCep.value);
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="script.js"></script>

</body>

</html>