<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');

session_start();

define('ROOT', str_replace('/include', '', str_replace('\\', '/', __DIR__)).'/');

header('Content-Type: text/html; charset=utf-8');
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
header("Cache-Control: private, no-store, no-cache, must-revalidate, post-check=0, pre-check=0, max-age=0");
header('Pragma: private');
header("Pragma: no-cache");

?>