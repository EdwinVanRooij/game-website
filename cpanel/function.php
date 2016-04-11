
<?php

if(basename($_SERVER["PHP_SELF"]) == "function.php"){
die("Error!");}

function sql_sanitize( $sCode ) {
	if (function_exists("mysql_real_escape_string" ) ) {		
		$sCode = mysql_real_escape_string( $sCode );		
	} else { 
		$sCode = addslashes( $sCode );				
	}
	return $sCode;							
}

function shortTitle($title){
	$maxlength = 15;
	$title = $title." ";
	$title = substr($title, 0, $maxlength);
	$title = substr($title, 0, strrpos($title,' '));
	$title = $title."...";
	return $title;
}
?>