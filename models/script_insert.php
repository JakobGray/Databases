<?php
require('./ajaxDB.php');

$array = filter_input_array(INPUT_POST);
// echo print_r($array);

$quizname = $array['quizname'];
$topic = $array['topic'];
$quizID = create_new_tf_quiz($quizname, $topic);
echo $quizID;

$keys = array_keys($array['answer']);
// echo print_r($keys);
foreach ($keys as $val) {
  $script = $array['script_text'][$val];
  $answer = $array['answer'][$val];
  $questionID = create_new_script_question($script, $answer);
  echo $questionID;
  link_question($quizID, $questionID);
}
