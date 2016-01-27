<?php
if(ini_get('register_globals')) exit("<center><h3>Error: Turn that damned register globals off!</h3></center>");
if(!defined('CAN_INCLUDE')) exit("<center><h3>Error: Direct access denied!</h3></center>");
?>

<script src='js/jquery.js'></script>
<script>
function head_click(stat) {
	//alert(stat);
	if(stat) $('#response_body_option').hide();
	else $('#response_body_option').show();
}
</script>
<form action="" method=post>
URL: <input type=text name=url value="<?php if(isset($url)) echo $url; ?>">
HEAD request: <input type=checkbox name=head id=head_chk value=head <?php if(!isset($_POST['head'])) echo 'checked'; ?> onchange='head_click(this.checked);'>
Range: <input type=text name=range_from value="0" size=7 style='text-align: center'>-<input type=text name=range_to value="All" size=7 style='text-align: center'>
<span id=response_body_option>
Response body:
<select name=body_action>
<option value=save>Save to file
<option value=show>Show
<option value=show8save>Show and save
</select>
</span>
<input type=submit value=Submit name=get>
<?php
if(isset($_SESSION['proxy'])) {
	echo "&nbsp;( <b>Via proxy:</b> <span style='color: blue'>{$_SESSION['proxy']['host']}:{$_SESSION['proxy']['port']} ({$_SESSION['proxy']['kind']})</span> )";
}
?>
</form>
<script>
if($('#head_chk').is(':checked')) $('#response_body_option').hide();
</script>
<?php require ROOT.'include/home_link.php'; ?>