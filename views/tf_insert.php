<?php
// require('../model/pheno_db.php');
$array = filter_input_array(INPUT_POST);
echo print_r($array);
// for ($i = 1; $i <= sizeof($_POST['pheno_value']); $i++) {
//
//   $prompt = filter_input(INPUT_POST, 'prompt');
//   $answer = filter_input(INPUT_POST, 'answer');
//   $quizname = filter_input(INPUT_POST, 'quizname');
//   $topic = filter_input(INPUT_POST, 'topic');
//
//   $quizID = create_new_tf_quiz($quizname, $topic);
//   $questionID = create_new_tf_question($prompt, $answer);
//   link_question($quizID, $questionID);
//
//     $model_id = $array['model_id'][$i];
//     $pheno_id = $array['pheno_id'][$i];
//     $pheno_ontological_id = $array['pheno_ontological_id'][$i];
//     $phenobase_extension_term = $array["phenobase_extension_term"][$i];
//     $pheno_value = $array["pheno_value"][$i];
//     $pheno_value_detail = $array["pheno_value_detail"][$i];
//     $exp_paradigm = $array["exp_paradigm"][$i];
//     $exp_paradigm_detail = $array["exp_paradigm_detail"][$i];
//     $age = $array["age"][$i];
//     $gender = $array["gender"][$i];
//     $gp_symbol = $array["gp_symbol"][$i];
//     $gp_symbol_id = $array["gp_symbol_id"][$i];
//     $anatomy_region = $array["anatomy_region"][$i];
//     $anatomy_region_id = $array["anatomy_region_id"][$i];
//     $cell_type = $array["cell_type"][$i];
//     $cell_type_id = $array["cell_type_id"][$i];
//     $pmid = $array["pmid"][$i];
//     $figure = $array["figure"][$i];
//     $close_pheno_term = $array["close_pheno_term"][$i];
//     add_pheno($model_id, $pheno_id, $pheno_ontological_id, $phenobase_extension_term, $pheno_value, $pheno_value_detail, $exp_paradigm, $exp_paradigm_detail, $age, $gender, $gp_symbol, $gp_symbol_id, $anatomy_region, $anatomy_region_id, $cell_type, $cell_type_id, $pmid, $figure, $close_pheno_term);
// }
