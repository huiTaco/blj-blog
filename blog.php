<?php
    function HasEmptySpaces($text) {

        if (stripos($text, " ") === false) {
            // d.h. KEIN Leerzeichen gefunden
           return false;
        }

        return true;
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body class="blogsbody">
    <div class = "title">
        <h1>Blog</h1>
    </div>
    <?php
    include 'nav.php';
    ?>
    
    <div class="haupttext">
        <p>ölkdsjföaosdijuföoljdksagöljöoiewjöoijögoeidjögoijöeopijh</p>
        <p>ölkdsjföaosdijuföoljdksagöljöoiewjöoijögoeidjögoijöeopijh</p>
        <p>ölkdsjföaosdijuföoljdksagöljöoiewjöoijögoeidjögoijöeopijh</p>
        <p>ölkdsjföaosdijuföoljdksagöljöoiewjöoijögoeidjögoijöeopijh</p>
        <p>ölkdsjföaosdijuföoljdksagöljöoiewjöoijögoeidjögoijöeopijh</p>
    </div>
    <div class = "blogs">
        <p>hui</p>
        <p>huiasfasfsdfs</p>





  <?php
     $user = 'd041e_thloetscher';
     $password = '12345_Db!!!';
    $pdo = new PDO('mysql:host=mysql2.webland.ch;dbname=d041e_thloetscher', $user, $password, [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
    ]);
        $query = 'SELECT * FROM `blogs`';
    $stmt = $pdo->query($query);
    $rows = $stmt->fetchAll();

    foreach($rows as $row){
        
       
        if (HasEmptySpaces($row[1]) === false && strlen($row[1]) > 80) {
            echo"<ul>";
            echo '<li>'.  htmlspecialchars($row[2]) . '</li>';
            echo "</ul>";
            echo '<br>' . htmlspecialchars($row[4]);
            echo '<br>' . htmlspecialchars($row[3]);
            echo '<br>' . '<img class="bild" src="' . htmlspecialchars($row[5]) . '">';
            // wir geben nur die ersten 200 Zeichen aus und fügen nach 100 Zeichen einen Leerstring ein
            echo "<br>" . substr($row[1], 0, 80) . "<br>" . substr($row[1], 0, 80). "<br>" . substr($row[1], 0, 80). "<br>" . substr($row[1], 0, 80). "<br>" . substr($row[1], 0, 80) . "<br>" . substr($row[1], 0, 80) . "<br>" . substr($row[1], 0, 80) . "<br>" . substr($row[1], 0, 80) . "<br>" . substr($row[1], 0, 80) . "<br>" . substr($row[1], 0, 80); 
            echo "<hr>";
        }
        else {
            echo "<ul>";
            echo '<li>'. htmlspecialchars($row[2]). '</li>';
            echo "</ul>";
            echo htmlspecialchars($row[4]);
            echo '<br>' . htmlspecialchars($row[3]);
            echo '<br>' . htmlspecialchars($row[1]);
            echo '<br>' . '<img class="bild" src="' . htmlspecialchars($row[5]) . '">';
            echo "<hr>";
        }
}       
    ?>





    </div>
</body>
</html>