<?php
	include("connection.php");
	$msg = "";
	$query_select  = $con->query("select count(tbl_id)as rowCount from tbl_admin where username='".$_POST["username"]."' and tbl_id !='".$_POST["tbl_id"]."'");
	$row_select = $query_select->fetch();
	if($row_select["rowCount"] == 0){
		try{
			$dir = "../../images/admin-pictures/";
			if(!empty($_FILES["picture"]["name"])){
				$file = $dir.basename($_FILES["picture"]["name"]);
				$file_type =getImageSize($_FILES["picture"]["tmp_name"]);
				if($file_type["mime"] =="image/png" || $file_type["mime"] =="image/jpeg" || $file_type["mime"] =="image/jpg" || $file_type["mime"] == "image/swf" || $file_type["mime"] =="image/bmp" ){
					if(move_uploaded_file($_FILES["picture"]["tmp_name"],$file)){
						if(file_exists("../../".$_POST["old_picture"])){
							unlink("../../".$_POST["old_picture"]);
						}
						if(rename($file,$dir.$_POST["tbl_id"].".".pathinfo($_FILES["picture"]["name"],PATHINFO_EXTENSION))){ 
							$picture = ",picture='images/admin-pictures/".$_POST["tbl_id"].".".pathinfo($_FILES["picture"]["name"],PATHINFO_EXTENSION)."'";
						}else{ 
							$msg = '<p class="w3-red w3-padding-medium w3-margin-0"><i class="fa fa-circle"></i> Error while renaming your picture</p>';
						}
					}else{ 
						$msg = '<p class="w3-red w3-padding-medium w3-margin-0"><i class="fa fa-circle"></i> Error while uploading your picture please try again</p>';
					}
				}else{ 
					$msg = '<p class="w3-red w3-padding-medium w3-margin-0"><i class="fa fa-circle"></i> Invalid image format, system will accept only JPG,JPEG,PNG,BMP and SWF formats</p>';
				} 
			}else{
				$picture = "";
			}
			$err = 0;
			if(!empty($_POST["password"]) && !empty($_POST["repeat_password"])){
				if($_POST["password"] == $_POST["repeat_password"]){
					$password = ",password='".md5($_POST["password"])."'";
					$err = 0;
				}else{
					$password = "";
					$err+=1;
				}
			}else{
				$password = "";
				if($_POST["password"] != $_POST["repeat_password"]){
					$err+=1;
				}else{
					$err =0;
				}
			}
			if($err == 0){
				$query = "update tbl_admin set fname='".$_POST["fname"]."',lname='".$_POST["lname"]."',mname='".$_POST["mname"]."',position='".$_POST["position"]."',username='".$_POST["username"]."'$password $picture where tbl_id='".$_POST["tbl_id"]."'";
				$con->exec($query);
				$msg = '<p class="w3-green w3-padding-medium w3-margin-0"><i class="fa fa-check"></i> Success updating admins account</p>';
			}else{
				$msg = '<p class="w3-red w3-padding-medium w3-margin-0"><i class="fa fa-warning"></i> Password not match please try again</p>';
			}
		}catch(PDOException $e){
			$msg = '<p class="w3-red w3-padding-medium w3-margin-0"><i class="fa fa-warning"></i>'.$e->getMessage().'</p>';
		}
	}else{
		$msg = '<p class="w3-red w3-padding-medium w3-margin-0"><i class="fa fa-warning"></i> Username is already in use</p>'; 
	}
	
?>				<div class="w3-modal-content w3-card-8 w3-animate-zoom w3-round w3-border w3-border-white w3-padding-0" style="max-width:600px;margin-top:200px;overflow:hidden;">
					<div class="w3-padding-medium w3-theme w3-col s12 m12 l12">
						<h3>Message</h3>
					</div>
					<div class="w3-padding-medium w3-white w3-col s12 m12 l12">
						<?php
							echo $msg;
						?>
						<a href="admins.php" class="w3-btn w3-padding-medium w3-orange w3-section w3-round"  ><i class="fa fa-refresh"></i> Reload Admins</a>
						<button type="button" onclick="$('#adminEdit').hide();$('#adminEdit').attr('innerHTML','');" class="w3-btn w3-padding-medium w3-grey w3-section w3-round"  ><i class="fa fa-close"></i> Close</button>
					</div>
				</div>