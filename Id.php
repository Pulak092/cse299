<?php

session_start();
$p=$_SESSION['sql'];

$mysqli = new mysqli ('localhost', 'root', '', 'global_pie_system');

$sql = $mysqli->query("SELECT * FROM expert");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        button {
            background-color: #ffffff;
            border: none;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            border-radius: 25px;
        }
        
        
        .div1 {
            width: 23.33%;
            float: right;
            text-align: center;
        }
        
        .div2 {
            margin-top: 1.3%;
            margin-left: 1%;
            width: 23.33%;
            height: 160px;
            float: left;
            background-size: 100% 100%;
            border-style:solid;
            border-color:white;
            border-radius: 20px;

        }
        
        .div3 {
            width: 23.33%;
            margin: auto;
        }
    </style>

    <meta charset="UTF-8">
    <title>ENTREPRENEUR PORTAL</title>
    <link rel="stylesheet" href="ent.css">

    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
</head>

<body>



    <head>
        <div class="space"></div>


        <div id="lo">
            <a href="home.php" style="text-decoration:none; color: white; "> GLOBAL &nbsp; PIE </a>
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


    <div class="expert">

    <?php

    while($data = $sql->fetch_assoc()){  
        ?>
        <div class="pp">

            <div class="div1">
                <br><br><br><br>
                <button>     
                        <h2><a href="mailto: <?php echo $data["Email"]; ?>">Send Email</a></h2>
                    </button>
            </div>
            <?php
        if($data["Image"] == '')
        {
            ?>
            <div class="div2" style="background-image: url(https://media.istockphoto.com/vectors/user-icon-flat-isolated-on-white-background-user-symbol-vector-vector-id1300845620?b=1&k=20&m=1300845620&s=170667a&w=0&h=JbOeyFgAc6-3jmptv6mzXpGcAd_8xqkQa_oUK2viFr8=)">

            </div>
            <?php
        }
        else{

            ?>

            <div class="div2" style="background-image: url(<?php echo $data["Image"]?>)">

            </div>

            <?php
        }
    ?>


            <div class="div3">
                &nbsp;

                <h2> <?php echo $data["Name"]; ?></h2>




            </div>

            <br><br><br><br><br><br><br>
            <br><br>

        </div>
        <?php 
        } ?>



    </div>









</body>

</html>