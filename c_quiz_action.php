help

<?php
  echo $_POST['q1'];
  $numQuestions = $_POST['numQuestions'];
  $gameID = $_POST['GID'];
  $questions = $_POST['questions'];

  include('views/header.php');
?>
<?php
  $quest = $questions[0];
  echo $quest{'c_prompt'};
  for ($x=0; $x < $numQuestions; $x++) {

    $question = $questions[$x];
    echo $question{'c_prompt'};
    echo $x;
  }
?>




