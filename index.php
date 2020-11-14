<?php 
	session_start();
    $_SESSION["cli_sessao"] = "0"; //0 -> offline, 1 -> online
    $_SESSION["checkLogin"] = "0";

    header('Location:lista.php');
?>