<?php

if(count($_POST)> 0){
    $nome= $_POST["nome_produto"];
    $categoria = $_POST["categoria_produto"];
    $valor = $_POST["preco_produto"];
    $foto = $_POST["foto_produto"];
    $info = $_POST["info_produto"];
    
    try{        
        require("connection.php");
        
    $sql = "INSERT INTO produto (nome, categoria, valor, foto, info_adicional, codigo_usuario) VALUES (?,?,?,?,?,?)";
    $stmt= $conn->prepare($sql);
    // To do pegar o codigo do usuario logado
    $stmt->execute([$nome, $categoria, $valor, $foto, $info, null]); 

// TODO substituir pelo redirecionamento
    $resultado["msg"] = "Item inserido com sucesso!";
    $resultado["cod"] = 1;
    $resultado["style"] = "alert-success";
          
    }
    catch(PDOException $e) {
        
    $resultado["msg"] = "Inserção no banco de dados falhou" . $e->getMessage();
    $resultado["cod"] = 0;
    $resultado["style"] = "alert-success";
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
