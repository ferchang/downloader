<?php

$range_from=$_POST['range_from'];
$range_to=$_POST['range_to'];
if(strtolower($range_to)==='all' and $range_from==='0') return;

$range="$range_from-";
if(strtolower($range_to)!=='all') $range.=$range_to;

curl_setopt($ch, CURLOPT_RANGE, $range);

if(!$_SESSION['range_support'] and !isset($head_request)) require ROOT.'include/curl_write_function.php';

?>