<?php
session_start();
$NID=$_SESSION['gg'];

$mysqli = new mysqli ('localhost', 'root', '', 'global_pie_system');

    if(isset($_POST['submit']))
    {
        $pass = $_POST['pass'];
        $copass = $_POST['CoPass'];

      
        $pass = $mysqli->real_escape_string($pass);

                if($pass != $copass)
                {
                    die("Passwords didn't matched.");
                }
                else
                {

                    $otp = $mysqli->query("UPDATE `expert` SET `Password` = '$pass' WHERE Email = '$NID' ;");

                    if ( $otp ) 
                    {
                       
                        header("Location: connect.php");

                        
                    }
                    else
                    {
                       
                        
                    die ("Failaure");
                        

                    }

                }
            
            
        
       
        

    }

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GLOBAL PIE</title>
    <link rel="stylesheet" href="ppstyle.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>

<body>
    <nav class="navbar">


        <div class="outer">

            <div class="container">


                <div class="card">
                    <div class="inner-box" id="card">
                        <div class="card-front">
                            
                            <br>
                            <br>

                            <form method="POST" action="">
                                <input type="password" name="pass" class="input-box" minlength="4" maxlength="10" placeholder="New Password" required>
                                <input type="password" name="CoPass" class="input-box" placeholder="Confirm Password" required> 
                                <br>
                                <br>
                                <input type="submit" value="submit" name="submit" style="background-color:lime" class="input-box" >
                            </form>
                            
                            
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="banner"></div>
        <div class="about">
            <div class="content">
                <div class="title"></div>
                <li>
                    <a href="https://corona.gov.bd/?gclid=CjwKCAjw9uKIBhA8EiwAYPUS3NT1aqhKIvAlZh0jH0X_KkBCrrE15ZV10HJw6nRhlWYTeuWjKZ-xTxoCe40QAvD_BwE">Bangladesh Covid 19 Information</a>
                </li>
                <li>
                    <a href="https://www.worldometers.info/coronavirus/">World Covid 19 Information</a>
                </li>

            </div>
    </nav>



    <script>
        const body = document.querySelector("body");
        const navbar = document.querySelector(".navbar");
        const menuBtn = document.querySelector(".menu-btn");
        const cancelBtn = document.querySelector(".cancel-btn");
        menuBtn.onclick = () => {
            navbar.classList.add("show");
            menuBtn.classList.add("hide");
            body.classList.add("disabled");
        }
        cancelBtn.onclick = () => {
            body.classList.remove("disabled");
            navbar.classList.remove("show");
            menuBtn.classList.remove("hide");
        }
        window.onscroll = () => {
            this.scrollY > 20 ? navbar.classList.add("sticky") : navbar.classList.remove("sticky");
        }
    </script>

</body>

</html>
