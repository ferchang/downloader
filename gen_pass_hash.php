<?php
if(ini_get('register_globals')) exit("<center><h3>Error: Turn that damned register globals off!</h3></center>");
define('CAN_INCLUDE', true);

require 'include/common.php';

error_reporting(E_ALL);
ini_set('display_errors', '1');

if(file_exists('password.php')) {
	echo 'to assign a new password, first delete the password.php file.';
	exit;
}

if(isset($_POST['password'])) {
	if($_POST['password']!=='') {
		require ROOT.'include/func_crypt_random.php';
		require ROOT.'include/class_bcrypt.php';	
		$bcrypt=new Bcrypt(12);
		$hash=$bcrypt->hash($_POST['password']);
	}
	else $hash='';
	$output="<?php\nif(ini_get('register_globals')) exit('<center><h3>Error: Turn that damned register globals off!</h3></center>');\nif(!defined('CAN_INCLUDE')) exit('<center><h3>Error: Direct access denied!</h3></center>');\n\n\$hash='$hash';\n\n?>";
	echo '<textarea onclick="this.select();" style="vertical-align: top; width: 95%" rows=7>', htmlspecialchars($output, ENT_QUOTES, 'UTF-8'), '</textarea>';
	echo '<br><br>Just put the above in a file named password.php';
	file_put_contents('password0.php', $output);
	echo '<br>or<br>Rename password0.php to password.php';
	require ROOT.'include/home_link.php';
	exit;
}

?>
<form action='' method=post>
Enter empty password for no password.<br><br>
Password: <input type=text name=password autocomplete="off"><input type=submit value=submit>
</form>
