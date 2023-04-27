<?php
	include("connection.php");
	$passwordErr = "";
	$accountErr = "";
	$saveErr = "";
	$pictureErr = "";
	$uploadErr = "";
	$renameErr = "";
	
	$err = 0;
	$picture = "";
	$password = "";
	if(!empty($_POST["password"]) && !empty($_POST["repeat_password"]) && $_POST["password"] == $_POST["repeat_password"]){
		$err += 0;
		$password = ",password='".md5($_POST["password"])."'";
	}elseif(!empty($_POST["password"]) && !empty($_POST["repeat_password"]) && $_POST["password"] != $_POST["repeat_password"]){
		$err += 1;
		$password = "";
		$passwordErr = '<p class="w3-red w3-padding-medium w3-margin-0"><i class="fa fa-circle"></i> Password not match</p>';
	}elseif(!empty($_POST["password"]) && empty($_POST["repeat_password"]) || empty($_POST["password"]) && !empty($_POST["repeat_password"])){
		$err += 1;
		$password = "";
		$passwordErr = '<p class="w3-red w3-padding-medium w3-margin-0"><i class="fa fa-circle"></i> Please Fill up both Change Password and Repeat Password</p>';
	}
	
	$dir = "../../images/student-pictures/";
	if(!empty($_FILES["picture"]["name"])){
		$file = $dir.basename($_FILES["picture"]["name"]);
		$file_type =getImageSize($_FILES["picture"]["tmp_name"]);
		if($file_type["mime"] =="image/png" || $file_type["mime"] =="image/jpeg" || $file_type["mime"] =="image/jpg" || $file_type["mime"] == "image/swf" || $file_type["mime"] =="image/bmp" ){
			if(move_uploaded_file($_FILES["picture"]["tmp_name"],$file)){
				if(file_exists("../../".$_POST["old_picture"])){
					unlink("../../".$_POST["old_picture"]);
				}
				if(rename($file,$dir.$_POST["id"].".".pathinfo($_FILES["picture"]["name"],PATHINFO_EXTENSION))){
					$err+=0;
					$picture = ",picture='images/student-pictures/".$_POST["id"].".".pathinfo($_FILES["picture"]["name"],PATHINFO_EXTENSION)."'";
				}else{
					$err+= 1;
					$picture= "";
					$uploadErr = '<p class="w3-red w3-padding-medium w3-margin-0"><i class="fa fa-circle"></i> Error while renaming your picture</p>';
				}
			}else{
				$err += 1;
				$picture= "";
				$uploadErr = '<p class="w3-red w3-padding-medium w3-margin-0"><i class="fa fa-circle"></i> Error while uploading your picture please try again</p>';
			}
		}else{
			$err += 1;
			$picture= "";
			$pictureErr = '<p class="w3-red w3-padding-medium w3-margin-0"><i class="fa fa-circle"></i> Invalid image format, system will accept only JPG,JPEG,PNG,BMP and SWF formats</p>';
		} 
	}else{
		$picture ="";
	}
		
	if($err == 0){
		// check if user exist
		$query = $con->query("select count(tbl_id)as rowCount from tbl_students where username='".$_POST["username"]."' and tbl_id !='".$_POST["id"]."' or fname='".$_POST["fname"]."' and mname='".$_POST["mname"]."' and lname='".$_POST["lname"]."' and tbl_id !='".$_POST["id"]."'");
		$row = $query->fetch();
		if($row["rowCount"] == 0){
			$querySave = "update tbl_students set fname='".$_POST["fname"]."',lname='".$_POST["lname"]."',mname='".$_POST["mname"]."',gender='".$_POST["gender"]."',bday='".$_POST["bday"]."',address='".$_POST["address"]."',religion='".$_POST["religion"]."',mtongue='".$_POST["mtongue"]."',guardian='".$_POST["guardian_name"]."',guardian_contact='".$_POST["guardian_contact"]."',guardian_rel='".$_POST["guardian_rel"]."',username='".$_POST["username"]."',mother='".$_POST["mother"]."',father='".$_POST["father"]."'".$password.$picture." where tbl_id='".$_POST["id"]."'";
			try{
				$con->exec($querySave); 
				?> 
				<script>
					loadContent('studentsList','../libraries/php-func/students.php');
				</script>
					<div class="w3-modal-content w3-card-8 w3-animate-zoom w3-round w3-border w3-border-white w3-padding-0" style="max-width:600px;margin-top:200px;overflow:hidden;">
						<div class="w3-padding-medium w3-theme w3-col s12 m12 l12">
							<h3>Message</h3>
						</div>
						<div class="w3-padding-medium w3-white w3-col s12 m12 l12">
							<p><i class="fa fa-check w3-xlarge"></i> Success updating your profile</p>
							<button class="w3-btn w3-padding-medium w3-grey w3-section w3-round" type="button" onclick="$('#StudentModal').fadeOut();"><i class="fa fa-close"></i> Close</button> 
						</div>
					</div> 
				<?php
			}catch(PDOException $e){
				$saveErr = '<p class="w3-red w3-padding-medium w3-margin-0"><i class="fa fa-circle"></i>'.$e->getMessage().'</p>';
			}
		}elseif($row["rowCount"] > 0){
			$picture= "";
			if(!empty($row["username"])){
				$accountErr = '<p><i class="fa fa-circle"></i> Username Already exist</p>';
			}else{
				$accountErr = '<p><i class="fa fa-circle"></i> Student Already exist</p>';
			}
		} 
	}
	
	
	if(!empty($passwordErr) || !empty($accountErr) || !empty($saveErr) || !empty($pictureErr) || !empty($uploadErr) || !empty($renameErr)){
?> 
	<div class="w3-modal-content w3-card-8 w3-animate-zoom w3-round w3-border w3-border-white w3-padding-0" style="max-width:600px;margin-top:200px;overflow:hidden;">
		<div class="w3-padding-medium w3-theme w3-col s12 m12 l12">
			<h3>Message</h3>
		</div>
		<div class="w3-padding-medium w3-white w3-col s12 m12 l12">
			<?php
				echo $passwordErr.$accountErr.$saveErr.$pictureErr.$uploadErr.$renameErr;
			?>
			<button class="w3-btn w3-padding-medium w3-grey w3-section w3-round" type="button" onclick="$('#StudentModal').fadeOut();"><i class="fa fa-close"></i> Close</button>
		</div>
	</div> 
<?php } ?>