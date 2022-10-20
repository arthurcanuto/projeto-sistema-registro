<?php
require_once("connection.php");

if(!empty($_POST['email']) and !empty($_POST['senha'])){

  // 1. Pegar valores do formulario
  $email = $_POST['email'];
  $senha = $_POST['senha'];

  // Conexao realizada com sucesso
  $consulta = $conn->prepare('SELECT IdUsuario FROM usuario where email=:email AND senha=md5(:senha)');
  $consulta->bindParam(':email', $email, PDO::PARAM_STR);
  $consulta->bindParam(':senha', $senha, PDO::PARAM_STR);
  $consulta->execute();
  // set the resulting array to associative
  $result = $consulta->fetchAll();
  $qnt_usuarios = count($result);
  if($qnt_usuarios == 1){
    // TODO substituir pelo redirecionamento
      $resultado["msg"] = "Usuário encontrado!";
      $resultado["cod"] = "Usuário não encontrado!";
  } else if($qnt_usuarios == 0){
      $resultado["msg"] = "E-mail ou senha não conferem...";
      $resultado["cod"] = 0;
  }
}
  $conn = null;
  include("index.php");
// 3. Verificar se email e senha estão no BD
