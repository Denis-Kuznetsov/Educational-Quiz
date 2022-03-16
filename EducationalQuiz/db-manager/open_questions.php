<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['username'])) {
    if ($_SESSION["username"] == "admin") {
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
    <div class="db-manager flex-column text-center">
        <h2>Database Manager</h2>
        <div>
            <?php require("show_questions.php") ?>   
        </div>
        <div>
            <a class="btn" href="./db_select.php">Back</a>
            <a class="btn" style="margin: 2rem auto;" href="../main.html">Home Page</a>
        </div>
    </div>
</body>
</html>

<?php 
    } else {
        header("Location: ../main.html");
        exit();
    } 
}
 ?>