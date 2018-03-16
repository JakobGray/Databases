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

// Verifies that there is a matching ID in the database to the password inserted
function is_valid_user_login($username, $password) {
    global $db;
    $password = sha1($username . $password);
    $query = 'SELECT username FROM user
            WHERE username = :username AND password = :password';
    $statement = $db->prepare($query);
    $statement->bindValue(':username', $username);
    $statement->bindValue(':password', $password);
    $statement->execute();
    $valid = ($statement->rowCount() == 1);
    $statement->closeCursor();
    return $valid;
}
// Unused
function get_user_info($username, $password) {
    global $db;
    $password = sha1($username . $password);
    $query = 'SELECT username FROM user
            WHERE username = :username AND password = :password';
    $statement = $db->prepare($query);
    $statement->bindValue(':username', $username);
    $statement->bindValue(':password', $password);
    $statement->execute();
    $name = $statement->fetch();
    $statement->closeCursor();
    return $name;
}

function get_tf_questions() {
  global $db;
  $query = $db->prepare("SELECT tf_prompt, answer FROM tf_question");
  $query->execute();
  $result = $query->fetchAll(PDO::FETCH_ASSOC);
  $query->closeCursor();
  return $result;
}

function create_new_tf_question($prompt, $answer) {
  global $db;
  $query = 'INSERT INTO tf_question (tf_prompt, answer)
          VALUES (:prompt, :answer)';
  $statement = $db->prepare($query);
  $statement->bindValue(':prompt', $prompt);
  $statement->bindValue(':answer', $answer);
  $statement->execute();
  $statement->closeCursor();
}

function get_mc_questions() {
  global $db;
  $query = $db->prepare("SELECT mc_prompt, answer, option1, option2, option3 FROM mc_question");
  $query->execute();
  $result = $query->fetchAll(PDO::FETCH_ASSOC);
  $query->closeCursor();
  return $result;
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
  $statement->closeCursor();
}

function get_scripts() {
  global $db;
  $query = $db->prepare("SELECT script_text, answer FROM script_question");
  $query->execute();
  $result = $query->fetch](PDO::FETCH_ASSOC);
  $query->closeCursor();
  return $result;
}
