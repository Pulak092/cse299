<?php
error_reporting(0);

$mysqli = new mysqli ('localhost', 'root', '', 'global_pie_system');

if(isset($_POST['Done']))
{
    $mail=$_POST['mail'];
    $pass=$_POST['pass'];
    
    $check = $mysqli->query("SELECT * FROM expert WHERE Email = '$mail'");

        $show = $check->fetch_assoc();
        if($show["Email"]==$mail)
        {
            if($show["Password"]==$pass)
            {
                session_start();
                $_SESSION['mail'] = $show["Email"];
                header("Location: Xp.php");
            }
            else {
                die("Your Password is not Correct.");
            }

        }
        else {
            die ("YOU ARE NOT AN EXPERT.");
        }

}

?>
<!DOCTYPE html>

<!-- === Coding by CodingLab | www.codinglabweb.com === -->
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- ===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <!-- ===== CSS ===== -->
    <link rel="stylesheet" href="login2.css">

    <!--<title>Login & Registration Form</title>-->
</head>

<body>

    <div class="container">
        <div class="forms">
            <div class="form login">
                <span class="title">Login</span>

                <form action="" method="POST">
                    <div class="input-field">
                        <input type="text" name="mail" placeholder="Enter your email" required>
                        <i class="uil uil-envelope icon"></i>
                    </div>
                    <div class="input-field">
                        <input type="password" name="pass" class="password" placeholder="Enter your password" required>
                        <i class="uil uil-lock icon"></i>
                        <i class="uil uil-eye-slash showHidePw"></i>
                    </div>

                    <div class="checkbox-text">
                        <div class="checkbox-content">
                            <input type="checkbox" id="logCheck">
                            <label for="logCheck" class="text">Remember me</label>
                        </div>

                        <a href="Xforgot.php" class="text">Forgot password?</a>
                    </div>

                    <div class="input-field button">
                        <input type="submit" name="Done" value="Login">
                    </div>
                </form>


            </div>


        </div>
    </div>

    <!--<script src="login.js"></script>-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="login.js"></script>
</body>

</html>