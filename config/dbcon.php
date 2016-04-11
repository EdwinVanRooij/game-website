<?php
	if (!defined('INIT_SCRIPT')) exit;
	if (!defined("DB_CONNECTED")) {
		define("DB_CONNECTED", "YES");
		// This file is used to connect to the MySQL Database.
		require_once 'config.php';
		require_once 'core_class.php';
		$database = new Database($host['hostname'],$host['user'],$host['password']);
		$database->select_db($host['database']); # Select the appropriate DB
	}
?>