<?php

if(count($_POST)> 0){
$nome= $_POST["nome_produto"];
$categoria = $_POST["categoria_produto"];
$valor = $_POST["preco_produto"];
$foto = $_POST["foto_produto"];
$info = $_POST["info_produto"];
$IdProduto = $_POST["cod_produto"];

    try{        
        require("connection.php");
        
    $sql = "UPDATE produto SET nome= ?, categoria= ?, valor= ?, info_adicional= ?, data_hora = now() WHERE IdProduto= ?" ;
    $stmt= $conn->prepare($sql);
    // To do pegar o codigo do usuario logado
    $stmt->execute([$nome, $categoria, $valor, $info, $IdProduto]); 
    
    $resultado["msg"] = "Item alterado com sucesso!";
    $resultado["cod"] = 1;
    $resultado["style"] = "alert-success";

    }catch(PDOException $e) {
        
    $resultado["msg"] = "Erro ao alterar o produto" . $e->getMessage();
    $resultado["cod"] = 0;
    $resultado["style"] = "alert-danger";
    }  
$conn = null;
header("location: produto.php");
}

?>