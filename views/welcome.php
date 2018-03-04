<?php
include('views/header.php');
include_once('./models/loginDB.php');
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
    foreach ($questions as $q):
?>
<tr><td><?php echo $q{'tf_prompt'} ?></td><td><?php echo $q{'answer'} ?></td></tr>

<?php endforeach; ?>
  </table>
</div>

<a class="btn btn-large" href="views/add_question.php">Add Question</a>
<a class="btn btn-large" href="views/tf_quiz.php">Take Quiz</a>

<?php include('views/footer.php'); ?>
