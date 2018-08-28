<?php
    session_start();
    require_once "lib/vendor/autoload.php";

    $fb = new \Facebook\Facebook([
        'app_id' => 'Your App Id',
        'app_secret' => 'Your App Secret',
        'default_graph_version' => 'v3.1'
    ]);

    $helper = $fb->getRedirectLoginHelper();
?>