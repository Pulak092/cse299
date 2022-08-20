<?php

$mysqli = new mysqli ('localhost', 'root', '', 'global_pie_system');


if(isset($_POST['send']))
{
    $comm=$_POST['comment'];

    $code=$_POST['code'];


    $insert = $mysqli->query("INSERT INTO `comments` (`VID`, `comment`) VALUES ('$code', '$comm')");


    if($insert)
    {
        header("Refresh:0; url=Xv.php");
    }
    else{
        die ("Comments Error");
    }




}
?>