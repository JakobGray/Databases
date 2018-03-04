<?php
include('views/header.php');
include_once('./models/loginDB.php');
$questions = get_tf_questions();
?>

<script type="text/javascript">
    var questions = <?php echo json_encode($complex); ?>;
    console.log(JSON.stringify(questions, null, 2));
    
</script>

<?php include('views/footer.php'); ?>
