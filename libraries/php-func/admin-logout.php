<?php	
	include("connection.php");
	session_start();
	session_destroy();
	session_unset();
?>
<script>
	window.location.assign("../../admin/");
</script>