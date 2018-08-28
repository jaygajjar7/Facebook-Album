<?php
require_once "config.php";
    if(!isset($_SESSION['access_token'])){
          header('Location: login.php');
            exit();
        }
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
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">

</head>
<body>
<nav class="navbar navbar-default">
    <div class="container">
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
                <li><a href="#">Home</a></li>
                <li><a href="?logout">Logout</a></li>
            </ul>
        </div>
    </div>
</nav>
<div class="container">
    <div class="row">
        <?php
		
        $fb->setDefaultAccessToken($_SESSION['access_token']);

        // Get User Details
        $res = $fb->get('/me?fields=name,gender,email');
        $user = $res->getGraphObject();
        ?>
        

        <div class="col-md-7 text-center">
            <div id="top_buttons">
                <button class="btn btn-success" id="download_all">Download All</button>
                <button class="btn btn-success" id="download_selected">Download Selected</button>
                
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 text-center">
            <h3><?php echo $user->getProperty('name'); ?>'s Facebook Albums</h3>
        </div>
    </div>
    <div class="row">
        <?php
        try {
            $response = $fb->get('/me/albums?fields=id,name,cover_photo,count,type,created_time,from,link');
            $albums = $response->getGraphEdge();
        } catch (Facebook\Exceptions\FacebookResponseException $e) {
            echo 'Graph returned an error: ' . $e->getMessage();
            exit;
        } catch (Facebook\Exceptions\FacebookSDKException $e) {
            echo 'Facebook SDK returned an error: ' . $e->getMessage();
            exit;
        }
        foreach ($albums as $album) { ?>
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="album">
                <div class="album_img">
                    <?php
                    if (isset($album['cover_photo'])){
                        $cover_photo_id = $album['cover_photo']['id'];

                        try {
                            $photos_request = $fb->get('/' . $album['id'] . '/photos?fields=source');
                            $photos = $photos_request->getGraphEdge();
                        } catch (Facebook\Exceptions\FacebookResponseException $e) {
                            echo 'Graph returned an error: ' . $e->getMessage();
                            exit;
                        } catch (Facebook\Exceptions\FacebookSDKException $e) {
                            echo 'Facebook SDK returned an error: ' . $e->getMessage();
                            exit;
                        }
                        $album_cover_photo = '';
                        foreach ($photos as $photo) {
                            if ($cover_photo_id == $photo['id']) {
                                $is_cover_photo = True;
                                $album_cover_photo = $photo['source'];
                            }
                        }

                        echo '<img src="'.$album_cover_photo.'">';
                    }else{
                        echo '<img src="img/no_img.png">';
                    }
                    ?>
                </div>
                <div class="content">
                    <a href="photos.php?album_id=<?php echo $album['id'] ?>"><h3><?php echo $album['name'].' ('.$album['count'].')' ;?></h3></a>
                    <input type="checkbox" id="check" value="<?php echo $album['id']; ?>">
                    <label for="box-1"> Select</label>
                    <button class="btn btn-success download_album" data-id="<?php echo $album['id']; ?>"><i class="fa fa-download"></i></button>
                
                    
                </div>

            </div>
        </div>

        <?php
        }

        ?>

    </div>
</div>
<div class="modal fade" id="downloadModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Albums Notification</h4>
            </div>
            <div class="modal-body" id="responseDisplay">
                <!-- Download Response -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<script src="js/jquery-3.1.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/showDialog.js"></script>
<script src="js/main.js"></script>
</body>
</html>