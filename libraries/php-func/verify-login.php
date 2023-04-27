<?php
	include("connection.php");
	if(!empty($_POST["username"]) && !empty($_POST["password"])){
		$query = $con->query("select count(tbl_id)as rowCount,tbl_id,username from tbl_students where username='".$_POST["username"]."' and password='".md5($_POST["password"])."'");
		$row = $query->fetch();
		if($row["rowCount"] > 1){
			?>
				<div class="w3-col s12 m12 l12 w3-padding-medium w3-red w3-animate-zoom">
					<p class="w3-margin-0 w3-padding-0"><i class="fa fa-warning w3-xlarge"></i> Duplicate account please try again</p>
				</div>
			<?php
		}elseif($row["rowCount"] == 0){
			?>
				<div class="w3-col s12 m12 l12 w3-padding-medium w3-red w3-animate-zoom">
					<p class="w3-margin-0 w3-padding-0"><i class="fa fa-warning w3-xlarge"></i> Invalid username or password please try again</p>
				</div>
			<?php
		}elseif($row["rowCount"] == 1){
			session_start();
			$_SESSION["id"] = $row["tbl_id"];
			$_SESSION["username"] = $row["username"];
			?>
				<script>  window.location.assign("student/")</script>
			<?php
		}
	}
?>