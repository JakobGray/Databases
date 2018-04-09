<?php include('./header.php'); ?>
<br>
<form action='../index.php' method='POST' accept-charset="UTF-8">
  <input type="hidden" name="action" value="new_tf_quiz">

  <label class="pull-left">Quiz Name:</label>
  <input class="pull-left" type='text' name='quizname' maxlength="100" required>

  <label class="pull-left">Quiz Topic:</label>
  <input class="pull-left" type='text' name='topic' maxlength="300">

  <label class="pull-left">Question Prompt:</label>
  <input class="pull-left" type='text' name='prompt' maxlength="300" required>

  <label class="pull-left">Answer:</label>
  <select name='answer' class="pull-left">
    <option value="True">True</option>
    <option value="False">False</option>
  </select>

  <input type='submit' value='Submit' class="btn btn-success pull-left">
</form>

<?php include('./footer.php'); ?>
