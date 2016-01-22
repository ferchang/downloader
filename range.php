<?php

$range="$range_from-";
if(strtolower($range_to)!=='all') $range.=$range_to;

curl_setopt($ch, CURLOPT_RANGE, $range);

if(!$_SESSION['range_support']) require 'curl_write_function.php';

?>