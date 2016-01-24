<?php
if(ini_get('register_globals')) exit("<center><h3>Error: Turn that damned register globals off!</h3></center>");
if(!defined('CAN_INCLUDE')) exit("<center><h3>Error: Direct access denied!</h3></center>");

if(isset($_POST['password'])) {
	require ROOT.'include/func_crypt_random.php';
	require ROOT.'include/class_bcrypt.php';	
	$bcrypt=new Bcrypt(12);
	require 'password.php';
	if($bcrypt->verify($_POST['password'], $hash)) $_SESSION['auth']=true;
	else echo '<span style="color: red">Entered password was wrong!</span><br><br>';
}

if(!isset($_SESSION['auth'])) {
	if(!file_exists('password.php')) {
		echo 'password.php not found<br>';
		echo 'first <a href=gen_pass_hash.php>create a password</a>';
		exit;
	}
	require ROOT.'include/login_form.php';
	exit;
}

?>