<?php
if(ini_get('register_globals')) exit("<center><h3>Error: Turn that damned register globals off!</h3></center>");
if(!defined('CAN_INCLUDE')) exit("<center><h3>Error: Direct access denied!</h3></center>");

function get_header($headers, $header) {
    
    foreach(explode("\r\n", $headers) as $i => $line) {
	
        if($i === 0) continue;
		
		if(stripos($line, $header)===0) {
			
			$tmp=explode(': ', $line);
			return $tmp[1];
			
		}

	}
	
	return false;

}

?>