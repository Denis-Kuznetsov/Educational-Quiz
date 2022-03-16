<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['username'])) {
    if ($_SESSION["username"] == "admin") {
?>

<?php
    $db_host = 'localhost';
    $db_user = 'root';
    $db_password = 'root';
    $db_db = 'quiz';

    $mysqli = @new mysqli(
        $db_host,
        $db_user,
        $db_password,
        $db_db
    );
    
    if ($mysqli->connect_error) {
        echo 'Errno: '.$mysqli->connect_errno;
        echo '<br>';
        echo 'Error: '.$mysqli->connect_error;
        exit();
    }

    $id = $_GET["id"];

    $sql = "SELECT * FROM `questions` WHERE id=" . $id . ";";
    $result = $mysqli->query($sql) or die($mysqli->error);

    $question_data = $result->fetch_array();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Database Manager</title>
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="./db-style.css">
</head>
<body>
    <div class="container flex-column flex-center">
        <h2>Edit Question #<?php echo $id;?></h2>
        <form action=<?php echo '"update_question.php?id=' . $id . '"';?> class="edit-question" method="post">
            <div class="edit-question">
                <i><h4>Question:</h4></i>
                <input class="edit-question" type="text" name="question" required value=<?php echo '"' . $question_data['question']. '"';?>>
            </div>
            <div class="edit-question">
                <i>Choice 1:</i>
                <input class="edit-question" type="text" name="choice1" required value=<?php echo '"' . $question_data['choice1']. '"';?>>
            </div>
            <div class="edit-question">
                <i>Choice 2:</i>
                <input class="edit-question" type="text" name="choice2" required value=<?php echo '"' . $question_data['choice2']. '"';?>>
            </div>
            <div class="edit-question">
                <i>Choice 3:</i>
                <input class="edit-question" type="text" name="choice3" required value=<?php echo '"' . $question_data['choice3']. '"';?>>
            </div>
            <div class="edit-question">
                <i>Choice 4:</i>
                <input class="edit-question" type="text" name="choice4" required value=<?php echo '"' . $question_data['choice4']. '"';?>>
            </div>
            <div class="edit-question">
                <i>Answer:</i>
                <input class="edit-question" type="text" name="answer" required value=<?php echo '"' . $question_data['answer']. '"';?>>
            </div>
            <div class="edit-question">
                <i>Difficulty:</i>
                <input class="edit-question" type="text" name="difficulty" required value=<?php echo '"' . $question_data['difficulty']. '"';?>>
            </div>
            <div class="edit-question">
                <input class="edit-question" type="submit" onclick="return confirm('Are you sure you want to update this question?');">
            </div>
        </form>
        <a class="btn" href="./multiple_choice.php">Back</a>
    </div>
</body>
</html>

<?php
    $mysqli->close();
?>

<?php 
    } else {
        header("Location: ../main.html");
        exit();
    } 
}
 ?>