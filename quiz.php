<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz</title>
</head>
<body>
    <h1>Basic Quiz</h1>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $answer = $_POST['question'];
        $correctAnswer = "b";

        if ($answer == $correctAnswer) {
            echo "<p>Correct! Good job.</p>";
        } else {
            echo "<p>Incorrect. The correct answer was <strong>B</strong>.</p>";
        }
    }
    ?>
    <form method="post" action="quiz.php">
        <p>What is the capital of France?</p>
        <input type="radio" name="question" value="a" id="a">
        <label for="a">A) Madrid</label><br>
        <input type="radio" name="question" value="b" id="b">
        <label for="b">B) Paris</label><br>
        <input type="radio" name="question" value="c" id="c">
        <label for="c">C) Rome</label><br>
        <button type="submit">Submit</button>
    </form>
</body>
</html>
