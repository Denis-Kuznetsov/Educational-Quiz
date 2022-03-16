<?php
  // Connect to the MySQL database
  require_once "config.php";

  // Select the questions table
  $sql = "SELECT * FROM `questions`";

  $result = $mysqli->query($sql) or die($mysqli->error);

  // Create the questions.json file
  $myfile = fopen("questions.json", "w");
  $str = "";
  $str .= "[";

  // Get the data from the questions table
  while ($db_field = $result->fetch_assoc()) {
    $str .= "\n{\n";
    
    // Get id
    $id = $db_field["id"];
    $text = "\"id\": \"" . $id . "\",\n";
    $str .= $text;

    // Get the question text
    $question = $db_field["question"];
    $text = "\"question\": \"" . $question . "\",\n";
    $str .= $text;
    
    // Get the first option
    $choice = $db_field["choice1"];
    $text = "\"choice1\": \"" . $choice . "\",\n";
    $str .= $text;

    // Get the second option
    $choice = $db_field["choice2"];
    $text = "\"choice2\": \"" . $choice . "\",\n";
    $str .= $text;

    // Get the third option
    $choice = $db_field["choice3"];
    $text = "\"choice3\": \"" . $choice . "\",\n";
    $str .= $text;

    // Get the fourth option
    $choice = $db_field["choice4"];
    $text = "\"choice4\": \"" . $choice . "\",\n";
    $str .= $text;
    
    // Get the number of the correct option
    $answer = $db_field["answer"];
    $text = "\"answer\": \"" . $answer . "\",\n";
    $str .= $text;

    $difficulty = $db_field["difficulty"];
    $text = "\"difficulty\": \"" . $difficulty . "\"\n";
    $str .= $text;

    $str .= "},";
  }
  
  $str = substr($str, 0, -1);
  $str .= "\n]";
  

  // Save the JSON file
  fwrite($myfile, $str);
  fclose($myfile);

  // Load open questions
  $sql = "SELECT * FROM `AI SL Question Bank`";

  $result = $mysqli->query($sql) or die($mysqli->error);

  $myfile = fopen("AISL_questions.json", "w");
  $str = "";
  $str .= "[";

  while ($db_field = $result->fetch_assoc()) {
    $str .= "\n{\n";

    $id = $db_field["id"];
    $text = "\"id\": \"" . $id . "\",\n";
    $str .= $text;
    
    $question = $db_field["img_questions"];
    $text = "\"img_questions\": \"" . $question . "\",\n";
    $str .= $text;

    $answer = $db_field["img_answers"];
    $text = "\"img_answers\": \"" . $answer . "\"\n";
    $str .= $text;

    $str .= "},";
  }

  $str = substr($str, 0, -1);
  $str .= "\n]";
  fwrite($myfile, $str);
  fclose($myfile);
  
  $mysqli->close();
  header("Location: main.html");
  exit();
?>