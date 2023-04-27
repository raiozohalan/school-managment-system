<?php
	include("../libraries/php-func/main-func.php");
	include("../libraries/php-func/admin-session.php");
	head("Admins","");
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
					<div class="w3-col s12 m12 l12 w3-padding-left w3-padding-0 w3-animate-left w3-theme-light w3-border-bottom w3-border-top w3-border-white" id="AdminsDrp" style="display:block;">
						<a href="add-admin.php" class="w3-padding-medium w3-left-align w3-col s12 m12 l12 w3-btn w3-hover-white w3-transparent w3-text-grey"><i class=" fa fa-chevron-right "></i> Registration</a>
						<a href="admins.php" class="w3-padding-medium w3-left-align w3-col s12 m12 l12 w3-btn w3-hover-white  w3-white w3-text-black "><i class=" fa fa-chevron-right "></i> View Admins</a> 
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
					<div class="w3-col s12 m12 l12 w3-padding-left w3-padding-0 w3-animate-left w3-theme-light w3-border-bottom w3-border-top w3-border-white" id="facultyDrp" style="display:none;">
						<a href="add-faculty.php" class="w3-padding-medium w3-left-align w3-col s12 m12 l12 w3-btn w3-hover-white w3-transparent w3-text-grey"><i class=" fa fa-chevron-right "></i> Registration</a>
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
				<div class="w3-padding-medium w3-col s12 m12 l12 w3-white"><a href="dashboard.php" class="w3-padding-small w3-white hover-underline">Dashboard</a>/<a class="w3-padding-small w3-white">Admins</a>/<a href="admins.php" class="w3-padding-small w3-white hover-underline">View Admins</a>
				</div>
			</div>
			<div id="adminEdit" class="w3-modal w3-animate-zoom w3-padding-0" style="background:rgba(0,0,0,0.90);display:none;z-index:999;"> 
				<div class="w3-modal-content w3-card-8 w3-animate-zoom w3-round w3-border w3-border-white w3-padding-0" style="max-width:600px;margin-top:20px;overflow:hidden;">
					<div class="w3-padding-medium w3-theme w3-col s12 m12 l12">
						<h3 class="w3-margin-0 w3-padding-0"><i class="fa fa-image"></i> Edit Admin Information</h3>
					</div>
					<form src="../libraries/php-func/update-admin.php" method="POST" class="w3-padding-medium w3-white w3-col s12 m12 l12" id="updateAdmin">
						<div id="adminEditResponse"></div>
						<button class="w3-btn w3-padding-medium w3-green w3-round" type="submit" onclick="send('updateAdmin','../libraries/php-func/update-admin.php','adminEdit')"><i class="fa fa-save"></i> Save</button> 
						<button class="w3-btn w3-padding-medium w3-grey w3-round" type="button" onclick="$('#adminEdit').hide();"><i class="fa fa-close"></i> Close</button> 
					</form>
				</div>
			</div>
			<div id="adminDelete" class="w3-modal w3-animate-zoom w3-padding-0" style="background:rgba(0,0,0,0.90);display:none;z-index:999;"> 
			</div>
			<div class="w3-padding-medium w3-col s12 m12 l12 w3-theme w3-round w3-margin-top w3-center" >
				<div class="w3-padding-0 w3-col s12 m12 l12 w3-theme">
				<div class="w3-col s12 m12 l12 w3-padding-small">
					<div class="w3-col s12 m12 l12">
						<h3 class="w3-col s12 m3 l3 w3-margin-0 w3-left-align">Admin List</h3>
						<form class="w3-col s12 m9 l9" action="../libraries/php-func/admins.php" method="POST" id="adminlistsearch">
							<button type="submit" name="submit"  class="w3-btn w3-padding-small w3-green w3-border w3-border-theme-dark w3-right " onclick="send('adminlistsearch','../libraries/php-func/admins.php','adminlist')"><i class="fa fa-search"></i> Search</button>
							<select name="limit"  class="w3-btn w3-medium w3-white w3-border w3-border-theme-dark w3-right ">
								<option>25</option>
								<option>50</option>
								<option>100</option>
								<option>250</option>
								<option>500</option>
							</select> 
							<input type="search" name="search" class="w3-input w3-padding-small w3-border w3-border-theme-dark w3-col s4 m4 l4 w3-right" placeholder="Search" >
						</form>
					</div> 
					<div class="w3-col s12 m12 l12 w3-display-container" style="overflow-x:auto;">
						<table class="w3-table w3-bordered w3-border w3-white w3-display-container">
							<thead>
								<tr class="w3-theme-dark">
									<th class=" w3-border-right">First Name</th>
									<th class=" w3-border-right">Middle Name</th>
									<th class=" w3-border-right">Last Name</th> 
									<th class=" w3-border-right">Position</th>
									<th class=" w3-border-right">Username</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody id="adminlist">
								<?php include("../libraries/php-func/admins.php");?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			</div>
			
			<?php
				footer("");
			?>
		</div>
	</div>  
