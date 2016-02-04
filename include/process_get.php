<?php

$url=$_SESSION['url']=$_POST['url'];

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
require ROOT.'include/curl_common.php';
curl_setopt($ch, CURLOPT_HEADER, true);

require ROOT.'include/range.php';
    
$response=curl_exec($ch);

if(isset($data)) {
	if($over_size) {
		$response=substr($data, 0, $header_size);
		$response.=substr($data, $header_size+$range_from, $range_to-$range_from+1);
	}
	else $response=$data;
}

require ROOT.'include/get_results.php';

?>