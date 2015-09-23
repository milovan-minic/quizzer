<?php include 'database.php' ?>
<?php
    /*
     * Get total number of questions
     */
    $query = "SELECT * FROM questions";

    // Get query results
    $results = $mysqli->query($query) or die($mysqli->error.__LINE__);

    // Get total number of returned rows
    $total = $results->num_rows;
?>

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
                <h2>Test your PHP knowledge</h2>
                <p>This is multiple choice quiz to test your knowledge of PHP</p>
                <ul>
                    <li><strong>Number of Questions: </strong><?php echo $total; ?></li>
                    <li><strong>Type: </strong>Multiple Choice</li>
                    <li><strong>Estimated Time: </strong><?php echo $total * .5; ?> Minutes</li>
                </ul>

                <a href="question.php?n=1" class="start">Start Quiz</a>
            </div>
        </main>

        <footer>
            <div class="container">
                Copyright &copy; 2015 PHP Quizzer
            </div>
        </footer>
    </body>
</html>