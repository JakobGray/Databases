<?php include('./header.php'); ?>
<br>
<div class="container">
<form action="../index.php" method='POST' accept-charset="UTF-8">
  <input type="hidden" name="action" value="sign-up">
      <div class="panel panel-primary">
        <div class="panel-heading">
          Create an account
        </div>
        <div class="panel-body">
          <div class="form-group pull-left" style="width: 400px">
            <label for="username" class="pull-left">Username:</label>
            <br>
            <input type="text" class="form-control" id="username" name='username' maxlength="50" required>
          </div>
          <br>
          <br>
          <br>
          <br>
          <div class="form-group pull-left" style="width: 400px">
            <label for="pwd" class="pull-left">Password:</label>
            <br>
            <input type="password" class="form-control" id="pwd" name='password' maxlength="50" required>
          </div>
          <br>
          <br>
          <br>
          <br>
  <div class="checkbox pull-left">
      <label><input type="checkbox"> Are you a cool dude?</label>
  </div>
  <br>
  <br>
  <button type="submit" class="btn btn-default pull-left">Sign Up</button>
  </div>
  </div>
  <br>
</form>
</div>
<?php include('./footer.php'); ?>
