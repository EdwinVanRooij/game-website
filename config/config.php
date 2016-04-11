<?php
error_reporting(0);
$host['hostname'] = 'localhost'; // Host name [DEFAULT:Localhost]
$host['user'] = 'testuser2'; // DB Username
$host['password'] = '12345'; // DB Password
$host['database'] = 'testdatabase2'; // DB Name
$webtitle = 'ExtaliaMS'; // Website Title
$rate['exp'] = '45x'; // Exp Rate
$rate['meso'] = '10x'; // Meso Rate
$rate['drop'] = '3x'; // Drop Rate
$servername = 'Yakuza'; // Server Name
$version = '114'; // Version
$reversion = '1'; // ReVersion like 114.1, so the Revesion of this patch is 1.
$patch = 'Renegades'; // Patch Name
$serverip = "127.0.0.1"; // Your IP Here!
$loginport = "8484"; // LoginPort [DEFAULT: 8484]
 
//Links
$client = "http://www.mediafire.com/?xkkvoro97aevyc9"; // Client download link
$mssetup = "http://download3.nexon.net/maplestory/fullversion/MSSetupv83.exe"; // Full Maplestory setup download link
$forum = "/forum/forum.php"; // Forum link
$news = "/forum/news.php"; // News link, or you can make a new page :)

$offline = "<img src=images/offline.png>";
$online = "<img src=images/online.png>";

// Opens connection to mysql server [DO NOT TOUCH THIS]
mysql_connect($host['hostname'],$host['user'],$host['password']) OR die("Can't connect to server");
mysql_select_db($host['database']) OR die("Cannot select DB");

if(basename($_SERVER["PHP_SELF"]) == "config.php"){
	die("Error!");
} 
?>