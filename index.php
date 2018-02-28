<?php

// Turn on error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Session holding cookies for user info and article
//$lifetime = 60 * 60 * 24 * 14;  // 2 weeks
//session_set_cookie_params($lifetime);
session_start();

include_once("models/database.php");
date_default_timezone_set("America/New_York");

// Designate action variable
$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'show_login';
    }
}

switch ($action) {

    case 'home':    // Displays all articles
        include('views/home.php');
        echo "<br>Hello";
        global $db;
        $query = 'show tables';
        $statement = $db->prepare($query);
        $statement->execute();
        $entries = $statement->fetchAll();
        $statement->closeCursor();
        $entries;

        foreach ($entries as $key => $entry) :
            echo '<p>' . $entry[0] . '</p>';
        endforeach;
        break;


    case 'show_login':
      include('view/login.php');
      break;
}
