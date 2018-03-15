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

// // Verify login status
// if (!isset($_SESSION['is_valid_admin']) && $action != 'login') {
//     $action = 'show_login';
// }

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

    case 'show_login':
            include('views/login.php');
            break;

    case 'login':   // Validates password and sets session variable to allow site access
        $username1 = filter_input(INPUT_POST, 'username');
        $password1 = filter_input(INPUT_POST, 'password');
        $remember = filter_input(INPUT_POST, 'remember');
        if (is_valid_user_login($username, $password1)) {
            $_SESSION['is_valid_admin'] = true;
            // if ($remember == 'yes') {
            //     $lifetime = 60 * 60 * 24 * 7;  // 1 week
            //     session_set_cookie_params($lifetime);
            //     session_regenerate_id();
            // }
            include('views/welcome.php');
        } else {
            $login_message = 'You must login to proceed.';
            include('views/login.php');
        }
        break;

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

      case 'add_tf_question':
        $prompt = filter_input(INPUT_POST, 'prompt');
        $answer = filter_input(INPUT_POST, 'answer');
        create_new_tf_question($prompt, $answer);
        header("Location: .");
        break;

      case 'add_mc_question':
        $prompt = filter_input(INPUT_POST, 'prompt');
        $answer = filter_input(INPUT_POST, 'answer');
        $choice1 = filter_input(INPUT_POST, 'choice1');
        $choice2 = filter_input(INPUT_POST, 'choice2');
        $choice3 = filter_input(INPUT_POST, 'choice3');
        create_new_mc_question($prompt, $answer, $choice1, $choice2, $choice3);
        header("Location: .");
        break;

      case "take_tf_quiz":
        include('views/tf_quiz.php');
        break;

      case "take_mc_quiz":
        include('views/mc_quiz.php');
        break;
}
