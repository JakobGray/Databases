<?php
// require "dbutil.php";
// $db = DbUtil::loginConnection();
//
// $stmt = $db->stmt_init();
//
// if($stmt->prepare("Select MAX(score) as score, username, topic, type from score natural join game group by topic, type") or die(mysqli_error($db))) {
//   //$searchString = '%' . $_GET['searchLastName'] . '%';
//   //  $stmt->bind_param(s, $searchString);
//   $stmt->execute();
//   $stmt->bind_result($score, $username, $topic, $type);
//   echo "<table border=1><th>topic</th><th>type</th><th>username</th><th>score</td>\n";
//   while($stmt->fetch()) {
//     echo "<tr><td>$topic</td><td>$type</td><td>$username</td><td>$score</td></tr>";
//   }
//   echo "</table>";
//
//   $stmt->close();
// }
//
// $db->close();


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
include_once('./models/quizDB.php');
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

      case 'add_tf_question':
        $prompt = filter_input(INPUT_POST, 'prompt');
        $answer = filter_input(INPUT_POST, 'answer');
        create_new_tf_question($prompt, $answer);
        header("Location: .");
        break;

      case 'new_tf_quiz':
        $prompt = filter_input(INPUT_POST, 'prompt');
        $answer = filter_input(INPUT_POST, 'answer');
        $quizname = filter_input(INPUT_POST, 'quizname');
        $topic = filter_input(INPUT_POST, 'topic');

        $quizID = create_new_tf_quiz($quizname, $topic);
        $questionID = create_new_tf_question($prompt, $answer);
        link_question($quizID, $questionID);
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

      case 'add_c_question':
        $c_prompt = filter_input(INPUT_POST, 'c_prompt');
        $answer = filter_input(INPUT_POST, 'answer');
        create_new_c_question($c_prompt, $answer);
        header("Location: .");
        break;

      case "take_tf_quiz":
        include('views/tf_quiz.php');
        break;

      case "take_mc_quiz":
        include('views/mc_quiz.php');
        break;

      case "take_script_quiz":
        include('views/script_quiz.php');
        break;

      case "take_c_quiz":
        include('views/c_quiz.php');
        break;
}
