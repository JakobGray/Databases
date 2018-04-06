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
                    <a class="navbar-brand" href="/Articles/index.php"><img src="/Articles/images/logo2.png" width="130"></a>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav">
                        <li style='display:inline-block'><a href="/Articles/index.php">Article Bank</a></li>
                        <li style='display:inline-block' id='step6'><a href="/Articles/index.php?action=show_manual_add">Manual Add</a></li>
                        <li style='display:inline-block' id='step7'><a href="/Articles/index.php?action=show_dump_add">Batch Upload</a></li>
                        <?php
                        //Search Feature, hide on login page
                        if (isset($_SESSION['is_valid_admin'])) {
                            echo "<li style='display:inline-block'>
                            <form action='.' method='GET' style='max-width: 500px;' id='step4'>
                                <div class='search-box'>
                                    <input type='hidden' name='pmid' id='search_pmid'>
                                    <input type='hidden' name='action' value='show_article'>
                                    <div class='input-group'>
                                        <input type='text' class='form-control' placeholder='Ex. PMID:2004 AND TITLE:MAPK'>
                                        <div class='input-group-btn'>
                                            <button class='btn btn-default' type='submit'><i class='glyphicon glyphicon-search'></i></button>
                                        </div>
                                        <div class='result'></div>
                                    </div>
                                </div>
                            </form>
                        </li>";
                        }
                        ?>
                    </ul>
                    <!--Intro guide-->
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="javascript:void(0);" onclick="javascript:introJs()
                                        .setOption('showProgress', true)
                                        .setOption('showBullets', false)
                                        .setOptions({
                                            steps: [
                                                {
                                                    intro: 'Welcome to the archive! Here you will find a large collection of autism related articles'
                                                },
                                                {
                                                    element: document.querySelector('#step2'),
                                                    intro: 'Here is where the details of each article are listed in table form. Click on an articles title to access its info and files.'
                                                },
                                                {
                                                    element: document.querySelector('#step3'),
                                                    intro: 'This search bar filters the table for easier viewing. Choose the category to filter by using the buttons below'
                                                },
                                                {
                                                    element: document.querySelector('#step4'),
                                                    intro: 'For finding a specific article, this search tool can be used to narrow results by multiple fields broken by an AND',
                                                },
                                                {
                                                    element: document.querySelector('#pre_ajax'),
                                                    intro: 'This sidebar makes adding a new article easy. Just put in the PMID and any files, the rest is taken care of.',
                                                },
                                                {
                                                    element: document.querySelector('#step6'),
                                                    intro: 'This tab is used for inserting articles manually if need be.',
                                                    position: 'bottom'
                                                },
                                                {
                                                    element: document.querySelector('#step7'),
                                                    intro: 'For uploading many files at once, use this tab, as long as the filename contains the PMID for the associated article.'
                                                }
                                            ]}
                                        ).start();"><span class="glyphicon glyphicon-info-sign"></span> Help</a></li>
                    </ul>
                </div>
            </div>
            <li><a href="/Articles/index.php?action=logout"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>

        </nav>

        <div class="container-fluid text-center">
            <div class="row content ">
