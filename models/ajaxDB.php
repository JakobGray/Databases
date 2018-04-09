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
  $query = 'INSERT INTO score (username, quizID, score, duration)
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