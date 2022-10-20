<?php

if(count($_GET)> 0){
    $cod_produto= $_GET["IdProduto"];

    try{        
        require("connection.php");
        
    $sql = "UPDATE produto SET situacao = 'Desabilitado' WHERE IdProduto = ?";
    $stmt= $conn->prepare($sql);
    // To do pegar o codigo do usuario logado
    $stmt->execute([$cod_produto]); 

// TODO substituir pelo redirecionamento
    $resultado["msg"] = "Item removido com sucesso!";
    $resultado["cod"] = 1;
    $resultado["style"] = "alert-success";
          
    }
    catch(PDOException $e) {
        
    $resultado["msg"] = "Erro ao remover do banco de dados" . $e->getMessage();
    $resultado["cod"] = 0;
    $resultado["style"] = "alert-danger";
    } 
try{
    // pegar os produtos armazenados no BD
    $consulta = $conn->prepare("SELECT * FROM produto");
    $consulta->execute();
    // set the resulting array to associative
    $produtos = $consulta->fetchAll(); 
}catch(PDOException $e) {        
    $resultado["msg"] = "Erro ao inserir produto no banco de dados falhou" . $e->getMessage();
    $resultado["cod"] = 0;
    $resultado["style"] = "alert-danger";
    }   
$conn = null;
}
include("produto.php");
?>
