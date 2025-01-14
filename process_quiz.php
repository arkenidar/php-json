<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Process Quiz</title>
</head>
<body>
<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Load JSON data
        $jsonData  = file_get_contents($_POST['file']);
        $questions = json_decode($jsonData, true);

        $score = 0;

        // Iterate through questions and check answers
        foreach ($questions as $index => $question) {
            $userAnswer = $_POST['question' . $index] ?? '';
            if ($userAnswer === $question['answer']) {
                $score++;
            }
        }

        echo "<h1>Your Score: $score/" . count($questions) . "</h1>\n";
        echo "<a href='.'>Take the Quiz Again</a>\n";
    } else {
        echo "Invalid request method.\n";
    }
?>
</body>
</html>
