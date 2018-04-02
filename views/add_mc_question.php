<?php include('./header.php'); ?>
<br>
<div class="container">
<div class="panel panel-warning">
<div class="panel panel-heading">
<h4 class="pull-left">
Create a multiple choice question
</h4>
<br>
<br>
</div>
<div class="panel-body">
<img class="pull-right" style="width: 500px" src="http://susanfitzell.com/wp-content/uploads/2015/02/20121029-multichoicetest.jpg">
<form action="../index.php" method='POST' accept-charset="UTF-8">
  <input type="hidden" name="action" value="add_mc_question">
  <div class="form-group" style="width: 600px">
    <label for="prompt" class="pull-left">Question Prompt:</label>
    <br>
    <input type="text" class="form-control" id="prompt" name='prompt' maxlength="300" required>
  </div>
  <div class="form-group" style="width: 600px">
    <label for="answer" class="pull-left">Answer:</label>
    <br>
    <input type="text" class="form-control" id="answer" name='answer' maxlength="100" required>
  </div>
  <div class="form-group" style="width: 600px">
    <label for="choice1" class="pull-left">Choice 1:</label>
    <br>
    <input type="text" class="form-control" id="choice1" name='choice1' maxlength="100" required>
  </div>
  <div class="form-group" style="width: 600px">
    <label for="choice2" class="pull-left">Choice 2:</label>
    <br>
    <input type="text" class="form-control" id="choice2" name='choice2' maxlength="100" required>
  </div>
  <div class="form-group" style="width: 600px">
    <label for="choice3" class="pull-left">Choice 3:</label>
    <br>
    <input type="text" class="form-control" id="choice3" name='choice3' maxlength="100" required>
  </div>
  <button type="submit" class="btn btn-success pull-left">Submit</button>
</form>
</div>
</div>
</div>

<?php include('./footer.php'); ?>
