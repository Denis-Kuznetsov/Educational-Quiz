<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <div class="container">
        <div class="flex-column flex-center" style="margin-top: auto; margin-bottom: auto;">
            <h1 class="my-5">Hi, <i><?php echo htmlspecialchars($_SESSION["username"]); ?></i>. Welcome to our site.</h1>
            <h4>Your quiz statistics:</h4>
            <div>
                <?php require "show_scores.php"; ?>
            </div>
            <p style="margin-bottom: 2rem;">
                <!--<a href="reset-password.php" class="btn btn-warning">Reset Your Password</a>-->
                <!--<a class="btn" href="./highest-scores/highscores.html">Saved Scores</a>-->
                <a href="logout.php" class="btn btn-danger ml-3">Sign Out of Your Account</a>
                <a href="main.html" class="btn">Home Page</a>
            </p>
        </div>
    </div>
</body>
</html>