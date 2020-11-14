<?php
    session_start();
    require "../model/produto.php";
    
    $itens = unserialize($_SESSION["carrinho"]);
    $numbers = array();
    $c = 0;
    
    while($c < sizeof($itens)){
        $a = (string) $c;
        $palavra = "produto".$a;
        
        if($_GET[$palavra] != null){
            array_push($numbers, $_GET[$palavra]);
        }
        
        $c++;
    }
    
    foreach($numbers as $n){
        $x=(int) $n;
        $itens[$x] = null;
    }
    
    $produtos = array();
    

    
    foreach($itens as $i){
        if($i != null){
            array_push($produtos, $i);
        }
    }
    
    $_SESSION["carrinho"] = serialize($produtos);
    header('Location:../carrinho.php');
?>