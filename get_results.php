<?php

echo 'original url: ', $url;
echo "<hr>";
echo '<textarea style="width: 100%; height: 70%">', htmlspecialchars($response, ENT_QUOTES|ENT_SUBSTITUTE, 'UTF-8'), '</textarea>';

?>
