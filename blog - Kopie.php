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
     $user = 'root';
     $password = '';
    $pdo = new PDO('mysql:host=localhost;dbname=blog', $user, $password, [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
    ]);
        $query = 'SELECT * FROM `blogs`';
    $stmt = $pdo->query($query);
    $rows = $stmt->fetchAll();

    foreach($rows as $row){
        
       
        if (HasEmptySpaces($row[1]) === false && strlen($row[1]) > 100) {
            echo"<ul>";
            echo "<li>$row[2]</li>";
            echo "<br>$row[4]";
            echo "<br>$row[3]";
            echo "<br><img src = $row[5]>";
           // echo "<br>$row[5]";
            //echo "<li><img src ="$row[5]"></li>";
            // wir geben nur die ersten 200 Zeichen aus und fügen nach 100 Zeichen einen Leerstring ein
            echo "<br>" . substr($row[1], 0, 100) . "<br>" . substr($row[1], 100, 100). "<br>" . substr($row[1], 100, 100). "<br>" . substr($row[1], 100, 100). "<br>" . substr($row[1], 100, 100) . "<br>" . substr($row[1], 100, 100) . "<br>" . substr($row[1], 100, 100) . "<br>" . substr($row[1], 100, 100) . "<br>" . substr($row[1], 100, 100) . "<br>" . substr($row[1], 100, 100); 
            echo"</ul>";
        }
        else {
            echo"<ul>";
            echo "<li>$row[2]</li>";
            echo "$row[4]";
            echo "<br>$row[3]";
            echo "<br>$row[1]";
            echo "<br><img class=\"bild\"src = $row[5]>";
            //echo "<li><img src ="$row[5]"></li>";
            echo"</ul><hr>";
            
        }
}       
    ?>





    </div>
</body>
</html>