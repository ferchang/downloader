<?php
if(ini_get('register_globals')) exit("<center><h3>Error: Turn that damned register globals off!</h3></center>");
define('CAN_INCLUDE', true);

require 'include/common.php';

require ROOT.'include/auth.php';

$arr=glob('downloads/*.info');

echo '<table border align=center cellpadding=10>';

foreach($arr as $name) {
	$name=substr($name, 10, -5);
	echo '<tr><td>';
	echo "<a href=downloads/$name>$name</a>";
	echo '</td><td>';
	echo '<textarea cols=50 rows=5>', file_get_contents("downloads/$name.info"), '</textarea>';
	echo '</td></tr>';
}

echo '</table>';

require ROOT.'include/home_link.php';

?>
