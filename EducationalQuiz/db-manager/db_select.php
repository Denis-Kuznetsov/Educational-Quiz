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
    <title>Select Question Type</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <div class="container">
        <div class="flex-column flex-center">
            <a class="btn" href="./multiple_choice.php">Multiple Choice Questions</a>
            <a class="btn" href="./open_questions.php">Open Questions</a>    
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