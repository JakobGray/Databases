<?php
include('views/header.php');
// $numQuestions = count($questions);
$answers = array();
?>
<script src="./js/c_quiz.js"></script>

<form action="." class="ajax" method="post">
  <?php
  for ($i = 0; $i < sizeof($questions); $i++) {
    $question = $questions[$i];
    $answers[] = $question['answer'];

    echo $question['c_prompt'];
    ?>
    <input type="text" name="<?php echo $x ?>">
    <br>
    <?php
      }
    ?>
  <input type='hidden' name='numQuestions' value='<?php echo sizeof($questions);?>'/>
  <input type='hidden' name='GID' value='<?php echo $gameID;?>'/>
  <?php
  foreach($questions as $q)
  {
    echo '<input type="hidden" name="questions[]" value="';
    echo $q;
    echo '">';
  }
  ?>
  <input type="submit">
</form>


<script>
$(function () {
        $('form.ajax').on('submit', function (e) {
            $.ajax({
                type: 'post',
                url: 'pheno_insert.php',
                data: $('form.ajax').serialize(),
                success: function (data) {
                    console.log('trying to send');
                    alert(data);
                }
            });
            e.preventDefault();
        });
    });
</script>

<?php include('views/footer.php'); ?>
