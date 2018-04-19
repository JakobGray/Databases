<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Quizzy</title>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>

    <body>
      <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="http://plato.cs.virginia.edu/~<?php echo $_SESSION['userID']?>/Project/index.php">Quizzy</a>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav">
                      <?php
                      //Search Feature, hide on login page
                      if (isset($_SESSION['is_valid_user'])) {
                        echo "<li style='display:inline-block'><a href=''./views/add_tf_quiz.php'>Add TF Quiz</a></li>"
                        echo "<li style='display:inline-block'><a href='./views/add_mc_quiz.php'>Add MC Quiz</a></li>"
                        echo "<li style='display:inline-block'><a href='./views/add_c_question.php'>Add Completion Question</a></li>"
                        echo "<li style='display:inline-block'><a href='./views/add_script_quiz.php'>Add Script Quiz</a></li>"
                        echo "<li style='display:inline-block'><a href='/~$userID/Databases/index.php?action=logout'>Logout</a></li>";
                        } ?>
                    </ul>
                    <!--Intro guide-->
                    <ul class="nav navbar-nav navbar-right">
                        <li><span class="glyphicon glyphicon-info-sign"></span> Help</a></li>
                    </ul>
                </div>
            </div>
            <!-- <li><a href="/~<?php //echo $userID ?>/Databases/index.php?action=logout"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li> -->

        </nav>

        <div class="container-fluid text-center">
            <div class="row content ">
