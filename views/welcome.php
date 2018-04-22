<?php
include('views/header.php');
include('views/login.php');
include_once('./models/loginDB.php');
// include_once('./models/quizDB.php');
?>
<head>
  <script>
  $(document).ready(function() {
    $( "#searchbar" ).change(function() {

      $.ajax({
        url: './models/searchbar.php',
        data: {searchName: $( "#searchbar" ).val()},
        success: function(data){
          $('#searchResults').html(data);
        }
      });
    });

  });
  </script>
</head>

<div class="col-lg-6" style="display: inline-block">
  <table style="width: 80%; margin-left: 10%" border=1>
    <caption>Leaderboard</caption>
    <th style="text-align: center">Topic</th><th style="text-align: center">Type</th><th style="text-align: center">Username</th><th style="text-align: center">Score</th>
    <?php
    foreach ($leaderboard as $l):
      ?>
      <tr>
        <td style="text-align: center"><?php echo $l{'topic'} ?></td>
        <td style="text-align: center"><?php echo $l{'type'} ?></td>
        <td style="text-align: center"><?php echo $l{'username'} ?></td>
        <td style="text-align: center"><?php echo $l{'score'} ?></td>
      </tr>

    <?php endforeach; ?>
  </table>
</div>


<div class="jumbotron">
  <h1 data-step="1" data-intro="This is a tooltip!">Welcome to Quizzy</h1>
  <p class="lead">This is the website for challenging quizzes and trivia.</p>
  <a class="btn btn-large btn-success" href="views/signup.php">Sign Up</a>
  <br>
  <br>
  <!-- <a class="btn btn-large btn-success" href="views/login.php">Log in</a> -->
  <form action='.' method='POST' id="login_form">
    <input type="hidden" name="action" value="show_login">
    <!-- <button type="submit" form="login_form" class="btn btn-large btn-info">Log in</a> -->
    <?php
    if (!isset($_SESSION['is_valid_user'])) {
      echo "<a class='btn btn-large btn-success' onclick=\"document.getElementById('id01').style.display = 'block'\" style=\"width:auto;\">Login Here</a>";
    } else {
      echo "<a href='/~jdg7sh/Databases/?action=my_quizzes'>View Your Quizzies</a>";
    }
    ?>
  </form>
</div>


<input id='searchbar' type="search" class="col-lg-6 col-md-8 myInput" style="width: 60%; margin-left: 20%" placeholder="Search by Topic">

<div id="searchResults" class="col-lg-6 col-md-8">Search Result</div>


<div class="container" style="display: inline-block">

  <div class="row">
    <div class="col-lg-6" style="display: inline-block">
      <table class="myTable" style="width: 80%; margin-left: 10%" border=1>
        <caption><a href="/~jdg7sh/Databases/?action=tf_questions">True/False Quizzes</a></caption>
        <th style="text-align: center">Name</th><th style="text-align: center">Topic</th><th style="text-align: center">Play</th>
        <?php
        foreach ($tf_quizzes as $q):
          ?>
          <tr>
            <td style="text-align: center"><?php echo $q{'name'} ?></td>
            <td style="text-align: center"><?php echo $q{'topic'} ?></td>
            <td style="text-align: center">
              <form action='.' method='POST'>
                <input type="hidden" name="action" value="take_tf_quiz">
                <input type="hidden" name="gameID" value="<?php echo $q{'GID'} ?>">
                <button type="submit" style="width: 90%" class="btn btn-large btn-primary">Play</button>
              </form>
            </td>
          </tr>

        <?php endforeach; ?>
      </table>
    </div>

    <div class="col-lg-6" style="display: inline-block">
      <table class="myTable" style="width: 80%; margin-left: 10%" border=1>
        <caption><a href="/~jdg7sh/Databases/?action=mc_questions">Multiple Choice Quizzes</a></caption>
        <th style="text-align: center">Name</th><th style="text-align: center">Topic</th><th style="text-align: center">Play</th>
        <?php
        foreach ($mc_quizzes as $q):
          ?>
          <tr>
            <td style="text-align: center"><?php echo $q{'name'} ?></td>
            <td style="text-align: center"><?php echo $q{'topic'} ?></td>
            <td style="text-align: center">
              <form action='.' method='POST'>
                <input type="hidden" name="action" value="take_mc_quiz">
                <input type="hidden" name="gameID" value="<?php echo $q{'GID'} ?>">
                <button type="submit" style="width: 90%" class="btn btn-large btn-primary">Play</button>
              </form>
            </td>
          </tr>

        <?php endforeach; ?>
      </table>
    </div>
  </div>

  <br>

  <div class="row">
    <div class="col-lg-6" style="display: inline-block">
      <table class="myTable" style="width: 80%; margin-left: 10%" border=1>
        <caption><a href="/~jdg7sh/Databases/?action=c_questions">Completion Quizzes</a></caption>
        <th style="text-align: center">Name</th><th style="text-align: center">Topic</th><th style="text-align: center">Play</th>
        <?php
        foreach ($c_quizzes as $q):
          ?>
          <tr>
            <td style="text-align: center"><?php echo $q{'name'} ?></td>
            <td style="text-align: center"><?php echo $q{'topic'} ?></td>
            <td style="text-align: center">
              <form action='.' method='POST'>
                <input type="hidden" name="action" value="take_c_quiz">
                <input type="hidden" name="gameID" value="<?php echo $q{'GID'} ?>">
                <button type="submit" style="width: 90%" class="btn btn-large btn-primary">Play</button>
              </form>
            </td>
          </tr>

        <?php endforeach; ?>
      </table>
    </div>

    <div class="col-lg-6" style="display: inline-block">
      <table class="myTable" style="width: 80%; margin-left: 10%" border=1>
        <caption><a href="/~jdg7sh/Databases/?action=script_questions">Script Quizzes</a></caption>
        <th style="text-align: center">Name</th><th style="text-align: center">Topic</th><th style="text-align: center">Play</th>
        <?php
        foreach ($script_quizzes as $q):
          ?>
          <tr>
            <td style="text-align: center"><?php echo $q{'name'} ?></td>
            <td style="text-align: center"><?php echo $q{'topic'} ?></td>
            <td style="text-align: center">
              <form action='.' method='POST'>
                <input type="hidden" name="action" value="take_script_quiz">
                <input type="hidden" name="gameID" value="<?php echo $q{'GID'} ?>">
                <button type="submit" style="width: 90%" class="btn btn-large btn-primary">Play</button>
              </form>
            </td>
          </tr>

        <?php endforeach; ?>
      </table>
    </div>
  </div>
</div>

<?php include('views/footer.php'); ?>
