<?php

// php 5.3+ only
// use function writefn($ch, $chunk) { ... } for earlier versions

$data='';

$writefn=function($ch, $chunk) {
  
  $limit=$GLOBALS['range_to']+1;

  $len=strlen($GLOBALS['data'])+strlen($chunk);
  if($len>=$limit) {
    $GLOBALS['data'].=substr($chunk, 0, $limit-strlen($GLOBALS['data']));
    return -1;
  }

  $GLOBALS['data'].=$chunk;
  return strlen($chunk);
};

curl_setopt($ch, CURLOPT_WRITEFUNCTION, $writefn);

?>