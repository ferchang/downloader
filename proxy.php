<?php
if(ini_get('register_globals')) exit("<center><h3>Error: Turn that damned register globals off!</h3></center>");
define('CAN_INCLUDE', true);

require 'include/common.php';

require ROOT.'include/auth.php';

if(isset($_POST['host'])) {
	if(isset($_POST['unset'])) {
		unset($_SESSION['proxy']);
		$msg='<span style="color: blue"><b>Proxy is unset</b></span>';
	}
	else {
		$proxy['host']=$_POST['host'];
		$proxy['port']=$_POST['port'];
		$proxy['kind']=$_POST['kind'];
		$_SESSION['proxy']=$proxy;
		$msg='<span style="color: green"><b>Proxy is set</b></span>';
	}
	echo "<center>$msg<br><br><a href=index.php>Home</a>";
	exit;
}

?>

<form action="" method=post>
Host: <input type=text name=host value="localhost" onclick='this.select();'>
Port: <input type=text name=port value="" size=6>
Proxy kind:
<select name=kind>
<option value=http>HTTP
<option value=socks>SOCKS
</select>
<input type=submit value=Set>&nbsp;&nbsp;<input type=submit value='Unset' name=unset>
</form>