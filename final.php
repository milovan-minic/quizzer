<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>PHP Quizzer</title>
    <link rel="stylesheet" href="css/style.css" type="text/css" />
</head>

<body>
<header>
    <div class="container">
        <h1>PHP Quizzer!</h1>
    </div>
</header>

<main>
    <div class="container">
        <h2>You're done!</h2>
            <p>Congrats! You have completed the test.</p>
            <p>Final score: <?php echo $_SESSION['score']; ?></p>
            <a href="question.php?n=1" class="start">Take again</a>
    </div>
</main>

<footer>
    <div class="container">
        Copyright &copy; 2015 PHP Quizzer
    </div>
    <?php
    // Reset score value after quizz has been completed
        $_SESSION['score'] = 0;
    ?>
</footer>
</body>
</html>