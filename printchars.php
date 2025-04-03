<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print Characters</title>
</head>
<body>
    <h1>Print Characters</h1>
    <form method="post" action="printchars.php">
        <label for="char">Enter a character:</label>
        <input type="text" name="char" id="char" maxlength="1" required>
        <br>
        <label for="count">How many times to print it?</label>
        <input type="number" name="count" id="count" min="1" required>
        <br><br>
        <button type="submit">Generate</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $char = $_POST['char'];
        $count = intval($_POST['count']);

        $output = "";
        for ($i = 0; $i < $count; $i++) {
            $output .= $char;
        }

        echo "<p>Result: $output</p>";
    }
    ?>
</body>
</html>
