<?php
    include_once("./config.php");

    $dsn = "mysql:host={$SERVER};dbname={$DATABASE}";
    $username = $USERNAME;
    $password = $PASSWORD;

    try {
        $db = new PDO($dsn, $username, $password,
        array('charset'=>'utf8'));
        $db->query("SET CHARACTER SET utf8");
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('models/database_error.php');
        exit();
    }
?>
