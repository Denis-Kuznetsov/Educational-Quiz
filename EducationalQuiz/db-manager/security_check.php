<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    if ($_SESSION["username"] == "admin" && $_SESSION["id"] == 1) {
        header("location: multiple_choice.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Private Area</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <div class="container">
        <div class="flex-column flex-center">
            <h1>Private Area</h1>
            <p>You don't have access to this area. Please, sign in to proceed.</p>
            <br>
            <a href="../login.php" class="btn">Login</a>
            <a href="../main.html" class="btn">Home Page</a>
        </div>
    </div>
</body>
</html>