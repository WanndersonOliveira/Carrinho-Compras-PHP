<?php 
    session_start();
    require "../connection.php";
    require "../model/usuario.php";
    

    $sql = "SELECT EMAIL,NOME FROM CLIENTE WHERE SENHA='".$_POST["senha"]. "' AND EMAIL='".$_POST["email"]."';";

    $result = $conn->query($sql);   

    if($result == TRUE)
    {
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){

             $_SESSION["cli_sessao"] = "1";
             $_SESSION["url"] = "checkCliLogin.php";
             header('Location: ../carrinho.php');
            }
        } else {
            
            echo "<h3>Email ou senha errados.</h3><br><br>";
            echo '<h3><a href="clienteLogin.php">Voltar</a></h3>';
        }

    } else {
        echo "Error: ".$sql."<br>".$conn->error;
    }

    $conn->close();
?>