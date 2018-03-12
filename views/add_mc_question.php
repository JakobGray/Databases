<?php include('views/header.php'); ?>

<form action="../index.php" method='POST' accept-charset="UTF-8">
  <div class="form-group">
    <label for="prompt">Question Prompt:</label>
    <input type="text" class="form-control" id="prompt" name='prompt' maxlength="300" required>
  </div>
  <div class="form-group">
    <label for="answer">Answer:</label>
    <input type="text" class="form-control" id="answer" name='answer' maxlength="100" required>
  </div>
  <div class="form-group">
    <label for="choice1">Choice 1:</label>
    <input type="text" class="form-control" id="choice1" name='choice1' maxlength="100" required>
  </div>
  <div class="form-group">
    <label for="choice2">Choice 2:</label>
    <input type="text" class="form-control" id="choice2" name='choice2' maxlength="100" required>
  </div>
  <div class="form-group">
    <label for="choice3">Choice 3:</label>
    <input type="text" class="form-control" id="choice3" name='choice3' maxlength="100" required>
  </div>
  <button type="submit" class="btn btn-default">Submit</button>
</form>

<?php include('views/footer.php'); ?>
