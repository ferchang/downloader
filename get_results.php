<?php

$body_action=$_POST['body_action'];

echo 'original url: ', $url;
echo "<hr>";
require 'check_curl_error.php';
list($header, $body) = explode("\r\n\r\n", $response, 2);
echo '<textarea style="width: 100%; height: 70%">', htmlspecialchars($header, ENT_QUOTES|ENT_SUBSTITUTE, 'UTF-8');
if($body_action==='show' or $body_action==='show8save') echo "\n\n", htmlspecialchars($body, ENT_QUOTES|ENT_SUBSTITUTE, 'UTF-8');
echo '</textarea>';

require 'get_header.php';

$h=get_header($header, 'Transfer-Encoding');
if($h!==false) echo '<hr>', $h, '<hr>';

if($body_action==='save' or $body_action==='show8save') file_put_contents('body', $body);

?>
