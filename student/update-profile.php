<?php
	include("../libraries/php-func/main-func.php");
	include("../libraries/php-func/connection.php");
	include("../libraries/php-func/student-session.php");
	head(ucfirst($row["fname"])." ".ucfirst($row["mname"])." ".ucfirst($row["lname"]),"");
?>
	<div class="w3-col s12 m12 l12 w3-container w3-theme">
		<div class="w3-col s12 m1 l1 w3-container"></div>
		<div class="w3-col s12 m10 l0 w3-container w3-padding-0">
			<img src="../images/banner.png" width="100%">
			
			<div class="w3-clear w3-container w3-col s12 m12 l12"></div>
			
			<div class="w3-col s12 m3 l3 w3-margin-top">
				<img src="../<?=$row["picture"];?>" width="100%" class="w3-card-8 w3-border w3-border-theme">
				<div class="w3-clear w3-container w3-col s12 m12 l12 w3-margin-top"></div> 
				<a href="index.php" class="w3-btn w3-padding-medium w3-btn-block w3-theme w3-border-theme-dark w3-border  w3-hover-white"><i class="fa fa-user"></i> Profile</a>
				<a href="update-profile.php" class="w3-btn w3-padding-medium w3-btn-block w3-white w3-border-theme-dark w3-border  w3-hover-white"><i class="fa fa-edit"></i> Update Profile</a>
				<a href="grades.php" class="w3-btn w3-padding-medium w3-btn-block w3-theme w3-border-theme-dark w3-border  w3-hover-white"><i class="fa fa-edit"></i> Grades</a>
			</div>
			
			<div class="w3-col s12 m9 l9 w3-margin-top">
				<div class="w3-col s12 m12 l12  w3-padding-0 w3-padding-left w3-padding-bottom">
					<h3 class="w3-left w3-margin-0 "><b><?=ucfirst($row["fname"])." ".ucfirst($row["mname"])." ".ucfirst($row["lname"]);?></b> <label class="w3-text-orange"> ( Account <?=$row["account_status"];?> )</label></h3>
					<a href="../libraries/php-func/logout.php" class="w3-btn w3-round w3-padding-medium w3-right w3-red"><i class="fa fa-sign-out"></i> Logout</a>
					<div class="w3-clear w3-padding-top"></div>
					<hr class="w3-border-bottom w3-border-theme-dark w3-margin-0 w3-margin-top">
				</div>
				<div class="w3-col s12 m12 l12  w3-padding-0 w3-padding-left w3-padding-bottom">
					<h1 class="w3-text-grey"><i class="fa fa-user"></i> Update Profile</h1>
					<form method="POST" action="../libraries/php-func/verify-profile-updates.php" enctype="multipart/form-data" class="w3-padding-0 w3-col s12 m12 l12" id="updateForm">
						<div id="updateResponseCon" class="w3-col s12 m12 l12"></div>
						<div class="w3-col s12 m12 l12 w3-white w3-card-8 w3-border w3-border-theme w3-margin-bottom">
							<h4 class="w3-theme-dark w3-margin-0 w3-padding-medium"><b>Personal Information</b></h4>
							<div class="w3-col s12 m6 l6 w3-padding-0">
								<div class="w3-col s12 m12 l12 w3-padding-medium w3-hide">
									<label><b>ID Number</b></label> 
									<input type="hidden" name="old_picture" required value="<?=$row["picture"];?>">
									<input type="text" name="id" class="w3-col s12 m12 l12 w3-padding-medium w3-border-white w3-border w3-round w3-border w3-border-theme" placeholder="Enter your ID number" required value="<?=$row["tbl_id"];?>">
								</div>
								<div class="w3-col s12 m12 l12 w3-padding-medium">
									<label><b>First Name</b></label>
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
							</div>
							<div class="w3-col s12 m6 l6 w3-padding-0">
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
								<div class="w3-col s12 m12 l12 w3-padding-medium">
									<label><b>Religion</b></label>
									<input type="text" name="religion" class="w3-col s12 m12 l12 w3-padding-medium w3-border-white w3-border w3-round w3-border w3-border-theme" placeholder="Enter you religion" required value="<?=$row["religion"];?>">
								</div>
							</div>
							<div class="w3-col s12 m12 l12 w3-padding-medium">
								<label><b>Address</b></label>
								<textarea name="address" class="w3-col s12 m12 l12 w3-padding-medium w3-border-white w3-border w3-round w3-border w3-border-theme" placeholder="Enter your Address" style="width:100%;max-width:100%;min-width:100%;height:100px;overflow-x:hidden;overflow-y:auton;" required><?=$row["address"];?></textarea>
							</div>
							<div class="w3-col s12 m12 l12 w3-padding-medium w3-margin-bottom">
								<label><b>Mother Tongue </b></label>
								<textarea name="mtongue" class="w3-col s12 m12 l12 w3-padding-medium w3-border-white w3-border w3-round w3-border w3-border-theme" placeholder="Enter your mother tongue " style="width:100%;max-width:100%;min-width:100%;height:100px;overflow-x:hidden;overflow-y:auton;" required><?=$row["mtongue"];?></textarea>
							</div> 
						</div>
										
						<div class="w3-col s12 m12 l12 w3-white w3-margin-bottom w3-card-8 w3-border w3-border-theme">
							<h4 class="w3-theme-dark w3-margin-0 w3-padding-medium"><b>Profile Picture</b></h4>
							<div class="w3-col s12 m12 l12 w3-padding-medium w3-center">
								<img src="../<?=$row["picture"];?>" class="" height="200px" width="auto" id="profile_picture">
								<div class="w3-clear"></div>
							</div>
							<div class="w3-col s12 m12 l12 w3-padding-medium w3-center">
								<input type="file" name="picture" class="w3-col s12 m12 l12 w3-padding-medium w3-border-white w3-border w3-round  w3-border w3-border-theme w3-margin-bottom" onchange="readURL(this,'profile_picture','image')">
							</div>
						</div>
												
						<div class="w3-col s12 m12 l12 w3-white w3-margin-bottom w3-card-8 w3-border w3-border-theme">
							<h4 class="w3-theme-dark w3-margin-0 w3-padding-medium"><b>Family Information</b></h4>
							<div class="w3-col s12 m6 l6 w3-padding-medium">
								<label><b>Mother</b></label>
								<input type="text" name="mother" class="w3-col s12 m12 l12 w3-padding-medium w3-border-white w3-border w3-round  w3-border w3-border-theme" placeholder="Enter your mother full name" required value="<?=$row["mother"];?>">
							</div>
							<div class="w3-col s12 m6 l6 w3-padding-medium w3-margin-bottom">
								<label><b>Father</b></label>
								<input type="text" name="father" class="w3-col s12 m12 l12 w3-padding-medium w3-border-white w3-border w3-round  w3-border w3-border-theme" placeholder="Enter your Father full name" required value="<?=$row["father"];?>">
							</div>
						</div>
						
						<div class="w3-col s12 m12 l12 w3-white w3-margin-bottom w3-card-8 w3-border w3-border-theme">
							<h4 class="w3-theme-dark w3-margin-0 w3-padding-medium"><b>Guardian Information</b></h4>
							<div class="w3-col s12 m6 l6 w3-padding-medium">
								<label><b>Guardian Name</b></label>
								<input type="text" name="guardian_name" class="w3-col s12 m12 l12 w3-padding-medium w3-border-white w3-border w3-round  w3-border w3-border-theme" placeholder="Enter your Guardian full name" required value="<?=$row["guardian"];?>">
							</div>
							<div class="w3-col s12 m6 l6 w3-padding-medium">
								<label><b>Contact Number</b></label>
								<input type="text" name="guardian_contact" class="w3-col s12 m12 l12 w3-padding-medium w3-border-white w3-border w3-round  w3-border w3-border-theme" placeholder="Enter your Guardian contact number" required value="<?=$row["guardian_contact"];?>">
							</div>
							<div class="w3-col s12 m6 l6 w3-padding-medium">
								<label><b>Relationship of Guardian</b></label>
								<input type="text" name="guardian_rel" class="w3-col s12 m12 l12 w3-padding-medium w3-border-white w3-border w3-round  w3-border w3-border-theme w3-margin-bottom" placeholder="Enter your relationship of guardian" required value="<?=$row["guardian_rel"];?>">
							</div>
						</div>
						
						<div class="w3-col s12 m12 l12 w3-white w3-margin-bottom w3-card-8 w3-border w3-border-theme">
							<h4 class="w3-theme-dark w3-margin-0 w3-padding-medium"><b>Account Settings</b></h4>
							<div class="w3-col s12 m6 l6 w3-padding-medium">
								<label><b>Username</b></label>
								<input type="username" name="username" class="w3-col s12 m12 l12 w3-padding-medium w3-border-white w3-border w3-round  w3-border w3-border-theme" placeholder="Enter your Username" required value="<?=$row["username"];?>">
							</div>
							<div class="w3-col s12 m6 l6 w3-padding-medium">
								<label><b>Change Password</b></label>
								<input type="password" name="password" class="w3-col s12 m12 l12 w3-padding-medium w3-border-white w3-border w3-round  w3-border w3-border-theme" placeholder="Enter your new  password" >
							</div>
							<div class="w3-col s12 m6 l6 w3-padding-medium">
								<label><b>Repeat Password</b></label>
								<input type="password" name="repeat_password" class="w3-col s12 m12 l12 w3-padding-medium w3-border-white w3-border w3-round  w3-border w3-border-theme w3-margin-bottom" placeholder="Repeat Password" >
							</div>
						</div>
												
						<div class="w3-col s12 m12 l12 w3-theme w3-margin-bottom w3-right-align ">
							<button type="submit" name="submit" class="w3-btn w3-padding-large w3-round w3-green" onclick="send('updateForm','../libraries/php-func/verify-profile-updates.php','updateResponseCon')"><i class="fa fa-save"></i> Save Updates</button>
						</div>
						
					</form>
				</div>
			</div>
			
			
		</div>
	</div> 
<?php
	footer("");
?>