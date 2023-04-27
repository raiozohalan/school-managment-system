<?php
	include("connection.php");
	$conerr = "";
	$accerr = "";
	try{
		$query = $con->query("select count(tbl_id)as rowCount,username,tbl_id from tbl_faculty where username='".$_POST["username"]."' and password='".md5($_POST["password"])."'");
		$row = $query->fetch();
		
		if($row["rowCount"] == 1){
			session_start();
			$_SESSION["faculty_id"] = $row["tbl_id"];
			$_SESSION["username"] = $row["username"];
			?>
			<script>window.location.assign("students.php");</script>
			<?php
		}elseif($row["rowCount"] > 1){
			$accerr = "<p class='w3-padding-medium w3-margin-0 w3-red w3-animate-zoom'><i class='fa fa-warning'></i> Duplicate account please contact you administrator</p>";
		}elseif($row["rowCount"] == 0){
			$accerr = "<p class='w3-padding-medium w3-margin-0 w3-red  w3-animate-zoom'><i class='fa fa-warning'></i> Invalid Username or Password</p>";
		}
	}catch(PDOExeption $e){
		$conerro = $e->getMessage();
	}
	
	echo $conerr;
	echo $accerr;
?>
