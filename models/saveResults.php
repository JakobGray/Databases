<?php
include('./loginDB.php');

$array = filter_input_array(INPUT_GET);
print_r($array);
save_results($array['username'], $array['quizID'], $array['score'], $array['duration']);

?>
