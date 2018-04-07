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

function save_results($username, $quizID, $score, $time) {
  global $db;
  $query = 'INSERT INTO score (username, quizID, score, duration)
          VALUES (:username, :quizID, :score, :duration)';
  $statement = $db->prepare($query);
  $statement->bindValue(':username', $username);
  $statement->bindValue(':quizID', $username);
  $statement->bindValue(':score', $score);
  $statement->bindValue(':duration', $duration);
  $statement->execute();
  $statement->closeCursor();
}
