<?php
if(ini_get('register_globals')) exit("<center><h3>Error: Turn that damned register globals off!</h3></center>");
define('CAN_INCLUDE', true);

require 'include/common.php';

set_time_limit(5*60);

require ROOT.'include/auth.php';

if(isset($_POST['head'])) require ROOT.'include/process_head.php';
else if(isset($_POST['get'])) require ROOT.'include/process_get.php';
else require ROOT.'include/form.php';

?>
