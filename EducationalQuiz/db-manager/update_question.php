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

    $question = $_POST['question'];
    $choice1 = $_POST['choice1'];
    $choice2 = $_POST['choice2'];
    $choice3 = $_POST['choice3'];
    $choice4 = $_POST['choice4'];
    $answer = $_POST['answer'];
    $difficulty = $_POST['difficulty'];
    $id = $_GET['id'];


    if ($question == null | $choice1 == null | $choice2 == null | $choice3 == null | $choice4 == null | $answer == null) {
        $formErr = "Wrong Data" . "<br>" . "Some of the options are void";
        exit();
        return;
    }

    $sql = "UPDATE `questions` SET `question` = '$question', `choice1` = '$choice1', 
        `choice2` = '$choice2', `choice3` = '$choice3', `choice4` = '$choice4', `answer` = '$answer', `difficulty` = '$difficulty' 
        WHERE id = " . $id . ";";

    if ($mysqli->query($sql) === TRUE) {
        echo "The question was updated successfully";
    } else {
        echo "Error" . $mysqli->errno . ": " . $sql . "<br>" . $mysqli->error;
    }

    $mysqli->close();
    header("refresh: 0; url = multiple_choice.php");
    exit();
?>