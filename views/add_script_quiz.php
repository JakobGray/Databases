<?php include('./views/header.php'); ?>

<div class="container">
<div class="panel panel-danger">
<div class="panel-heading">
Create Script Quiz
</div>
<div class="panel-body">
<br>
    <button class="btn btn-danger btn-add-panel pull-right" type="submit">
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
                        <label for="script_text" class="col-sm-3 col-form-label">Script</label>
                        <div class="col-sm-6">
                            <textarea type="text" name="script_text" rows="4" cols="50"></textarea>
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
    <br>
    <input type="hidden" name="action" value="new_script_quiz">
    <input type="hidden" name="user" value="<?php echo $user ?>">
    <input type="submit" class="btn btn-success" value="submit" id="form_submit">
</form>
</div>
</div>
</div>
<script src="./js/new_script_quiz.js"></script>
<?php include('./views/footer.php'); ?>
