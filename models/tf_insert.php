<?php
require('./ajaxDB.php');

$array = filter_input_array(INPUT_POST);
echo print_r($array);

$quizname = $array['quizname'];
$topic = $array['topic'];
$quizID = create_new_quiz($quizname, $topic, 'tf', $user);

$keys = array_keys($array['prompt']);
// echo print_r($keys);
foreach ($keys as $val) {
  $prompt = $array['prompt'][$val];
  $answer = $array['answer'][$val];
  $questionID = create_new_tf_question($prompt, $answer);
  link_question($quizID, $questionID);
}

// for ($i = 1; $i <= sizeof($_POST['prompt']); $i++) {
//     $prompt = $array['prompt'][$i];
//     $answer = $array['answer'][$i];
//     $questionID = create_new_tf_question($prompt, $answer);
//     link_question($quizID, $questionID);
// }
