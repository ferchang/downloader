<?php

$body_action=$_POST['body_action'];

echo 'original url: ', $url;
echo "<hr>";
require 'check_curl_error.php';

echo strlen($response);

$response=str_replace("\r\n", '\r\n', $response);

list($header, $body)=explode("\r\n\r\n", $response, 2);

//$header=str_replace("\r\n", '\r\n', $header);

//echo strlen($header);

echo '<textarea style="width: 100%; height: 70%">', htmlspecialchars($header, ENT_QUOTES|ENT_SUBSTITUTE, 'UTF-8');
if($body_action==='show' or $body_action==='show8save') echo "\n\n", htmlspecialchars($body, ENT_QUOTES|ENT_SUBSTITUTE, 'UTF-8');
echo '</textarea>';

require 'get_header.php';
$h=get_header($response, 'Accept-Ranges');
if($h!==false) echo '<hr>', '<span style="background: green; color: yellow">', $h, '</span>', '<hr>';

if($body_action==='save' or $body_action==='show8save') file_put_contents('downloads/body', $body);

?>
