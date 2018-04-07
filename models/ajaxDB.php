<?php
// require('./database.php');

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
