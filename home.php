<?php
$mysqli = new mysqli ('localhost', 'root', '', 'global_pie_system');

$ent=$mysqli->query("SELECT COUNT(*) FROM `entraprenour`");

$entcount=$ent->fetch_assoc();

$ent1=$mysqli->query("SELECT COUNT(*) FROM `expert`");

$expcount=$ent1->fetch_assoc();

$ent2=$mysqli->query("SELECT COUNT(*) FROM `investor`");

$invcount=$ent2->fetch_assoc();


?>

<!DOCTYPE html>
<html lang="en">

<head>

    <style>
        #lo {
            position: absolute;
            text-align: center;
            font-size: 80px;
            height: 110px;
            width: 100%;
            background-color: white;
        }
    </style>

    <title>GLOBAL PIE</title>
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="TStyle.CSS">

    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>

<body>

    <div id="lo">
        <a href="home.php" style="text-decoration:none "> GLOBAL &nbsp; PIE </a>
    </div>



    <br><br><br><br>

    <div class="container">
        <div class="header_right">
            <nav class="main_nav">
                <ul>

                    <li><a href="https://economictimes.indiatimes.com/et500">companies</a></li>
                    <li><a href="#">Funds</a></li>
                    <li><a href="https://inomics.com/top/teachs">Blog & News</a></li>
                    <li><a href="#">Contact us</a></li>
                    <li><a href="#">Manual</a></li>


                </ul>
            </nav>
        </div>

    </div>

    <br><br><br><br><br><br>
    <br><br><br><br><br><br>





    <main>
        <!-- Star player info -->
        <section class="container">


            <div class="players">
                <div class="player">
                    <div class="thumnil">
                        <a href="login3.php"> <img src="https://blog.sagipl.com/wp-content/uploads/2020/10/Attraction-Inverstor.gif" height="300" width="300">
                        </a>
                    </div>
                    <article class="player-info">
                        <h2>INVESTOR Portal</h2>
                    </article>
                </div>
                <div class="player">
                    <div class="thumnil">
                        <a href="login2.php"> <img src="https://uploads-ssl.webflow.com/5da0a4f343b23d95489a7c61/5da59e551dba53903827b33c_commercialista_marcomartina.gif" height="300" width="300">
                        </a>
                    </div>
                    <article class="player-info">
                        <h2>EXPERT Portal</h2>

                    </article>
                </div>
                <div class="player">
                    <div class="thumnil">
                        <a href="login.php"> <img src="https://r7q6w9z6.rocketcdn.me/career/wp-content/uploads/2020/11/fb6ba9ceaa9cf1f21ff02e997441fd3e.gif" height="300" width="300">
                        </a>
                    </div>
                    <article class="player-info">
                        <h2>ENTREPRENEUR Portal</h2>

                    </article>
                </div>

    </main>


    <br><br><br><br><br><br>

    <section class="flexible-container">
        <div class="half-width1" style="color: white;">

            <h2>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;How An Idea Becomes A Business</h2><br><br>
            <p> Global Pie is the place where founding teams are made. If you are interested in innovation and business, global pie is where you need to be. Once you have registered, you can indicate your interest, be it an innovative idea you would like
                to turn in to a successful business, maybe you have unique industry expertise and are looking for a new project/challenge, or you are an investor looking for the ideal project to grow your money. You register with global pie and we will
                introduce you to the rest of your winning founding team.
            </p>
        </div>

        <div class="half-width1">
            <img src="png.png" alt="">
        </div>

    </section>



    <br><br><br><br><br><br>


    <main>
        <!-- Star player info -->
        <section class="container">


            <div class="rr">
                <div class="r">
                    <div class="thumnil">
                    <h2><?php echo $invcount["COUNT(*)"]; ?>+</h2>

                    </div>
                    <article class="player-info">
                        <h2>INVESTOR</h2>
                    </article>
                </div>
                <div class="r">
                    <div class="thumnil">

                    </div>
                    <article class="player-info">
                    <h2><?php echo $expcount["COUNT(*)"]; ?>+</h2>

                        <h2>EXPERT</h2>

                    </article>
                </div>
                <div class="r">
                    <div class="thumnil">
                    </div>
                    <article class="player-info">
                    <h2><?php echo $entcount["COUNT(*)"]; ?>+</h2>

                        <h2>ENTREPRENEUR</h2>

                    </article>
                </div>

    </main>


    <footer class="end">
        <section class="footer">
            <div class="logo-footer">
                <img src="Capture.PNG" height="150" width="150">

            </div>
            <div class="icon-footer">
                <a href="www.gmail.com"><i class="far fa-envelope"></i></a>
                <a href="www.facebook.com"><i class="fab fa-facebook"></i></a>
                <a href="www.twitter.com"><i class="fab fa-twitter-square"></i></a>
                <a href="www.youtube.com"><i class="fab fa-youtube-square"></i></a>
            </div>
            <p>Copyright &copy; <span>2022</span></p>
        </section>
    </footer>

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