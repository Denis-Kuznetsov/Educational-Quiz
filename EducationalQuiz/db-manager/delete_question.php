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

  $sql = "DELETE FROM `questions` WHERE id=" . $id . ";";

  if ($mysqli->query($sql) === TRUE) {
    echo "The question was removed successfully";
  } else {
    echo "Error" . $mysqli->errno . ": " . $sql . "<br>" . $mysqli->error;
    exit();
  }

  $sql = "ALTER TABLE `questions` DROP COLUMN id;";
  $sql .= "ALTER TABLE `questions` AUTO_INCREMENT = 1;";
  $sql .= "ALTER TABLE `questions` ADD id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY FIRST;";

  if ($mysqli->multi_query($sql) != TRUE) {
    echo "<br>Error" . $mysqli->errno . ": " . $sql . "<br>" . $mysqli->error;
    exit();
  }

  $mysqli->close();
  header("refresh: 0; url = multiple_choice.php");
  exit();
?>