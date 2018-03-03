<?php
include('views/header.php');
include('../models/loginDB.php');
?>

<div class="jumbotron">
    <h1 data-step="1" data-intro="This is a tooltip!">Welcome to Quizzy</h1>
    <p class="lead">This is the website for challenging quizzes and trivia.</p>
    <a class="btn btn-large btn-success" href="views/signup.php">Sign Up</a>
</div>

<?php $questions = get_tf_questions(); ?>

<div>
  <table border=1>
    <th>Prompt</th><th>Answer</th>
    <?php
    foreach ($question as $q) {
      echo "<tr><td>$q{'tfprompt'}</td><td>$q{'answer'}</td></tr>"
    }
     ?>
  </table>
</div>

<?php include('views/footer.php'); ?>
