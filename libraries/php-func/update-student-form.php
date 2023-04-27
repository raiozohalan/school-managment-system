<?php
	include("connection.php");
	$query = $con->query("select * from tbl_students where tbl_id='".$_GET["tbl_id"]."'");
	$row = $query->fetch();
?>
<script src="../libraries/jquery/jquery.js"></script>
<script src="../libraries/jquery/jquery.min1.js"></script>
<script src="../libraries/js/raizoh-functions.js"></script>
<div class="w3-padding-0 w3-col s12 m12 l12">
				<form method="POST" action="../libraries/php-func/verify-student-updates.php" enctype="multipart/form-data" class="w3-padding-small w3-white w3-col s12 m12 l12 " id="registrationForm">
				<div class="w3-display-container w3-col s12 m12 l12 w3-center w3-padding-small w3-container">
					<h3 class="w3-padding-0 w3-margin-0"><i class="fa fa-edit"></i> Update Student Information</h3>
					<button type="button" class="w3-btn w3-padding-medium w3-theme w3-display-topright"  onclick="$('#StudentModal').fadeOut();"><i class="fa fa-close"></i> Close</button>
				</div>
				<div id="registrationResponseCon" class="w3-col s12 m12 l12"></div>		
				<div class="w3-col s12 m12 l12">
					<div class="w3-col s12 m8 l8">
					<h4 class="w3-theme-dark w3-margin-0 w3-padding-medium"><b>Personal Information</b></h4>
					<div class="w3-col s12 m l6 w3-padding-medium w3-hide">
						<label><b>ID Number</b></label>
						<input type="text" name="id_number" class="w3-col s12 m12 l12 w3-padding-medium w3-border-white w3-border w3-round w3-border w3-border-theme" placeholder="Enter your ID number">
					</div>
					<div class="w3-col s12 m6 l6">
						<div class="w3-col s12 m12 l12 w3-padding-medium">
							<label><b>First Name</b></label>
							<input type="hidden" name="id" required value="<?=$_GET["tbl_id"];?>">
							<input type="text" name="fname" class="w3-col s12 m12 l12 w3-padding-medium w3-border-white w3-border w3-round w3-border w3-border-theme" placeholder="Enter your first name" required value="<?=$row["fname"];?>">
						</div>
						<div class="w3-col s12 m12 l12 w3-padding-medium">
							<label><b>Last Name</b></label>
							<input type="text" name="lname" class="w3-col s12 m12 l12 w3-padding-medium w3-border-white w3-border w3-round w3-border w3-border-theme" placeholder="Enter your last name" required value="<?=$row["lname"];?>">
						</div>
						<div class="w3-col s12 m12 l12 w3-padding-medium">
							<label><b>Middle Name</b></label>
							<input type="text" name="mname" class="w3-col s12 m12 l12 w3-padding-medium w3-border-white w3-border w3-round w3-border w3-border-theme" placeholder="Enter you middle name" required value="<?=$row["mname"];?>">
						</div>
						<div class="w3-col s12 m12 l12 w3-padding-medium">
							<label><b>Gender</b></label>
							<select name="gender" class="w3-col s12 m12 l12 w3-padding-medium w3-border-white w3-border w3-round w3-border w3-border-theme" required>
								<option <?php if($row["gender"] == "Male"){ echo "selected"; }?> >Male</option>
								<option <?php if($row["gender"] == "Female"){ echo "selected"; }?> >Female</option>
							</select>
						</div>
						<div class="w3-col s12 m12 l12 w3-padding-medium">
							<label><b>Birthday</b></label>
							<input type="date" name="bday" class="w3-col s12 m12 l12 w3-padding-medium w3-border-white w3-border w3-round w3-border w3-border-theme" required value="<?=$row["bday"];?>">
						</div>
					</div>
					<div class="w3-col s12 m6 l6">
						<div class="w3-col s12 m12 l12 w3-padding-medium">
							<label><b>Address</b></label>
							<textarea name="address" class="w3-col s12 m12 l12 w3-padding-medium w3-border-white w3-border w3-round w3-border w3-border-theme" placeholder="Enter your Address" style="width:100%;max-width:100%;min-width:100%;height:100px;overflow-x:hidden;overflow-y:auton;" required><?=$row["address"];?></textarea>
						</div>
						<div class="w3-col s12 m12 l12 w3-padding-medium">
							<label><b>Religion</b></label>
							<input type="text" name="religion" class="w3-col s12 m12 l12 w3-padding-medium w3-border-white w3-border w3-round w3-border w3-border-theme" placeholder="Enter you religion" required value="<?=$row["religion"];?>">
						</div>
						<div class="w3-col s12 m12 l12 w3-padding-medium w3-margin-bottom">
							<label><b>Mother Tongue </b></label>
							<textarea name="mtongue" class="w3-col s12 m12 l12 w3-padding-medium w3-border-white w3-border w3-round w3-border w3-border-theme" placeholder="Enter your mother tongue " style="width:100%;max-width:100%;min-width:100%;height:100px;overflow-x:hidden;overflow-y:auton;" required><?=$row["mtongue"];?></textarea>
						</div> 
					</div> 
					</div> 
					
								
				<div class="w3-col s12 m4 l4 w3-light-grey">
					<h4 class="w3-black w3-margin-0 w3-padding-medium"><b>Profile Picture</b></h4>
					<div class="w3-col s12 m12 l12 w3-padding-medium w3-center">
						<img src="../<?=$row["picture"];?>" class="" height="200px" width="auto" id="profile_picture123">
						<div class="w3-clear"></div>
					</div>
					<div class="w3-col s12 m12 l12 w3-padding-medium w3-center">
						<input type="file" name="picture" class="w3-col s12 m12 l12 w3-padding-medium w3-border-white w3-border w3-round  w3-border w3-border-theme w3-margin-bottom" onchange="readURL(this,'profile_picture123','image')">
						<input type="hidden" name="old_picture" value="<?=$row["picture"];?>">
					</div>
				</div>
				</div>
				
				<div class="w3-col s12 m4 l4 w3-light-grey">
					<h4 class="w3-dark-grey w3-margin-0 w3-padding-medium"><b>Guardian Information</b></h4>
					<div class="w3-col s12 m12 l12 w3-padding-medium">
						<label><b>Guardian Name</b></label>
						<input type="text" name="guardian_name" class="w3-col s12 m12 l12 w3-padding-medium w3-border-white w3-border w3-round  w3-border w3-border-theme" placeholder="Enter your Guardian full name" required value="<?=$row["guardian"];?>">
					</div>
					<div class="w3-col s12 m12 l12 w3-padding-medium">
						<label><b>Contact Number</b></label>
						<input type="text" name="guardian_contact" class="w3-col s12 m12 l12 w3-padding-medium w3-border-white w3-border w3-round  w3-border w3-border-theme" placeholder="Enter your Guardian contact number" required value="<?=$row["guardian_contact"];?>">
					</div>
					<div class="w3-col s12 m12 l12 w3-padding-medium">
						<label><b>Relationship of Guardian</b></label>
						<input type="text" name="guardian_rel" class="w3-col s12 m12 l12 w3-padding-medium w3-border-white w3-border w3-round  w3-border w3-border-theme w3-margin-bottom" placeholder="Enter your relationship of guardian" required value="<?=$row["guardian_rel"];?>">
					</div>
				</div>
				<div class="w3-col s12 m4 l4 w3-light-grey">
					<h4 class="w3-theme w3-margin-0 w3-padding-medium"><b>Account Settings</b></h4>
					<div class="w3-col s12 m12 l12 w3-padding-medium">
						<label><b>Username</b></label>
						<input type="username" name="username" class="w3-col s12 m12 l12 w3-padding-medium w3-border-white w3-border w3-round  w3-border w3-border-theme" placeholder="Enter your Username" required value="<?=$row["username"];?>">
					</div>
					<div class="w3-col s12 m12 l12 w3-padding-medium">
						<label><b>New Password</b></label>
						<input type="password" name="password" class="w3-col s12 m12 l12 w3-padding-medium w3-border-white w3-border w3-round  w3-border w3-border-theme" placeholder="Enter your password">
					</div>
					<div class="w3-col s12 m12 l12 w3-padding-medium">
						<label><b>Repeat New Password</b></label>
						<input type="password" name="repeat_password" class="w3-col s12 m12 l12 w3-padding-medium w3-border-white w3-border w3-round  w3-border w3-border-theme w3-margin-bottom" placeholder="Repeat Password">
					</div>
				</div>
				
				<div class="w3-col s12 m4 l4 w3-light-grey">
					<h4 class="w3-dark-grey w3-margin-0 w3-padding-medium"><b>Family Information</b></h4>
					<div class="w3-col s12 m12 l12 w3-padding-medium">
						<label><b>Mother</b></label>
						<input type="text" name="mother" class="w3-col s12 m12 l12 w3-padding-medium w3-border-white w3-border w3-round  w3-border w3-border-theme" placeholder="Enter your mother full name" required value="<?=$row["mother"];?>">
					</div>
					<div class="w3-col s12 m12 l12 w3-padding-medium w3-margin-bottom">
						<label><b>Father</b></label>
						<input type="text" name="father" class="w3-col s12 m12 l12 w3-padding-medium w3-border-white w3-border w3-round  w3-border w3-border-theme" placeholder="Enter your Father full name" required value="<?=$row["father"];?>">
					</div>
				</div>
				
				<div class="w3-col s12 m12 l12 w3-theme w3-padding-large w3-right-align">
					<button type="submit" name="submit" class="w3-btn w3-padding-large w3-round w3-green" onclick="send('registrationForm','../libraries/php-func/verify-student-updates.php','StudentModal')"><i class="fa fa-check"></i> Save Updates</button>
				</div>
				
			</form>
			</div> 