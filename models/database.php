<?php
    include_once("/config.php");

    $dsn = "mysql:host={$SERVER};dbname={$DATABASE}";
    $username = $USERNAME;
    $password = $PASSWORD;
    
    try {
        $db = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('model/database_error.php');
        exit();
    }
?>
