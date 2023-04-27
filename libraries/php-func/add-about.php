<?php
	include("connection.php");
	$msg = "";
	$query_select  = $con->query("select count(tbl_id)as rowCount from tbl_about_us where title='".$_POST["title"]."'");
	$row_select = $query_select->fetch();
	if($row_select["rowCount"] == 0){
		try{
			
			$dir = "../../images/news-and-events-pictures/";
			if(!empty($_FILES["picture"]["name"])){
				$file = $dir.basename($_FILES["picture"]["name"]);
				$file_type =getImageSize($_FILES["picture"]["tmp_name"]);
				if($file_type["mime"] =="image/png" || $file_type["mime"] =="image/jpeg" || $file_type["mime"] =="image/jpg" || $file_type["mime"] == "image/swf" || $file_type["mime"] =="image/bmp" ){
					$queryFirst = "insert into tbl_about_us(title,content)values('".$_POST["title"]."','".$_POST["content"]."')";
					$con->exec($queryFirst);
					$tbl_id = $con->lastInsertId();
					if(move_uploaded_file($_FILES["picture"]["tmp_name"],$file)){
						if(rename($file,$dir.$tbl_id.".".pathinfo($_FILES["picture"]["name"],PATHINFO_EXTENSION))){ 
							$picture = "picture='images/news-and-events-pictures/".$tbl_id.".".pathinfo($_FILES["picture"]["name"],PATHINFO_EXTENSION)."'";
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
			if(!empty($picture)){
				$query = "update tbl_about_us set $picture where tbl_id='".$tbl_id."'";
				$con->exec($query);
			}
			if(empty($msg)){
			?> 
			<script>
				window.location.assign('about-us.php?msg=<p class="w3-green w3-padding-medium w3-margin-0"><i class="fa fa-check"></i> Success adding new post</p>');
			</script>
			<?php
			}
		}catch(PDOException $e){
			$msg = '<p class="w3-red w3-padding-medium w3-margin-0"><i class="fa fa-warning"></i>'.$e->getMessage().'</p>'; 
		}
	}else{
		$msg = '<p class="w3-red w3-padding-medium w3-margin-0"><i class="fa fa-warning"></i> Title is already in use</p>'; 
	}
?>
<form class="w3-white w3-col s12 m12 l12 w3-card-4" method="POST" action="../libraries/php-func/add-about.php" id="add-about">
					<h3 class="w3-margin-0 w3-padding-medium w3-theme-dark">Add New About</h3>
					<div class="w3-col s12 m12 l12" ><?=$msg;?></div>
					<div class="w3-col s12 m6 l6 w3-white">
						<div class="w3-col s12 m12 l12 w3-padding-medium">
							<label><b>Title</b></label> 
							<input type="text" name="title" class="w3-col s12 m12 l12 w3-padding-medium w3-border-white w3-border w3-round w3-border w3-border-theme" placeholder="Enter position" required value="<?=$_POST["title"];?>">
						</div>
						<div class="w3-col s12 m12 l12 w3-padding-medium">
							<label><b>Content</b></label>
							<textarea name="content" class="w3-col s12 m12 l12 w3-padding-medium w3-border-white w3-border w3-round w3-border w3-border-theme" placeholder="Enter Address" style="width:100%;max-width:100%;min-width:100%;height:200px;min-height:200px;max-height:auto;overflow-x:hidden;overflow-y:auton;" required><?=$_POST["content"];?></textarea>
						</div>
					</div>
					<div class="w3-col s12 m6 l6 w3-white">
						<div class="w3-col s12 m12 l12 w3-padding-medium  w3-center">
							<img src="../images/img-error.png" class="" height="200px" width="auto" id="changeImageSrc">
							<div class="w3-clear"></div>
						</div>
						<div class="w3-col s12 m12 l12  w3-center w3-padding-medium">
							<input type="file" name="picture" class="w3-col s12 m12 l12 w3-padding-medium w3-border-white w3-border w3-round  w3-border w3-border-theme" onchange="readURL(this,'changeImageSrc','image')" required>
						</div>
					</div>
					<div class="w3-col s12 m12 l12 w3-padding-medium w3-grey ">
						<button type="submit" name="submit" class="w3-btn w3-padding-large w3-round w3-green w3-right" onclick="send('add-about','../libraries/php-func/add-about.php','add-aboutForm')" ><i class="fa fa-save"></i> Save</button>
					</div>
				</form>