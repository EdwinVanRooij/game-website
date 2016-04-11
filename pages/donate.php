<div align="center">
<div align="left" class="content">
	<div align="center" class="content-title">Donate</div>
	<div class="content-border">
<?php
	if(isset($_SESSION['id'])) {
	echo "Make your own script";
	} else {
	echo "To make a donationm, please <a href='?e=login'>log in</a>.";
	}
?>
	</div>
</div>
