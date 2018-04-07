<?php

require('./ajaxDB.php');

$array = filter_input_array(INPUT_GET);
print_r($array);
echo $array['username'];
echo $array['quizID'];
// save_results($array['username'], $array['quizID'], $array['score'], $array['duration']);

?>
