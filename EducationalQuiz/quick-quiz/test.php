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
    <title>Quick Quiz</title>
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="./test.css">
</head>
<body>
    <div class="container">
        <div id="loader"></div>

        <div id="sample-test" class="justify-center flex-column hidden">
            <div id="hud">
                <div id="div-hud">
                    <p class="hud-prefix">
                        Score
                    </p>
                    <h1 class="hud-main-text" id="score">
                        0
                    </h1>
                </div>

                <div id="div-hud">
                    <p class="hud-prefix">
                        Question
                    </p>
                    <h1 class="hud-main-text" id="questionCounter">
                    </h1>
                </div>

                <div class="div-hud">
                    <p class="hud-prefix">
                        Difficulty
                    </p>
                    <h1 class="hud-main-text" id="difficulty">
                        <?php echo($_GET["difficulty"]) ?>
                    </h1>    
                </div>
            </div>
            <h2 id="question">What is the question?</h2>
            <div class="choice-container">
                <p class="choice-prefix">A</p>
                <p class="choice-text" data-number="1">Choice 1</p>
            </div>
            <div class="choice-container">
                <p class="choice-prefix">B</p>
                <p class="choice-text" data-number="2">Choice 2</p>
            </div>
            <div class="choice-container">
                <p class="choice-prefix">C</p>
                <p class="choice-text" data-number="3">Choice 3</p>
            </div>
            <div class="choice-container">
                <p class="choice-prefix">D</p>
                <p class="choice-text" data-number="4">Choice 4</p>
            </div>
            <div id="progress-bar">
                <div id="progress-bar-full"></div>
            </div>
        </div>
    </div>

    <script src="./test.js"></script>
</body>
</html>