<?php 
    session_start();
    require "../model/produto.php";
    
    
    $produtos = unserialize($_SESSION["produtos"]);
    
    $produto = new Produto();
    $produto->set_nome($_POST["nome"]);
    $produto->set_qtde($_POST["qtde"]);
    $produto->set_img($_POST["img"]);
    $produto->set_preco($_POST["preco"]);
    
    array_push($produtos, $produto);
    
    $prod = serialize($produtos);
    
    $_SESSION["produtos"] = $prod;
    
    header('Location: ../lista.php');
?>