<?php
require('./ajaxDB.php');

$array = filter_input_array(INPUT_POST);
echo print_r($array);

$quizname = $array['quizname'];
$topic = $array['topic'];
if ($_SESSION['username'] == NULL) {
  echo "Error: can't identify user";
} else {
  $user = $_SESSION['username'];
}
$quizID = create_new_quiz($quizname, $topic, 'c', $user);

$keys = array_keys($array['prompt']);
// echo print_r($keys);
foreach ($keys as $val) {
  $prompt = $array['prompt'][$val];
  $answer = $array['answer'][$val];

  $questionID = create_new_c_question($prompt, $answer);
  link_question($quizID, $questionID);
}
