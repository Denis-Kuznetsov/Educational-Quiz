<?php
    session_start();

    if (!isset($_SESSION["loggedin"]) || ($_SESSION != true)) {
        header("location: ../login.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select difficulty</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <div class="container">
            <div class="flex-center flex-column">
                <h1>Choose difficulty</h1>
                <a class="btn" href="./test.php?difficulty=easy">Easy</a>
                <a class="btn" href="./test.php?difficulty=medium">Medium</a>
                <a class="btn" href="./test.php?difficulty=hard">Hard</a>
            </div>
    </div>
</body>
</html>