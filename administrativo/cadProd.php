<?php 
    session_start();
    require "../connection.php";
    require "../model/produto.php";
    
    $cod = 0;

    $sql = "SELECT MAX(CODIGO) AS CODIGO FROM PRODUTO";

    $result = $conn->query($sql);

    if($result == TRUE)
    {
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                $cod = $row["CODIGO"];
                $cod++;
            }
        } else {
            $cod = 0;
            echo "Não há registros";
        }
    } else {
        echo "Erro: ".$conn->error;
    }


    $produto = new Produto($cod, $_POST["nome"],$_POST["qtde"],$_POST["preco"],$_POST["img"]);



    $sql = "INSERT INTO PRODUTO VALUES (".$produto->get_codigo().",'".$produto->get_nome()."',".$produto->get_qtde().",".$produto->get_preco().",'".$produto->get_img()."',".$_SESSION["admin_id"].");";

    echo $sql;

    $result = $conn->query($sql);

    if($result == TRUE)
    {
        echo "Produto cadastrado com sucesso!";
        header('Location: ../lista.php');
    } else {
        echo "Produto não cadastrado.<br>";
        echo "Erro: ".$conn->error;
    }

    $conn->close();
?>