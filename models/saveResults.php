<?php
require_once('loginDB.php');
$array = filter_input_array(INPUT_POST);
echo print_r($array);
save_results($array['username'], $array['quizID'], $array['score'], $array['duration']);

?>
