<?php
if(basename($_SERVER["PHP_SELF"]) == "home.php"){
    die("403 - Access Forbidden");
}
$editable = ">";
if(isset($_SESSION['id'])){
	if(isset($_SESSION['admin'])){
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="assets/libs/ckeditor/ckeditor.js"></script>
<script>
$(document).ready(function() {
	$('#home').click(function() {
		var name;
		for(name in CKEDITOR.instances) {
			var instance = CKEDITOR.instances[name];
			if(this && this == instance.element.$) {
				return;
			}
		}
		$(this).attr('contenteditable', true);
		var content_id = $(this).attr('id');
			CKEDITOR.inline( content_id, {
				on: {
					blur: function( event ) {
						var data = event.editor.getData();
						$.ajax({
							type: "POST",
							url: "?base=misc&script=home",
							data: {
								content : data,
								content_id : content_id,
								admin_id : <?php echo $_SESSION['admin']; ?>,
								is_ajax: '1',
							},
						});
					}
				}
			});
	});
});
</script>
<?php
		$editable = " id=\"home\">";
	}
}
echo "<hr/>
<div" . $editable . $gethome['homecontent'] . "</div>";
?>