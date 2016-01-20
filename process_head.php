<?php

$url=$_SESSION['url']=$_POST['url'];

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
require 'curl_common.php';
curl_setopt($ch, CURLOPT_HEADER, true);
curl_setopt($ch, CURLOPT_NOBODY, true);
//curl_setopt($ch, CURLOPT_FOLLOWLOCATION, false);
    
$response = curl_exec($ch);

require 'head_results.php';

?>