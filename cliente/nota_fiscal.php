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
            $produtos = array();
            $produtos = unserialize($_SESSION["produtos"]);
            $carrinho = unserialize($_SESSION["carrinho"]);
            
            
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
    </body>
</html>