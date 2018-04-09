<?php
require('./ajaxDB.php');

$array = filter_input_array(INPUT_POST);
echo print_r($array);

// $quizname = filter_input(INPUT_POST, 'quizname');
// $topic = filter_input(INPUT_POST, 'topic');
// $quizID = create_new_tf_quiz($quizname, $topic);
//
// for ($i = 1; $i <= sizeof($_POST['prompt']); $i++) {
//     $prompt = $array['prompt'][$i];
//     $answer = $array['answer'][$i];
//     $questionID = create_new_tf_question($prompt, $answer);
//     link_question($quizID, $questionID);
// }

//// TODO: add in require
