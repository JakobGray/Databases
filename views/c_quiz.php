<?php
include('views/header.php');
?>

<?php
  include_once('./models/loginDB.php');
  $questions = get_c_questions_specific($gameID);
  $numQuestions = count($questions); ?>
  <form action="c_quiz_action.php" method="post">
  <?php
  for ($x=0; $x < $numQuestions; $x++) {
  $question = $questions[$x];
  echo $question{'c_prompt'}; ?>
  <input type="text" name="q<?php echo $x ?>">
  <br>
  <?php
  }
  ?>
  <input type='hidden' name='numQuestions' value='<?php echo $numQuestions;?>'/>
  <input type='hidden' name='GID' value='<?php echo $gameID;?>'/>
  <?php
  foreach($questions as $q)
  {
    echo '<input type="hidden" name="questions[]" value="'. $q. '">';
  }
  ?>
  <input type="submit">
  </form>



<?php include('views/footer.php'); ?>
