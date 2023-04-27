<?php
	include("libraries/php-func/main-func.php");
	include("libraries/php-func/connection.php");
	head("Register","home");
?>
	<div class="w3-col s12 m12 l12 w3-container w3-theme">
		<div class="w3-col s12 m1 l1 w3-container"></div>
		<div class="w3-col s12 m10 l0 w3-container w3-padding-0">
			<img src="images/banner.png" width="100%">
			
			<div class="w3-clear w3-container w3-col s12 m12 l12"></div>
			<div class="w3-col s12 m12 l12 w3-margin-top">
				<a href="javascript:void:0;" class="w3-btn w3-round w3-padding-medium w3-right " style="margin-left:5px;background:#88c149;" onclick="$('#login-form').fadeIn()"><i class="fa fa-sign-in"></i> Login</a>
				<a href="register.php" class="w3-btn w3-round w3-padding-medium w3-right" style="background:#dd5600;"><i class="fa fa-list-alt"></i> Register</a>
			</div>
			<div class="w3-padding-small w3-white w3-round w3-col s12 m12 l12 w3-center w3-margin-top" >
				<a href="index.php" class="w3-btn w3-white w3-padding-medium w3-hover-theme w3-text-theme"><i class="fa fa-home w3-xlarge"></i> <b>HOME</b></a>
				<a href="gallery.php" class="w3-btn w3-white w3-padding-medium w3-hover-theme w3-text-theme"><i class="fa fa-image w3-xlarge"></i> <b>GALLERY</b></a>
				<a href="about-us.php" class="w3-btn w3-white w3-padding-medium w3-hover-theme w3-text-theme"><i class="fa fa-info-circle w3-xlarge"></i> <b>ABOUT US</b></a>
				<a href="contact-us.php" class="w3-btn w3-white w3-padding-medium w3-hover-theme w3-text-theme"><i class="fa fa-phone-square w3-xlarge"></i> <b>CONTACT US</b></a>
				<a href="news-and-events.php" class="w3-btn w3-white w3-padding-medium w3-hover-theme w3-text-theme"><i class="fa fa-flag w3-xlarge"></i> <b>NEWS & EVENTS</b></a>
			</div>
			
			
			<form method="POST" action="libraries/php-func/verify-registration.php" enctype="multipart/form-data" class="w3-padding-medium w3-white w3-round w3-col s12 m12 l12 w3-margin-top" id="registrationForm">
				<h2 class="w3-center"><i class="fa fa-list-alt"></i> Student Registration Form</h2>
				<div id="registrationResponseCon" class="w3-col s12 m12 l12"></div>		
				<div class="w3-col s12 m6 l6 w3-white">
					<h4 class="w3-theme-dark w3-margin-0 w3-padding-medium"><b>Personal Information</b></h4>
					<div class="w3-col s12 m12 l12 w3-padding-medium w3-hide">
						<label><b>ID Number</b></label>
						<input type="text" name="id_number" class="w3-col s12 m12 l12 w3-padding-medium w3-border-white w3-border w3-round w3-border w3-border-theme" placeholder="Enter your ID number">
					</div>
					<div class="w3-col s12 m12 l12 w3-padding-medium">
						<label><b>First Name</b></label>
						<input type="text" name="fname" class="w3-col s12 m12 l12 w3-padding-medium w3-border-white w3-border w3-round w3-border w3-border-theme" placeholder="Enter your first name" required>
					</div>
					<div class="w3-col s12 m12 l12 w3-padding-medium">
						<label><b>Last Name</b></label>
						<input type="text" name="lname" class="w3-col s12 m12 l12 w3-padding-medium w3-border-white w3-border w3-round w3-border w3-border-theme" placeholder="Enter your last name" required>
					</div>
					<div class="w3-col s12 m12 l12 w3-padding-medium">
						<label><b>Middle Name</b></label>
						<input type="text" name="mname" class="w3-col s12 m12 l12 w3-padding-medium w3-border-white w3-border w3-round w3-border w3-border-theme" placeholder="Enter you middle name" required>
					</div>
					<div class="w3-col s12 m12 l12 w3-padding-medium">
						<label><b>Gender</b></label>
						<select name="gender" class="w3-col s12 m12 l12 w3-padding-medium w3-border-white w3-border w3-round w3-border w3-border-theme" required>
							<option>Male</option>
							<option>Female</option>
						</select>
					</div>
					<div class="w3-col s12 m12 l12 w3-padding-medium">
						<label><b>Birthday</b></label>
						<input type="date" name="bday" class="w3-col s12 m12 l12 w3-padding-medium w3-border-white w3-border w3-round w3-border w3-border-theme" required>
					</div>
					<div class="w3-col s12 m12 l12 w3-padding-medium">
						<label><b>Address</b></label>
						<textarea name="address" class="w3-col s12 m12 l12 w3-padding-medium w3-border-white w3-border w3-round w3-border w3-border-theme" placeholder="Enter your Address" style="width:100%;max-width:100%;min-width:100%;height:100px;overflow-x:hidden;overflow-y:auton;" required></textarea>
					</div>
					<div class="w3-col s12 m12 l12 w3-padding-medium">
						<label><b>Religion</b></label>
						<input type="text" name="religion" class="w3-col s12 m12 l12 w3-padding-medium w3-border-white w3-border w3-round w3-border w3-border-theme" placeholder="Enter you religion" required>
					</div>
					<div class="w3-col s12 m12 l12 w3-padding-medium w3-margin-bottom">
						<label><b>Mother Tongue </b></label>
						<textarea name="mtongue" class="w3-col s12 m12 l12 w3-padding-medium w3-border-white w3-border w3-round w3-border w3-border-theme" placeholder="Enter your mother tongue " style="width:100%;max-width:100%;min-width:100%;height:100px;overflow-x:hidden;overflow-y:auton;" required></textarea>
					</div> 
				</div>
								
				<div class="w3-col s12 m6 l6 w3-light-grey">
					<h4 class="w3-black w3-margin-0 w3-padding-medium"><b>Profile Picture</b></h4>
					<div class="w3-col s12 m12 l12 w3-padding-medium w3-center">
						<img src="images/default.png" class="" height="200px" width="auto" id="profile_picture">
						<div class="w3-clear"></div>
					</div>
					<div class="w3-col s12 m12 l12 w3-padding-medium w3-center">
						<input type="file" name="picture" class="w3-col s12 m12 l12 w3-padding-medium w3-border-white w3-border w3-round  w3-border w3-border-theme w3-margin-bottom" required onchange="readURL(this,'profile_picture','image')">
					</div>
				</div>
				
				<div class="w3-col s12 m6 l6 w3-light-grey">
					<h4 class="w3-dark-grey w3-margin-0 w3-padding-medium"><b>Guardian Information</b></h4>
					<div class="w3-col s12 m12 l12 w3-padding-medium">
						<label><b>Guardian Name</b></label>
						<input type="text" name="guardian_name" class="w3-col s12 m12 l12 w3-padding-medium w3-border-white w3-border w3-round  w3-border w3-border-theme" placeholder="Enter your Guardian full name" required>
					</div>
					<div class="w3-col s12 m12 l12 w3-padding-medium">
						<label><b>Contact Number</b></label>
						<input type="text" name="guardian_contact" class="w3-col s12 m12 l12 w3-padding-medium w3-border-white w3-border w3-round  w3-border w3-border-theme" placeholder="Enter your Guardian contact number" required>
					</div>
					<div class="w3-col s12 m12 l12 w3-padding-medium">
						<label><b>Relationship of Guardian</b></label>
						<input type="text" name="guardian_rel" class="w3-col s12 m12 l12 w3-padding-medium w3-border-white w3-border w3-round  w3-border w3-border-theme w3-margin-bottom" placeholder="Enter your relationship of guardian" required>
					</div>
				</div>
				<div class="w3-col s12 m6 l6 w3-light-grey">
					<h4 class="w3-theme w3-margin-0 w3-padding-medium"><b>Account Settings</b></h4>
					<div class="w3-col s12 m12 l12 w3-padding-medium">
						<label><b>Username</b></label>
						<input type="username" name="username" class="w3-col s12 m12 l12 w3-padding-medium w3-border-white w3-border w3-round  w3-border w3-border-theme" placeholder="Enter your Username" required>
					</div>
					<div class="w3-col s12 m12 l12 w3-padding-medium">
						<label><b>Password</b></label>
						<input type="password" name="password" class="w3-col s12 m12 l12 w3-padding-medium w3-border-white w3-border w3-round  w3-border w3-border-theme" placeholder="Enter your password" required>
					</div>
					<div class="w3-col s12 m12 l12 w3-padding-medium">
						<label><b>Repeat Password</b></label>
						<input type="password" name="repeat_password" class="w3-col s12 m12 l12 w3-padding-medium w3-border-white w3-border w3-round  w3-border w3-border-theme w3-margin-bottom" placeholder="Repeat Password" required>
					</div>
				</div>
				
				<div class="w3-col s12 m12 l12 w3-light-grey">
					<h4 class="w3-dark-grey w3-margin-0 w3-padding-medium"><b>Family Information</b></h4>
					<div class="w3-col s12 m6 l6 w3-padding-medium">
						<label><b>Mother</b></label>
						<input type="text" name="mother" class="w3-col s12 m12 l12 w3-padding-medium w3-border-white w3-border w3-round  w3-border w3-border-theme" placeholder="Enter your mother full name" required>
					</div>
					<div class="w3-col s12 m6 l6 w3-padding-medium w3-margin-bottom">
						<label><b>Father</b></label>
						<input type="text" name="father" class="w3-col s12 m12 l12 w3-padding-medium w3-border-white w3-border w3-round  w3-border w3-border-theme" placeholder="Enter your Father full name" required>
					</div>
				</div>
				
				<div class="w3-col s12 m12 l12 w3-theme w3-padding-large w3-right-align">
					<button type="submit" name="submit" class="w3-btn w3-padding-large w3-round w3-green" onclick="send('registrationForm','libraries/php-func/verify-registration.php','registrationResponseCon')"><i class="fa fa-check"></i> Register</button>
				</div>
				
			</form>
			
			
		</div>
	</div> 
<?php
	footer("home");
?>