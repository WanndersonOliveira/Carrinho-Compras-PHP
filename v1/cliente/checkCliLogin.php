<?php 
    session_start();
    require "../model/usuario.php";
    
    $cliente = new Usuario();
    $cliente = unserialize($_SESSION["cliente"]);
    
    if($_POST["email"] == $cliente->get_email() && $_POST["senha"] == $cliente->get_senha()){
        $_SESSION["cli_sessao"] = "1";
        $_SESSION["url"] = "checkCliLogin.php";
        header('Location: ../carrinho.php');
    } else {
        echo "<h3>Email ou senha errados.</h3><br><br>";
        echo '<h3><a href="clienteLogin.php">Voltar</a></h3>';
    }
?>