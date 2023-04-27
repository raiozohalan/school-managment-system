<?php
	include("connection.php");
	session_start();
	if(!empty($_SESSION["faculty_id"]) && !empty($_SESSION["username"])){
		$query = $con->query("select * from tbl_faculty where tbl_id='".$_SESSION["faculty_id"]."' and username='".$_SESSION["username"]."'");
		$row = $query->fetch();
	}else{
		?>
			<script>
				window.location.assign("../faculty/?msg=<i class='fa fa-warning w3-xlarge'></i> Session Expired");
			</script>
		<?php
	}
?>