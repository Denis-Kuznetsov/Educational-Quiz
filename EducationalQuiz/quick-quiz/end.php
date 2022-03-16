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
    <title>End of the test</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <div class="container flex-center">
        <div id="end" class="flex-center flex-column">
            <h1 id="finalScore">0</h1>
            <?php require "update_score.php"; ?>
             <!--
            <p class="hidden" id="difficulty"><?php $_GET["difficulty"] ?></p>
            <p class="hidden" id="question-counter"><?php $_GET["counter"] ?></p>
            <form>
                <input type="hidden" id="username" value="<?php $_SESSION["username"] ?>">
                <button 
                    type = "submit"
                    class = "btn"
                    id = "saveScoreButton"
                    onclick = "saveHighScore(event)"
                > Save </button>
            </form>
            -->
            <a class="btn" href="./diff_select.php">Try again</a>
            <a class="btn" href="../main.html">Home page</a>
        </div>
    </div>
    <script src="./end.js"></script>
</body>
</html>








