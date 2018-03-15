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

<?php
if (isset($_SESSION['is_valid_user'])) {
  include('./views/add_forms.php');
}
?>

<form action='.' method='POST' id="tf_form">
  <input type="hidden" name="action" value="take_tf_quiz">
  <button type="submit" form="tf_form" class="btn btn-large">Take Quiz</a>
</form>

<form action='.' method='POST' id="mc_form">
  <input type="hidden" name="action" value="take_mc_quiz">
  <button type="submit" form="mc_form" class="btn btn-large">Take MC Quiz</a>
</form>

<form action='.' method='POST' id="script_form">
  <input type="hidden" name="action" value="take_script_quiz">
  <button type="submit" form="script_form" class="btn btn-large">Take Advanced Quiz</a>
</form>

<?php include('views/footer.php'); ?>
