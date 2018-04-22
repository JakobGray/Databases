<?php
require('./ajaxDB.php');

$array = filter_input_array(INPUT_POST);
echo print_r($array);

$quizname = $array['quizname'];
$topic = $array['topic'];
$quizID = create_new_quiz($quizname, $topic, 'c');

$keys = array_keys($array['prompt']);
// echo print_r($keys);
foreach ($keys as $val) {
  $prompt = $array['prompt'][$val];
  $answer = $array['answer'][$val];
  $choice1 = $array['choice1'][$val];
  $choice2 = $array['choice2'][$val];
  $choice3 = $array['choice3'][$val];
  $questionID = create_new_mc_question($prompt, $answer, $choice1, $choice2, $choice3);
  link_question($quizID, $questionID);
}
