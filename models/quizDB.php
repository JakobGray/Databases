<?php

function get_quizzes($type) {
  global $db;
  $query = $db->prepare("SELECT GID, name, topic FROM game
                          WHERE type = :type
                          ORDER BY date_added DESC
                          LIMIT 5");
  $query->bindValue(':type', $type);
  $query->execute();
  $result = $query->fetchAll(PDO::FETCH_ASSOC);
  $query->closeCursor();
  return $result;
}

function get_all_quizzes($type) {
  global $db;
  $query = $db->prepare("SELECT GID, name, topic FROM game
                          WHERE type = :type
                          ORDER BY date_added DESC");
  $query->bindValue(':type', $type);
  $query->execute();
  $result = $query->fetchAll(PDO::FETCH_ASSOC);
  $query->closeCursor();
  return $result;
}
