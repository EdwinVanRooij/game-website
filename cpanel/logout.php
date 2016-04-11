<?php
if(isset($_SESSION['id'])) {
	session_destroy();
	echo "<META HTTP-EQUIV=Refresh CONTENT=\"0; URL=?e=login\">";
} else {
	echo "<META HTTP-EQUIV=Refresh CONTENT=\"0; URL=?e=login\">";
}
?>