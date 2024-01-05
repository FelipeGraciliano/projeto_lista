<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
    $file = file_put_contents("text.txt", $name . PHP_EOL, FILE_APPEND);
}

$names = [];
if (file_exists("text.txt")) {
    $file = file_get_contents("text.txt");
    $names = explode(PHP_EOL, $file);
}
?>

<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>projeto lista</title>
</head>

<body>

    <form action="index.php" method="POST">
        <input type="text" name="name">
        <input type="submit" value="Cadastrar">
    </form>

    <ul>
        <?php foreach ($names as $name) : ?>
            <?php if (empty($name)) continue; ?>
            <li><?= $name ?></li>
        <?php endforeach; ?>
    </ul>

</body>

</html>