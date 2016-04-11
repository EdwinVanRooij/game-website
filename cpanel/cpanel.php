<div align="center">
<div align="left" class="content">
	<div align="center" class="content-title">Control Panel</div>
	<div class="content-border">
		<table cellpadding="0" cellspacing="0" width="100%">
			<tr>
				<td valign="top" width="45%">
			<?php if(isset($_SESSION['id'])){ ?>
				Hello <?php echo " <font color=\"green\"> ".$_SESSION['name'].""?></font>,<br>What would you like to do?<br><br> 1. <a href="?e=cpassword">Change password</a>.<br>2. <a href="?e=rpic">Reset My PIC</a>.<br> 3. <a href="?e=charfix">Character Fixes</a>.
				<td>&nbsp;</td>
				<td valign="top" align="center" width="45%">
					<img src="images/thunderbreaker.png" alt="">
					</td>
				</tr>
				<?php
				} else {
				echo "You are not logged in, please <a href=\"?e=login\">log in</a>.";
				} ?>
				</td>
			</table>
		</div>
	</div>
</div>