<?php
if(ini_get('register_globals')) exit("<center><h3>Error: Turn that damned register globals off!</h3></center>");
if(!defined('CAN_INCLUDE')) exit("<center><h3>Error: Direct access denied!</h3></center>");

$body_action=$_POST['body_action'];

echo 'original url: ', $url;
echo "<hr>";
require ROOT.'include/check_curl_error.php';

list($header, $body)=explode("\r\n\r\n", $response, 2);

echo '<textarea style="width: 100%; height: 70%">', htmlspecialchars($header, ENT_QUOTES|ENT_SUBSTITUTE, 'UTF-8');
if($body_action==='show' or $body_action==='show8save') echo "\n\n", substr(htmlspecialchars($body, ENT_QUOTES|ENT_SUBSTITUTE, 'UTF-8'), 0, $max_body_2show);
echo '</textarea>';

require ROOT.'include/get_header.php';
$h=get_header($response, 'Accept-Ranges');
if($h!==false) echo '<hr>', '<span style="background: green; color: yellow">', $h, '</span>', '<hr>';

if($body_action==='save' or $body_action==='show8save') file_put_contents('downloads/body', $body);

require ROOT.'include/form.php';

?>
