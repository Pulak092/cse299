<?php
error_reporting(0);

$mysqli = new mysqli ('localhost', 'root', '', 'global_pie_system');

    
    $check = $mysqli->query("SELECT * FROM video where `video`.`Entraprenour_Email` = 'saha.pa85@gmail.com'");

        $show = $check->fetch_assoc();
        
        die($show["file"]);



?>

<!DOCTYPE html>

<html>
    <head>
        <title>VIDEOS</title>
    </head>
    <body>
        
    </body>
</html>

