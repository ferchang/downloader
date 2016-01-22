<?php

echo 'original url: ', $url;
echo "<hr>";
require 'check_curl_error.php';
echo '<textarea style="width: 100%; height: 50%">', htmlspecialchars($response, ENT_QUOTES|ENT_SUBSTITUTE, 'UTF-8'), '</textarea>';

require 'get_header.php';
$h=get_header($response, 'Accept-Ranges');
if($h!==false) {
	echo '<hr>', '<span style="background: green; color: yellow">', $h, '</span>', '<hr>';
	$_SESSION['range_support']=true;
}
else $_SESSION['range_support']=false;

require 'form.php';

?>
