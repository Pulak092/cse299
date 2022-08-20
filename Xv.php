<?php
session_start();
$p2 = $_SESSION['mail'];

$p = $p2;

$GLOBALS['variable'] = $p;

$mysqli = new mysqli ('localhost', 'root', '', 'global_pie_system');

$sql1 = $mysqli->query("SELECT * FROM video");

function userLiked($VID)
{
    
    $p=$GLOBALS['variable'];
    $mysqli = new mysqli ('localhost', 'root', '', 'global_pie_system');

    $sqly = $mysqli->query("select * from entraprenour_has_video where VID = $VID and Email='$p' and react='like'");

    if(mysqli_num_rows($sqly)>0)
    {
        return true; 
    }
    else{
        return false;
    }
}


function userdisLiked($VID)
{
    $p=$GLOBALS['variable'];
    $mysqli = new mysqli ('localhost', 'root', '', 'global_pie_system');

    $sqly = $mysqli->query("select * from entraprenour_has_video where VID = $VID and Email='$p' and react='dislike'");

    if(mysqli_num_rows($sqly)>0)
    {
        return true; 
    }
    else{
        return false;
    }
}

function getrating($id){
    $mysqli = new mysqli ('localhost', 'root', '', 'global_pie_system');

    $rating = array();

    $likes_rs = $mysqli->query("select count(*) from `entraprenour_has_video` where `entraprenour_has_video`.`VID` = $id AND `entraprenour_has_video`.`react` = 'like' ");

    $dislikes_rs = $mysqli->query("select count(*) from `entraprenour_has_video` where `entraprenour_has_video`.`VID` = $id AND `entraprenour_has_video`.`react` = 'dislike' ");

    $likes= $likes_rs->fetch_assoc();
    die ($likes);
    $dislikes=$dislikes_rs->fetch_assoc();

    $rating = [
        'likes' => $likes[0],
        'dislikes' => $dislikes[0] 
    ] ;

    return json_encode($rating);


}

if(isset($_POST['action']))
{
    $post_id = $_POST['post_id'];
    $action= $_POST['action'];

    switch($action){

        case 'like':
            $in= $mysqli->query("INSERT INTO `entraprenour_has_video` (`Email`, `VID`, `react`) VALUES ('$p', '$post_id', 'like') on duplicate key update `react` = 'like'");
            break;

        case 'dislike':
            $in= $mysqli->query("INSERT INTO `entraprenour_has_video` (`Email`, `VID`, `react`) VALUES ('$p', '$post_id', 'dislike') on duplicate key update `react` = 'dislike'");
            break;
        case 'unlike':
            $in= $mysqli->query("delete from `entraprenour_has_video` where Email = '$p' and VID = $post_id");
            break;
        case 'undislike':
            $in= $mysqli->query("delete from `entraprenour_has_video` where Email = '$p' and VID = $post_id");
            break;
        default:
            break;
        
        echo getrating($post_id);
        exit(0);

    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>

    <style>
        
        #mail {
            margin-top: 2%;
            width: 23%;
            float: right;
        }
        
        #name {
            margin-top: 2.5%;
            width: 35%;
            float: left;
            font-size: 200%;
        }
        .status{
            display: flex;
            justify-content: space-between;
            padding: 8px;
        }
        .icons{
            display: flex;
            justify-content: space-between;
            border-top: 1px solid lightgray;
            border-bottom: 1px solid lightgray;
            padding: 8px;
        }
        .icons div{
            cursor: pointer;
        }
        .reaction div div{
            font-size: 1.5rem;
        }

        .comment_section{
            width: 100%;
            padding: 4px;
        }
        .comment_section form{
            margin-top: 2%;
            margin-bottom: 2%;
            display: flex;
            width: 100%;
        }
        .comment_section form input{
            border: none;
            outline: none;
            background-color: white;
            border-radius: 40px;
            padding: 5px;
            width: 80%;
            margin-left: 1.5%;
            margin-right: 2.5%;

        }
        .comment_section form button{
            border: none;
            outline: none;
            background-color: white;
            border-radius: 40px;
            padding: 5px;
            width: 15%;
        }
        .fa-thumbs-down, .fa-thumbs-o-down{
            transform: rotate(180deg);
        }

        .right{
            background-color: rgb(24, 70, 100);
            text-align: left;
            border-radius: 25px;
            

        }
    </style>
    <meta charset="UTF-8">
    <title>Expert Portal</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="Entreprenur.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    
    <script src="post.js"></script>
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
                <li><a href="Xp.php">Profile</a></li>
                <li><a href="Xv.php">Videos</a></li>
                <li><a href="Xc.php">Contact</a></li>
            </ul>
        </div>

    </div>


    <div class="Vss">

        <?php

        while($data1 = $sql1->fetch_assoc())
        {
            
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


                </div>

                <div class="v">
                    <br><br>
                    <h2><pre>Title: <?php echo $data1["Title"]; ?></pre></h2><br><br>

                    

                    <video width="600" height="315" controls>
                        <source src="<?php echo $data1["file"] ?>">
                    </video>
                    <br><br><br><br>


                </div>
                

                <div class="ld">
                    <div class="reaction">
                        <div class="icons">
                            <div onClick="window.location.reload();" style="margin-left: 23%;" ><i <?php if(userLiked($data1["VID"])): ?> 
                                class="fa fa-thumbs-up like-btn"
                            <?php else: ?>
                                class="fa fa-thumbs-o-up like-btn"
                            <?php endif ?>
                            data-id = "<?php echo $data1["VID"] ?>"></i>&nbsp;Up vote</div>
                            <div onClick="window.location.reload();" style="margin-right: 23%;"><i <?php if(userdisLiked($data1["VID"])): ?> 
                                class="fa fa-thumbs-down dislike-btn"
                            <?php else: ?>
                                class="fa fa-thumbs-o-down dislike-btn"
                            <?php endif ?>
                            data-id = "<?php echo $data1["VID"] ?>"></i>&nbsp;Down vote</div>
                                
                            
                        </div>
                    </div>
                    
                </div>

                <div class="comment_section">

                        <form action="com.php" method="POST">
                            <?php $Random_code= $data1["VID"] ; ?> </p><br />
                                <input type="hidden" name="code" value="<?php echo $Random_code; ?>"/>
                                <input type="text" name="comment" class="write_comment" placeholder="write comment" required>
                                <button type="submit" onClick="window.location.reload();" name="send"><h2>send</h2></button>
                            
                        </form>

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

            
        <?php } ?>

    </div>



</body>

</html>