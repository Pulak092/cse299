<?php
session_start();

$vkey = $_SESSION['sql'];

$mysqli = new mysqli ('localhost', 'root', '', 'global_pie_system');

if(isset($_POST['submit']))
{
    $title=$_POST['vtitle'];
    $file=$_FILES['file']['name'];
    $tempname=$_FILES['file']['tmp_name'];
    $folder="Videos/" . $file;

    move_uploaded_file($tempname,$folder);

    $vk=rand();

    $insert = $mysqli->query("INSERT INTO `video` (`VID`,`Entraprenour_Email`, `Title`, `file`) VALUES ('$vk','$vkey','$title', '$folder')");
        if($insert)
        {
            echo '<script type ="text/JavaScript">';  
            echo 'alert("Your Video is Successfully Uploaded")';  
            echo '</script>';
        }
        else {
            die ("Video upload ERROR.");
        }

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>ENTREPRENEUR PORTAL</title>
    <link rel="stylesheet" href="Entreprenur.css">
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>

    <style>
        #vformat{
            position: absolute;
            width: 900px;
            left: 45%;
            top: 30%;
            margin-left: -300px;

        }
        
        form {
        box-sizing: border-box;
        padding: 2rem;
        border-radius: 1rem;
        background-color: hsl(0, 0%, 100%);
        border: 4px solid hsl(0, 0%, 90%);
        display: grid;
        gap: 2rem;
        }
    </style>
</head>

<body>

    <head>
        <div class="space"></div>

        <div id="lo">
            <a href="home.php" style="text-decoration:none;  color: white; "> GLOBAL &nbsp; PIE </a>
        </div>
    </head>


    <div class="wrapper">
        <div class="sidebar">
            <ul>
                <li><a href="home.php">Home</a></li>
                <li><a href="Ep.php">Profile</a></li>
                <li><a href="EU.php">Upload Video</a></li>
                <li><a href="Eh.php">Experts help</a></li>
                <li><a href="Ec.php">Contact</a></li>
            </ul>
        </div>

    </div>

    

            <form action="" method="POST" enctype="multipart/form-data" id="vformat">
                <label>Video title:</label>
                <input type="text" name="vtitle" >
                <label>File upload:</label>
                <input class="file-input" type="file" name="file">
                <input type="submit" value="SUBMIT" name="submit">
              
            </form>





</body>

</html>