<?php

// php 5.3+ only
// use function writefn($ch, $chunk) { ... } for earlier versions
$writefn = function($ch, $chunk) {
  static $data='';
  static $limit = 500; // 500 bytes, it's only a test

  $len = strlen($data) + strlen($chunk);
  if ($len >= $limit ) {
    $data .= substr($chunk, 0, $limit-strlen($data));
    echo strlen($data) , ' ', $data;
    return -1;
  }

  $data .= $chunk;
  return strlen($chunk);
};

curl_setopt($ch, CURLOPT_WRITEFUNCTION, $writefn);

?>