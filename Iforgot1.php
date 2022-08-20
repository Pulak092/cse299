<?php
error_reporting(0);
session_start();
$p=$_SESSION['ii'];
$mysqli = new mysqli ('localhost', 'root', '', 'global_pie_system');
$otp = $mysqli->query("select * from `investor` where `investor`.`Email` = '$p'");
$ll = $otp->fetch_assoc();

if(isset($_POST['Done']))
{
    $code = $_POST['code'];
    

    if($ll["vk"]==$code)
    {
        session_start();
        $_SESSION['nn'] = $p;
        header("Location: Iforgot2.php");
    }
    else
    {
        {
            die ("Verification Code Didn't matched.");
        }

    }
}



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GLOABAL PIE</title>
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
                            <div class="custom">
                                <form method="POST" action="">
                                    <p>Enter the Verification Code that was sent to this email: <?php echo "<br>".$ll["Email"] ?></p>
                                    <br>
                                    <br>
                                    <input type="number" name="code" class="input-box" placeholder="Verification Code" required>
                                    <br>
                                    <br>
                                    <input type="submit" value="submit" name="Done" style="background-color:lime" class="input-box">
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