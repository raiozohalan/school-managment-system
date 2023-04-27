<?php
	include("connection.php");
	$query = $con->query("select * from tbl_faculty where tbl_id='".$_GET["tbl_id"]."'"); 
	$row = $query->fetch();
	
?>
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
	<label>Birthday</label>
	<input type="date" name="bday" class="w3-col s12 m12 l12 w3-padding-medium w3-border-white w3-border w3-round  w3-border w3-border-theme" required value="<?=$row["bday"];?>">
</div>
<div class="w3-col s12 m12 l12 ">
	<label>Gender</label>
	<select name="gender" class="w3-col s12 m12 l12 w3-padding-medium w3-border-white w3-border w3-round w3-border w3-border-theme" required>
		<option <?php if($row["gender"] == "Male"){ echo "selected"; }?> >Male</option>
		<option <?php if($row["gender"] == "Female"){ echo "selected"; }?> >Female</option>
	</select>
</div>
<div class="w3-col s12 m12 l12 ">
	<label>Address</label>
	<textarea name="address" class="w3-col s12 m12 l12 w3-padding-medium w3-border-white w3-border w3-round w3-border w3-border-theme" placeholder="Enter Address" style="width:100%;max-width:100%;min-width:100%;height:100px;overflow-x:hidden;overflow-y:auton;" required><?=$row["address"];?></textarea>
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
	<label>Repeat Password</label>
	<input type="password" name="repeat_password" class="w3-col s12 m12 l12 w3-padding-medium w3-border-white w3-border w3-round  w3-border w3-border-theme" >
</div>