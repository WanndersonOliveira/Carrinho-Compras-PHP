<?php 
    session_start();
    require "../model/conta.php";
    require "../model/produto.php";
?>
<html>
    <head>
        <meta charset="utf-8">
        <title>Carrinho de Compras</title>
    </head>
    <body>
        <?php    
        
    $carrinho = unserialize($_SESSION["carrinho"]);
    $conta = new Conta();
    
    $conta = unserialize($_SESSION["conta"]);
    $check = false;
    
    if($conta->check_senha($_POST["senha"]) == 1){
        if($_POST["banco"]==$conta->get_banco()){
            if($_POST["agencia"]==$conta->get_agencia() & $_POST["operacao"] == $conta->get_operacao()){
                if($_POST["conta"] == $conta->get_conta()){
                    if($conta->get_credito() >= $_POST["total"]){
                        $conta->set_credito(($conta->get_credito()-$_POST["total"]));
                        echo "Transação realizada com sucesso!";
                        sleep(5);
                        $check = true;
                        
                    } else {
                        echo "Transação não autorizada!";
                        sleep(5);
                        echo '<br><a href="../index.php">Voltar</a>';
                    }
                }
            }
        }
    } else {
        echo "Transação não autorizada.";
        sleep(5);
        echo '<br><a href="../index.php">Voltar</a>';
    }
    
?>
    <?php
        if($check == 1){ 
            $produtos = array();
            $produtos = unserialize($_SESSION["produtos"]);
            
            foreach($carrinho as $c){
                foreach($produtos as $p){
                    if($c->get_codigo()==$p->get_codigo()){
                        $qtde = $p->get_qtde();
                        $qtde--;
                        $p->set_qtde(qtde);
                    }
                    
                    if($p->get_qtde()==0){
                        $p=0;
                    }
                }
            }
            
            $novo = array();
            
            foreach($produtos as $p){
                if($p != 0){
                    array_push($novo,$p);
                }
            }
            
            $_SESSION["produtos"] = serialize($novo);
            
            for($i = 0; $i < 5; $i++){
                echo "<br>";
            }
            
            $total = 0;
            
            foreach($carrinho as $p){
                $total += $p->get_preco();
            }
    ?>
        <a href="../lista.php">Início</a><br><br>
        <p>Carrinho de Compras</p>
        <br>
        <p>Lorem upsur Lorem upsur Lorem upsur</p>
        <br>
        <p>Lorem upsur Lorem upsur Lorem upsur</p>
        <br>
        
        <center><h3>N O T A    F I S C A L</h3>
        <?php 
            for($i=0;$i<20;$i++){
                echo "_";
            }
        ?>
        </center>
        <center>
         <table>
             <tr>
                 <th>Nome</th>
                 <th>Preço</th>
             </tr>
             
             <?php foreach($carrinho as $p) {
             ?>
                 <tr>
                     <td><?php echo $p->get_nome(); ?></td>
                     <td><?php echo $p->get_preco(); ?></td>
                 </tr>
             <?php } ?>
             
             <tr>
                 <td colspan="2"><b>Total: <?php echo $total; ?></b></td>
             </tr>
         </table>
         
         <?php 
            for($i=0;$i<20;$i++){
                echo "_";
            }
        ?>
        </center>
         
         <?php
             for($i=0;$i < 5; $i++){
                echo "<br>";
             }
         ?>
         
         <a href="#">Imprimir</a>
    <?php
        }
    ?>
    </body>
</html>
