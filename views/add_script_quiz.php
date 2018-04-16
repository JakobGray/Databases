<?php include('./header.php'); ?>

<br>
<div class="input-group col-md-6">
    <button class="btn btn-default btn-add-panel" type="submit">
        <i class="glyphicon glyphicon-plus"></i>
    </button>
</div>
<br><br>
<form action='.' class="ajax" method="post">
  <label class="pull-left">Quiz Name:</label>
  <input class="pull-left" type='text' name='quizname' maxlength="100" required>

  <label class="pull-left">Quiz Topic:</label>
  <input class="pull-left" type='text' name='topic' maxlength="300">

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
                        <label for="script_text" class="col-sm-3 col-form-label">Script</label>
                        <div class="col-sm-6">
                            <textarea type="text" name="script_text" rows="4" cols="50">
                            <input type="text" class="form-control" name="script_text" maxlength="300" placeholder="Dialog Here">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="answer" class="col-sm-3 col-form-label">Answer</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="answer" maxlength="300" placeholder="Episode/Movie name">
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <input type="hidden" name="action" value="new_script_quiz">
    <input type="submit" value="submit" id="form_submit">
</form>

<script src="../js/new_script_quiz.js"></script>
<?php include('./footer.php'); ?>
