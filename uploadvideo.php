<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=1">
    <title>Entreprenour Portal</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="video.css">

</head>

<body>

    <header id="header">
        <!--header-start-->
        <div class="container">
            <div class="header_left">
                <a class="logo" href="#"><img src="Capture.PNG" alt=""></a>
            </div>
            <div class="header_right">
                <a href="#!" class="nav_ico"><img src="images/nav-icon.png" alt="nav icon"></a>
                <nav class="main_nav">
                    <ul>
                        <li><a href="#">Profile</a></li>
                        <li><a href="uploadvideo.html">Upload Video</a></li>
                        <li><a href="#">Experts Help</a></li>
                        <li><a href="#">Contact Us</a></li>
                    </ul>
                </nav>
            </div>

        </div>
    </header>
    <!--header-end-->
    <div class="video">
        <form action="https://upload.embed.ly/1/video?key=YOUR_API_KEY" method="POST" enctype="multipart/form-data" name="upload_form">
            <div id="upload-button" class="button"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTqSXcNjnkU70WD60__0R0xJKtinPwSAs8n36onp_hUC0DRnm9set2NAD26ANwvyY3s05k&usqp=CAU" alt=""></div>
            <div id="upload-input">
                <input id="video_file" name="video_file" type="file">
            </div>
        </form>
        <div class="url-display"></div>
        <div class="embed-code"></div>
        <div class="video-display"></div>
        <img id="loader" src="https://i.imgur.com/s4Z4mdr.gif">
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="custom.js"></script>
    <script type="text/javascript" src="video.js"></script>

</body>

</html>