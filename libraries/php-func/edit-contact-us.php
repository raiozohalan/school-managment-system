<?php
	include("connection.php");
	$query = $con->query("select * from tbl_contact_us");
	$row = $query->fetch();
?>
<div class="w3-col s12 m12 l12 w3-padding-small w3-theme-dark">
	<h3 class="w3-padding-0 w3-margin-0 w3-left">Edit Contact Us</h3>
	<button type="button" onclick="$('#modalContainer').fadeOut();" class="w3-btn w3-transparent w3-right w3-hover-theme"><i class="fa fa-close"></i> Close</button>
</div>
<div id="editContactUsResponseCon" class="w3-col s12 l12 m12"></div>
<form method="POST" action="../libraries/php-func/update-post.php" id="editContactUs" class="w3-col s12 m12 l12 w3-white">
	<div class="w3-col s12 m6 l6 w3-white">
		<div class="w3-col s12 m12 l12 w3-padding-medium">
			<label><b>Intorduction</b></label>
			<textarea name="intro" class="w3-col s12 m12 l12 w3-padding-medium w3-border-white w3-border w3-round w3-border w3-border-theme" placeholder="Enter Address" style="width:100%;max-width:100%;min-width:100%;height:200px;min-height:200px;max-height:auto;overflow-x:hidden;overflow-y:auton;" required><?=$row["intro"];?></textarea>
		</div>
		<div class="w3-col s12 m12 l12 w3-padding-medium">
			<label><b>Address</b></label>
			<textarea name="address" class="w3-col s12 m12 l12 w3-padding-medium w3-border-white w3-border w3-round w3-border w3-border-theme" placeholder="Enter Address" style="width:100%;max-width:100%;min-width:100%;height:200px;min-height:200px;max-height:auto;overflow-x:hidden;overflow-y:auton;" required><?=$row["address"];?></textarea>
		</div>
	</div>
	<div class="w3-col s12 m6 l6 w3-white">
		
		<div class="w3-col s12 m12 l12 w3-padding-medium">
			<label><b>Phone</b></label> 
			<input type="text" name="tel_number" class="w3-col s12 m12 l12 w3-padding-medium w3-border-white w3-border w3-round w3-border w3-border-theme" placeholder="Enter position" value="<?=$row["tel_number"];?>">
		</div> 
		<div class="w3-col s12 m12 l12 w3-padding-medium">
			<label><b>Mobile</b></label> 
			<input type="text" name="mob_number" class="w3-col s12 m12 l12 w3-padding-medium w3-border-white w3-border w3-round w3-border w3-border-theme" placeholder="Enter position" value="<?=$row["mob_number"];?>">
		</div> 
		<div class="w3-col s12 m12 l12 w3-padding-medium">
			<label><b>Email</b></label> 
			<input type="email" name="email" class="w3-col s12 m12 l12 w3-padding-medium w3-border-white w3-border w3-round w3-border w3-border-theme" placeholder="Enter position" value="<?=$row["email"];?>">
		</div> 
		<div class="w3-col s12 m12 l12 w3-padding-medium">
			<label><b>Facebook</b></label> 
			<input type="text" name="facebook" class="w3-col s12 m12 l12 w3-padding-medium w3-border-white w3-border w3-round w3-border w3-border-theme" placeholder="Enter position" value="<?=$row["facebook"];?>">
		</div> 
		<div class="w3-col s12 m12 l12 w3-padding-medium">
			<label><b>Twitter</b></label> 
			<input type="text" name="twitter" class="w3-col s12 m12 l12 w3-padding-medium w3-border-white w3-border w3-round w3-border w3-border-theme" placeholder="Enter position" value="<?=$row["twitter"];?>">
		</div> 
	</div>
	<div class="w3-col s12 m12 l12 w3-padding-medium w3-grey w3-margin-top">
		<button type="submit" name="submit" class="w3-btn w3-padding-large w3-round w3-green w3-right" onclick="send('editContactUs','../libraries/php-func/update-contact-us.php','editContactUsResponseCon')" ><i class="fa fa-save"></i> Save</button>
	</div>
</form>