<html>
    <head>
        <meta charset="utf-8">
        <title>Área Administrativa</title>
    </head>
    <body>
        <center><h3>Área Administrativa</h3></center>
        <?php 
            for($i = 0; $i < 5; $i++){
                echo "<br>";
            }
        ?>
        <center>
        <form method="post" action="checkAdmLogin.php">
            <input type="text" placeholder="Adm" name="adm">
            <br><br>
            <input type="password" placeholder="Senha" name="senha">
            <br><br><br>
            <input type="submit" value="Entrar">
        </form>
        </center>
    </body>
</html>