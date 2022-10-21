<?php require_once("connection.php"); ?>
<?php if(isset( $_SESSION['nome_usuario']) ): ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content=""width=device-width, initial-scale="1.0">
    <title> Alteração de Pedidos</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <div class="container">
    <?php 
    include("selecionar_produtos.php");
    $IdProduto = $_GET["IdProduto"];
     ?>
<!-- tela para digitar o pedido -->
        <form action="alterar_produto.php" method="POST">
            <br>
        <h2>Produto</h2>
            <br>
        <div class="form-group">
            <label for="cod_produto">Código do Produto:</label>
            <input type="text" required readonly value ="<?= $produtos[0]['IdProduto']; ?>" class="form-control" name="cod_produto" id="cod_produto">
        </div>
        <div class="form-group">
            <label for="nome_produto">Nome do Produto:</label>
            <input type="text" required value ="<?= $produtos[0]['nome']; ?>" class="form-control" name="nome_produto" id="nome_produto" placeholder="Digite o nome do Produto">
        </div>
        <div class="form-group">
            <label for="categoria_produto">Categoria:</label>
            <input type="text" required value="<?= $produtos[0]['categoria']; ?>"class="form-control" name="categoria_produto" id="categoria_produto" placeholder="Digite a Categoria do Produto">
        </div>
        <div class="form-group">
            <label for="preco_produto">Preço Unitário(R$):</label>
            <input type="number" required value="<?= $produtos[0]['valor']; ?>" step=".01" class="form-control" name="preco_produto" id="preco_produto" placeholder="Digite o Valor do Produto">
        </div>
        <div class="form-group">
            <label for="foto_produto">Foto do Produto </label>
            <input type="file" class="form-control" name="foto_produto" id="foto_produto">
        </div>
        <div class="form-group">
            <label for="info_produto">Informações adicionais:</label>
            <textarea class="form-control"value="<?= $produtos[0]['info_adicional']; ?>" name="info_produto" id="info_produto" rows="4" cols="50"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Alterar produto</button>
            </br></br> 
        </form>
        <?php if(isset($resultado)): ?>
            <div class="alert <?=$resultado["style"]?> ">
            <?php echo $resultado["msg"]; ?>
            <?php endif; ?>
        </div> 
        <br/>        
    </div>
        </br></br></br></br></br></br>
</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<?php else: ?>
    <div class="alert alert-danger <?=$resultado["style"]?> ">
        Você não está logado no sistema.
    </div>
<?php endif; ?>
</html>
