<?php
	include("connection.php");
	$query = $con->query("select * from tbl_admin where tbl_id='".$_GET["tbl_id"]."'"); 
	$row = $query->fetch();
	
?>
<div class="w3-modal-content w3-card-8 w3-animate-zoom w3-round w3-border w3-border-white w3-padding-0" style="max-width:600px;margin-top:20px;overflow:hidden;">
	<div class="w3-padding-medium w3-theme w3-col s12 m12 l12">
		<h3 class="w3-margin-0 w3-padding-0"><i class="fa fa-image"></i> Edit Admin Information</h3>
	</div>
	<form src="../libraries/php-func/update-admin.php" method="POST" class="w3-padding-medium w3-white w3-col s12 m12 l12" id="updateAdmin">
		<div class="w3-col s12 m12 l12 w3-padding-small  w3-center">
			<img src="../<?=$row["picture"];?>" class="" height="150px" width="auto" id="changeImageSrc">
			<div class="w3-clear"></div>
		</div>
		<div class="w3-col s12 m12 l12  w3-center">
			<input type="file" name="picture" class="w3-col s12 m12 l12 w3-padding-medium w3-border-white w3-border w3-round  w3-border w3-border-theme" onchange="readURL(this,'changeImageSrc','image')">
		</div>
		<div class="w3-col s12 m12 l12  w3-margin-top">
			<label>First Name</label>
			<input type="hidden" name="tbl_id" required value="<?=$row["tbl_id"];?>">
			<input type="hidden" name="old_picture" required value="<?=$row["picture"];?>">
			<input type="text" name="fname" class="w3-col s12 m12 l12 w3-padding-medium w3-border-white w3-border w3-round  w3-border w3-border-theme" required value="<?=$row["fname"];?>">
		</div>
		<div class="w3-col s12 m12 l12 ">
			<label>Middle Name</label>
			<input type="text" name="mname" class="w3-col s12 m12 l12 w3-padding-medium w3-border-white w3-border w3-round  w3-border w3-border-theme" required value="<?=$row["mname"];?>">
		</div>
		<div class="w3-col s12 m12 l12  ">
			<label>Last Name</label>
			<input type="text" name="lname" class="w3-col s12 m12 l12 w3-padding-medium w3-border-white w3-border w3-round  w3-border w3-border-theme" required value="<?=$row["lname"];?>">
		</div>
		<div class="w3-col s12 m12 l12 ">
			<label>Postion</label>
			<input type="text" name="position" class="w3-col s12 m12 l12 w3-padding-medium w3-border-white w3-border w3-round  w3-border w3-border-theme" required value="<?=$row["position"];?>">
		</div>
		<div class="w3-col s12 m12 l12  ">
			<label>Username</label>
			<input type="username" name="username" class="w3-col s12 m12 l12 w3-padding-medium w3-border-white w3-border w3-round  w3-border w3-border-theme" required value="<?=$row["username"];?>">
		</div>
		<div class="w3-col s12 m12 l12  w3-margin-bottom">
			<label>New Password</label>
			<input type="password" name="password" class="w3-col s12 m12 l12 w3-padding-medium w3-border-white w3-border w3-round  w3-border w3-border-theme" >
		</div>
		<div class="w3-col s12 m12 l12  w3-margin-bottom">
			<label>Repeat New Password</label>
			<input type="password" name="repeat_password" class="w3-col s12 m12 l12 w3-padding-medium w3-border-white w3-border w3-round  w3-border w3-border-theme" >
		</div>
		<button class="w3-btn w3-padding-medium w3-green w3-round" type="submit" onclick="send('updateAdmin','../libraries/php-func/update-admin.php','adminEdit')"><i class="fa fa-save"></i> Save</button> 
		<button class="w3-btn w3-padding-medium w3-grey w3-round" type="button" onclick="$('#adminEdit').hide();"><i class="fa fa-close"></i> Close</button> 
	</form>
</div>