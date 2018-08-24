<?php

require_once __DIR__ . '/lib/facebook/vendor/autoload.php';


//FB
$app_id = '471011540087482';
$app_secret = '7602f191ec3275b97acc50f67566a383';

$fb = new Facebook\Facebook([
    'app_id' => $app_id,
    'app_secret' => $app_secret,
    'default_graph_version' => 'v3.1',
    'persistent_data_handler'=>'session'
]);

$redirect = "http://localhost/rtcamp/home.php";

