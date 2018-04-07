<?php
// require_once('/~jdg7sh/Databases/models/loginDB.php')
// require_once('loginDB.php');
$array = filter_input_array(INPUT_POST);
// echo print_r($array);
// save_results($array['username'], $array['quizID'], $array['score'], $array['duration']);

?>
<script type="text/javascript">
    var all_questions = <?php echo json_encode($array); ?>;
    console.log(JSON.stringify(all_questions, null, 2));
</script>
