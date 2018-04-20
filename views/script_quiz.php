<?php
$gameID = filter_input(INPUT_POST, 'gameID');
$scripts = get_scripts_specific($gameID);
?>
<html lang="en-US">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Episode Trivia</title>

    <script type="text/javascript">
        var all_scripts = <?php echo json_encode($scripts); ?>;
        var text = all_scripts[0]['script_text'];
        var answer = all_scripts[0]['answer'];
        console.log(JSON.stringify(all_scripts, null, 2));
    </script>

    <script src="./js/script_quiz.js" async></script>
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Source+Sans+Pro:400,400i,700,700i,900,900i" type="text/css" media="all">
    <link rel="stylesheet" href="./styles/script_quiz.css">
</head>

<body>
    <header class="masthead">
        <h1>Test your Knowledge</h1>
    </header>
    <main class="main">
        <article class="intro">
            <p>Your goal is to type out the name of the episode, EXACTLY, in the field below. The timer starts when you start typing, and only stops when you match the answer exactly. Good Luck!</p>
        </article><!-- .intro -->
        <section class="test-area">
            <div id="origin-text">
              <div id="screen"><b id="prompt" class="idle">&marker;</b></div>
            </div><!-- #origin-text -->

            <div class="test-wrapper">
                <textarea id="test-area" name="textarea" rows="6" placeholder="The clock starts when you start typing."></textarea>
            </div><!-- .test-wrapper -->

            <div class="meta">
                <section id="clock">
                    <div class="timer">00:00:00</div>
                </section>

                <button id="start">Start</button>
            </div><!-- .meta -->
        </section><!-- .test-area -->
    </main>

</body>

</html>
