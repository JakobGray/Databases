<?php

function add_new_user($username, $password) {
    global $db;
    $password = sha1($username . $password);
    $query = 'INSERT INTO user (username, password)
            VALUES (:username, :password)';
    $statement = $db->prepare($query);
    $statement->bindValue(':username', $username);
    $statement->bindValue(':password', $password);
    $statement->execute();
    $statement->closeCursor();
}

function get_tf_questions() {
  global $db;
  $query = $db->prepare("SELECT tf_prompt, answer FROM tf_question");
  $query->execute();
  $result = $query->fetchAll(PDO::FETCH_ASSOC);
  $query->closeCursor();
  return $result;
}
