<?php 
    require "connection.php";
    
    
    $nomes = ["Flavio Jose Rocha","Rafael Amorim Pinheiro","Sandro Ferreira Silva"];
    $emails = ["flavio@gmail.com","rafaelpinheiro@hotmail.com","sandro.silva@yahoo.com.br"];
    $senhas = ["012345","abcde","45607"];
    
    for($i=0;$i<3;$i++){
        $sql = "INSERT INTO ADMIN VALUES (".$i.",'".$nomes[$i]."','".$senhas[$i]."');";
        
        if($conn->query($sql) == TRUE)
        {
            echo "New record create sucessfully";
        } else {
            echo "Error: ".$sql."<br>".$conn->error;
        }
    }
    
    $clientes = ["Anamelia Ferreira de Silvo","Marcos Antonio Ferreira","Tiberio Graco Oliveira"];
    $emails = ["aninha@yahoo.com","ferreira.marcos@hotmail.com","tiberio@gmail.com"];
    $senhas = ["3505","2323","454545"];


    $senha_banco = ["4545","2929","6363"];
    $agencia = ["13","13","10"];
    $op = ["023","023","023"];
    $cnt = ["012345","09876","01256"];
    $credito = ["2000.00","1500.50","999.99"];
    $banco = ["756","756","104"];
    
    
    for($i=0;$i<3;$i++){
        $sql = "INSERT INTO CLIENTE VALUES (".$i.",'".$emails[$i]."','".$senhas[$i]."','".$clientes[$i]."');";
        
        $conn->query($sql);

        $sql = "INSERT INTO CONTA VALUES (".$senha_banco[$i].",".$agencia[$i].",".$op[$i].",".$cnt[$i].",".$credito[$i].",".$banco[$i].",".$i.");";
        
        $conn->query($sql);

    }
    
    $nomes = array("Televisão Samsung", "Televisão Toshiba", "DVD Lenovo", "PlayStation 3", "Playstation 4", "DVD LG", "Nobreak Phillips", "Notebook Dell", "Notebook LG", "Notebook Lenovo");
    
    $precos = array(999.90, 850.05, 420.50, 1349.99, 2499.99, 499.90, 119.89, 1299.00, 1399.00, 1195.60);
    $qtdes = array(10, 9, 10, 5, 10, 10, 9, 8, 11, 12);
    $imgs = array("img/TVSamsung.jpg", "img/TVToshiba.jpg", "img/dvdLenovo.jpg", "img/ps3.jpg", "img/ps4.png", "img/dvdLG.jpg", "img/nobreak.jpg", "img/noteDell.jpg", "img/noteLG.jpg", "img/notebook.jpg");
    
    $j=0;
    
    for($i=0;$i<10;$i++){
        
        
        $sql = "INSERT INTO PRODUTO VALUES (".$i.",'".$nomes[$i]."',".$qtdes[$i].",".$precos[$i].",'".$imgs[$i]."',".$j.");";
        
        $conn->query($sql);


        if($conn->query($sql) == TRUE)
        {
            echo "New record create sucessfully";
        } else {
            echo "Error: ".$sql."<br>".$conn->error;
        }

        
        if($i == 3){
            $j++;
        }
        
        if($i == 6){
            $j++;
        }
    }
    
    $conn->close();
?>