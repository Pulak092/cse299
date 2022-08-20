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
$mail->Subject = "Email Verification code from GLOBAL PIE";
//Set sender email
$mail->setFrom("pulak2164@gmail.com");
//Enable HTML
$mail->isHTML(true);

error_reporting(0);

$mysqli = new mysqli ('localhost', 'root', '', 'global_pie_system');

    if(isset($_POST['submit']))
    {
        $Name = $_POST['name'];
        $Email = $_POST['mail'];
        $pass = $_POST['pass'];
        $copass = $_POST['CoPass'];

        $Name = $mysqli->real_escape_string($Name);
        $Email = $mysqli->real_escape_string($Email);
        $pass = $mysqli->real_escape_string($pass);

        
                if($pass != $copass)
                {
                    die("Passwords didn't matched.");
                }
                else
                {
                  $vkey = rand();
                  $insert = $mysqli->query("INSERT INTO `entraprenour` (`Email`, `Password`, `Name`, `vk`) VALUES ('$Email','$pass', '$Name', '$vkey')");

                     $check1 = $mysqli->query("SELECT * FROM entraprenour WHERE Email = '$Email'");
                     
                     $ll = $check1->fetch_assoc();

                     //Email body
                     $mail->Body = $ll["vk"];

                     //Add recipient
                     $mail->addAddress($ll["Email"]);
                     //Finally send email

                     if ( $mail->send() ) 
                     {
                        session_start();
                        $_SESSION['message'] = $Email;
                        header("Location: Authentication.php"); 
                     }
                  
            

                }
            

    }

?>


<!DOCTYPE html>

<!-- === Coding by CodingLab | www.codinglabweb.com === -->
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <title>GLOBAL PIE</title>
      <link rel="stylesheet" href="r.css">
   </head>


<body>
<div class="wrapper">
         <div class="title">
            Registration Form
         </div>
         <form method="POST" action="#">
         <div class="field" >
               <input type="text" name="name" required>
               <label>Name</label>
            </div>
            <div class="field" >
               <input type="text" name="mail" required>
               <label>Email Address</label>
            </div>
            <div class="field">
               <input type="password" name="pass" required>
               <label>Password</label>
            </div>
            <div class="field">
               <input type="password" name="CoPass" required>
               <label>Confirm Password</label>
            </div>
            <div class="content">
               
               
            </div>
            <div class="field">
               <input type="submit" name="submit" value="Login">
            </div>
            <div class="signup-link">
               Already a member? <a href="login.php">Login now</a>
            </div>
         </form>
      </div>
</body>

</html>