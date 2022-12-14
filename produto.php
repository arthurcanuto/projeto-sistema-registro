<?php require_once("connection.php"); ?>
<?php if(isset( $_SESSION['nome_usuario']) ): ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content=""width=device-width, initial-scale="1.0">
    <title> Registro de Pedidos 1.0</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <div class="container">
<!-- tela para digitar o pedido -->
        <form action="cadastrar_produto.php" method="POST">
            <br>
        <h2>Escolha de Itens do Pedido</h2>
            <br>
            <div class="form-group">
            <label for="nome_produto">Nome do Produto:</label>
            <input type="text" required class="form-control" name="nome_produto" id="nome_produto" placeholder="Digite o Nome do Produto">
        </div>
            <div class="form-group">
            <label for="categoria_produto">Categoria:</label>
            <input type="text" required class="form-control" name="categoria_produto" id="categoria_produto" placeholder="Digite a Categoria do Produto">
        </div>
            <div class="form-group">
            <label for="preco_produto">Preço Unitário(R$):</label>
            <input type="number" required step=".01" class="form-control" name="preco_produto" id="preco_produto" placeholder="Digite o Valor do Produto">
        </div>
            <div class="form-group">
            <label for="foto_produto">Foto do Produto </label>
            <input type="file" class="form-control" name="foto_produto" id="foto_produto">
        </div>
        <div class="form-group">
            <label for="info_produto">Informações adicionais:</label>
            <textarea class="form-control" name="info_produto" id="info_produto" rows="4" cols="50"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Adicionar item</button>
            </br></br>
        <?php if(isset($resultado)): ?>
            <div class="alert <?=$resultado["style"]?> ">
            <?php echo $resultado["msg"]; ?>
            <?php endif; ?>
        </div>  
        </form>
        <br/>
        <?php include("selecionar_produtos.php"); ?>
        <?php if(count($produtos) > 0): ?>
        <h4>Produtos Cadastrados</h4>
        <table class="table">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Foto</th>
                    <th>Nome</th>
                    <th>Categoria</th>
                    <th>Valor</th>
                    <th>Informação Adicional</th> 
                    <th>Data Hora</th>
                    <th></th>                   
                </tr>
                <?php foreach($produtos as $p): ?>
                <tr>
                    <td><?= $p["IdProduto"]; ?></td>
                    <td><?= $p["foto"]; ?></td>
                    <td><?= $p["nome"]; ?></td>
                    <td><?= $p["categoria"]; ?></td>
                    <td><?= $p["valor"]; ?></td>
                    <td><?= $p["info_adicional"]; ?></td>
                    <td><?= $p["data_hora"]; ?></td>
                    <td>
                        <a class="btn btn-outline-warning btn-sm" href="produto_form_alterar.php?IdProduto=<?=$p['IdProduto']?>">Alterar</a>
                        <a class="btn btn-outline-danger btn-sm" onclick="confirm('Remover <?=$p['nome'];?>?');" href="remover_produtos.php?IdProduto=<?=$p['IdProduto']?>">Remover</a>
                    </td>     
                </tr>
                <?php endforeach; ?>
            </thead>
        </table>
        <?php endif; ?>
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
