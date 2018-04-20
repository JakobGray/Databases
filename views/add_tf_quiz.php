<?php include('./header.php'); ?>

<br>
<!-- <form action='../index.php' method='POST' accept-charset="UTF-8">

  <input type="hidden" name="action" value="new_tf_quiz">

  <label class="pull-left">Quiz Name:</label>
  <input class="pull-left" type='text' name='quizname' maxlength="100" required>

  <label class="pull-left">Quiz Topic:</label>
  <input class="pull-left" type='text' name='topic' maxlength="300">
  </p>

  <label class="pull-left">Question Prompt:</label>
  <input class="pull-left" type='text' name='prompt' maxlength="300" required>

  <label class="pull-left">Answer:</label>
  <select name='answer' class="pull-left">
    <option value="True">True</option>
    <option value="False">False</option>
  </select>

  <input type='submit' value='Submit' class="btn btn-success pull-left">
</form> -->
<br><br>
<button class="btn btn-primary btn-add-panel pull-right" type="submit">
      <i class="glyphicon glyphicon-plus"></i>&nbsp;add question
</button>
<form action='.' class="ajax" method="post">
<div class="container">
<div class="panel panel-primary">
<div class="panel-heading">
Create True/False Quiz
</div>
<div class="panel-body">
  <label class="pull-left" style="font-size: 1.2em">Quiz Name:</label>
  <br>
  <br>
  <input class="pull-left" type='text' name='quizname' maxlength="100" required>

<br>
<br>
  <label class="pull-left" style="font-size: 1.2em">Quiz Topic:</label>
  <br>
  <br>
  <input class="pull-left" type='text' name='topic' maxlength="300">
  </div>
    <div class="panel-group" id="accordion" style="margin: 50px">
        <div class="panel panel-success template" id="panel" style="display: none">
            <div class="panel-heading">
                <div class="panel-heading"> <span class="glyphicon glyphicon-remove-circle pull-right "></span>
                    <h4 class="panel-title">
                        <a class="accordion-toggle">
                            Question
                        </a>
                    </h4>
                </div>
            </div>

            <div id="collapseThree" class="panel">
                <div class="panel-body">
                    <div class="form-group row">
                        <label for="prompt" class="col-sm-3 col-form-label">Prompt</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="prompt" maxlength="300" placeholder="Prompt">
                        </div>
                    </div>

                    <!-- <div class="form-group row">
                        <label for="answer" class="col-sm-3 col-form-label">Anwer</label>
                        <div class="col-sm-6">
                          <select name='answer' class="pull-left">
                            <option value="True">True</option>
                            <option value="False">False</option>
                          </select>
                        </div>
                    </div> -->

                    <fieldset class="form-inline row">
                        <label for="answer" class="col-sm-3 col-form-label">Answer</label>
                        <div class="col-sm-6">
                            <label class="radio-inline">
                                <input class="form-check-input" type="radio" name="answer" id="gridRadios1" value="True">
                                True
                            </label>
                            <label class="radio-inline">
                                <input class="form-check-input" type="radio" name="answer" id="gridRadios2" value="False">
                                False
                            </label>
                        </div>
                    </fieldset>
                </div>
            </div>
        </div>
    </div>

    <input type="hidden" name="action" value="new_tf_quiz">
    <input type="submit" class="btn btn-success" value="Create Quiz" id="form_submit">
    <br>
    <br>
    </div>
</form>

<script src="../js/new_quiz.js"></script>
</body>
<?php include('./footer.php'); ?>
