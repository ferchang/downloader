<?php
if(ini_get('register_globals')) exit("<center><h3>Error: Turn that damned register globals off!</h3></center>");
if(!defined('CAN_INCLUDE')) exit("<center><h3>Error: Direct access denied!</h3></center>");

echo 'original url: ', $url;
echo "<hr>";
require ROOT.'include/check_curl_error.php';
echo '<textarea style="width: 100%; height: 50%">', htmlspecialchars($response, ENT_QUOTES|ENT_SUBSTITUTE, 'UTF-8'), '</textarea>';

require ROOT.'include/get_header.php';
$h=get_header($response, 'Accept-Ranges');
if($h!==false) {
	echo '<hr>', '<span style="background: green; color: yellow">', $h, '</span>', '<hr>';
	$_SESSION['range_support']=true;
}
else $_SESSION['range_support']=false;

require ROOT.'include/form.php';

?>
