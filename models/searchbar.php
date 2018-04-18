<?php
require('../models/ajaxDB.php');

$searchString = '%' . $_GET['searchName'] . '%';
// filter_input(INPUT_POST, 'searchName', FILTER_SANITIZE_STRING) . '%';
echo "Here am I";
$results = get_searched_quizzes($searchString);
//
//
//
// $keys = array_keys($results['GID']);
echo print_r($results);
echo "<table border=1><th style='text-align: center'>Name</th><th>Topic</th><th>Play</th>"
//
// foreach ($keys as $val) {
//   $GID = $results['GID'][$val];
//   $name = $results['name'][$val];
//   $topic = $results['topic'][$val];
//
//   echo "<tr><td>$name</td><td>$topic</td><td><form action='.' method='POST'>"
//   echo "<input type='hidden' name='action' value='take_tf_quiz'>
//         <input type='hidden' name='gameID' value='$GID'>
//         <button type='submit' class='btn btn-large btn-primary'>Play</a>
//       </form>
//     </td>
//   </tr>"
// }
echo "</table>"
