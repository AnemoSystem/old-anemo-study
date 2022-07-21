<?php
    include '../connection.php';

    $username = $_POST['username'];
    $coins = $_POST['coins'];
    $sql = "SELECT coins FROM user WHERE user_nickname = '$username';";
    $query = mysqli_query($connection, $sql);
    $result = mysqli_fetch_row($query);

    $actual_coins = (int) $result[0];
    $obtained_coins = (int) $coins;
    $sum = $actual_coins + $obtained_coins;

    $sql = "UPDATE user SET coins = '$sum' WHERE user_nickname = '$username';";
    $query = mysqli_query($connection, $sql);

    $sql = "SELECT coins FROM user WHERE user_nickname = '$username';";
    $query = mysqli_query($connection, $sql);
    $result = mysqli_fetch_row($query);
    echo $result[0];
?>