<?php
	$dir = "../../images/slider-pictures/";
	$msg = "";
	$file = $dir.basename($_FILES["picture"]["name"]);
		$file_type =getImageSize($_FILES["picture"]["tmp_name"]);
		if($file_type["mime"] =="image/png" || $file_type["mime"] =="image/jpeg" || $file_type["mime"] =="image/jpg" || $file_type["mime"] == "image/swf" || $file_type["mime"] =="image/bmp" ){
			if(move_uploaded_file($_FILES["picture"]["tmp_name"],$file)){
				unlink($dir.$_POST["image"]);
				if(rename($file,$dir.$_POST["image"])){
					$msg = '<p class="w3-green w3-padding-medium w3-margin-0"><i class="fa fa-Check"></i> Success updating the image</p>';
				}else{ 
					$msg = '<p class="w3-red w3-padding-medium w3-margin-0"><i class="fa fa-warning"></i> Error while renaming your picture</p>';
				}
			}else{ 
				$msg = '<p class="w3-red w3-padding-medium w3-margin-0"><i class="fa fa-warning"></i> Error while uploading your picture please try again</p>';
			}
		}else{ 
			$msg = '<p class="w3-red w3-padding-medium w3-margin-0"><i class="fa fa-warning"></i> Invalid image format, system will accept only JPG,JPEG,PNG,BMP and SWF formats</p>';
		} 
?> 
	<div class="w3-modal-content w3-card-8 w3-animate-zoom w3-round w3-border w3-border-white w3-padding-0" style="max-width:600px;margin-top:200px;overflow:hidden;">
		<div class="w3-padding-medium w3-theme w3-col s12 m12 l12">
			<h3>Message</h3>
		</div>
		<div class="w3-padding-medium w3-white w3-col s12 m12 l12"> 
			<?php
				echo $msg;
			?>
			<a href="slider.php" class="w3-btn w3-padding-medium w3-grey w3-section w3-round" ><i class="fa fa-close"></i> Close</a>
		</div>
	</div> 