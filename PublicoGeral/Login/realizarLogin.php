<?php
class RequestResponse
{
  public $success;
  public $detail;

  function __construct($success, $detail)
  {
    $this->success = $success;
    $this->detail = $detail;
  }
}


function checkLogin($pdo, $email, $senha){

  // *** ALTERAÇÃO IMPORTANTE: Consulta modificada para buscar apenas o hash da senha ***
  // *** Não podemos comparar hash com texto puro diretamente no SQL ***
  $sql = <<<SQL
    SELECT Funcionario.SenhaHash
    FROM Funcionario
    INNER JOIN Pessoa ON Funcionario.Codigo = Pessoa.Codigo
    WHERE Pessoa.Email = ?
  SQL;

  $stmt = $pdo->prepare($sql);
  $stmt->execute([$email]);
  
  // *** ALTERAÇÃO IMPORTANTE: Busca o hash do banco e verifica com password_verify() ***
  $row = $stmt->fetch(PDO::FETCH_ASSOC);
  
  // Verifica se encontrou o usuário E se a senha está correta
  if ($row && password_verify($senha, $row['SenhaHash'])) {
    return true; // Se encontrou um funcionário e a senha está correta, retorna true
  } else {
    return false; // Se não encontrou nenhum funcionário ou senha errada, retorna false
  }
}

require "../conexaoMysql.php";
$pdo = mysqlConnect();

$email = $_POST["email"] ?? '';
$senha = $_POST["senha"] ?? '';

// Configurações de segurança para o cookie da sessão.
if (checkLogin($pdo, $email, $senha)){
  $cookieParams = session_get_cookie_params();
  $cookieParams['httponly'] = true; // Protege contra ataques XSS.
  session_set_cookie_params($cookieParams);

  // Inicializa a sessão
  session_start();
  $_SESSION['loggedIn'] = true;
  $_SESSION['user'] = $email;

  $response = new RequestResponse(true, '../../PublicoRestrito/homeRestrito.php');
}
else
  $response = new RequestResponse(false, '');
header('Content-type: application/json');
echo json_encode($response);