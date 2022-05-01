<?php
    $server = 'localhost';
    $database = 'school';
    $user = 'root';
    $password = '';
    $connection = new mysqli($server, $user, $password, $database);

    if(!$connection) {
        die(mysqli_error($connection));
    }
?>