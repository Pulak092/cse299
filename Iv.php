<?php
$mysqli = new mysqli ('localhost', 'root', '', 'global_pie_system');

$sql1 = $mysqli->query("SELECT * FROM video");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        #mail {
            margin-top: 1.5%;
            width: 23%;
            float: right;
        }
        
        #name {
            margin-top: 1.5%;
            width: 35%;
            float: left;
            font-size: 200%;
        }
        
        button {
            background-color: #e4e5b1;
            border: none;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 12px;
            border-radius: 25px;
        }
        
        .right{
            background-color: rgb(24, 70, 100);
            text-align: left;
            border-radius: 25px;
            

        }
    </style>
    <meta charset="UTF-8">
    <title>Investor Portal</title>
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
                <li><a href="Ip.php">Profile</a></li>
                <li><a href="Iv.php">Videos</a></li>
                <li><a href="Id.php">Discuss with Experts</a></li>
                <li><a href="Ic.php">Contact</a></li>
            </ul>
        </div>

    </div>


    <div class="Vss">

        <?php

        while($data1 = $sql1->fetch_assoc())
        {
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

            if ($ratio>60){
            
 
            ?>
            <div class="vd">

                <div id="person" style="border-bottom: 5px solid rgb(200, 204, 194); height: 80px; width: 800px">
                <?php
                $p=$data1["Entraprenour_Email"];
                    $sql = $mysqli->query("SELECT * FROM entraprenour WHERE `entraprenour`.`Email` = '$p'");
                    $data=$sql->fetch_assoc();
                ?>

                    <div id="name">
                        <p><?php echo $data["Name"]; ?></p>
                    </div>

                    <div id="mail">
                    <button>     
                        <h2><a href="mailto: <?php echo $data["Email"]; ?>">Send Email</a></h2>
                    </button>
                </div>


                </div>

                <div class="v">
                    <br><br>
                    <h2><pre>Title: <?php echo $data1["Title"]; ?></pre></h2><br><br>

                    

                    <video width="600" height="315" controls>
                        <source src="<?php echo $data1["file"] ?>">
                    </video>
                    <br><br><br><br>


                </div>
            

                
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
                     
                

            </div>

            
        <?php } } ?>

    </div>

</body>

</html>