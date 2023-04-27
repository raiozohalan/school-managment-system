<?php
	include("connection.php");
	session_start();
	if(!empty($_SESSION["id"]) && !empty($_SESSION["username"])){
		$query = $con->query("select * from tbl_students where tbl_id='".$_SESSION["id"]."' and username='".$_SESSION["username"]."'");
		$row = $query->fetch();
	}else{
		?>
			<script>
				window.location.assign("../index.php?msg=<i class='fa fa-warning w3-xlarge'></i> Session Expired");
			</script>
		<?php
	}
?>