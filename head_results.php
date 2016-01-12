<?php

echo 'original url: ', $url;
echo "<hr>";
echo '<textarea style="width: 100%; height: 70%">', $response, '</textarea>';

?>
<form action="" method=post>
URL: <input type=text name=url value="<?php echo $url; ?>">
HEAD request: <input type=checkbox name=head value=head>
<input type=submit value=Submit name=get>
</form>
