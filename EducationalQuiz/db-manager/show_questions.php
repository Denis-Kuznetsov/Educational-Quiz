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


    $sql = 'SELECT * FROM `AI SL Question Bank`';
    $result = $mysqli->query($sql) or die($mysqli->error);

    while ($db_field = $result->fetch_array()) {
        echo '<div class="question-show"><h4 class="db-open-question">Question #' . $db_field["id"] . '</h4><img class="question-img" src="../uploads/questions/' . $db_field["img_questions"] . '" alt="Open Question">';
        echo '<img class="answer-img" src="../uploads/answers/' . $db_field["img_answers"] . '" alt="Answers"></div>';
    }
?>