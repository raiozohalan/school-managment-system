<?php
	include("connection.php");
	$msg = "";
	$query_select  = $con->query("select count(tbl_id)as rowCount from tbl_about_us where title='".$_POST["title"]."' and tbl_id !='".$_POST["tbl_id"]."'");
	$row_select = $query_select->fetch();
	if($row_select["rowCount"] == 0){
		try{
			$tbl_id = $_POST["tbl_id"];
			$dir = "../../images/about-us-pictures/";
			if(!empty($_FILES["picture"]["name"])){
				$file = $dir.basename($_FILES["picture"]["name"]);
				$file_type =getImageSize($_FILES["picture"]["tmp_name"]);
				if($file_type["mime"] =="image/png" || $file_type["mime"] =="image/jpeg" || $file_type["mime"] =="image/jpg" || $file_type["mime"] == "image/swf" || $file_type["mime"] =="image/bmp" ){
					if(move_uploaded_file($_FILES["picture"]["tmp_name"],$file)){
						if(file_exists("../../".$_POST["old_picture"])){
							unlink("../../".$_POST["old_picture"]);
						}
						if(rename($file,$dir.$tbl_id.".".pathinfo($_FILES["picture"]["name"],PATHINFO_EXTENSION))){ 
							$picture = ",picture='images/about-us-pictures/".$tbl_id.".".pathinfo($_FILES["picture"]["name"],PATHINFO_EXTENSION)."'";
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
			if(empty($msg)){
				$query = "update tbl_about_us set title='".$_POST["title"]."',content='".$_POST["content"]."'$picture where tbl_id='$tbl_id'";
				$con->exec($query);
			?> 
			<script>
				window.location.assign('about-us.php?msg=<p class="w3-green w3-padding-medium w3-margin-0"><i class="fa fa-check"></i> Success updating the post</p>');
			</script>
			<?php
			}
		}catch(PDOException $e){
			$msg = '<p class="w3-red w3-padding-medium w3-margin-0"><i class="fa fa-warning"></i>'.$e->getMessage().'</p>'; 
		}
	}else{
		$msg = '<p class="w3-red w3-padding-medium w3-margin-0"><i class="fa fa-warning"></i> Title is already in use</p>'; 
	}
	echo $msg;
?>