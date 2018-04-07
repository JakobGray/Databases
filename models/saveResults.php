<?php

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

$array = filter_input_array(INPUT_GET);
print_r($array);
save_results($array['username'], $array['quizID'], $array['score'], $array['duration']);

?>
