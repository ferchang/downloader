<?php

curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 20); 
curl_setopt($ch, CURLOPT_TIMEOUT, 60*3);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_ENCODING , "");

if(isset($_SESSION['proxy'])) {
	if(stripos($url, 'https:')===0 and isset($_SESSION['proxy']['https_port'])) $proxy=$_SESSION['proxy']['host'].':'.$_SESSION['proxy']['https_port'];
	else $proxy=$_SESSION['proxy']['host'].':'.$_SESSION['proxy']['port'];
	//echo "<br>proxy: $proxy<br>";
	curl_setopt($ch, CURLOPT_PROXY, $proxy);
	if($_SESSION['proxy']['kind']==='socks') curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_SOCKS5);
}

?>