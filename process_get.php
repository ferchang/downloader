<?php

$url=$_SESSION['url']=$_POST['url'];

$range_from=$_POST['range_from'];
$range_to=$_POST['range_to'];
if(strtolower($range_to)==='all' and $range_from==='0') $use_range=false;
else $use_range=true;

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
require 'curl_common.php';
curl_setopt($ch, CURLOPT_HEADER, true);

if($use_range) require 'range.php';
    
$response=curl_exec($ch);

if(isset($data)) $response=$data;

require 'get_results.php';

?>