<?php 
    session_start();
    require "model/produto.php";
    $_SESSION["url"]="lista.php";
?>
<html>
    <head>
        <meta charset="utf-8">
        <title>Lista de Produtos</title>
    </head>
    <body>
        <?php 
            if($_SESSION["checkLogin"]=="1"){
        ?>
            <a href="sair.php?s=0">Sair</a>
            <br><br><br>
            <a href="administrativo/cadastro.php">Cadastrar Produtos</a>
            <br><br><br>
        <?php
            }
        ?>
        
        <?php 
            if($_SESSION["cli_sessao"]=="1"){
        ?>
            <a href="sair.php?s=1">Sair</a>
            <br><br><br>
        <?php 
            }
        ?>
        
        <br>
        
        <?php
            $produtos = unserialize($_SESSION["produtos"]);
            
            
            
            for($i = 0; $i < 2; $i++){
                echo "<br>";
            }
        ?>
        <form method="get" action="carrinho.php">
        <table>
            <tr>
                <td><center><b>Nome</b></center></td>
                <td><b>Preço</b></td>
                <td><b>Quantidade</b></td>
                <td><b>Imagem</b></td>
                <td><b>Comprar</b></td>
            </tr>
            
            <?php 
                $i=0;
                foreach($produtos as $produto){
            ?>
                <tr>
                    <td><?php echo $produto->get_nome(); ?></td>
                    <td><?php echo $produto->get_preco(); ?></td>
                    <td><center><?php echo $produto->get_qtde(); ?></center></td>
                    <td><img src="<?php echo $produto->get_img(); ?>" width="50"></td>
                    <td><input type="checkbox" name="<?php echo "produto" . $i; ?>" value="<?php echo $i; ?>"></td>
                </tr>
            <?php
                $i++;
                }
            ?>
        </table>
        <br><br>
        <input type="submit" value="Comprar">
        </form>
    </body>
</html>