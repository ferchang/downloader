<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');

set_time_limit(5*60);

header('Content-Type: text/html; charset=utf-8');

session_start();

if(isset($_POST['password'])) {
	require './func_crypt_random.php';
	require './class_bcrypt.php';	
	$bcrypt=new Bcrypt(12);
	$hash=file_get_contents('password.txt');
	if($bcrypt->verify($_POST['password'], $hash)) $_SESSION['auth']=true;
	else echo '<span style="color: red">Entered password was wrong!</span><br><br>';
}

if(!isset($_SESSION['auth'])) {
	if(!file_exists('password.txt')) {
		echo 'password.txt not found<br>';
		echo 'first <a href=gen_pass_hash.php>create a password</a>';
		exit;
	}
	require 'login_form.php';
	exit;
}

if(isset($_POST['head'])) include 'process_head.php';
else if(isset($_POST['get'])) include 'process_get.php';
else include 'form.php';

?>
