<?php
if (!session_id()) {
    session_start();
}
if (isset($_SESSION['fb_access_token'] )) {
    header('location: http://localhost/rtcamp/home.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>Facebook Album</title>
	<link rel="stylesheet" href="css/style-1.css" />
    <script src="js/modernizr.custom.js"></script>
    
    
</head>
<body>
 <canvas id="canvasbg"></canvas>
    <canvas id="canvas"></canvas>
    
    <div class="outer-home">
        <section id="home">
            <div id="vegas-background"></div>
            <div class="global-overlay"></div> <img src="img/logo.png" alt="" class="brand-logo text-intro opacity-0" />
            <div class="content">
                <h1 class="text-intro opacity-0">Facebook Album</h1>
                <p class="text-intro opacity-0">All That's Worth Remembering</p>
                <nav>
                    <ul>
						<?php
						include "config.php";
						$helper = $fb->getRedirectLoginHelper();
						$permissions = array('email', 'user_photos');
						$loginUrl = $helper->getLoginUrl($redirect, $permissions);
						?>
                        <li> <a href="<?php echo $loginUrl; ?>" id="open-more-info" data-target="right-side" class="light-btn text-intro opacity-0">Login With Facebook</a></li>
                    </ul>
                </nav>
            </div>
            
        </section>
    </div>


<script src="js/jquery-3.1.1.min.js"></script>
 <script src="js/jquery-1.12.3.min.js"></script>
    <script src="js/jquery.easing.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    
    <script src="js/bubble.js"></script>
    <script src="js/main1.js"></script>
</body>