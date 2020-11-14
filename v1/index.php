<?php 
    session_start();
    require "model/produto.php";
    require "model/conta.php";
    require "model/usuario.php";
    require "model/administrador.php";

    $nomes = array("Televisão Samsung", "Televisão Toshiba", "DVD Lenovo", "PlayStation 3", "Playstation 4", "DVD LG", "Nobreak Phillips", "Notebook Dell", "Notebook LG", "Notebook Lenovo");
    $codigos = array("0001", "0002", "0003", "0004", "0005", "0006", "0007", "0008", "0009", "0010");
    $precos = array(999.90, 850, 420.50, 1349.99, 2499.99, 499.90, 119.89, 1299, 1399, 1195.60);
    $qtdes = array(10, 9, 10, 5, 10, 10, 9, 8, 11, 12);
    $imgs = array("img/TVSamsung.jpg", "img/TVToshiba.jpg", "img/dvdLenovo.jpg", "img/ps3.jpg", "img/ps4.png", "img/dvdLG.jpg", "img/nobreak.jpg", "img/noteDell.jpg", "img/noteLG.jpg", "img/notebook.jpg");
    $conta = new Conta();
    $conta->set_agencia("07");
    $conta->set_banco("Caixa Economica Federal");
    $conta->set_operacao("23");
    $conta->set_conta("076423-8");
    $conta->set_senha("4584");
    $conta->set_credito(1000);
    
    $produtos = array();
    
    for($i=0; $i<10;$i++){
        $produto = new Produto();
        $produto->set_nome($nomes[$i]);
        $produto->set_preco($precos[$i]);
        $produto->set_img($imgs[$i]);
        $produto->set_qtde($qtdes[$i]);
        $produto->set_codigo($codigos[$i]);

        array_push($produtos, $produto);
    }
    
    $prod = serialize($produtos);
    $cnt = serialize($conta);
    
    $cliente = new Usuario();
    $cliente->set_email("w4nd0@w4nd0");
    $cliente->set_senha("4584");
    
    $user = new Administrador();
    $user->set_adm("Jose Almeida Ferreira");
    $user->set_senha("12345");
    
    $usr = serialize($user);
    $cli = serialize($cliente);
    
    $_SESSION["produtos"] = $prod;
    $_SESSION["conta"] = $cnt;
    $_SESSION["user"] = $usr;
    $_SESSION["cliente"] = $cli;
    $_SESSION["cli_sessao"] = "0"; //0 -> offline, 1 -> online
    
    header('Location: lista.php');
?>