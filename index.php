<?php require_once "TextSummarizer.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Smart Text Summarizer</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h1>Smart Text Summarizer</h1>
    <form method="post">
        <textarea name="text" placeholder="Paste your text here..." required><?php echo $_POST["text"] ?? ""; ?></textarea>
        <button type="submit">Summarize</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] === "POST" && !empty($_POST["text"])) {
        $summarizer = new TextSummarizer($_POST["text"]);
        $summary = $summarizer->summarize(3);

        echo "<h2>Summary</h2>";
        echo "<div class='summary'>";
        foreach ($summary as $line) {
            echo "<p>" . htmlspecialchars($line) . "</p>";
        }
        echo "</div>";
    }
    ?>
</div>
</body>
</html>
