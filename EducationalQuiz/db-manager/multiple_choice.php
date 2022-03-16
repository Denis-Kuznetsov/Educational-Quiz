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
    <div class="container">
        <div class="flex-column text-center">
            <h2>Database Manager</h2>
            <div style="height: 50rem; overflow:auto;">
                <?php 
                require("db_manager.php");
                ?>
            </div>
            <div>
                <table class="flex-center" style="margin: 10px auto;">
                    <tr>
                        <td>
                            <a href="./new_question.php" class="btn">Add Question</a>
                        </td>
                        <td>
                           <a href="../main.html" class="btn">Home Page</a>
                        </td>
                    </tr>
                </table>
            </div>
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