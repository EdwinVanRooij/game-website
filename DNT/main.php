<?php
if(basename($_SERVER["PHP_SELF"]) == "main.php"){
die("Error!");}
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
	<link rel="shortcut icon" href="favicon.ico" > 
	<link rel=stylesheet type="text/css" href="css/style.css">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title><?php echo $servername; echo " v".$version; echo ".".$reversion; echo " [GMS] ".$patch; ?> - MapleStory Private Server</title>
    </head>
	<body>
	<!--Navigation & Header-->
		<div align="center" class="header">
			<div align="center" class="navigation">
				<table height="100%">
					<tr>
						<td><a href="?e=home"><img src="images/home.png" alt="Home"></a></td>
						<td class="sep"></td>
						<td><a href="<?php echo $news?>" target="_blank">News</a></td>
						<td class="sep"></td>
						<td><a href="<?php echo $forum?>" target="_blank">Forum</a></td>
						<td class="sep"></td>
						<td><a href="?e=chat">Chat</a></td>
						<td class="sep"></td>
						<?php
						if(isset($_SESSION['id'])) {
						echo "
						<td><a href='?e=cpanel'>Control Panel</a></td>
						<td class='sep'></td>
						<td><a href='?e=logout'><font style='color: #f00'>Logout</font></a></td>";
						} else {
						echo "
						<td><a href='?e=register'>Sign Up</a></td>
						<td class='sep'></td>
						<td><a href='?e=login'>Login</a></td>";
						}
						?>
						<td class="sep"></td>
						<td><a href="?e=downloads">Downloads</a></td>
						<td class="sep"></td>
						<td><a href="?e=ranking">Rankings</a></td>
						<td class="sep"></td>
						<td><a href="?e=donate">Donate</a></td>
					</tr>
				</table>
			</div>
		</div>
	<!--Vote & Arrow-->
	<div class="curl">
	<a href="?e=vote"><img src="images/vote.png" alt="Vote"></a>
	</div>
	<img src="images/arrow.png" alt="" class="arrow">
	</body>