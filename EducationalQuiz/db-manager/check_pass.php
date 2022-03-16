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
    session_start();

    $pass = $_POST["pass"];
    $pass = trim($pass);
    $pass = stripslashes($pass);
    $pass = htmlspecialchars($pass);

    if(empty($pass)){
        header("Location: security_check.php?error=Password is required");
        exit();
    }

    $sql = 'SELECT * FROM `users` WHERE user_name = "admin" AND password="' . $pass . '";';
    $result = $mysqli->query($sql) or die($mysqli->error);

    $row = $result->fetch_assoc();

    if ($row["password"] === $pass) {
        $_SESSION['name'] = $row['user_name'];
        $_SESSION['id'] = $row['id'];
        header("Location: db_select.php");
        exit();
    } else { 
        header("Location: security_check.php?error=Incorect Password");
        exit();
    } 


    header("Location: security_check.php");
    exit();
?>

