<?php
// pegar valores do formulario

if(count($_POST)> 0){
    $nome= $_POST["nome_produto"];
    $qtd = $_POST["qnt_produto"];
    $obs = $_POST["obs_produto"];
    $preco = $_POST["preco_produto"];
}

$servername = "localhost";
$username = "root";
$password = "123456789";

    try{
        
    require_once("connection.php");
    
    $sql = "INSERT INTO item_pedido (IdUsuario, nome_produto, observacao, preco_und, quantidade) VALUES (?,?,?,?,?)";
    $stmt= $conn->prepare($sql);
    // To do pegar o codigo do usuario logado
    $stmt->execute([null, $nome, $obs, $preco, $qtd]);
    
    // TODO substituir pelo redirecionamento
      $resultado["msg"] = "Item inserido com sucesso!";
      $resultado["cod"] = 1;
      $resultado["style"] = "alert-success";
      
    }catch(PDOException $e) {
        
    $resultado["msg"] = "Inserção no banco de dados falhou" . $e->getMessage();
    $resultado["cod"] = 0;
    $resultado["style"] = "alert-success";
    }
      
  $conn = null;
  include("pedido.php");
