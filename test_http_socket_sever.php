<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

header('content-type: text/plain');

function myecho($str='') {
	echo $str, "\n";
	ob_flush();
	flush();
}

for($i=0; $i<2000; $i++) echo '.';
myecho();

touch('flag');

set_time_limit(30);

$address = '';
$port = 1234;

$sock=socket_create(AF_INET, SOCK_STREAM, SOL_TCP);

myecho("create");

socket_bind($sock, $address, $port);

myecho("bind");

socket_listen($sock, 1);

myecho("listen");

$msgsock = socket_accept($sock);

myecho("accept");

$n=0;
$req='';
while(true) {
	$data=socket_read($msgsock, 2048, PHP_NORMAL_READ);
	if($data==='' or $data===false) {
		if($data==='') myecho("socket_read - empty data");
		else myecho("socket_read - false");
		break;
	}
	$req.=$data;
	sleep(1);
	$n++;
	if($n===5) break;
}

file_put_contents('req.txt', $req);

$msg="HTTP/1.1 200 OK\r\nTransfer-Encoding: chunked\r\n\r\n4\r\nWiki\r\n5\r\npedia\r\n";
socket_write($msgsock, $msg, strlen($msg));

for($i=0; $i<5; $i++) {
	echo $i, ": ";
	socket_write($msgsock, "2\r\nxx\r\n");
}

socket_write($msgsock, "0\r\n\r\n");

//socket_write($msgsock, $talkback, strlen($talkback));

//socket_close($sock);

unlink('flag');

?>