<?php 
	require "connection.php";
	require "model/produto.php";

	$sql = "SELECT CODIGO, MARCA, QTDE, PRECO, IMG FROM PRODUTO;";

	$result = $conn->query($sql);	

	$produtos = [];

	if($result == TRUE)
    {
        if($result->num_rows > 0){
        	while($row = $result->fetch_assoc()){
        		$produto = new Produto($row["CODIGO"],$row["MARCA"],$row["QTDE"],$row["PRECO"],$row["IMG"]);
        		array_push($produtos,$produto);
        	}
        } else {
        	echo "0 results found";
        }

    } else {
        echo "Error: ".$sql."<br>".$conn->error;
    }
        
    $conn->close();

?>