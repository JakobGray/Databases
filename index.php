<?php

// Turn on error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Session holding cookies for user info and article
//$lifetime = 60 * 60 * 24 * 14;  // 2 weeks
//session_set_cookie_params($lifetime);
session_start();
date_default_timezone_set("America/New_York");

// Include model files
include_once("models/database.php");
include_once("models/loginDB.php");
include_once('./models/quizDB.php');

// Designate action variable
$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'home';
    }
}


switch ($action) {
    case 'show_login':
            include('views/login.php');
            break;

    case 'login':   // Validates password and sets session variable to allow site access
        $username1 = filter_input(INPUT_POST, 'username');
        $password1 = filter_input(INPUT_POST, 'password');
        $remember = filter_input(INPUT_POST, 'remember');

        $leaderboard = get_leaderboard();
        $tf_quizzes = get_quizzes('tf');
        $mc_quizzes = get_quizzes('mc');
        $c_quizzes = get_quizzes('c');
        $script_quizzes = get_quizzes('sc');

        if (is_valid_user_login($username1, $password1)) {
            $_SESSION['is_valid_user'] = true;
            $_SESSION['username'] = $username1;
            // if ($remember == 'yes') {
            //     $lifetime = 60 * 60 * 24 * 7;  // 1 week
            //     session_set_cookie_params($lifetime);
            //     session_regenerate_id();
            // }
            include('views/welcome.php');
        } else {
            $login_message = 'You must login to proceed.';
            echo $login_message;
            include('views/login.php');
        }
        break;

    case 'logout':  // Don't remember you for next time
    //        session_destroy();
        // $name = session_name();
        // $expire = strtotime('-1 year');
        // $params = session_get_cookie_params();
        // $path = $params['path'];
        // $domain = $params['domain'];
        // $secure = $params['secure'];
        // $httponly = $params['httponly'];
        // setcookie($name, '', $expire, $path, $domain, $secure, $httponly);
        unset($_SESSION['is_valid_user']);
        header("Location: .");
        break;

    case 'home':
      $leaderboard = get_leaderboard();
      $tf_quizzes = get_quizzes('tf');
      $mc_quizzes = get_quizzes('mc');
      $c_quizzes = get_quizzes('c');
      $script_quizzes = get_quizzes('sc');
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

      case 'tf_questions':
        $questions = get_all_quizzes('tf');
        $post_val = 'take_tf_quiz';
        include('views/full_question_list.php');
        break;

      case 'mc_questions':
        $questions = get_all_quizzes('mc');
        $post_val = 'take_mc_quiz';
        include('views/full_question_list.php');
        break;

      case 'c_questions':
        $questions = get_all_quizzes('c');
        $post_val = 'take_c_quiz';
        include('views/full_question_list.php');
        break;

      case 'script_questions':
        $questions = get_all_quizzes('sc');
        $post_val = 'take_sc_quiz';
        include('views/full_question_list.php');
        break;

      case "take_tf_quiz":
        $gameID = filter_input(INPUT_POST, 'gameID', FILTER_VALIDATE_INT);
        $questions = get_tf_questions_specific($gameID);
        include('views/tf_quiz.php');
        break;

      case "take_mc_quiz":
        $gameID = filter_input(INPUT_POST, 'gameID', FILTER_VALIDATE_INT);
        $questions = get_mc_questions_specific($gameID);
        include('views/mc_quiz.php');
        break;

      case "take_script_quiz":
        $gameID = filter_input(INPUT_POST, 'gameID', FILTER_VALIDATE_INT);
        $scripts = get_scripts_specific($gameID);
        include('views/script_quiz.php');
        break;

      case "take_c_quiz":
        $gameID = filter_input(INPUT_POST, 'gameID', FILTER_VALIDATE_INT);
        $questions = get_mc_questions_specific($gameID);
        include('views/c_quiz.php');
        break;

      case "add_tf_quiz":
        $user = $_SESSION['username'];
        include('views/add_tf_quiz.php');
        break;

      case "add_mc_quiz":
        $user = $_SESSION['username'];
        include('views/add_mc_quiz.php');
        break;

      case "add_script_quiz":
        $user = $_SESSION['username'];
        include('views/add_script_quiz.php');
        break;

      case "add_c_quiz":
        $user = $_SESSION['username'];
        include('views/add_c_quiz.php');
        break;

      case 'my_quizzes':
        $user = $_SESSION['username'];
        $my_quizzes = get_your_quizzes($user);
        include('views/my_quizzes.php');
        break;

      case 'delete_quiz':
        $delete_game = filter_input(INPUT_POST, 'gameID', FILTER_VALIDATE_INT);
        if ($delete_game == NULL) {
            echo "ERROR DELETING GAME!!!!";
        } else {
            delete_quiz($delete_game);
            header("Location: .");
        }
        break;
}
