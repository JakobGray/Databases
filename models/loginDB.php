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

// Get questions to show when playing quizzes
function get_tf_questions_specific($quizID) {
  global $db;
  $query = $db->prepare("SELECT tf_prompt, answer
                        FROM tf_question natural join have natural join game
                        WHERE GID = :quizID");
  $query->bindValue(':quizID', $quizID);
  $query->execute();
  $result = $query->fetchAll(PDO::FETCH_ASSOC);
  $query->closeCursor();
  return $result;
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

function get_mc_questions_specific($quizID) {
  global $db;
  $query = $db->prepare("SELECT mc_prompt, answer, option1, option2, option3
                        FROM mc_question natural join have natural join game
                        WHERE GID = :quizID");
  $query->bindValue(':quizID', $quizID);
  $query->execute();
  $result = $query->fetchAll(PDO::FETCH_ASSOC);
  $query->closeCursor();
  return $result;
}

function get_scripts_specific($quizID) {
  global $db;
  $query = $db->prepare("SELECT QID, script_text, answer
                        FROM script_question natural join have natural join game
                        WHERE GID = :quizID");
  $query->bindValue(':quizID', $quizID);
  $query->execute();
  $result = $query->fetchAll(PDO::FETCH_ASSOC);
  $query->closeCursor();
  return $result;
}

function get_leaderboard() {
  global $db;
  $query = $db->prepare("SELECT MAX(score) as score, username, topic, type
                          FROM score natural join game
                          group by topic, type");
  $query->execute();
  $result = $query->fetchAll(PDO::FETCH_ASSOC);
  $query->closeCursor();
  return $result;
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

function delete_quiz($quizID) {
  global $db;
  $query = 'DELETE FROM game
          WHERE GID = :quizID';
  $statement = $db->prepare($query);
  $statement->bindValue(':quizID', $quizID);
  $statement->execute();
  $statement->closeCursor();
}

function get_your_quizzes($user) {
  global $db;
  $query = "SELECT GID, name, topic
            FROM game
            WHERE creator = :user
            ORDER BY date_added DESC";
  $statement = $db->prepare($query);
  $statement->bindValue(':user', $user);
  $statement->execute();
  $result = $statement->fetchAll(PDO::FETCH_ASSOC);
  $statement->closeCursor();
  return $result;
}



// Unused
function get_tf_questions() {
  global $db;
  $query = $db->prepare("SELECT tf_prompt, answer FROM tf_question LIMIT 2");
  $query->execute();
  $result = $query->fetchAll(PDO::FETCH_ASSOC);
  $query->closeCursor();
  return $result;
}
function get_mc_questions() {
  global $db;
  $query = $db->prepare("SELECT mc_prompt, answer, option1, option2, option3 FROM mc_question");
  $query->execute();
  $result = $query->fetchAll(PDO::FETCH_ASSOC);
  $query->closeCursor();
  return $result;
}
function get_scripts() {
  global $db;
  $query = $db->prepare("SELECT script_text, answer FROM script_question");
  $query->execute();
  $result = $query->fetchAll(PDO::FETCH_ASSOC);
  $query->closeCursor();
  return $result;
}
