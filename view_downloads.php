<?php
if(ini_get('register_globals')) exit("<center><h3>Error: Turn that damned register globals off!</h3></center>");
define('CAN_INCLUDE', true);

require 'include/common.php';

require ROOT.'include/auth.php';

if(!empty($_POST)) {
	if(isset($_POST['del_all'])) {
		foreach(glob('downloads/*.info') as $name) {
			unlink($name);
			$name=substr($name, 0, -5);
			unlink($name);
		}
	}
	else foreach($_POST as $key=>$value) {
		unlink("downloads/$key");
		unlink("downloads/$key.info");
	}
}

echo '<center><form method=post action="">';

echo '<table border align=center cellpadding=10>';

$arr=glob('downloads/*.info');

if(!empty($arr)) {

	foreach($arr as $name) {
		$name=substr($name, 10, -5);
		echo '<tr><td>';
		echo "<a href=downloads/$name>$name</a>";
		echo '</td><td>';
		echo '<textarea cols=50 rows=5>', file_get_contents("downloads/$name.info"), '</textarea>';
		echo '</td><td>';
		echo "<input type=submit value=Delete name='$name'>";
		echo '</td></tr>';
	}

	echo '</table>';

	echo "<br><input type=submit value='Delete all' name=del_all>";

	echo '</form></center>';

} else echo '<h3 align=center>Empty</h3>';

require ROOT.'include/home_link.php';

?>
