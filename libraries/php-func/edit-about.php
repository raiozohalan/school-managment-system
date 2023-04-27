<?php
	include("connection.php");
	$query = $con->query("select * from tbl_about_us where tbl_id='".$_GET["tbl_id"]."'");
	$row = $query->fetch();
?>
<div class="w3-col s12 m12 l12 w3-padding-small w3-theme-dark">
	<h3 class="w3-padding-0 w3-margin-0 w3-left">Edit About Us</h3>
	<button type="button" onclick="$('#modalContainer').fadeOut();" class="w3-btn w3-transparent w3-right w3-hover-theme"><i class="fa fa-close"></i> Close</button>
</div>
<form method="POST" action="../libraries/php-func/update-about.php" id="editAbout" class="w3-col s12 m12 l12 w3-white">
	<div id="editAboutResponseCon" class="w3-col s12 l12 m12"></div>
	<div class="w3-col s12 m6 l6 w3-white">
		<div class="w3-col s12 m12 l12 w3-padding-medium">
			<label><b>Title</b></label>
			<input type="hidden" name="tbl_id" required value="<?=$row["tbl_id"];?>">
			<input type="hidden" name="old_picture" required value="<?=$row["picture"];?>">
			<input type="text" name="title" class="w3-col s12 m12 l12 w3-padding-medium w3-border-white w3-border w3-round w3-border w3-border-theme" placeholder="Enter position" required value="<?=$row["title"];?>">
		</div>
		<div class="w3-col s12 m12 l12 w3-padding-medium">
			<label><b>Content</b></label>
			<textarea name="content" class="w3-col s12 m12 l12 w3-padding-medium w3-border-white w3-border w3-round w3-border w3-border-theme" placeholder="Enter Address" style="width:100%;max-width:100%;min-width:100%;height:200px;min-height:200px;max-height:auto;overflow-x:hidden;overflow-y:auton;" required><?=$row["content"];?></textarea>
		</div>
	</div>
	<div class="w3-col s12 m6 l6 w3-white">
		<div class="w3-col s12 m12 l12 w3-padding-medium  w3-center">
			<img src="../<?php if(file_exists("../../".$row["picture"]) && !empty($row["picture"])){echo $row["picture"];}else{echo"images/img-error.png";}?>" class="" height="auto" width="100%" id="changeImageSrc">
			<div class="w3-clear"></div>
		</div>
		<div class="w3-col s12 m12 l12  w3-center w3-padding-medium">
			<input type="file" name="picture" class="w3-col s12 m12 l12 w3-padding-medium w3-border-white w3-border w3-round  w3-border w3-border-theme" onchange="readURL(this,'changeImageSrc','image')">
		</div>
	</div>
	<div class="w3-col s12 m12 l12 w3-padding-medium w3-grey w3-margin-top">
		<button type="submit" name="submit" class="w3-btn w3-padding-large w3-round w3-green w3-right" onclick="send('editAbout','../libraries/php-func/update-about.php','editAboutResponseCon')" ><i class="fa fa-save"></i> Save</button>
	</div>
</form>