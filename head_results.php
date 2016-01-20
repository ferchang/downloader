<?php

echo 'original url: ', $url;
echo "<hr>";
require 'check_curl_error.php';
echo '<textarea style="width: 100%; height: 70%">', htmlspecialchars($response, ENT_QUOTES|ENT_SUBSTITUTE, 'UTF-8'), '</textarea>';

?>
<form action="" method=post>
URL: <input type=text name=url value="<?php echo $url; ?>">
HEAD request: <input type=checkbox name=head value=head>
Range: <input type=text name=length value="0" size=7 style='text-align: center'>-<input type=text name=length value="All" size=7 style='text-align: center'>
Response body:
<select name=body_action>
<option value=save>Save to file
<option value=show>Show
<option value=show8save>Show and save
</select>
<input type=submit value=Submit name=get>
</form>
