<?php include('views/header.php'); ?>

<form action='../index.php' method='POST' accept-charset="UTF-8">
  <input type="hidden" name="action" value="add_question">
  Question Prompt:<br>
  <input type='text' name='prompt' maxlength="300" required>
  Answer:<br>
  <select name='answer'>
    <option value="True">True</option>
    <option value="False">False</option>
  </select>

  <input type='submit' value='Submit'>
</form>

<?php include('views/footer.php'); ?>
