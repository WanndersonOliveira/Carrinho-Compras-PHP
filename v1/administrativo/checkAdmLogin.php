<?php 
    session_start();
    require "../model/administrador.php";
    
    $user = new Administrador();
    
    $user = unserialize($_SESSION["user"]);
    
    if($user->get_adm() == $_POST["adm"] && $user->get_senha() == $_POST["senha"]){
        $_SESSION["checkLogin"] = "1";
        header('Location: ../lista.php');
    } else {
        $_SESSION["checkLogin"] = "0";
        echo "<h3>Adm ou senha incorreta!</h3>";
    }
    
    //header('Location: lista.php');
?>