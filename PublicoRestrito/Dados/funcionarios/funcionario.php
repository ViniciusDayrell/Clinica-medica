<?php

class Funcionario
{
  public $nome;  
  public $dataContrato;
  public $Salario;
  public $Tipo;

  function __construct($nome, $dataContrato, $Salario, $Tipo)
  {
    $this->nome = $nome;
    $this->dataContrato = $dataContrato;
    $this->Salario = $Salario;
    $this->Tipo = $Tipo;
  }
  public static function GetData($pdo)
  {
    try {
      /*$sql = <<<SQL
      SELECT Nome, DataContrato, Salario
      FROM Pessoa JOIN Funcionario ON Funcionario.Codigo = Pessoa.Codigo
      LEFT JOIN Medico ON Funcionario.Codigo = Medico.Codigo
      SQL;*/

       $sql = <<<SQL
      SELECT Pessoa.Nome, Funcionario.DataContrato, Funcionario.Salario,
             CASE WHEN Medico.Codigo IS NOT NULL THEN 'Médico' ELSE 'Comum' END AS Tipo
      FROM Pessoa
      JOIN Funcionario ON Funcionario.Codigo = Pessoa.Codigo
      LEFT JOIN Medico ON Funcionario.Codigo = Medico.Codigo
      SQL;

      // Neste exemplo não é necessário utilizar prepared statements
      // porque não há a possibilidade de inj. de S-Q-L, 
      // pois nenhum parâmetro do usuário é utilizado na query SQL. 
      $stmt = $pdo->query($sql);

      $arrayFuncionarios = [];
      while ($row = $stmt->fetch()) {
        // Sanitiza os dados produzidos pelo usuário
        // que oferecem risco de X S S
        $nome = htmlspecialchars($row['Nome']);
        $dataContrato = htmlspecialchars($row['DataContrato']);
        $salario = htmlspecialchars($row['Salario']);
        $tipo = htmlspecialchars($row['Tipo'] ?? 'Comum');

        // Cria um novo objeto do tipo Cliente e adiciona
        // no final do array de clientes
        $novoFuncionario = new Funcionario(
            $nome,
            $dataContrato,
            $salario,
            $tipo
        );
        $arrayFuncionarios[] = $novoFuncionario;
      }
      return $arrayFuncionarios;
    } catch (Exception $e) {
      exit('Falha inesperada: ' . $e->getMessage());
    }
  }
}