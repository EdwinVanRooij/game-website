<div align="center">
<div align="left" class="content">
	<div align="center" class="content-title">Already Logged In</div>
	<div class="content-border">
<?php
if(isset($_SESSION['id'])) {	
	if(!isset($_POST['loggedin'])){
		echo "Is your account already logged in? Click fix to resolve the problem.
		<br/><br/><form method=\"POST\"><center><input type='submit' class='btn_fix' style='padding: 0; margin: 0; border: 0;' name='loggedin' value=\"\"/></center></form>";
	} else {
		$name = $_SESSION['name'];
		$g = mysql_query("SELECT * FROM `accounts` WHERE `name`='".$name."'") or die(mysql_error());
		$u = mysql_fetch_array($g);
		if($u['loggedin']=="0"){
			echo "You are already logged out!<br><br><a href=\"?e=charfix\"><img src='images/btn-back.png' alt='Back'></a>";
		}else{
			$s = mysql_query("UPDATE `accounts` SET `loggedin`='0' WHERE `name`='".$name."'") or die(mysql_error());
			echo "Your account has been fixed! You can now log back onto the game.";
		}
	}
} else {
	echo "You are not logged in, please <a href=\"?e=login\">log in</a>.";
}
?>
		</div>
	</div>
</div>

<div align="center">
<div align="left" class="content">
	<div align="center" class="content-title">Unstuck</div>
	<div class="content-border">

<?php
if(isset($_SESSION['id'])) {
	if(!isset($_POST['unstuck'])) {
		echo "Is your character stuck at a bugged map, and you can't login in?<br/>Choose your character, and you will be moved to the Free Market!<br /><br /><form method=\"POST\"><center><table border=\"0\" width=\"300\"><tr><td align=\"left\" width=\"50%\"><b>Select character:</b></td><td><select name=\"char\">";
		$s = mysql_query("SELECT * FROM `characters` WHERE `accountid`='".$_SESSION['id']."' ORDER BY `id` ASC") or die(mysql_error());
		while($c = mysql_fetch_array($s)) {
			echo "<option value=\"".$c['id']."\">".$c['name']."</option>";
		}
		echo "</select></td></tr></table><br /><input type='submit' class='btn_release' style='padding: 0; margin: 0; border: 0;' name='unstuck' value=\"\"/></center></form>";		
	} else {
		$char = mysql_real_escape_string($_POST['char']);
		$henesys = mysql_real_escape_string(910000000);
		$m = mysql_query("UPDATE `characters` SET `map`='".$henesys."' WHERE `id`='".$char."'") or die(mysql_error());
		echo "Fix succesful! Your character will now spawn at Free Market!";
	}
} else {
	echo "You are not logged in, please <a href=\"?e=login\">log in</a>.";
}
?>
		</div>
	</div>
</div>


