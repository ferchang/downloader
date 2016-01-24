<?php

$url=$_SESSION['url']=$_POST['url'];

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
require ROOT.'include/curl_common.php';
curl_setopt($ch, CURLOPT_HEADER, true);
curl_setopt($ch, CURLOPT_NOBODY, true);
//curl_setopt($ch, CURLOPT_FOLLOWLOCATION, false);

$head_request=true;
require ROOT.'include/range.php';
    
$response = curl_exec($ch);

if(isset($data)) {
	$response=substr($data, 0, $GLOBALS['header_size']+$range_to+1);
}

require ROOT.'include/head_results.php';

?>