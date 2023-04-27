<?php
	include("connection.php");
	session_start();
	$err = 0;
	$password = "";
	if(!empty($_POST["password"]) && !empty($_POST["repeat_password"])){
		if($_POST["password"] == $_POST["repeat_password"]){
			$err = 0;
			$password = ",password='".md5($_POST["password"])."'";
		}else{
			$err = 1;
			echo '<p class="w3-red w3-padding-medium w3-animate-top"><i class="fa fa-warning"></i> Password not match please try again</p>';
		}
	}elseif(!empty($_POST["password"]) || !empty($_POST["repeat_password"])){
		$err = 1;
		echo '<p class="w3-red w3-padding-medium w3-animate-top"><i class="fa fa-warning"></i> Password not match please try again</p>';
	}
	if($err == 0){
		$query = $con->query("select count(tbl_id)as rowCount,username,fname,lname,mname from tbl_faculty where username='".$_POST["username"]."' and tbl_id!='".$_POST["tbl_id"]."' or fname='".$_POST["fname"]."' and mname='".$_POST["mname"]."' and lname='".$_POST["lname"]."' and tbl_id!='".$_POST["tbl_id"]."'");
		$row = $query->fetch();
		if($row["rowCount"] > 0){
			if(!empty($row["username"]) && $row["username"] == $_POST["username"]){
				echo '<p class="w3-red w3-padding-medium w3-animate-top"><i class="fa fa-warning"></i> Username already exist please change it and try again</p>';
			}else{
				echo '<p class="w3-red w3-padding-medium w3-animate-top"><i class="fa fa-warning"></i> first name,last name,middle name already exist please change it and try again</p>';
			}
		}else{
			$query_save = "update tbl_faculty set fname='".$_POST["fname"]."',mname='".$_POST["mname"]."',lname='".$_POST["lname"]."',gender='".$_POST["gender"]."',bday='".$_POST["bday"]."',address='".$_POST["address"]."',username='".$_POST["username"]."',position='".$_POST["position"]."'$password where tbl_id='".$_POST["tbl_id"]."'";
			try{
				$con->exec($query_save);
				if(!empty($_SESSION["faculty_id"])){
					$_SESSION["username"] = $_POST["username"];
					?>
					<script>window.location.assign('profile.php?msg=<p class="w3-green  w3-padding-medium w3-animate-top"><i class="fa fa-check"></i> Success updating  faculty information</p>');</script>
					<?php	
				}else{
					?>
					<script>window.location.assign('faculty.php?msg=<p class="w3-green  w3-padding-medium w3-animate-top"><i class="fa fa-check"></i> Success updating  faculty information</p>');</script>
					<?php	
				}
				
			}catch(PDOException $e){
				echo '<p class="w3-red w3-padding-medium w3-animate-top"><i class="fa fa-warning"></i>'.$e->getMessage().'</p>';
			}
		}
	}
?>