<?php
	include("connection.php");
	session_start();
	$passwordErr = "";
	$accountErr = "";
	$saveErr = "";
	$pictureErr = "";
	$uploadErr = "";
	$renameErr = "";
	if($_POST["password"] == $_POST["repeat_password"]){
		// check if user exist
		$query = $con->query("select count(tbl_id)as rowCount,tbl_id,username,fname,lname,mname from tbl_students where username='".$_POST["username"]."' or fname='".$_POST["fname"]."' and mname='".$_POST["mname"]."' and lname='".$_POST["lname"]."'");
		$row = $query->fetch();
		if($row["rowCount"] == 0){
			$dir = "../../images/student-pictures/";
			$file = $dir.basename($_FILES["picture"]["name"]);
			$file_type =getImageSize($_FILES["picture"]["tmp_name"]);
			if($file_type["mime"] =="image/png" || $file_type["mime"] =="image/jpeg" || $file_type["mime"] =="image/jpg" || $file_type["mime"] == "image/swf" || $file_type["mime"] =="image/bmp" ){
				if(move_uploaded_file($_FILES["picture"]["tmp_name"],$file)){
					$querySave = "insert into tbl_students(fname,lname,mname,gender,bday,address,religion,mtongue,guardian,guardian_contact,guardian_rel,username,password,mother,father,account_status)values('".$_POST["fname"]."','".$_POST["lname"]."','".$_POST["mname"]."','".$_POST["gender"]."','".$_POST["bday"]."','".$_POST["address"]."','".$_POST["religion"]."','".$_POST["mtongue"]."','".$_POST["guardian_name"]."','".$_POST["guardian_contact"]."','".$_POST["guardian_rel"]."','".$_POST["username"]."','".md5($_POST["password"])."','".$_POST["mother"]."','".$_POST["father"]."','Accepted')";
					try{
						$con->exec($querySave);
						$lastID = $con->lastInsertId();
						
						if(rename($file,$dir.$lastID.".".pathinfo($_FILES["picture"]["name"],PATHINFO_EXTENSION))){
							$picture = "images/student-pictures/".$lastID.".".pathinfo($_FILES["picture"]["name"],PATHINFO_EXTENSION);
							$queryUpdate = $con->query("update tbl_students set picture='$picture' where tbl_id='$lastID'");
							$con->exec($queryUpdate);
							?>
							<script>  window.location.assign("students.php")</script>
							<?php
						}else{
							$uploadErr = '<p><i class="fa fa-circle"></i> Error while renaming your picture</p>';
						}
					}catch(PDOException $e){
						$saveErr = '<p><i class="fa fa-circle"></i>'.$e->getMessage().'</p>';
					}
				}else{
					$uploadErr = '<p><i class="fa fa-circle"></i> Error while uploading your picture please try again</p>';
				}
			}else{
				$pictureErr = '<p><i class="fa fa-circle"></i> Invalid image format, system will accept only JPG,JPEG,PNG,BMP and SWF formats</p>';
			}
			
		}else{
			if($row["username"] == $_POST["username"]){
				$accountErr = '<p><i class="fa fa-circle"></i> Username Already exist</p>';
			}
			if($row["fname"] == $_POST["fname"] && $row["lname"] == $_POST["lname"] && $row["mname"] == $_POST["mname"]){
				$accountErr = '<p><i class="fa fa-circle"></i> Student Already exist</p>';
			}
		}
	}else{
		$passwordErr = '<p><i class="fa fa-circle"></i> Password not match</p>';
	}
?>
<div class="w3-col s12 m12 l12 w3-padding-medium w3-red w3-animate-bottom">
	<?php
		echo $passwordErr.$accountErr.$saveErr.$pictureErr.$uploadErr.$renameErr;
	?>
</div>