<?php include('views/header.php'); ?>

<form action='../index.php' method='POST' accept-charset="UTF-8">
  <input type="hidden" name="action" value="sign-up">
  Username:<br>
  <input type='text' name='username' maxlength="50" required>
  Password:<br>
  <input type='password' name='password' maxlength="50" required
  
  <input type='submit' value='Sign Up'>
</form>

<?php include('views/footer.php'); ?>
