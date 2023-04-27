<?php
	include("connection.php");
	if($_POST["password"] == $_POST["repeat_password"]){
		$query = $con->query("select count(tbl_id)as rowCount,username from tbl_faculty where username='".$_POST["username"]."' or fname='".$_POST["fname"]."' and mname='".$_POST["mname"]."' and lname='".$_POST["lname"]."'");
		$row = $query->fetch();
		if($row["rowCount"] > 0){
			if(!empty($row["username"]) && $row["username"] == $_POST["username"]){
				echo '<p class="w3-red w3-padding-medium w3-animate-top"><i class="fa fa-warning"></i> Username already exist please change it and try again</p>';
			}else{
				echo '<p class="w3-red w3-padding-medium w3-animate-top"><i class="fa fa-warning"></i> first name,last name,middle name already exist please change it and try again</p>';
			}
		}else{
			$query_save = "insert into tbl_faculty(fname,mname,lname,gender,bday,address,username,password,position)values('".$_POST["fname"]."','".$_POST["mname"]."','".$_POST["lname"]."','".$_POST["gender"]."','".$_POST["bday"]."','".$_POST["address"]."','".$_POST["username"]."','".md5($_POST["password"])."','".$_POST["position"]."')";
			try{
				$con->exec($query_save);
				?>
				<script>window.location.assign('add-faculty.php?msg=<p class="w3-green  w3-padding-medium w3-animate-top"><i class="fa fa-check"></i> New faculty is added</p>');</script>
				<?php
			}catch(PDOException $e){
				echo '<p class="w3-red w3-padding-medium w3-animate-top"><i class="fa fa-warning"></i>'.$e->getMessage().'</p>';
			}
		}
	}else{
		echo '<p class="w3-red w3-padding-medium w3-animate-top"><i class="fa fa-warning"></i> Password not match please try again</p>';
	}
	
?>