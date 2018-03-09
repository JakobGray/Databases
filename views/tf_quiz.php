<?php
include('views/header.php');
$questions = get_tf_questions();
?>
<link rel="stylesheet" href="./styles/tf_quiz.css">

<script type="text/javascript">
    var all_questions = <?php echo json_encode($questions); ?>;
    console.log(JSON.stringify(all_questions, null, 2));
</script>
<script src="./js/tf_quiz.js"></script>


<div class="cover">
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
</div>

<?php include('views/footer.php'); ?>
