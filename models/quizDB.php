<?php

function get_quizzes($type) {
  global $db;
  $query = $db->prepare("SELECT GID, name, topic FROM game
                          WHERE type = :type");
  $statement->bindValue(':type', $type);
  $query->execute();
  $result = $query->fetchAll(PDO::FETCH_ASSOC);
  $query->closeCursor();
  return $result;
}
