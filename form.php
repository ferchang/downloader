<form action="" method=post>
URL: <input type=text name=url value="<?php if(isset($url)) echo $url; ?>">
HEAD request: <input type=checkbox name=head value=head <?php if(!isset($_POST['head'])) echo 'checked'; ?>>
Range: <input type=text name=range_from value="0" size=7 style='text-align: center'>-<input type=text name=range_to value="All" size=7 style='text-align: center'>
Response body:
<select name=body_action>
<option value=save>Save to file
<option value=show>Show
<option value=show8save>Show and save
</select>
<input type=submit value=Submit name=get>
</form>