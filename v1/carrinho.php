<?php
    session_start();
    require "model/produto.php";
?>
<html>
    <head>
        <meta charset="utf-8">
        <title>Carrinho</title>
    </head>
    <body>
        <?php if($_GET["q"]==null) {?>
            <h3><a href="carrinho.php?q=1">Lista</a></h3>
        <?php } ?>
        <?php 
            if($_GET["q"]=="1"){ ?>
                <h5>Se você sair, vai perder as informações do carrinho.</h5>
                <br>
                <p>Deseja sair assim mesmo?</p><br><br>
                <h4><a href="lista.php">Sim</a></h4>
                <br><br>
                <h4><a href="carrinho.php">Não</a></h4>
        <?php } ?>
        
        <?php 
           if($_SESSION["url"] == "lista.php"){
                $produtos = unserialize($_SESSION["produtos"]);
                $numbers = array();
                $i=0;
            
                while($i < sizeof($produtos)){
                    $a=(string) $i;
                
                    $palavra = "produto" . $a;
                    if($_GET[$palavra] != null){
                        array_push($numbers, $_GET[$palavra]);
                    }
                
                    $i++;
                }
           }
           
        ?>
        <?php 
            if($_SESSION["cli_sessao"]=="1"){
        ?>
            <br><br>
            <a href="../sair.php?s=1">Sair</a>
            <br><br>
        <?php
            }
        ?>
        <br>
        <center><h3>Carrinho de Compras</h3></center>
        <br><br>
        <?php
            if($_SESSION["url"]=="lista.php"){
                
                $produtos_comprados = array();
            
                foreach($numbers as $number){
                    $a = (int) $number;
                    array_push($produtos_comprados, $produtos[$a]);
                }
            
                $_SESSION["carrinho"] = serialize($produtos_comprados);
            
            }
        ?>
        <br>
        <form method="GET" action="../cliente/checkExclusaoCarrinho.php">
        <table>
            <tr>
                <td><b>Nome</b></td>
                <td><b>Preço</b></td>
                <td><b>Imagem</b></td>
                <?php if($_SESSION["cli_sessao"]=="1"){ ?>
                <td><b>Excluir</b></td>
                <?php } ?>
            </tr>
            <?php
                $produtos_comprados = unserialize($_SESSION["carrinho"]);
                $preco_total = 0;
                $i=0;
                foreach($produtos_comprados as $prod){ 
            ?>
                <tr>
                    <td><?php echo $prod->get_nome(); ?></td>
                    <td><b><?php echo "R$ " . $prod->get_preco(); ?></b></td>
                    <td><img src="<?php echo $prod->get_img(); ?>" width="50"></td>
                    <?php if($_SESSION["cli_sessao"]=="1"){ ?>
                        <td><input type="checkbox" name="<?php echo "produto".$i; ?>" value="<?php echo $i; ?>"></td>
                    <?php } ?>
                </tr>
            <?php 
                    $preco_total += $prod->get_preco();
                    $i++;
                }
            ?>
        </table>
        <br>
        <?php if($_SESSION["cli_sessao"]=="1"){ ?>
            <input type="submit" value="Excluir">
        <?php } ?>
        </form>
        <br><br>
        <p>Preço Total: <b><?php echo "R$ " . $preco_total; ?></b></p>
        <br><br><br>
        <?php 
            if($_SESSION["cli_sessao"] == "0"){
        ?>        
            <h4><a href="cliente/clienteLogin.php">Clique aqui para finalizar a sua compra</a></h4>
        <?php
            }
        ?>
        
        <?php if($_SESSION["cli_sessao"] == "1") { ?>
        <div id="box_compra">
            <form action="cliente/checarconta.php" method="POST">
                <input type="text" placeholder="Banco" name="banco"><br>
                <input type="text" placeholder="Operação" name="operacao">
                <input type="text" placeholder="Agência" name="agencia">
                <input type="text" placeholder="Conta" name="conta">
                <br><br>
                <label>Senha</label>
                <input type="password" name="senha">
                <input type="hidden" name="total" value="<?php echo $preco_total; ?>">
                <br><br>
                <input type="submit" value="Comprar">
            </form>
        </div>
        <?php } ?>
    </body>
</html>
<?php
    $_SESSION["url"]="carrinho.php";
?>