<?php include('./header.php'); ?>
<br>
<div class="container">
  <div class="panel panel-primary">
    <div class="panel panel-heading">
      <h4 class="pull-left">
        Create a true/false question
      </h4>
      <br>
      <br>
    </div>
    <div class="panel panel-body">
      <img class="pull-right" style="width: 600px" src="http://efengshui.org/photo/2010/10/feng-shui-true-or-false.jpg">
      <form action='../index.php' method='POST' accept-charset="UTF-8">
        <input type="hidden" name="action" value="add_tf_question">
        <label class="pull-left">Question Prompt:</label>
        <br>
        <br>
        <input class="pull-left" type='text' name='prompt' maxlength="300" required>
        <br>
        <br>
        <br>
        <label class="pull-left">Answer:</label>
        <br>
        <br>
        <select name='answer' class="pull-left">
          <option value="True">True</option>
          <option value="False">False</option>
        </select>
        <br>
        <br>
        <input type='submit' value='Submit' class="btn btn-success pull-left">
      </form>
    </div>
  </div>
</div>
<?php include('./footer.php'); ?>
