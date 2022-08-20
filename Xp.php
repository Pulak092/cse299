<?php

session_start();
$p=$_SESSION['mail'];

$mysqli = new mysqli ('localhost', 'root', '', 'global_pie_system');

$sql = $mysqli->query("SELECT * FROM expert WHERE `expert`.`Email` = '$p'");

if(isset($_POST['submit']))
{
    $file=$_FILES['image']['name'];
    $tempname=$_FILES['image']['tmp_name'];
    $folder="Images/" . $file;

    move_uploaded_file($tempname,$folder);


    $insert = $mysqli->query("UPDATE `expert` SET `Image` = '$folder' WHERE `expert`.`Email` = '$p'");
        if($insert)
        {
            echo '<script type ="text/JavaScript">';  
            echo 'alert("Your profile picture Updated successfully")';  
            echo '</script>';
            header("Refresh:0; url=Xp.php");
        }
        else {
            die ("Picture upload ERROR.");
        }

}
$data = $sql->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Expert Portal</title>
    <link rel="stylesheet" href="Entreprenur.css">
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
</head>

<body>

    <head>
    <style>
        .image{
            display: flex;
            align-items: center;
            justify-content: center;
            margin-left: 13%;
            background-repeat: no-repeat;
            background-size: auto;
            width:250px; 
            height:300px;
            border-width:2px;
            border-style:solid;
            border-color:black; 
            border-radius: 50%; 
            justify-content: center; 
            background-size: 100% 100%;
        }

        .image .form{
            opacity: 0;
        }
        .image--blur {
            backdrop-filter: blur(5px);
        }
        .image > * {
            transform: translateY(20px);
            transition: transform 0.25s;
        }
        .image .form:hover{
            opacity: 1;
            background-color: white;
            
            
        }


        
    </style>
        <div class="space"></div>

        <div id="lo">
            <a href="home.php" style="text-decoration:none;  color: white; "> GLOBAL &nbsp; PIE </a>
        </div>
    </head>


    <div class="wrapper">
        <div class="sidebar">
            <ul>
                <li><a href="home.php">Home</a></li>
                <li><a href="Xp.php">Profile</a></li>
                <li><a href="Xv.php">Videos</a></li>
                <li><a href="Xc.php">Contact</a></li>
            </ul>
        </div>

    </div>


    <div class="profile">


    <?php
        if($data["Image"] == '')
        {
            ?>
        <div class="image" style="background-image: url(https://media.istockphoto.com/vectors/user-icon-flat-isolated-on-white-background-user-symbol-vector-vector-id1300845620?b=1&k=20&m=1300845620&s=170667a&w=0&h=JbOeyFgAc6-3jmptv6mzXpGcAd_8xqkQa_oUK2viFr8=)">
            <form class="form" action="" method="POST" enctype="multipart/form-data">
                
                <input type="file" name="image" style="margin-top: 10%;margin-left: 20%; "><br><br>
                <input type="submit" style="margin-bottom: 10%;margin-left: 40%" value="Change" name="submit"style="margin-left: 20%; ">
            </form>
        </div>
            <?php
        }
        else{

            ?>
        <div class="image" style="background-image: url(<?php echo $data["Image"]; ?>)">
            <form class="form" action="" method="POST" enctype="multipart/form-data">
                
                <input type="file" name="image" style="margin-top: 10%;margin-left: 20%; "><br><br>
                <input type="submit" style="margin-bottom: 10%;margin-left: 40%" value="Change" name="submit"style="margin-left: 20%; ">
            </form>
        </div>
        
            <?php
        }
    ?>
        <br>
        <br><br><br><br>

        <h2><pre>      Name:           <?php echo $data["Name"]; ?></pre></h2>
        <br>
        <h2><pre>         Mail:          <?php echo $data["Email"]; ?></pre></h2>
        <br><br><br><br><br><br>


    </div>




</body>

</html>