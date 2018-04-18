<?php
require('../models/ajaxDB.php');

$searchString = filter_input(INPUT_GET, 'searchName', FILTER_SANITIZE_STRING) . '%';
// '%' . $_GET['searchName'] . '%';
//
echo "Here am I";
$results = get_searched_quizzes($searchString);


$keys = array_keys($results);
// echo print_r($results);
echo "<table border=1><th style='text-align: center'>Name</th><th>Topic</th><th>Play</th>\n";

foreach ($keys as $val) {
  $GID = $results[$val]['GID'];
  $name = $results[$val]['name'];
  $topic = $results[$val]['topic'];
  // echo "Hello";
  echo "<tr><td>$name</td><td>$topic</td><td><form action='.' method='POST'>
        <input type='hidden' name='action' value='take_tf_quiz'>
        <input type='hidden' name='gameID' value='$GID'>
        <button type='submit' class='btn btn-large btn-primary'>Play</a>
      </form>
    </td>
  </tr>";
}
echo "</table>";
