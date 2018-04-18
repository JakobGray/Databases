<?php
include_once("../config.php");

$dsn = "mysql:host={$SERVER};dbname={$DATABASE}";
$username = $USERNAME;
$password = $PASSWORD;
$user = $USERNAME;
$userID = $USERID;
$_SESSION['userID'] = $userID;

$db = new PDO($dsn, $user, $password,
array('charset'=>'utf8'));
$db->query("SET CHARACTER SET utf8");

function save_results($username, $quizID, $score, $duration) {
  global $db;
  $query = 'INSERT INTO score (username, GID, score, duration)
          VALUES (:username, :quizID, :score, :duration)';
  $statement = $db->prepare($query);
  $statement->bindValue(':username', $username);
  $statement->bindValue(':quizID', $quizID);
  $statement->bindValue(':score', $score);
  $statement->bindValue(':duration', $duration);
  $statement->execute();
  $statement->closeCursor();
}

function create_new_tf_question($prompt, $answer) {
  global $db;
  $query = 'INSERT INTO tf_question (tf_prompt, answer)
          VALUES (:prompt, :answer)';
  $statement = $db->prepare($query);
  $statement->bindValue(':prompt', $prompt);
  $statement->bindValue(':answer', $answer);
  $statement->execute();

  $last_id = $db->lastInsertId();
  $statement->closeCursor();
  return $last_id;
}

function create_new_tf_quiz($quizname, $topic) {
  global $db;
  $query = 'INSERT INTO game (name, topic)
          VALUES (:quizname, :topic)';
  $statement = $db->prepare($query);
  $statement->bindValue(':quizname', $quizname);
  $statement->bindValue(':topic', $topic);
  $statement->execute();

  $last_id = $db->lastInsertId();
  $statement->closeCursor();
  return $last_id;
}

function create_new_mc_question($prompt, $answer, $choice1, $choice2, $choice3) {
  global $db;
  $query = 'INSERT INTO mc_question (mc_prompt, answer, option1, option2, option3)
          VALUES (:prompt, :answer, :option1, :option2, :option3)';
  $statement = $db->prepare($query);
  $statement->bindValue(':prompt', $prompt);
  $statement->bindValue(':answer', $answer);
  $statement->bindValue(':option1', $choice1);
  $statement->bindValue(':option2', $choice2);
  $statement->bindValue(':option3', $choice3);
  $statement->execute();

  $last_id = $db->lastInsertId();
  $statement->closeCursor();
  return $last_id;
}

function create_new_script_question($script, $answer) {
  global $db;
  $query = 'INSERT INTO script_question (script_text, answer)
          VALUES (:script_text, :answer)';
  $statement = $db->prepare($query);
  $statement->bindValue(':script_text', $script);
  $statement->bindValue(':answer', $answer);
  $statement->execute();

  $last_id = $db->lastInsertId();
  $statement->closeCursor();
  return $last_id;
}

function link_question($quizID, $questionID) {
  global $db;
  $query = 'INSERT INTO have (GID, QID)
          VALUES (:quizID, :questionID)';
  $statement = $db->prepare($query);
  $statement->bindValue(':quizID', $quizID);
  $statement->bindValue(':questionID', $questionID);
  $statement->execute();
  $statement->closeCursor();
}

function get_c_questions_specific($quizID) {
  global $db;
  $query = $db->prepare("SELECT QID, c_prompt, answer
                        FROM c_question natural join have natural join game
                        WHERE GID = :quizID");
  $query->bindValue(':quizID', $quizID);
  $query->execute();
  $result = $query->fetchAll(PDO::FETCH_ASSOC);
  $query->closeCursor();
  return $result;
}

function get_searched_quizzes($searchString) {
  global $db;
  $query = $db->prepare("SELECT GID, name, topic FROM game
                          WHERE topic LIKE :search");
  $query->bindValue(':search', $searchString);
  $query->execute();
  $result = $query->fetchAll(PDO::FETCH_ASSOC);
  $query->closeCursor();
  return $result;
}
