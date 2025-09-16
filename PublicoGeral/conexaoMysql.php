<?php

function mysqlConnect()
{
  $db_host = "sql309.infinityfree.com";
  $db_username = "if0_39369784";
  $db_password = "jgfVBYCsQV";
  $db_name = "if0_39369784_clinmedica";

  $options = [
    PDO::ATTR_EMULATE_PREPARES => false, // desativa a execução emulada de prepared statements
  ];

  try {
    $pdo = new PDO("mysql:host=$db_host;dbname=$db_name;charset=utf8mb4", $db_username, $db_password, $options);
    return $pdo;
  } 
  catch (Exception $e) {
    exit('Ocorreu uma falha na conexão com o MySQL: ' . $e->getMessage());
  }
}
?>
