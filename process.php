<?php include 'database.php';

session_start();

    // Check to see if the score is set
    if(!isset($_SESSION['score'])){
        $_SESSION['score'] = 0;
    }

    // Reset score if test was already taken
//    if($_SESSION['score'] > 0){
//        $_SESSION['score'] = 0;
//    }

if($_POST){
    $question_number = $_POST['number'];
    $selected_choice = $_POST['choice'];
    $next_question = $question_number + 1;

//    print_r($_POST);
//    echo '<br />' . $question_number . '<br />';
//    echo $selected_choice;
//    exit();

    /*
     * Get total number of questions
     */
    $query = "SELECT * FROM questions";

    // Get results
    $results = $mysqli->query($query) or die($mysqli->error . __LINE__);

    // Get total number of questions
    $total_questions = $results->num_rows;


    /*
     * Get correct choice
     */
    $query = "SELECT * FROM choices
                WHERE question_number = $question_number
                AND is_correct = 1";

    // Get result
    $result = $mysqli->query($query) or die($mysqli->error . __LINE__);

    // Get row
    $row = $result->fetch_assoc();

    // Set correct choice
    $correct_choice = $row['id'];

    // Compare choices
    if($correct_choice == $selected_choice){
        // Answer is correct
        $_SESSION['score'] ++;
    }

    // Check if it is the last question
    if($question_number == $total_questions){
        header("Location: final.php");
        exit();
    } else {
        header("Location: question.php?n=" . $next_question);
    }

}