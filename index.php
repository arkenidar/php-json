<?php
    // Load JSON data
    $file      = 'questions-01.json';
    $jsonData  = file_get_contents($file) or die("Error: Cannot open the file : $file");
    $questions = json_decode($jsonData, true);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Quiz</title>
</head>
<body>
    <h1>Dynamic PHP Quiz ( from <a href="questions-01.json">JSON</a> file format ) </h1>
    <p>Answer the following questions:</p>

<form action="process_quiz.php" method="POST">

<input type="hidden" name="file" value="<?php echo $file; ?>">

<?php foreach ($questions as $index => $question) {?>
<div>
<p><?php echo($index + 1) . '. ' . $question['question']; ?></p>
<ol>
<?php foreach ($question['options'] as $option) {?>
    <li>
    <label>
    <input type="radio" name="question<?php echo $index; ?>" value="<?php echo $option; ?>" required>
    <?php echo "$option\n"; ?>
    </label>
    </li>
<?php }?>
</ol>
</div>

<?php }?>
<button type="submit">Submit Quiz</button>
</form>

</body>
</html>
