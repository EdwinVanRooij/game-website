<?php
	error_reporting(E_ALL & ~E_NOTICE);
		
	define ('INIT_SCRIPT', 'YES!');
	define ('IP_ADDR', $_SERVER['REMOTE_ADDR']);
	define ('TIME', time());
	define ('MICROTIME', microtime());
	
	require_once 'dbcon.php';
	require_once 'core_class.php';
	
	global $database;
?>