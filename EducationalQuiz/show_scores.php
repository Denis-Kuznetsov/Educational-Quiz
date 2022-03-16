<?php
    session_start();

    require "config.php";

    $sql = "SELECT * FROM scores_db WHERE username='". $_SESSION["username"] ."'";
    $return = $mysqli->query($sql) or die($mysqli->error);

    echo "<table class='data-table' style='margin: 3rem auto;'>";
    echo "<tr>";
    echo "<th>Difficulty</th>";
    echo "<th>Score</th>";
    echo "<th>Correct questions</th>";
    echo "</tr>";

    if ($data = $return->fetch_array()) {
        $scores = json_decode($data["scores"], true);

        foreach ($scores as $score) {
            echo "<tr>";
            echo "<td>";
            echo $score["difficulty"];
            echo "</td>";
            echo "<td>";
            echo $score["score"];
            echo "</td>";
            echo "<td>";
            echo $score["counter"] . "/5";
            echo "</td>";
            echo "</tr>";
        }
    }

    echo "</table>";
?>