<?php
include('views/header.php');
include_once("models/database.php");
include_once("models/loginDB.php");
$questions = get_tf_questions();
?>

<script type="text/javascript">
    var questions = <?php echo json_encode($questions); ?>;
    console.log(JSON.stringify(questions, null, 2));

</script>

<?php include('views/footer.php'); ?>