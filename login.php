<?php
error_reporting(0);

$mysqli = new mysqli ('localhost', 'root', '', 'global_pie_system');

if(isset($_POST['Done']))
{
    $mail=$_POST['mail'];
    $pass=$_POST['pass'];
    
    $check = $mysqli->query("SELECT * FROM entraprenour WHERE Email = '$mail'");

        $show = $check->fetch_assoc();
        if($show["Email"]==$mail)
        {
            if($show["Password"]==$pass)
            {
               session_start();
               $_SESSION['sql'] = $show["Email"];
               header("Location: Ep.php");
            }
            else {
                die("Your Password is not Correct.");
            }

        }
        else {
            die ("YOU ARE NOT REGISTERED.");
        }

}

?>


<!DOCTYPE html>

<!-- === Coding by CodingLab | www.codinglabweb.com === -->
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <title>Login Form Design | CodeLab</title>
      <link rel="stylesheet" href="l.css">
   </head>

<body>
<div class="wrapper">
         <div class="title">
            Login Form
         </div>
         <form method="POST" action="#">
            <div class="field" >
               <input type="text" name="mail" required>
               <label>Email Address</label>
            </div>
            <div class="field">
               <input type="password" name="pass" required>
               <label>Password</label>
            </div>
            <div class="content">
               <div class="pass-link">
                  <a href="Forgot.php">Forgot password?</a>
               </div>
            </div>
            <div class="field">
               <input type="submit" name="Done" value="Login">
            </div>
            <div class="signup-link">
               Not a member? <a href="regi.php">Signup now</a>
            </div>
         </form>
      </div>
</body>

</html>