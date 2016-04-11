<?php
if (@$_POST["register"] != "1") {
?>
<div align="center">
<div align="left" class="content">
<div align="center" class="content-title">Register</div>
<div class="content-border">
<table cellspacing=1 cellpadding=5>
<tr><td class="listtitle" colspan=2><center><span class='title2'></span></center></td></tr>
		<table cellpadding="0" cellspacing="0" width="100%">
			<tr>
				<td valign="top" width="45%">
					<form action="?e=register" method="POST">
						<table>
							<tr>
								<td><b>Username:</b></td>
							</tr>
							<tr>
								<td>
									<div class="textfield">
										<div><input type="text" name="musername" maxlength="12"></div>
									</div>
								</td>
							</tr>
							<tr>
								<td><b>Password:</b></td>
							</tr>
							<tr>
								<td>
									<div class="textfield">
										<div><input type="password" name="mpass" maxlength="12"></div>
									</div>
								</td>
							</tr>
							<tr>
								<td><b>Confirm Password:</b></td>
							</tr>
							<tr>
								<td>
									<div class="textfield">
										<div><input type="password" name="mpwcheck" maxlength="12"></div>
									</div>
								</td>
							</tr>
							<tr>
								<td><b>Email:</b></td>
							</tr>
							<tr>
								<td>
									<div class="textfield">
										<div><input type="text" name="memail" maxlength="50"></div>
									</div>
								</td>
							</tr>
								<td><b>Birthday:<br>Ex. 2010-10-23</b></td>
							<tr>
								<td>
									<div class="textfield">
										<div><?php include_once("DNT/parseBirth.php"); echo showDate('month')."&nbsp;"; echo showDate('day')."&nbsp;"; echo showDate('year'); ?></div>
									</div>
								</td>
							</tr>
							<tr>
								<td><input type="image" src="images/btn-create.png" class="submit" name="submit" value=" Register"/>
								<input type="hidden" name="register" value="1" /></td>
							</tr>
						</table>
					</form>
				</td>
				<td>&nbsp;</td>
				<td valign="top" align="center" width="45%">
					<img src="images/thunderbreaker.png" alt="">
				</td>
			</tr>
		</table>
</div>
</div>
</div>
<?php
} else {
	if (!isset($_POST["musername"]) OR
		!isset($_POST["mpass"]) OR
		!isset($_POST["mpwcheck"]) OR
		!isset($_POST["memail"])) {
		die ("Error: Not all fields complete");
	}
	
	include('config/init.php');
	
	function checkEmail($mail) {
		if(preg_match("/^([.0-9a-z_-]+)@(([0-9a-z-]+\.)+[0-9a-z]{2,4})$/i", $mail)) { 
			return TRUE;
		} else {
			return FALSE;
		} 
	}
	
	$username = mysql_real_escape_string($_POST["musername"]);
	$password = mysql_real_escape_string($_POST["mpass"]);
	$confirm_password = mysql_real_escape_string($_POST["mpwcheck"]);
	$email = mysql_real_escape_string($_POST["memail"]);
	$birth = mysql_real_escape_string($_POST['year'])."-".mysql_real_escape_string($_POST['month'])."-".mysql_real_escape_string($_POST['day']);
	
	$select_user_result = $database->query("SELECT `id` FROM `accounts` WHERE `name`='".$username."' OR `email`='".$email."' LIMIT 1");
	if ($database->rows() > 0) {
		$message = "This username or email is already used!";
	} else if ($password != $confirm_password) {
		$message = "Passwords didn't match!";
	} else if (strlen($password) < 4 || strlen($password) > 12) {
		$message = "Your password must be between 4-12 characters";
	} else if (strlen($username) < 4 || strlen($username) > 12) {
		$message = "Your username must be between 4-12 characters";
	} else if (!checkEmail($email)){
		$message = "You have filled in a wrong email address";
	} else {
		$insert_user_query = "INSERT INTO accounts (`name`, `password`, `ip`, `email`, `birthday`) VALUES ('".
			$username."', '".hash("sha1", $password)."', '/".$userip."', '".$email."', '".$birth."')";
		$database->query($insert_user_query);
		$message = "<font color=\"green\">You have successfully registered to $servername!</font>";
	}
	?>
<div align="center">
<div align="left" class="content">
	<div align="center" class="content-title">Register</div>
	<div class="content-border">
	<table cellpadding="0" cellspacing="0" width="100%">
	<?php echo $message; ?>
	</table>
		</div>
	</div>
</div>
<?php
}
?>