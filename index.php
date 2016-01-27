<?php
if(ini_get('register_globals')) exit("<center><h3>Error: Turn that damned register globals off!</h3></center>");
define('CAN_INCLUDE', true);

require 'include/common.php';

require ROOT.'include/auth.php';

if(isset($hash) and $hash==='') echo '<center><span style="color: red;">Warning: system is without password!</span></center>';

?>
<center>
<br><br><br><br>
<a href=download.php>Download</a><br><br>
<a href=proxy.php>Set/unset proxy</a><br><br>
<a href=view_downloads.php>View downloads</a>
</center>