<?php

// php 5.3+ only
// use function writefn($ch, $chunk) { ... } for earlier versions

$data='';

$header_size=0;

$writefn=function($ch, $chunk) {
  
  if(!$GLOBALS['header_size']) {
	$tmp=strpos($GLOBALS['data'], "\r\n\r\n");
	if($tmp) {
		$GLOBALS['header_size']=$tmp+4;
		echo "header_size: {$GLOBALS['header_size']}<br>";
	}
  }
  else {
	$limit=$GLOBALS['range_to']+1;
	$len=strlen($GLOBALS['data'])-$GLOBALS['header_size']+strlen($chunk);
	if($len>=$limit) {
		$GLOBALS['data'].=$chunk;
		return -1;
	}
  }

  $GLOBALS['data'].=$chunk;
  return strlen($chunk);
};

curl_setopt($ch, CURLOPT_WRITEFUNCTION, $writefn);

?>