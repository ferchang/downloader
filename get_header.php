<?php

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