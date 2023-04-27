<?php
	include("../libraries/php-func/main-func.php");
	include("../libraries/php-func/admin-session.php");
	head("Faculty Registration","");
?>
	<div class="w3-col s12 m12 l12 w3-theme w3-padding-0" style="height:100%;">
		<div class="w3-col s10 m3 l3 w3-border-right w3-border-light-grey w3-card-8 w3-theme-dark w3-animate-left" style="height:100%;position:fixed;z-index:998;" id="navigationBar">
			<div class="w3-clear"></div> 
			<h4 class="w3-center w3-margin-0 w3-display-container w3-black w3-padding-top w3-padding-bottom" style="height:29.5%;" >
				<img src="../<?=$row["picture"];?>" width="auto" height="100%" class="w3-img">  <p class="w3-display-bottommiddle w3-margin-0 w3-text-white" style="background:rgba(0,0,0,0.70);"><?=ucfirst($row["fname"])." ".ucfirst($row["mname"])." ".ucfirst($row["lname"]);?></p>
				<button class="w3-display-topright w3-btn w3-transparent w3-padding-small w3-hover-theme w3-text-theme w3-hide-large w3-hide-medium" onclick="$('#navigationBar').fadeOut();"><i class="fa fa-close"></i></button>
			</h4>
			<script>
				function drpMenu(container){
					$('#'+container).toggle();
				}
			</script>
			<div class="w3-padding-top" style="height:auto;max-height:68%;min-height:auto;overflow-x:hidden;overflow-y:auto;">
				<a href="profile.php" class="w3-padding-medium w3-left-align w3-col s12 m12 l12 w3-btn w3-hover-white w3-theme-dark"><i class=" fa fa-user w3-xlarge"></i> My Profile</a>
				<a href="dashboard.php" class="w3-padding-medium w3-left-align w3-col s12 m12 l12 w3-btn w3-hover-white w3-theme-dark"><i class=" fa fa-dashboard w3-xlarge"></i> Dashboard</a>
				<a href="slider.php" class="w3-padding-medium w3-left-align w3-col s12 m12 l12 w3-btn w3-hover-white w3-theme-dark"><i class=" fa fa-image w3-xlarge"></i> Home Slider</a>
				<div class="w3-col s12 m12 l12">
					<button class="w3-padding-medium w3-left-align w3-col s12 m12 l12 w3-btn w3-hover-white w3-theme-dark" type="button" onclick="drpMenu('AdminsDrp')"><i class=" fa fa-user w3-xlarge"></i> Admins</button>
					<div class="w3-col s12 m12 l12 w3-padding-left w3-padding-0 w3-animate-left w3-theme-light w3-border-bottom w3-border-top w3-border-white" id="AdminsDrp" style="display:none;">
						<a href="add-admin.php" class="w3-padding-medium w3-left-align w3-col s12 m12 l12 w3-btn w3-hover-white w3-transparent w3-text-grey"><i class=" fa fa-chevron-right "></i> Registration</a>
						<a href="admins.php" class="w3-padding-medium w3-left-align w3-col s12 m12 l12 w3-btn w3-hover-white  w3-transparent w3-text-grey"><i class=" fa fa-chevron-right "></i> View Admins</a> 
					</div>
				</div>
				<div class="w3-col s12 m12 l12">
					<button class="w3-padding-medium w3-left-align w3-col s12 m12 l12 w3-btn w3-hover-white w3-theme-dark" type="button" onclick="drpMenu('studentDrp')"><i class=" fa fa-user w3-xlarge"></i> Students</button>
					<div class="w3-col s12 m12 l12 w3-padding-left w3-padding-0 w3-animate-left w3-theme-light w3-border-bottom w3-border-top w3-border-white" id="studentDrp" style="display:none;">
						<a href="add-student.php" class="w3-padding-medium w3-left-align w3-col s12 m12 l12 w3-btn w3-hover-white w3-transparent w3-text-grey"><i class=" fa fa-chevron-right "></i> Registration</a>
						<a href="students.php" class="w3-padding-medium w3-left-align w3-col s12 m12 l12 w3-btn w3-hover-white w3-transparent w3-text-grey"><i class=" fa fa-chevron-right "></i> View Students</a>
					</div>
				</div>
				<div class="w3-col s12 m12 l12">
					<button class="w3-padding-medium w3-left-align w3-col s12 m12 l12 w3-btn w3-hover-white w3-theme-dark" type="button" onclick="drpMenu('facultyDrp')"><i class=" fa fa-user w3-xlarge"></i> Faculty</button>
					<div class="w3-col s12 m12 l12 w3-padding-left w3-padding-0 w3-animate-left w3-theme-light w3-border-bottom w3-border-top w3-border-white" id="facultyDrp" style="display:block;">
						<a href="add-faculty.php" class="w3-padding-medium w3-left-align w3-col s12 m12 l12 w3-btn w3-hover-white w3-white w3-text-black"><i class=" fa fa-chevron-right "></i> Registration</a>
						<a href="faculty.php" class="w3-padding-medium w3-left-align w3-col s12 m12 l12 w3-btn w3-hover-white w3-transparent w3-text-grey"><i class=" fa fa-chevron-right "></i> View Faculty</a>
					</div>
				</div>
				
				<div class="w3-col s12 m12 l12">
					<button class="w3-padding-medium w3-left-align w3-col s12 m12 l12 w3-btn w3-hover-white w3-theme-dark" type="button" onclick="drpMenu('newseventsDrp')"><i class=" fa fa-flag w3-xlarge"></i> News & Events</button>
					<div class="w3-col s12 m12 l12 w3-padding-left w3-padding-0 w3-animate-left w3-theme-light w3-border-bottom w3-border-top w3-border-white" id="newseventsDrp" style="display:none;">
						<a href="add-post.php" class="w3-padding-medium w3-left-align w3-col s12 m12 l12 w3-btn w3-hover-white w3-transparent w3-text-grey"><i class=" fa fa-chevron-right "></i> Add New Post</a>
						<a href="view-post.php" class="w3-padding-medium w3-left-align w3-col s12 m12 l12 w3-btn w3-hover-white w3-transparent w3-text-grey"><i class=" fa fa-chevron-right "></i> View Post</a>
					</div>
				</div>
				<div class="w3-col s12 m12 l12">
					<button class="w3-padding-medium w3-left-align w3-col s12 m12 l12 w3-btn w3-hover-white w3-theme-dark" type="button" onclick="drpMenu('siteMaintenanceDrp')"><i class=" fa fa-wrench w3-xlarge"></i> Site Maintenance </button>
					<div class="w3-col s12 m12 l12 w3-padding-left w3-padding-0 w3-animate-left w3-theme-light w3-border-bottom w3-border-top w3-border-white" id="siteMaintenanceDrp" style="display:none;">
						<a href="about-us.php" class="w3-padding-medium w3-left-align w3-col s12 m12 l12 w3-btn w3-hover-white w3-transparent w3-text-grey"><i class=" fa fa-chevron-right "></i> About Us</a>
						<a href="contact-us.php" class="w3-padding-medium w3-left-align w3-col s12 m12 l12 w3-btn w3-hover-white  w3-transparent w3-text-grey"><i class=" fa fa-chevron-right "></i> Contact Us</a> 
					</div>
				</div>
				<div class="w3-col s12 m12 l12">
					<button class="w3-padding-medium w3-left-align w3-col s12 m12 l12 w3-btn w3-hover-white w3-theme-dark" type="button" onclick="drpMenu('classDrp')"><i class=" fa fa-users w3-xlarge"></i> Class </button>
					<div class="w3-col s12 m12 l12 w3-padding-left w3-padding-0 w3-animate-left w3-theme-light w3-border-bottom w3-border-top w3-border-white" id="classDrp" style="display:none;">
						<a href="add-class.php" class="w3-padding-medium w3-left-align w3-col s12 m12 l12 w3-btn w3-hover-white w3-transparent w3-text-grey"><i class=" fa fa-chevron-right "></i> Add New Class</a>
						<a href="view-class.php" class="w3-padding-medium w3-left-align w3-col s12 m12 l12 w3-btn w3-hover-white  w3-transparent w3-text-grey"><i class=" fa fa-chevron-right "></i> View Class List</a> 
					</div>
				</div>
				<div class="w3-col s12 m12 l12">
					<button class="w3-padding-medium w3-left-align w3-col s12 m12 l12 w3-btn w3-hover-white w3-theme-dark" type="button" onclick="drpMenu('subjectsDrp')"><i class=" fa fa-tasks w3-xlarge"></i> Subjects </button>
					<div class="w3-col s12 m12 l12 w3-padding-left w3-padding-0 w3-animate-left w3-theme-light w3-border-bottom w3-border-top w3-border-white" id="subjectsDrp" style="display:none;">
						<a href="add-subject.php" class="w3-padding-medium w3-left-align w3-col s12 m12 l12 w3-btn w3-hover-white w3-transparent w3-text-grey"><i class=" fa fa-chevron-right "></i> Add Subject</a>
						<a href="view-subjects.php" class="w3-padding-medium w3-left-align w3-col s12 m12 l12 w3-btn w3-hover-white  w3-transparent w3-text-grey"><i class=" fa fa-chevron-right "></i> View Subjects</a> 
					</div>
				</div>
			</div>
		</div>
		<div class="w3-col s12 m9 l9 w3-padding-0 w3-right w3-margin-0 " >
			<div class="w3-padding-0 w3-col s12 m12 l12 w3-center w3-theme-dark w3-margin-0 w3-display-container w3-animate-right w3-border-bottom w3-border-white">
				<button class="w3-left w3-btn w3-padding-medium w3-theme w3-hide-large w3-hide-medium w3-hover-white" onclick="$('#navigationBar').fadeIn();"><i class="fa fa-reorder w3-xlarge" ></i></button>
				<a href="../libraries/php-func/admin-logout.php" class="w3-right w3-btn w3-padding-medium w3-theme w3-hover-white w3-hide-small"><i class="fa fa-sign-out" ></i> Logout</a>
				<a href="../libraries/php-func/admin-logout.php" class="w3-right w3-btn w3-padding-medium w3-theme w3-hide-large w3-hide-medium w3-hover-white"><i class="fa fa-sign-out w3-xlarge" ></i></a>
				
				<h3 class="w3-margin-0 w3-display-middle w3-padding-0 w3-text-white w3-col s8  m8 l8"><b>Integrated Academy</b></h3>
			</div>
			<style>
				.hover-underline{
					text-decoration: none;
				}
				.hover-underline:hover{
					text-decoration: underline;
				}
			</style>
			<div class="w3-padding-large w3-col s12 m12 l12 w3-margin-top">
				<div class="w3-padding-medium w3-col s12 m12 l12 w3-white"><a href="dashboard.php" class="w3-padding-small w3-white hover-underline">Dashboard</a>/ <a  href="faculty.php" class="w3-padding-small w3-white hover-underline">Faculty</a>/ <a href="add-faculty.php" class="w3-padding-small w3-white hover-underline">Registration</a>
				</div>
			</div>
			
			<div class="w3-padding-large w3-col s12 m12 l12">
				<form method="POST" action="../libraries/php-func/add-faculty.php" enctype="multipart/form-data" class="w3-padding-small w3-white w3-col s12 m12 l12" id="registrationForm">
				<h2 class="w3-center"><i class="fa fa-list-alt"></i> Faculty Registration Form</h2>
				<div id="registrationResponseCon" class="w3-col s12 m12 l12"></div>		
				<div class="w3-col s12 m12 l12 w3-white">
					<h4 class="w3-theme-dark w3-margin-0 w3-padding-medium"><b>Personal Information</b></h4>
					<div class="w3-col s12 m6 l6">
						<div class="w3-col s12 m12 l12 w3-padding-medium">
							<label><b>First Name</b></label>
							<input type="text" name="fname" class="w3-col s12 m12 l12 w3-padding-medium w3-border-white w3-border w3-round w3-border w3-border-theme" placeholder="Enter first name" required>
						</div>
						<div class="w3-col s12 m12 l12 w3-padding-medium">
							<label><b>Last Name</b></label>
							<input type="text" name="lname" class="w3-col s12 m12 l12 w3-padding-medium w3-border-white w3-border w3-round w3-border w3-border-theme" placeholder="Enter last name" required>
						</div>
						<div class="w3-col s12 m12 l12 w3-padding-medium">
							<label><b>Middle Name</b></label>
							<input type="text" name="mname" class="w3-col s12 m12 l12 w3-padding-medium w3-border-white w3-border w3-round w3-border w3-border-theme" placeholder="Enter middle name" required>
						</div>
						<div class="w3-col s12 m12 l12 w3-padding-medium">
							<label><b>Gender</b></label>
							<select name="gender" class="w3-col s12 m12 l12 w3-padding-medium w3-border-white w3-border w3-round w3-border w3-border-theme" required>
								<option>Male</option>
								<option>Female</option>
							</select>
						</div>
					</div>
					<div class="w3-col s12 m6 l6">
						<div class="w3-col s12 m12 l12 w3-padding-medium">
							<label><b>Birthday</b></label>
							<input type="date" name="bday" class="w3-col s12 m12 l12 w3-padding-medium w3-border-white w3-border w3-round w3-border w3-border-theme" required>
						</div>
						<div class="w3-col s12 m12 l12 w3-padding-medium">
							<label><b>Address</b></label>
							<textarea name="address" class="w3-col s12 m12 l12 w3-padding-medium w3-border-white w3-border w3-round w3-border w3-border-theme" placeholder="Enter Address" style="width:100%;max-width:100%;min-width:100%;height:100px;overflow-x:hidden;overflow-y:auton;" required></textarea>
						</div>
						<div class="w3-col s12 m12 l12 w3-padding-medium">
							<label><b>Position</b></label>
							<input type="text" name="position" class="w3-col s12 m12 l12 w3-padding-medium w3-border-white w3-border w3-round w3-border w3-border-theme" placeholder="Enter position" required>
						</div>
					</div>
				</div>
				
				<div class="w3-col s12 m12 l12 w3-light-grey">
					<h4 class="w3-theme-dark w3-margin-0 w3-padding-medium"><b>Account Settings</b></h4>
					<div class="w3-col s12 m6 l6">
						<div class="w3-col s12 m12 l12 w3-padding-medium">
							<label><b>Username</b></label>
							<input type="username" name="username" class="w3-col s12 m12 l12 w3-padding-medium w3-border-white w3-border w3-round  w3-border w3-border-theme" placeholder="Enter Username" required>
						</div>
					</div>
					<div class="w3-col s12 m6 l6">
						<div class="w3-col s12 m12 l12 w3-padding-medium">
							<label><b>Password</b></label>
							<input type="password" name="password" class="w3-col s12 m12 l12 w3-padding-medium w3-border-white w3-border w3-round  w3-border w3-border-theme" placeholder="Enter password" required>
						</div>
						<div class="w3-col s12 m12 l12 w3-padding-medium">
							<label><b>Repeat Password</b></label>
							<input type="password" name="repeat_password" class="w3-col s12 m12 l12 w3-padding-medium w3-border-white w3-border w3-round  w3-border w3-border-theme w3-margin-bottom" placeholder="Repeat Password" required>
						</div>
					</div>
				</div>
				
				<div class="w3-col s12 m12 l12 w3-theme w3-padding-large w3-right-align">
					<button type="submit" name="submit" class="w3-btn w3-padding-large w3-round w3-green" onclick="send('registrationForm','../libraries/php-func/add-faculty.php','registrationResponseCon')"><i class="fa fa-check"></i> Register</button>
				</div>
				
			</form>
			</div> 
			<?php
				footer("");
			?>
		</div>
	</div>  
