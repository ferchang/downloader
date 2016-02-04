<?php

// php 5.3+ only
// use function writefn($ch, $chunk) { ... } for earlier versions

$data='';

$header_size=0;

$over_size=false;

$writefn=function($ch, $chunk) {
  
  static $full=false;
  
  if($full) {
	  $GLOBALS['over_size']=true;
	  return -1;
  }
  
  if(!$GLOBALS['header_size']) {
	$tmp=strpos($GLOBALS['data'], "\r\n\r\n");
	if($tmp) $GLOBALS['header_size']=$tmp+4;
  }
  else {
	$limit=$GLOBALS['range_to']+1;
	$len=strlen($GLOBALS['data'])-$GLOBALS['header_size']+strlen($chunk);
	if($len>=$limit) {
		//$chunk=substr($chunk, 0, strlen($chunk)-($len-$limit));
		$GLOBALS['data'].=$chunk;
		$full=true;
		//return -1;
		return strlen($chunk);
	}
  }

  $GLOBALS['data'].=$chunk;
  return strlen($chunk);
};

curl_setopt($ch, CURLOPT_WRITEFUNCTION, $writefn);

?>