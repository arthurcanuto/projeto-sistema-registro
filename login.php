<?php

require_once("connection.php");

if(!empty($_POST['email']) and !empty($_POST['senha'])){

  // 1. Pegar valores do formulario
  $email = $_POST['email'];
  $senha = $_POST['senha'];

  // Conexao realizada com sucesso
  $consulta = $conn->prepare("SELECT * FROM usuario where situacao='Habilitado' AND email=:email AND senha=md5(:senha)");
  $consulta->bindParam(':email', $email, PDO::PARAM_STR);
  $consulta->bindParam(':senha', $senha, PDO::PARAM_STR);
  $consulta->execute();
  // set the resulting array to associative
  $r = $consulta->fetchAll();
  // echo "<prev>";
  // print_r($r);
  // echo "</prev>";
  // exit;
  $qnt_usuarios = count($r);
  if($qnt_usuarios == 1){
    // TODO substituir pelo redirecionamento

   $_SESSION["email_usuario"] = $email;
   $_SESSION["nome_usuario"] = $r[0]['Nome'];
   $_SESSION["codigo_usuario"] = $r[0]['IdUsuario'];
   header('location:pedido.php');
  // echo "<prev>";
  // print_r($_SESSION);
  // echo "</prev>";
  // exit;
  } else if($qnt_usuarios == 0){
      $resultado["msg"] = "E-mail ou senha não conferem...";
      $resultado["cod"] = 0;
  }
}
  $conn = null;
  include("index.php");
// 3. Verificar se email e senha estão no BD
