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
$password = "Vacapreta123!@#";
    {
    require_once("./config/connection.php");
    
    $sql = "INSERT INTO item_pedido (IdUsuario, nome_produto, observacao, preco_und, quantidade) VALUES (?,?,?,?,?)";
    $stmt= $conn->prepare($sql);
    // To do pegar o codigo do usuario logado
    $stmt->execute([null, $nome, $obs, $preco, $qtd]);
    
    // TODO substituir pelo redirecionamento
      $resultado["msg"] = "Item inserido!";
      $resultado["cod"] = 1;
      
      $resultado["msg"] = "Item não inserido";
      $resultado["cod"] = 0;   
    } 
  $conn = null;