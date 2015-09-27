<?php include 'database.php';
session_start();

    // Set question number
    $question_number = (int) $_GET['n'];

    /*
     * Get Question
     */
    $query = "SELECT * FROM questions
              WHERE question_number = $question_number";

    // Get the result from query
    $result = $mysqli->query($query) or die($mysqli->error.__LINE__);

    $question = $result->fetch_assoc();

    /*
    * Get total number of questions
    */
    $query = "SELECT * FROM questions";

    // Get results
    $results = $mysqli->query($query) or die($mysqli->error . __LINE__);

    // Get total number of questions
    $total_questions = $results->num_rows;


    /*
     * Get Choices
     */
    $query = "SELECT * FROM choices
                      WHERE question_number = $question_number";

    // Get the results from query
    $choices = $mysqli->query($query) or die($mysqli->error.__LINE__);

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
        <div class="current">Question <?php echo $question_number; ?> of <?php echo $total_questions; ?></div>
        <p class="question">
            <?php echo $question['text']; ?>
        </p>
        <form method="post" action="process.php">
            <ul class="choices">
                <?php while($row = $choices->fetch_assoc()):  ?>
                    <li><input name="choice" type="radio" value="<?php echo $row['id']; ?>" /><?php echo $row['text'];
                        ?></li>
                <?php endwhile; ?>
            </ul>
            <input type="submit" value="Submit" />

            <input type="hidden" name="number" value="<?php echo $question_number ?>" />

        </form>
    </div>
</main>

<footer>
    <div class="container">
        Copyright &copy; 2015 PHP Quizzer
    </div>
</footer>
</body>
</html>