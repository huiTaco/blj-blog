<?php
$dbuser = "d041e_listuder";

// ACHTUNG: DU MUST HIER NOCH DAS PASSWORT EINSETZEN. DU FINDEST ES AUF DISCORD IM INFO CHANNEL
$dbpass = "12345_Db!!!";

$pdo = new PDO("mysql:host=mysql2.webland.ch;dbname=d041e_listuder", $dbuser, $dbpass, [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
]);

$sqlQuery = $pdo->query("SELECT * FROM `blog_url`");
$urls = $sqlQuery->fetchAll();
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Links</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body class = "links">
<div class = "title">
        <h1>Links</h1>
    </div>
<?php
    include 'nav.php';
?>
<div class ="haupttext">
    <h2>Hier sind die Links zum Blog meiner BLJ Kollegen</h2>
    <ul>
    <?php
    foreach($urls as $url): ?>
    <a href="<?= $url['blogUrl']?>"><?= $url['blogAuthor'] ?></a>
    <?php endforeach; ?>

    </ul>
</div>
    </body>

