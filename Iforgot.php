<?php
use PHPMailer\PHPMailer\PHPMailer;

//Include required PHPMailer files
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';
require 'PHPMailer/Exception.php';
//Define name spaces
//Create instance of PHPMailer
$mail = new PHPMailer();
//Set mailer to use smtp
$mail->isSMTP();
//Define smtp host
$mail->Host = "smtp.gmail.com";
//Enable smtp authentication
$mail->SMTPAuth = true;
//Set smtp encryption type (ssl/tls)
$mail->SMTPSecure = "tls";
//Port to connect smtp
$mail->Port = "587";
//Set gmail username
$mail->Username = "pulak2164@gmail.com";
//Set gmail password
$mail->Password = "hjsaojjcqlcjztih";
//Email subject";
//Email subject
$mail->Subject = "Confirmation code from GLOBAL PIE";
//Set sender email
$mail->setFrom("pulak2164@gmail.com");
//Enable HTML
$mail->isHTML(true);


$mysqli = new mysqli ('localhost', 'root', '', 'global_pie_system');

if(isset($_POST['Done']))
{
    $code1=$_POST['code1'];
    $code=$_POST['code']; 
    $ma=$_POST['mail'];


    $check = $mysqli->query("SELECT * FROM investor WHERE Email = '$ma'");
    $show = $check->fetch_assoc();


    if($code1!="$code")
    {
        die ("Your code is not correct");
    }
    else
    {
        

        if($show["Email"]==$ma)
        {
            $vkey = rand();
            $otp = $mysqli->query("UPDATE `investor` SET `investor`.`vk` = $vkey WHERE Email = '$ma' ;");
            

            if($otp)
            {
                $check1 = $mysqli->query("SELECT * FROM investor WHERE Email = '$ma'");
                
                $ll = $check1->fetch_assoc();

                //Email body
                $mail->Body = $ll["vk"];

                //Add recipient
                $mail->addAddress($ll["Email"]);
                //Finally send email

                if ( $mail->send() ) 
                {
                    session_start();
                    $_SESSION['ii'] = $ma;
                    header("Location: Iforgot1.php"); 
                }
            }
            

            
            
        }
        else {
            die ("You are not Registerd.");
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

                            <form method="POST" action="">
                                <input type="text" name="mail" class="input-box" placeholder="Your Mail" required>
                            
                                <br><br><br>
                                <div class="rand" style=" font-size: 25px; text-align: center; background:cornsilk; ">

                                
                                 <?php $Random_code= substr(md5((mt_rand(100,900))),0,5) ; echo $Random_code; ?> </p><br />
                                 <h4>Enter the Letters Correctly:</h4>
                                 <br>
                                <input type="text" name="code1" title="random code" class="input-box" placeholder="Enter the code:"/>
                                
                                <input type="hidden" name="code" value="<?php echo $Random_code; ?>"/>
                                </div>
                                <br><br><br>
                            

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