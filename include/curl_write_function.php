<?php
// php 5.3+ only
// use function writefn($ch, $chunk) { ... } for earlier versions
$data='';
$header_size=0;
$over_size=false;
$limit1=$range_to-$range_from+1;
$limit2=$range_to+1;

$writefn=function($ch, $chunk) {
  
  static $full1=false;
  static $full2=false;
  
  if($full1) { $GLOBALS['over_size']=true; }
  if($full2) { $GLOBALS['over_size']=true; return -1; }
  
  if(!$GLOBALS['header_size']) {
	$tmp=strpos($GLOBALS['data'], "\r\n\r\n");
	if($tmp) $GLOBALS['header_size']=$tmp+4;
  }
  else {
	$limit1=$GLOBALS['limit1'];
	$limit2=$GLOBALS['limit2'];
	$len=strlen($GLOBALS['data'])-$GLOBALS['header_size']+strlen($chunk);
	if($len>=$limit1) $full1=true;
	if($len>=$limit2) {
		//$chunk=substr($chunk, 0, strlen($chunk)-($len-$limit2));
		$GLOBALS['data'].=$chunk;
		$full2=true;
		return strlen($chunk);
	}
  }

  $GLOBALS['data'].=$chunk;
  return strlen($chunk);
  
};

curl_setopt($ch, CURLOPT_WRITEFUNCTION, $writefn);

?>