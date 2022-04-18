<?php
    $server = 'localhost';
    $database = 'school';
    $user = 'root';
    $password = '';
    $connection = mysqli_connect($server, $user, $password);
        
    mysqli_set_charset($connection, "utf8");
    
    if(!($connection)) {
        echo "Can't setup a connection with MySQL.";
        exit;
    }
    
    $servidor = mysqli_select_db($conexao, $banco);
    
    if(!($server)) {
        echo "Can't select a database.";
        exit;
    }
?>