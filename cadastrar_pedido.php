<?php
// pegar valores do formulario
require_once("connection.php");


if(count($_POST) > 0){
  $nome= $_POST["nome_produto"];
  $qtd = $_POST["qnt_produto"];
  $obs = $_POST["obs_produto"];
  $preco = $_POST["preco_produto"];
  $codigo = $_SESSION["codigo_usuario"];

  try{     
      
    $sql = "INSERT INTO item_pedido (IdUsuario, nome_produto, observacao, preco_und, quantidade) VALUES (?,?,?,?,?)";
    $stmt= $conn->prepare($sql);
    // To do pegar o codigo do usuario logado
    $stmt->execute([$codigo, $nome, $obs, $preco, $qtd]);
    
    // TODO substituir pelo redirecionamento
    $resultado["msg"] = "Item inserido com sucesso!";
    $resultado["cod"] = 1;
    $resultado["style"] = "alert-success";
    
  }catch(PDOException $e) {
      
  $resultado["msg"] = "Inserção no banco de dados falhou" . $e->getMessage();
  $resultado["cod"] = 0;
  $resultado["style"] = "alert-danger";
  }
}  
      
  $conn = null;
  include("pedido.php");
