help

<?php
  $numQuestions = $_POST['numQuestions'];
  $gameID = $_POST['GID'];
  $questions = $_POST['questions'];

  include('views/header.php');
?>
<?php

  for ($x=0; $x < $numQuestions; $x++) {

    $question = $questions[$x];
    echo $question{'c_prompt'};
    echo $x;
  }
?>



