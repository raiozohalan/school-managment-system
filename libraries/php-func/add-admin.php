<?php
	include("connection.php");
	$msg = "";
	if($_POST["password"] == $_POST["repeat_password"]){
		$query_select  = $con->query("select count(tbl_id)as rowCount from tbl_admin where username='".$_POST["username"]."'");
		$row_select = $query_select->fetch();
		if($row_select["rowCount"] == 0){
			try{
				
				$dir = "../../images/admin-pictures/";
				if(!empty($_FILES["picture"]["name"])){
					$file = $dir.basename($_FILES["picture"]["name"]);
					$file_type =getImageSize($_FILES["picture"]["tmp_name"]);
					if($file_type["mime"] =="image/png" || $file_type["mime"] =="image/jpeg" || $file_type["mime"] =="image/jpg" || $file_type["mime"] == "image/swf" || $file_type["mime"] =="image/bmp" ){
						$queryFirst = "insert into tbl_admin(fname,lname,mname,position,username,password)values('".$_POST["fname"]."','".$_POST["lname"]."','".$_POST["mname"]."','".$_POST["position"]."','".$_POST["username"]."','".md5($_POST["password"])."')";
						$con->exec($queryFirst);
						$tbl_id = $con->lastInsertId();
						if(move_uploaded_file($_FILES["picture"]["tmp_name"],$file)){
							if(rename($file,$dir.$tbl_id.".".pathinfo($_FILES["picture"]["name"],PATHINFO_EXTENSION))){ 
								$picture = "picture='images/admin-pictures/".$tbl_id.".".pathinfo($_FILES["picture"]["name"],PATHINFO_EXTENSION)."'";
							}else{ 
								$err = '<p class="w3-red w3-padding-medium w3-margin-0"><i class="fa fa-circle"></i> Error while renaming your picture</p>';
							}
						}else{ 
							$err = '<p class="w3-red w3-padding-medium w3-margin-0"><i class="fa fa-circle"></i> Error while uploading your picture please try again</p>';
						}
					}else{ 
						$err = '<p class="w3-red w3-padding-medium w3-margin-0"><i class="fa fa-circle"></i> Invalid image format, system will accept only JPG,JPEG,PNG,BMP and SWF formats</p>';
					} 
				}else{
					$picture = "";
				}
				if(empty($err)){	
					$query = "update tbl_admin set $picture where tbl_id='".$tbl_id."'";
					$con->exec($query);
					$msg = '<p class="w3-green w3-padding-medium w3-margin-0"><i class="fa fa-check"></i> Success adding new admin accounts</p>'; 
					?>
					<div id="adminMsg" class="w3-modal w3-animate-zoom w3-padding-0" style="background:rgba(0,0,0,0.90);display:block;z-index:999;"> 
						<div class="w3-modal-content w3-card-8 w3-animate-zoom w3-round w3-border w3-border-white w3-padding-0" style="max-width:600px;margin-top:200px;overflow:hidden;">
							<div class="w3-padding-medium w3-theme w3-col s12 m12 l12">
								<h3>Message</h3>
							</div>
							<div class="w3-padding-medium w3-white w3-col s12 m12 l12">
								<?php
									echo $msg;
								?>
								<a href="admins.php" class="w3-btn w3-padding-medium w3-grey w3-section w3-round"  ><i class="fa fa-close"></i> Close</a>
							</div>
						</div> 
					</div> 
					<?php
				}
			}catch(PDOException $e){
				$err = '<p class="w3-red w3-padding-medium w3-margin-0"><i class="fa fa-warning"></i>'.$e->getMessage().'</p>'; 
			}
		}else{
			$err = '<p class="w3-red w3-padding-medium w3-margin-0"><i class="fa fa-warning"></i> Username is already in use</p>'; 
		}
	}else{
		$err = '<p class="w3-red w3-padding-medium w3-margin-0"><i class="fa fa-warning"></i> Password not match please try again</p>'; 
	}
	
	if(!empty($err)){
		?>
				<div id="adminMsg" class="w3-modal w3-animate-zoom w3-padding-0" style="background:rgba(0,0,0,0.90);display:block;z-index:999;"> 
					<div class="w3-modal-content w3-card-8 w3-animate-zoom w3-round w3-border w3-border-white w3-padding-0" style="max-width:600px;margin-top:200px;overflow:hidden;">
						<div class="w3-padding-medium w3-theme w3-col s12 m12 l12">
							<h3>Message</h3>
						</div>
						<div class="w3-padding-medium w3-white w3-col s12 m12 l12">
							<?php
								echo $err;
							?>
							<a href="add-admin.php" class="w3-btn w3-padding-medium w3-grey w3-section w3-round"  ><i class="fa fa-close"></i> Close</a>
						</div>
					</div> 
				</div> 
				<?php
	}
?>
