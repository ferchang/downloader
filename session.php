<?php
if(ini_get('register_globals')) exit("<center><h3>Error: Turn that damned register globals off!</h3></center>");
define('CAN_INCLUDE', true);

require 'include/common.php';

if(isset($_POST['destroy'])) {
	session_name('reg8log_session');
	session_start();
	session_destroy();
	header("Location: {$_SERVER['PHP_SELF']}");
	exit;
}

echo '<table align="center" cellpadding="10" style="border: thin solid #000"><tr><td><pre>';
print_r($_SESSION);
echo '</pre><br><center><form style="margin-bottom: 0px" method="post" action=""><input type="submit" name="destroy" value="Destroy session"></form></center></td></tr></table>';

echo '<br><center><a href="index.php">Home</a></center>';

?>