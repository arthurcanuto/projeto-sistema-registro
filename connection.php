<?php

// 2. Conexao com banco de dados
$servername = "localhost";
$username = "root";
$password = "Vacapreta123!@#";

try {
  $conn = new PDO("mysql:host=$servername;dbname=Loja", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}  catch(PDOException $e) {
    echo "Conexão falhou: " . $e->getMessage();
  }