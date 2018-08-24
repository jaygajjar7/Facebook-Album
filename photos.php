<?php
if (!session_id()) {
    session_start();
}

include 'config.php';

$helper = $fb->getRedirectLoginHelper();

if (isset($_GET['logout'])) {
    $fbLogoutUrl = $helper->getLogoutUrl($_SESSION['fb_access_token'], 'http://localhost/rtcamp/index.php');
    session_destroy();
    unset($_SESSION['access_token']);
    header("Location: $fbLogoutUrl");
    exit;
}

$album_id = $_GET['album_id'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="img/favicon.ico">
    <link rel="apple-touch-icon" href="">
    <title>Facebook Album</title>

    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/lightbox.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">

</head>
<body>
<nav class="navbar navbar-default">
    <div class="body-container container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Facebook Album</a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
            	<li><a href="home.php">Home</a></li>
                <li><a href="?logout">Logout</a></li>
            </ul>
        </div>
    </div>
</nav>
<div class="body-container container">
    <div class="row">
        <?php
        $fb->setDefaultAccessToken($_SESSION['fb_access_token']);

        // Get User Details
        $res = $fb->get('/me?fields=name,gender,email');
        $user = $res->getGraphObject();
        ?>
        

    </div>

    <div class="row">
        <div class="col-md-12 text-center">
        	<?php
        	$fb->setDefaultAccessToken($_SESSION['fb_access_token']);

        	$album = $fb->get('/'.$album_id);
        	$album = $album->getGraphObject();

        	?>
            <h3><?php echo $album['name']; ?></h3>
        </div>
    </div>
    
    <div class="row">
    	<div class="col-md-12">
    		<?php
    		try {
			        $photos_request = $fb->get('/'.$album_id.'/photos?fields=source');
			        $photos = $photos_request->getGraphEdge();
			    } catch(Facebook\Exceptions\FacebookResponseException $e) {
			        echo 'Graph returned an error: ' . $e->getMessage();
			        exit;
			    } catch(Facebook\Exceptions\FacebookSDKException $e) {
			        echo 'Facebook SDK returned an error: ' . $e->getMessage();
			        exit;
			    }

			    foreach ($photos as $photo) {?>
			    	<div class="col-md-3">
			    		<div class="photo"  style="width: 100%;margin: 10px 0">
		    				<a class="lightBox" href="<?php echo $photo['source']?>"><img src="<?php echo $photo['source']?>" height='250px' width='100%'>
		    				</a>
		    			</div>
		    		</div>
			    <?php }?>
    		
    	</div>

    </div>


</div>

<script src="js/jquery-3.1.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery-lightbox.0.41.min.js"></script>
<script src="js/main.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
  $('.lightBox').lightBox();
});

</script>
</body>
</html>