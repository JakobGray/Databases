<?php include('views/header.php'); ?>


<!--<a href="/Articles/index.php"><img class="img card_img" src="/Articles/images/building.jpg" style="box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);" width='250' height='200'></a><br>
    <div style=''>How to use this site</div>-->

<div class="jumbotron">
    <h1 data-step="1" data-intro="This is a tooltip!">Welcome to Vault 101  </h1>
    <p class="lead" data-step="4" data-intro="Another step.">This is the central hub for archiving and accessing<br> PubMed scientific articles</p>
    <a class="btn btn-large btn-success" onclick="document.getElementById('id01').style.display = 'block'" style="width:auto;">Login Here</a>
</div>

<link rel="stylesheet" type="text/css" href="/Databases/styles/login.css" />

<div id="id01" class="modal">
    <div class='modal-content animate'>
        <form action="." method='post' accept-charset='UTF-8'>
            <input type="hidden" name="action" value="login">

            <div class="imgcontainer">
                <span onclick="document.getElementById('id01').style.display = 'none'" class="close" title="Close Modal">&times;</span>
                <img src="/Articles/images/building.jpg" alt="Avatar" class="avatar">
            </div>

            <div class="container">

                <label><b>Password</b></label>
                <input id='passID' type="password" placeholder="Enter Password" name="password" maxlength='50' required>

                <button type="submit">Login</button>
                <input type="checkbox" name="remember" value="yes"> Remember me
            </div>

            <div class="container" style="background-color:#f1f1f1">
                <button type="button" onclick="document.getElementById('id01').style.display = 'none'" class="cancelbtn">Cancel</button>
            </div>
        </form>
    </div>
</div>


<script type="text/javascript" src="/Databases/js/login.js"></script>

<?php include('views/footer.php'); ?>
