<?php include('./header.php'); ?>
<div class="container">
<div class="panel panel-warning">
<div class="panel-heading">
Create Completion Quiz
</div>
<div class="panel-body">
<br>
    <button class="btn btn-warning btn-add-panel pull-right" type="submit">
        <i class="glyphicon glyphicon-plus"></i>&nbsp;add question
    </button>
<form action='.' class="ajax" method="post">
  <label class="pull-left" style="font-size: 1.2em">Quiz Name:&nbsp;</label>
  <input class="pull-left" type='text' name='quizname' maxlength="100" required>
  <br>
  <br>
  <label class="pull-left" style="font-size: 1.2em">Quiz Topic:&nbsp;</label>
  <input class="pull-left" type='text' name='topic' maxlength="300">
  <br>
  <br>

    <div class="panel-group" id="accordion">
        <div class="panel panel-default template" id="panel" style="display: none">

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

                    <div class="form-group row">
                        <label for="answer" class="col-sm-3 col-form-label">Answer</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="answer" maxlength="300" placeholder="Answer">
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>

    <input type="hidden" name="action" value="new_c_quiz">
    <input type="submit" class="btn btn-success" value="Create Quiz" id="form_submit">
</form>
</div>
</div>
</div>
<script src="../js/new_mc_quiz.js"></script>
<?php include('./footer.php'); ?>
