<?php
	include("connection.php");
	session_start();
	if(!empty($_SESSION["admin_id"]) && !empty($_SESSION["admin_uname"])){
		$query = $con->query("select * from tbl_admin where tbl_id='".$_SESSION["admin_id"]."' and username='".$_SESSION["admin_uname"]."'");
		$row = $query->fetch();
	}else{
		?>
			<script>
				window.location.assign("../admin/index.php?msg=<i class='fa fa-warning w3-xlarge'></i> Session Expired");
			</script>
		<?php
	}
?>