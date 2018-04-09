<?php
require('./ajaxDB.php');

$array = filter_input_array(INPUT_POST);
echo print_r($array);

// $quizname = $array['quizname'];
// $topic = $array['topic'];
// $quizID = create_new_tf_quiz($quizname, $topic);

$keys = array_keys($array);
echo print_r($keys);
// for ($i = 1; $i <= sizeof($_POST['prompt']); $i++) {
//     $prompt = $array['prompt'][$i];
//     $answer = $array['answer'][$i];
//     $questionID = create_new_tf_question($prompt, $answer);
//     link_question($quizID, $questionID);
// }
