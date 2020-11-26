<?php

/* insert into blogs (created_at, description, title, username) 
	values(now(), 'dies ist mein erster post', 'erster post', 'Hans') */

    $errors = [];
    $formSent  = false;

    // Verbindung zur DB herstellen
    $user = 'root';
    $password = '';

    $pdo = new PDO('mysql:host=localhost;dbname=blog', $user, $password, [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
    ]);
   

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $created_by  = trim($_POST['created_by']    ?? '');
        $post_title  = trim($_POST['post_title']   ?? '');
        $text        = trim($_POST['text']   ?? '');
        $link        = trim($_POST['link'] ?? ''); 
        //$link        = trim($_POST['post_title']   ?? '');

        if ($created_by === ''){
            $errors[] = 'Bitte geben Sie einen Namen ein.';
        }
        if ($post_title === ''){
            $errors[] = 'Bitte geben Sie einen Titel ein.';
        }
        if ($text === ''){
            $errors[] = 'Bitte geben Sie einen Text ein.';
        
        }
        if (count($errors) === 0) {
            // Insert auf DB machen 
            $stmt = $pdo->prepare("insert into blogs (created_at, description, title, username)  VALUES(now(), :description, :title, :username) ");
            $stmt->execute([':description' => $text, ':title' => $post_title, ':username' => $created_by ]);
           

        }
    }



?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Document</title>
        <link rel="stylesheet" href="styles.css">

    </head>
    <body class="login">
    <div class = "title">
        <h1>Neuen Blog-Beitrag erfassen</h1>
    </div>

    <?php
    include 'nav.php';
    ?>
    

            <div class="haupttext">

            <?php if ($formSent): ?>

            <h2>Formular abgesendet!</h2>
            <p>Vielen Dank für Ihren Post.</p>

            <?php else: ?>

            <?php if(count($errors) > 0);?>
                <ul>
                    <?php foreach ($errors as $error) : ?>
                        <li><?= $error?></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>

        <form method="post">
            <fieldset>
                <div class="form-group">
                    <label class="form-label" for="created_by" name="created_by">Ihr Name</label><br>
                    <textarea class="form-control" type="text" id="created_by" name="created_by" rows="1" cols="68" value="<?= htmlspecialchars($created_by ?? '' )?>"></textarea>
                </div>
                <div class="form-group">
                    <label class="form-label" for="post_title" name="post_title">Titel</label><br>
                    <textarea class="form-control" type="text" id="post_title" name="post_title" rows="1" cols="68" value="<?= htmlspecialchars($post_title ?? '' )?>"></textarea>
                </div>
                <div class="form-group">
                    <label class="form-label" for="text" name="text">Text</label><br>
                    <textarea class="form-control" type="text" id="text" rows="10" cols="68" name="text" value="<?=htmlspecialchars( $text ?? '' )?>"></textarea>
                </div>
                <input type="submit" value="senden">
            </fieldset>
        </form>



    </body>
</html>