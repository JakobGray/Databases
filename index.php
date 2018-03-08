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
include_once("models/loginDB.php");
date_default_timezone_set("America/New_York");

// Designate action variable
$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'home';
    }
}

switch ($action) {

    // case 'home':
    //     include('views/home.php');
    //
    //     global $db;
    //     $query = 'show tables';
    //     $statement = $db->prepare($query);
    //     $statement->execute();
    //     $entries = $statement->fetchAll();
    //     $statement->closeCursor();
    //     $entries;
    //
    //     foreach ($entries as $key => $entry) :
    //         echo '<p>' . $entry[0] . '</p>';
    //     endforeach;
    //     break;


    case 'home':
      include('views/welcome.php');
      break;

    case 'sign-up':
      $username = filter_input(INPUT_POST, 'username');
      $password = filter_input(INPUT_POST, 'password');
      if ($username == NULL || $password == NULL) {
            echo "Missing required components!!!!";
            header("Location: .");
        } else {
            add_new_user($username, $password);
            header("Location: .");
        }
      break;

      case 'add_question':
        $prompt = filter_input(INPUT_POST, 'prompt');
        $answer = filter_input(INPUT_POST, 'answer');
        create_new_question($prompt, $answer);
        header("Location: .");
        break;

      case "take_tf_quiz":
        include('views/tf_quiz.php');
        break;
}
