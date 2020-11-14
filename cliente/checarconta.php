<?php
    session_start();
    require "../model/produto.php";
    require "../model/conta.php";
    require "../connection.php";


    $conta = new Conta();

    $sql = "SELECT SENHA,AGENCIA,OPERACAO,CONTA,CREDITO,BANCO FROM CONTA WHERE senha=".$_POST["senha"]." AND agencia=".$_POST["agencia"]." AND conta=".$_POST["conta"].";";

	$result = $conn->query($sql);	

    $check = false;

	if($result == TRUE)
    {
        if($result->num_rows > 0){
        	while($row = $result->fetch_assoc()){
                $conta->set_agencia($row["AGENCIA"]);
                $conta->set_conta($row["CONTA"]);
                $conta->set_banco($row["BANCO"]);
                $conta->set_credito($row["CREDITO"]);
                $conta->set_operacao($row["OPERACAO"]);
                $conta->set_senha($row["SENHA"]);
                $check=true;
        	}
        } else {
        	echo "<b>Algum dado não foi digitado corretamente.</b><br>";
            echo "Digite novamente os dados";   
        }

    } else {
        echo "Error: ".$sql."<br>".$conn->error;
    }


    if($check == true){

        $credito = $conta->get_credito();
        $credito -= $_POST["total"];

        if($credito >= 0){
            $sql = "UPDATE CONTA SET CREDITO=".$credito." WHERE SENHA=".$conta->get_senha()." AND AGENCIA=".$conta->get_agencia()." AND BANCO=".$conta->get_banco()." AND CONTA=".$conta->get_conta().";";


            if($conn->query($sql) == TRUE){
                echo "Transação realizada com sucesso!";
                $conta->set_senha("");
                $_SESSION["conta"] = serialize($conta);
                header('Location:atualizarProdutos.php');
            } else {
                echo "Erro: ".$conn->error;
            }

        } else {
            echo "<b>Não foi possível concretizar a compra.</b><br>";
        }


    }


        
    $conn->close();

?>