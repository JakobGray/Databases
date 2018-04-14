<?php
include('views/header.php');
include_once('./models/loginDB.php');
include_once('./models/quizDB.php');
?>

<div class="jumbotron">
    <h1 data-step="1" data-intro="This is a tooltip!">Welcome to Quizzy</h1>
    <p class="lead">This is the website for challenging quizzes and trivia.</p>
    <a class="btn btn-large btn-success" href="views/signup.php">Sign Up</a>
    <br>
    <br>
    <!-- <a class="btn btn-large btn-success" href="views/login.php">Log in</a> -->
    <form action='.' method='POST' id="login_form">
      <input type="hidden" name="action" value="show_login">
      <!-- <button type="submit" form="login_form" class="btn btn-large btn-info">Log in</a> -->
      <?php
      if (!isset($_SESSION['is_valid_user'])) {
        echo "<a class='btn btn-large btn-success' onclick=\"document.getElementById('id01').style.display = 'block'\" style=\"width:auto;\">Login Here</a>";
      }
      ?>
    </form>
</div>

<?php include('views/login.php'); ?>
<?php $tf_quizzes = get_quizzes('tf'); ?>

<div class="container" style="display: inline-block">
  <table border=1>
    <th style="text-align: center">Name</th><th>Topic</th><th>Play</th>
    <?php
    foreach ($tf_quizzes as $q):
?>
<tr>
  <td><?php echo $q{'name'} ?></td>
  <td><?php echo $q{'topic'} ?></td>
  <td>
    <form action='.' method='POST'>
      <input type="hidden" name="action" value="take_tf_quiz">
      <input type="hidden" name="gameID" value="<?php echo $q{'GID'} ?>">
      <button type="submit" class="btn btn-large btn-primary">Play</a>
    </form>
  </td>
</tr>

<?php endforeach; ?>
  </table>
</div>

<?php $mc_quizzes = get_quizzes('mc'); ?>

<div class="container" style="display: inline-block">
  <table border=1>
    <th style="text-align: center">Name</th><th>Topic</th><th>Play</th>
    <?php
    foreach ($mc_quizzes as $q):
?>
<tr>
  <td><?php echo $q{'name'} ?></td>
  <td><?php echo $q{'topic'} ?></td>
  <td>
    <form action='.' method='POST'>
      <input type="hidden" name="action" value="take_tf_quiz">
      <input type="hidden" name="gameID" value="<?php echo $q{'GID'} ?>">
      <button type="submit" class="btn btn-large btn-primary">Play</a>
    </form>
  </td>
</tr>

<?php endforeach; ?>
  </table>
</div>

<?php
if (isset($_SESSION['is_valid_user'])) {
  include('./views/add_forms.php');
}
?>
<div class="btn-group">
<form action='.' method='POST' id="tf_form">
  <input type="hidden" name="action" value="take_tf_quiz">
  <input type="hidden" name="quizID" value="5">
  <button type="submit" form="tf_form" class="btn btn-large btn-primary">Take T/F Quiz</a>
</form>

<form action='.' method='POST' id="mc_form">
  <input type="hidden" name="action" value="take_mc_quiz">
  <button type="submit" form="mc_form" class="btn btn-large btn-warning">Take MC Quiz</a>
</form>

<form action='.' method='POST' id="script_form">
  <input type="hidden" name="action" value="take_script_quiz">
  <button type="submit" form="script_form" class="btn btn-large btn-danger">Take Advanced Quiz</a>
</form>
</div>

<?php include('views/footer.php'); ?>
