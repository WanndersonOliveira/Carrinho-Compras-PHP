<?php
    session_start();
    if($_GET["s"]=="0"){
        $_SESSION["checkLogin"] = "0";
    }
    
    if($_GET["s"]=="1"){
        $_SESSION["cli_sessao"] = "0";
    }
    
    header('Location:lista.php');
?>