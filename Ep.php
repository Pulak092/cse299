<?php

session_start();
$p=$_SESSION['sql'];

$mysqli = new mysqli ('localhost', 'root', '', 'global_pie_system');

$sql = $mysqli->query("SELECT * FROM entraprenour WHERE `entraprenour`.`Email` = '$p'");
$sql1 = $mysqli->query("SELECT * FROM video WHERE `video`.`Entraprenour_Email` = '$p'");


if(isset($_POST['submit']))
{
    $file=$_FILES['image']['name'];
    $tempname=$_FILES['image']['tmp_name'];
    $folder="Images/" . $file;

    move_uploaded_file($tempname,$folder);


    $insert = $mysqli->query("UPDATE `entraprenour` SET `Image` = '$folder' WHERE `entraprenour`.`Email` = '$p'");
        if($insert)
        {
            echo '<script type ="text/JavaScript">';  
            echo 'alert("Your profile picture Updated successfully")';  
            echo '</script>';
            header("Refresh:0; url=Ep.php");
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
        .right{
            background-color: #D3D3CB;
            text-align: left;
            border-radius: 25px;
            

        }

        
    </style>
    <meta charset="UTF-8">
    <title>ENTREPRENEUR PORTAL</title>
    <link rel="stylesheet" href="Entreprenur.css">
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
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

        <h1>Videos:</h1><br><br><br>

        <?php

        while($data1 = $sql1->fetch_assoc()){  
            $vl= $data1["VID"];
            $likecount=$mysqli->query("SELECT COUNT( * ) FROM entraprenour_has_video WHERE VID= $vl and react='like'");
            $like=$likecount->fetch_assoc();
            $likenum= $like["COUNT( * )"];
          

            $dislikecount=$mysqli->query("SELECT COUNT( * ) FROM entraprenour_has_video WHERE VID= $vl and react='dislike'");
            $dislike=$dislikecount->fetch_assoc();
            $dislikenum= $dislike["COUNT( * )"];
    
            if($dislikenum>0)
            {
                $ratio = ($likenum / $dislikenum) * 100;
            }
            else{
                $ratio = 100;
            }
            ?>
            <div class="col-md-4">

            <h2><pre>     Title:     <?php echo $data1["Title"]; ?></pre></h2><br><br>

            <video width="600" height="315" controls>
                        <source src="<?php echo $data1["file"] ?>">
                    </video>
            
                    <div>
                        <br><br>
                        <h2><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Like: <?php echo $likenum; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Disike: <?php echo $dislikenum; ?></p></h2>
                    </div>

      <br><br><br>
                    <div class="right">
                <h2 style="margin-left: 40%;">COMMENTS:</h2> <br>
                <?php
                    $oo = $data1["VID"];
                    $sql2 = $mysqli->query("SELECT * FROM comments where `comments`.`VID` = $oo");


                    while($data2 = $sql2->fetch_assoc())
                { ?>


                    <p style="margin-left: 8%;margin-bottom: 3%">-> <?php echo $data2["comment"]; ?></p>

                <?php } ?>

                </div>

            
            <br>

            </div>
            <?php 
        } ?>



    </div>




</body>

</html>