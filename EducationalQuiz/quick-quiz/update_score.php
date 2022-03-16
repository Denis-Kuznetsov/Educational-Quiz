<?php
    session_start();

    require "../config.php";

    $sql = "SELECT * FROM scores_db WHERE username = '". $_SESSION["username"] . "'";
    $sql_return = $mysqli->query($sql) or die($mysqli->error);

    class Score {
        public function __construct($score, $difficulty, $counter) {
            $this->score = $score;
            $this->difficulty = $difficulty;
            $this->counter = $counter;
        }
    }

    if (!isset($_GET["score"]) || !isset($_GET["difficulty"]) || !isset($_GET["counter"])) {
        $mysqli->close();
        echo "Something went wrong: some parameters are not defined (score; difficulty; counter)";
        exit();
    }
    $finalScore = new Score($_GET["score"], $_GET["difficulty"], $_GET["counter"]);

    if ($data = $sql_return->fetch_assoc()) {
        $scores = json_decode($data["scores"], true);

        if ($scores == null) {
            $scores = [];
        }

        array_unshift($scores, $finalScore);
        array_splice($scores, 100);

        $sql = "UPDATE scores_db SET scores='".json_encode($scores)."' WHERE username='".$_SESSION["username"]."'";
        $return = $mysqli->query($sql) or die($mysqli->error);
    } else {
        $sql = "INSERT INTO scores_db (username, scores) VALUES ('".$_SESSION["username"]."', '[".json_encode($finalScore)."]')";
        $return = $mysqli->query($sql) or die($mysqli->error);
    }

    $mysqli->close();
?>