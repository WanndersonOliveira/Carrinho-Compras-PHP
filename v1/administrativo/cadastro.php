<?php 
    session_start();
?>
<html>
    <head>
        <meta charset="utf-8">
        <title>Cadastrar Produto</title>
    </head>
    <body>
        <?php 
            if($_SESSION["checkLogin"]=="1"){
        ?>
            <a href="../sair.php">Sair</a>
            <br><br><br>
        <?php
            }
        ?>
        <br>
        <h3>Cadastrar Produto</h3>
        <br><br>
        <form method="post" action="cadProd.php">
            <input type="text" name="nome" placeholder="Nome"><br>
            <input type="text" name="img" placeholder="Endereço de Imagem"><br>
            <input type="text" name="qtde" placeholder="Quantidade"><br>
            <input type="text" name="preco" placeholder="Preço"><br><br>
            <input type="submit" value="Cadastrar">
        </form>
    </body>
</html>