<?php
include('views/header.php');
include_once('./models/loginDB.php');
?>

<div class="jumbotron">
    <h1 data-step="1" data-intro="This is a tooltip!">Welcome to Quizzy</h1>
    <p class="lead">This is the website for challenging quizzes and trivia.</p>
    <a class="btn btn-large btn-success" href="views/signup.php">Sign Up</a>
    <!-- <a class="btn btn-large btn-success" href="views/login.php">Log in</a> -->
    <form action='.' method='POST' id="login_form">
      <input type="hidden" name="action" value="show_login">
      <button type="submit" form="login_form" class="btn btn-large">Log in</a>
    </form>
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

<a class="btn btn-large" href="views/add_tf_question.php">Add TF Question</a>
<a class="btn btn-large" href="views/add_mc_question.php">Add MC Question</a>
<?php
if (isset($_SESSION['is_valid_user'])) {
  include('./views/add_forms.php');
}
?>

<?php include('views/footer.php'); ?>
