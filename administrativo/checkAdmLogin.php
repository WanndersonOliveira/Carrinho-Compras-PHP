<?php 
    session_start();
    require "../model/administrador.php";
    require "../connection.php";
    
    $adm = new Administrador();
    
    $sql = "SELECT NOME,ID FROM ADMIN WHERE SENHA='".$_POST["senha"]."';";

    $result = $conn->query($sql);

    if($result == TRUE){
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                $_SESSION["checkLogin"] = "1";
                $_SESSION["admin_id"] = $row["ID"];

                header('Location: ../lista.php');
            }
        } else {
            echo "<b>Senha inválida</b>";
        }
    } else {
        echo "Erro: ".$conn->error;
    }
    
    $conn->close();
?>