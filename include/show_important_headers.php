<?php
if(ini_get('register_globals')) exit("<center><h3>Error: Turn that damned register globals off!</h3></center>");
if(!defined('CAN_INCLUDE')) exit("<center><h3>Error: Direct access denied!</h3></center>");

require ROOT.'include/get_header.php';

function print_header($name) {
	$h=get_header($GLOBALS['response'], $name);
	echo "$name: ";
	if($h!==false) echo '<span style="background: green; color: yellow; padding: 2px">', $h, '</span>';
	else echo '<span style="color: red">n/a</span>';
	echo '&nbsp;&nbsp;';
	return $h;
}

echo '<hr>';

print_header('Content-Type');
$h=print_header('Accept-Ranges');
if($h!==false) $_SESSION['range_support']=true;
else $_SESSION['range_support']=false;
$h=print_header('Content-Length');

echo '<hr>';

?>
