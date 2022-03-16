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
  
  /*
  echo 'Success: A proper connection to MySQL was made.';
  echo '<br>';
  echo 'Host information: '.$mysqli->host_info;
  echo '<br>';
  echo 'Protocol version: '.$mysqli->protocol_version;
  echo '<br>';
  */

  $sql = 'SELECT * FROM `questions`';
  $result = $mysqli->query($sql) or die($mysqli->error);

  $all_property = array();  //declare an array for saving property

  //showing property
  echo '<table class="data-table flex-center text-center">
          <tr class="data-heading">';  //initialize table tag
  echo '<th class="settings"></th>';
  while ($property = $result->fetch_field()) {
      echo '<th>' . $property->name . '</th>';  //get field name for header
      array_push($all_property, $property->name);  //save those to array
  }
  echo '</tr>'; //end tr tag
  
  //showing all data
  while ($row = $result->fetch_array()) {
      echo '<tr>';
      echo '<td class="settings stn-body">
              <div id="stn-edit"><a href="./edit_question.php?id=' . $row["id"] . '">Edit</a></div>
              <div id="stn-delete"><a href="./delete_question.php?id=' . $row["id"] . 
              '" onclick="return confirm(\'Are you sure you want to delete this item?\');">Delete</a></div>
            </td>';
      foreach ($all_property as $item) {
          if ($item == 'question')
            echo '<td class="question">' . $row[$item] . '</td>';
          else 
            echo '<td>' . $row[$item] . '</td>'; //get items using property value
      }
      echo '</tr>';
  }
  echo "</table>";

  $mysqli->close();
?>