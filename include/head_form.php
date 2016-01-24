<?php
if(ini_get('register_globals')) exit("<center><h3>Error: Turn that damned register globals off!</h3></center>");
if(!defined('CAN_INCLUDE')) exit("<center><h3>Error: Direct access denied!</h3></center>");
?>

<h3>Head request</h3>
<form action="" method=post>
URL: <input type=text name=url><input type=submit value=Submit name=head>
</form>
