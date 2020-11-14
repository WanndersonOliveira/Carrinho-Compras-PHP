<?php 
    session_start();
    require "../connection.php";
    require "../model/produto.php";

    $carrinho = unserialize($_SESSION["carrinho"]);

    $produtos = unserialize($_SESSION["produtos"]);


    $qtde=0;
    $produto = null;

    foreach ($produtos as $p) {
        foreach($carrinho as $c){
            if(strcmp($c->get_nome(),$p->get_nome())==0){
                $qtde = $p->get_qtde();
                $qtde--;

                if($qtde >= 0){
                    $p->set_qtde($qtde);
                }

                $produto = $p->get_nome();
            }
        }
    }   


    if($qtde >= 0){

        $sql = "UPDATE PRODUTO SET QTDE=".$qtde." WHERE MARCA='".$produto."';";


        if($conn->query($sql) == TRUE){
            echo "Transação realizada com sucesso!";
        } else {
            echo "Erro: ".$conn->error;
        }

    } else {
        echo "Produto indisponível no momento.";
    }

    header('Location:nota_fiscal.php');
?>