<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');

set_time_limit(5*60);

header('Content-Type: text/html; charset=utf-8');

session_start();

if(isset($_POST['password'])) {
	require 'password.php';
	if($password===hash('sha256', $salt.$_POST['password'])) $_SESSION['auth']=true;
	else echo '<span style="color: red">Entered password was wrong!</span><br><br>';
}

if(!isset($_SESSION['auth'])) {
	require 'login_form.php';
	exit;
}

if(isset($_POST['head'])) include 'process_head.php';
else if(isset($_POST['get'])) include 'process_get.php';
else include 'form.php';

?>
