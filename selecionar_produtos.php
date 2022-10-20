<?php
    $where_cod ="";
    if(isset ($IdProduto) && $IdProduto > 0){
        $where_cod = "AND IdProduto =".$_POST["cod_produto"];
    }
try{
    include("connection.php");
    // pegar os produtos armazenados no BD
    $consulta = $conn->prepare("SELECT * FROM produto WHERE situacao ='Habilitado'".$where_cod);
    $consulta->execute();
    // set the resulting array to associative
    $produtos = $consulta->fetchAll(); 


    }catch(PDOException $e) {       
    $resultado["msg"] = "Erro ao inserir produto no banco de dados falhou" . $e->getMessage();
    $resultado["cod"] = 0;
    $resultado["style"] = "alert-success";

    }   
    $conn = null;

?>