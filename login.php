<?php
    require_once "config.php";

    if(isset($_SESSION['access_token'])){
        header('Location: index.php');
        exit();
    }

    $redirectURL = "https://assembled.000webhostapp.com/fb-callback.php";
    $permissions = ['email','user_photos']; // Optional permissions
    $loginURL = $helper->getLoginUrl($redirectURL,$permissions);

?>
    <!doctype html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <title>Login In</title>
        <link rel="stylesheet" href="css/style-1.css" />
        <script src="js/modernizr.custom.js"></script>
		<link href="https://afeld.github.io/emoji-css/emoji.css" rel="stylesheet">
    </head>

    <body>
        <canvas id="dotty"></canvas>
         <div class="outer-home">
            <section id="home">
                <div id="vegas-background"></div>
                <div class="content">
                    <h1 class="text-intro opacity-0">Facebook Album</h1>
                    <p class="text-intro opacity-0">All That's Worth Remembering</p>
                    <nav>
                        <ul>

                            <li> <a onclick="window.location='<?php echo $loginURL?>'" class="light-btn text-intro opacity-0">Log In With Facebook</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="bottom-home">
                    <div class="social-icons"><a href="#"><i class="fa fa-linkedin"></i></a> <a href="https://github.com/jaygajjar7/"><i class="fa fa-github"></i></a></div>
                    <p class="copyright">Made With &nbsp;<i class="em em-heart"></i></p>
                </div>
            </section>
        </div>
        
        <script src="js/jquery-3.1.1.min.js"></script>
        <script src="js/jquery-1.12.3.min.js"></script>
        <script src="js/jquery.easing.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
		<script src="js/mozaic.js"></script>
        <script src="js/main1.js"></script>
    </body>

    </html>