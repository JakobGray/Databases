<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Quizzys</title>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <link rel="stylesheet" type="text/css" href="http://plato.cs.virginia.edu/~jdg7sh/Databases/styles/full_tables.css" />
        <link rel="stylesheet" type="text/css" href="http://plato.cs.virginia.edu/~jdg7sh/Databases/styles/tables.css" />

    </head>

    <body>
      <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="http://plato.cs.virginia.edu/~jdg7sh/Databases/index.php">Quizzy</a>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav">
                      <?php
                      //Search Feature, hide on login page
                      if (isset($_SESSION['is_valid_user'])) {
                        echo "<li style='display:inline-block'><a href='/~jdg7sh/Databases/?action=add_tf_quiz''>Add TF Quiz</a></li>";
                        echo "<li style='display:inline-block'><a href='/~jdg7sh/Databases/?action=add_mc_quiz'>Add MC Quiz</a></li>";
                        echo "<li style='display:inline-block'><a href='/~jdg7sh/Databases/?action=add_c_quiz'>Add Completion Quiz</a></li>";
                        echo "<li style='display:inline-block'><a href='/~jdg7sh/Databases/?action=add_script_quiz'>Add Script Quiz</a></li>";

                        } ?>
                    </ul>
                    <!--Intro guide-->
                    <ul class="nav navbar-nav navbar-right">
                        <?php
                        if (isset($_SESSION['is_valid_user'])) {
                            echo "<li style='display:inline-block'><a href='/~$userID/Databases/index.php?action=logout'>Logout <span class='glyphicon glyphicon-log-out'></a></li>";
                        } ?>
                    </ul>
                </div>
            </div>
            <!-- <li><a href="/~<?php //echo $userID ?>/Databases/index.php?action=logout"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li> -->

        </nav>

        <div class="container-fluid text-center">
            <div class="row content ">
