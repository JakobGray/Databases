<?php
include('views/header.php');
$gameID = filter_input(INPUT_POST, 'gameID');
$questions = get_c_questions_specific($gameID);
?>
<!-- <link rel="stylesheet" href="./styles/tf_quiz.css"> -->

<script type="text/javascript">
    var all_questions = <?php echo json_encode($questions) ?>;
    var quizID = <?php echo $gameID ?>;
    var playerID = "<?php echo (isset($_SESSION['username'])) ? $_SESSION['username'] : ''; ?>";
    console.log(JSON.stringify(all_questions, null, 2));
</script>
<script src="./js/c_quiz.js"></script>

<form action='.' class="cquiz_form" method="post">
<!-- 
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
    </div> -->

    <input type="hidden" name="action" value="c_quiz">
    <input type="submit" value="submit" id="form_submit">
</form>

<!-- <div class="cover">
  <div class="container">
    <div class="row text-center">
      <div class="col-6-lg" id="quiz">
        <h1 id="quiz-name"></h1>


        <button class="btn" id="prev-question-button"><i class="fa fa-arrow-left fa-2x"></i></button>
        <button class="btn" id="next-question-button"><i class="fa fa-arrow-right fa-2x"></i></button>
        <button class="btn" id="submit-button"><i class="fa fa-check fa-2x"></i></button>
        <div id="quiz-results">
          <p id="quiz-results-message"></p>
          <p id="quiz-results-score"></p>
          <div class="btn-group middle">
            <a href="tweet-result" target="_blank"><i class="fa fa-twitter fa-3x"></i></a>
            <a href="https://www.facebook.com/sharer/sharer.php?u=https://www.animalfriends.org.uk/" target="_blank"><i class="fa fa-facebook fa-3x"></i></a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div> -->

<?php include('views/footer.php'); ?>
