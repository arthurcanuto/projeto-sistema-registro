<?php

    // 1. Pegar valores do formulario
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // 2. Conexao com banco de dados
    
$servername = "localhost";
$username = "root";
$password = "Vacapreta123!@#";

try {
  $conn = new PDO("mysql:host=$servername;dbname=Loja", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Conexão realizada com sucesso";
} catch(PDOException $e) {
  echo "Conexão falhou: " . $e->getMessage();
}
// Conexao realizada com sucesso
$stmt = $conn->prepare('SELECT codigo FROM usuario where email=:email AND senha=md5(:senha');
$stmt->bindParam(':email', $email, PDO::PARAM_STR);
$stmt->bindParam(':senha', $senha, PDO::PARAM_STR);
  $stmt->execute();
  // set the resulting array to associative
  $result = $stmt->fetchAll();
  print_r($result);
  $conn = null;
// 3. Verificar se email e senha estão no BD

?>