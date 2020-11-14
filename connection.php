<?php 
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbName = "carrinho";
    
    $conn = new mysqli($servername,$username,$password,$dbName);
    
    if($conn->connect_error){
        die ("Banco de dados nao conectado\nErro: " . $conn->connect_error);
    }

?>