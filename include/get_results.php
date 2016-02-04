<?php
if(ini_get('register_globals')) exit("<center><h3>Error: Turn that damned register globals off!</h3></center>");
if(!defined('CAN_INCLUDE')) exit("<center><h3>Error: Direct access denied!</h3></center>");

$body_action=$_POST['body_action'];

if(!empty($over_size)) echo 'Response body oversize - <span style="color: blue">Truncated</span>&nbsp;&nbsp;&nbsp;&nbsp;';

echo 'Original url: ', $url;
echo "<hr>";
require ROOT.'include/check_curl_error.php';

list($header, $body)=explode("\r\n\r\n", $response, 2);

echo '<textarea style="width: 100%; height: 70%">', htmlspecialchars($header, ENT_QUOTES|ENT_SUBSTITUTE, 'UTF-8');
if($body_action==='show' or $body_action==='show8save') echo "\n\n", substr(htmlspecialchars($body, ENT_QUOTES|ENT_SUBSTITUTE, 'UTF-8'), 0, $max_body_2show);
echo '</textarea>';

require ROOT.'include/show_important_headers.php';

if($body_action==='save' or $body_action==='show8save') {
	require_once ROOT.'include/func_crypt_random.php';
	$filename=random_string(22);
	file_put_contents("downloads/$filename", $body);
	$info="url: $url\n";
	$info.="range: $range_from-$range_to\n";
	$info.="size: ".strlen($body)."\n";
	$info.="proxy: $proxy\n";
	file_put_contents("downloads/$filename.info", $info);
}

require ROOT.'include/form.php';

?>
