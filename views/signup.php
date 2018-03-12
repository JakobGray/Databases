<?php include('./header.php'); ?>

<form action="../index.php" method='POST' accept-charset="UTF-8">
  <input type="hidden" name="action" value="sign-up">
  <div class="form-group">
    <label for="username">Username:</label>
    <input type="text" class="form-control" id="username" name='username' maxlength="50" required>
  </div>
  <div class="form-group">
    <label for="pwd">Password:</label>
    <input type="password" class="form-control" id="pwd" name='password' maxlength="50" required>
  </div>
  <div class="checkbox">
    <label><input type="checkbox"> Are you a cool dude?</label>
  </div>
  <button type="submit" class="btn btn-default">Sign Up</button>
</form>

<?php include('./footer.php'); ?>
