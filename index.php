<?php 

require_once("config/config.php");
	
	$getpage = isset($_GET['e']) ? $_GET['e'] : "";

	switch($getpage){
		case NULL:
			header('Location: ?e=home');
			break;
		case "register":
			$getpage = "pages/register";
			break;
		case "login":
			$getpage = "cpanel/login";
			break;
		case "logout";
			$getpage = "cpanel/logout";
			break;
		case "downloads":
			$getpage = "pages/downloads";
			break;
		case "vote":
			$getpage = "pages/vote";
			break;
		case "donate":
			$getpage = "pages/donate";
			break;
		case "chat":
			$getpage = "pages/chat";
			break;
		case "ranking":
			$getpage = "pages/ranking";
			break;
		case "cpanel":
			$getpage = "cpanel/cpanel";
			break;
		case "cpassword":
			$getpage = "cpanel/cp/cpassword";
			break;
		case "rpic":
			$getpage = "cpanel/cp/rpic";
			break;
		case "charfix":
			$getpage = "cpanel/cp/charfix";
			break;
		case "home":
		default:
			$getpage = "pages/home";
			break;
	}
	
	include_once('DNT/main.php');
	include_once($getpage.".php");
	include_once('DNT/bottom.php');
?>