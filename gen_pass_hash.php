<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');

if(file_exists('password.txt')) {
	echo 'to assign a new password, first delete password.txt file.';
	exit;
}

if(isset($_POST['password'])) {
	require './func_crypt_random.php';
	require './class_bcrypt.php';	
	$bcrypt=new Bcrypt(12);
	$hash=$bcrypt->hash($_POST['password']);
	echo 'bcrypt hash: <input type=text value="', $hash, '" size=70 onclick="this.select()">';
	echo '<br><br>Just put the bcrypt hash in a file named password.txt';
	file_put_contents('password0.txt', $hash);
	echo '<br>or<br>Rename password0.txt to password.txt';
	exit;
}

?>
<form action='' method=post>
Password: <input type=text name=password autocomplete="off"><input type=submit value=submit>
</form>
