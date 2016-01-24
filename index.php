<?php
if(ini_get('register_globals')) exit("<center><h3>Error: Turn that damned register globals off!</h3></center>");
define('CAN_INCLUDE', true);

require 'include/common.php';

set_time_limit(5*60);

if(isset($_POST['password'])) {
	require ROOT.'include/func_crypt_random.php';
	require ROOT.'include/class_bcrypt.php';	
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
	require ROOT.'include/login_form.php';
	exit;
}

if(isset($_POST['head'])) require ROOT.'include/process_head.php';
else if(isset($_POST['get'])) require ROOT.'include/process_get.php';
else require ROOT.'include/form.php';

?>
