<?php
// require_once('/~jdg7sh/Databases/models/loginDB.php')
// require_once('loginDB.php');
$array = filter_input_array(INPUT_GET);
// echo print_r($array);
save_results($array['username'], $array['quizID'], $array['score'], $array['duration']);

?>
