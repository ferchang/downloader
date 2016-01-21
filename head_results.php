<?php

echo 'original url: ', $url;
echo "<hr>";
require 'check_curl_error.php';
echo '<textarea style="width: 100%; height: 50%">', htmlspecialchars($response, ENT_QUOTES|ENT_SUBSTITUTE, 'UTF-8'), '</textarea>';

require 'get_header.php';
$h=get_header($response, 'Accept-Ranges');
if($h!==false) echo '<hr>', '<span style="background: green; color: yellow">', $h, '</span>', '<hr>';

?>
<form action="" method=post>
URL: <input type=text name=url value="<?php echo $url; ?>">
HEAD request: <input type=checkbox name=head value=head>
Range: <input type=text name=range_from value="0" size=7 style='text-align: center'>-<input type=text name=range_to value="All" size=7 style='text-align: center'>
Response body:
<select name=body_action>
<option value=save>Save to file
<option value=show>Show
<option value=show8save>Show and save
</select>
<input type=submit value=Submit name=get>
</form>
