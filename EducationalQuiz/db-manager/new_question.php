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
    <title>Add New Question</title>
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="./db-style.css">
</head>
<body>
    <div class="container">
        <div class="flex-center flex-column">
            <br>
            <h1 style="margin-top: 5rem;">Add New Question</h1>
            <form action="add_question.php" method="post">
                <table class="text-center">
                <tr>
                    <td style="padding: 1.5rem;" colspan="2"> 
                        <h3>Question: </h3><input type="text" name="question" required>
                    </td>
                </tr>
                <tr>
                    <td style="padding: 1.5rem;">
                        <h3>Choice 1: </h3><input type="text" name="choice1" required>
                    </td>
                    <td style="padding: 1.5rem;">
                        <h3>Choice 2: </h3><input type="text" name="choice2" required>
                    </td>
                </tr>
                <tr>
                    <td style="padding: 1.5rem;">
                        <h3>Choice 3: </h3><input type="text" name="choice3" required>
                    </td>
                    <td style="padding: 1.5rem;">
                        <h3>Choice 4: </h3><input type="text" name="choice4" required>
                    </td>
                </tr>
                <tr>
                    <td style="padding: 1.5rem;" colspan="2">
                        <h3>Answer: </h3><input type="text" name="answer" required>
                    </td>
                </tr>
                <tr>
                    <td style="padding: 1.5rem;" colspan="2">
                        <h3>Difficulty: </h3>
                        <select name="difficulty" required>
                            <option value="easy">Easy</option>
                            <option value="medium">Medium</option>
                            <option value="hard">Hard</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td style="padding: 1.5rem;" colspan="2">
                        <input type="submit">
                    </td>
                </tr>
                </table>
            </form>
            <a href="./multiple_choice.php" class="btn">Database</a>
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