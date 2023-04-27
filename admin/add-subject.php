<?php
	include("../libraries/php-func/main-func.php");
	include("../libraries/php-func/admin-session.php");
	head("Add Subject","");
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
					<div class="w3-col s12 m12 l12 w3-padding-left w3-padding-0 w3-animate-left w3-theme-light w3-border-bottom w3-border-top w3-border-white" id="subjectsDrp" style="display:block;">
						<a href="add-subject.php" class="w3-padding-medium w3-left-align w3-col s12 m12 l12 w3-btn w3-hover-white w3-white w3-text-black"><i class=" fa fa-chevron-right "></i> Add Subject</a>
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
				<div class="w3-padding-medium w3-col s12 m12 l12 w3-white"><a href="dashboard.php" class="w3-padding-small w3-white hover-underline">Dashboard</a>/ <a href="view-subjects.php" class="w3-padding-small w3-white hover-underline"> Subjects</a>/ <a href="add-subject.php" class="w3-padding-small w3-white hover-underline">Add Subject</a>
				</div>
			</div>
			<div id="modalContainer" class="w3-modal w3-animate-zoom w3-padding-0" style="background:rgba(0,0,0,0.90);display:none;z-index:999;"> 
			</div>
			<div class="w3-col s12 m12 l12 w3-padding-large">
			
					<script>
						function Fields(formID,totalTxtObj){
							var formCount = document.getElementById(formID);
							var total= 0 ;
							var i;
							document.getElementById(totalTxtObj).value= 0; 
							for (i = 0; i < formCount.getElementsByTagName("input").length ;i++) { 
								if(formCount.getElementsByTagName("input")[i].disabled == false){
									total+=Number(formCount.getElementsByTagName("input")[i].value); 
								}
							}  
							document.getElementById(totalTxtObj).value=total;  
						} 
						function Required(){
							var formCount = document.getElementById('add-subject');
							var err= 0 ;
							var i;
							for (i = 0; i < formCount.getElementsByTagName("input").length ;i++) { 
								if(formCount.getElementsByTagName("input")[i].value == ""){
									err+=1; 
								}
							}  
							var stTotal = document.getElementById('1stTotal');
							var ndTotal = document.getElementById('2ndTotal');
							var rdTotal = document.getElementById('3rdTotal');
							var thTotal = document.getElementById('4thTotal');
							if(err == 0 && stTotal.value == 100 && ndTotal.value == 100 && rdTotal.value == 100 && thTotal.value == 100){
								document.getElementById('btnAddsub').disabled = false;
							}else{
								document.getElementById('btnAddsub').disabled = true;
							}
						} 
					</script>
				<form class="w3-white w3-col s12 m12 l12 w3-card-4" method="POST" action="../libraries/php-func/add-subject.php" id="add-subject">
					<h3 class="w3-margin-0 w3-padding-medium w3-theme-dark">Add Subject</h3>
					<div class="w3-col s12 m12 l12" id="add-subjectForm"></div>
					<div class="w3-col s12 m6 l6 w3-white">
						<div class="w3-col s12 m12 l12 w3-padding-medium">
							<label><b>Subject Code </b></label> 
							<input type="text" name="subject_code" class="w3-col s12 m12 l12 w3-padding-medium w3-border-white w3-border w3-round w3-border w3-border-theme" placeholder="Enter Subject Code" required onkeyup="Required()">
						</div>
						<div class="w3-col s12 m12 l12 w3-padding-medium">
							<label><b>Subject Descriptive Title</b></label> 
							<input type="text" name="subject_title" class="w3-col s12 m12 l12 w3-padding-medium w3-border-white w3-border w3-round w3-border w3-border-theme" placeholder="Enter Subject Descriptive Title" required onkeyup="Required()">
						</div>
						<div class="w3-col s12 m12 l12 w3-padding-medium">
							<label><b>Subject Units / Credits</b></label> 
							<input type="number" name="units" class="w3-col s12 m12 l12 w3-padding-medium w3-border-white w3-border w3-round w3-border w3-border-theme" placeholder="Enter Subject Units / Credits" required onkeyup="Required()">
						</div> 
					</div>
					<div class="w3-col s12 m6 l6 w3-white">
						<div class="w3-col s12 m12 l12 w3-padding-medium">
							<label><b>Instructor</b></label> 
							<select name="faculty_id" class="w3-col s12 m12 l12 w3-padding-medium w3-border-white w3-border w3-round w3-border w3-border-theme" required>
								<?php
									$x = 0;
									$query_faculty = $con->query("select * from tbl_faculty order by fname");
									while($row_faculty = $query_faculty->fetch()){
										$x++;
										?>
										<option value="<?=$row_faculty["tbl_id"];?>"><?=ucfirst($row_faculty["fname"])." ".ucfirst($row_faculty["mname"])." ".ucfirst($row_faculty["lname"]);?></option>
										<?php
									}
									if($x == 0){
										?>
										<option value="" disabled> Empty faculty list</option>
										<?php
									}
								?>
							</select>
						</div>
						<div class="w3-col s12 m12 l12 w3-padding-medium">
							<label><b>Schedule</b> ( Hour:Minutes Maridiem)</label> 
							<div class="w3-clear"></div>
							<div class="w3-col s12 m12 l12 w3-padding-small">
								<div class="w3-col s12 m12 l12">
									<label class="w3-text-grey"><b>Start Time </b></label> 
								</div>
								<div class="w3-col s4 m4 l4 w3-padding-left">
									<input type="number" name="s_hour" class="w3-col s12 m12 l12 w3-padding-medium w3-border-white w3-border w3-round w3-border w3-border-theme" placeholder="Hour" required maxlength="2" min="01" max="12" onkeyup="Required()">
								</div>
								<div class="w3-col s4 m4 l4 w3-padding-left">
									<input type="number" name="s_minute" class="w3-col s12 m12 l12 w3-padding-medium w3-border-white w3-border w3-round w3-border w3-border-theme" placeholder="Minutes" required maxlength="2" min="00" max="60" onkeyup="Required()">
								</div>
								<div class="w3-col s4 m4 l4 w3-padding-left">
									<select name="s_maridiem" class="w3-col s12 m12 l12 w3-padding-medium w3-border-white w3-border w3-round w3-border w3-border-theme" required>
										<option >AM</option>
										<option >PM</option> 
									</select>
								</div>
							</div>
							<div class="w3-col s12 m12 l12 w3-padding-small">
								<div class="w3-col s12 m12 l12">
									<label class="w3-text-grey"><b>End Time </b></label> 
								</div>
								<div class="w3-col s4 m4 l4 w3-padding-left">
									<input type="number" name="e_hour" class="w3-col s12 m12 l12 w3-padding-medium w3-border-white w3-border w3-round w3-border w3-border-theme" placeholder="Hour" required maxlength="2" min="01" max="12" onkeyup="Required()">
								</div>
								<div class="w3-col s4 m4 l4 w3-padding-left">
									<input type="number" name="e_minute" class="w3-col s12 m12 l12 w3-padding-medium w3-border-white w3-border w3-round w3-border w3-border-theme" placeholder="Minutes" required maxlength="2" min="00" max="60" onkeyup="Required()">
								</div>
								<div class="w3-col s4 m4 l4 w3-padding-left">
									<select name="e_maridiem" class="w3-col s12 m12 l12 w3-padding-medium w3-border-white w3-border w3-round w3-border w3-border-theme" required>
										<option >AM</option>
										<option >PM</option> 
									</select>
								</div>
							</div>
						</div>
						
					</div>
					<div class="w3-clear"></div>
					<div class="w3-col s12 m12 l12 w3-padding-medium" id="1stGrading">
							<label><b>Rating for 1st Grading</label> 
							<div class="w3-clear"></div>
							<div class="w3-col s12 m2 l2 w3-padding-small">
								<div class="w3-col s12 m12 l12">
									<label class="w3-text-grey"><b>Quiz </b></label> 
								</div>
								<div class="w3-col s12 m12 l12">
									<input type="number" name="1stQuiz" class="w3-col s10 m10 l10 w3-padding-small w3-border-white w3-border w3-round w3-border w3-border-theme" placeholder="ex: 20"  maxlength="2" min="00" max="100" onkeyup="Fields('1stGrading','1stTotal');Required();" required><b class="w3-padding-top w3-col s2 m2 l2 w3-center">%</b>
								</div>
							</div>
							<div class="w3-col s12 m2 l2 w3-padding-small">
								<div class="w3-col s12 m12 l12">
									<label class="w3-text-grey"><b>Long Test </b></label> 
								</div>
								<div class="w3-col s12 m12 l12">
									<input type="number" name="1stLong" class="w3-col s10 m10 l10 w3-padding-small w3-border-white w3-border w3-round w3-border w3-border-theme" placeholder="ex: 20"  maxlength="2" min="00" max="100" onkeyup="Fields('1stGrading','1stTotal');Required();" required><b class="w3-padding-top w3-col s2 m2 l2 w3-center">%</b>
								</div>
							</div>
							<div class="w3-col s12 m2 l2 w3-padding-small">
								<div class="w3-col s12 m12 l12">
									<label class="w3-text-grey"><b>Assignment </b></label> 
								</div>
								<div class="w3-col s12 m12 l12">
									<input type="number" name="1stAss" class="w3-col s10 m10 l10 w3-padding-small w3-border-white w3-border w3-round w3-border w3-border-theme" placeholder="ex: 20"  maxlength="2" min="00" max="100" onkeyup="Fields('1stGrading','1stTotal');Required();" required><b class="w3-padding-top w3-col s2 m2 l2 w3-center">%</b>
								</div>
							</div>
							<div class="w3-col s12 m2 l2 w3-padding-small">
								<div class="w3-col s12 m12 l12">
									<label class="w3-text-grey"><b>Exam </b></label> 
								</div>
								<div class="w3-col s12 m12 l12">
									<input type="number" name="1stExam" class="w3-col s10 m10 l10 w3-padding-small w3-border-white w3-border w3-round w3-border w3-border-theme" placeholder="ex: 20"  maxlength="2" min="00" max="100" onkeyup="Fields('1stGrading','1stTotal');Required();" required><b class="w3-padding-top w3-col s2 m2 l2 w3-center">%</b>
								</div>
							</div>
							<div class="w3-col s12 m2 l2 w3-padding-small">
								<div class="w3-col s12 m12 l12">
									<label class="w3-text-grey"><b>Practical Exam </b></label> 
								</div>
								<div class="w3-col s12 m12 l12">
									<input type="number" name="1stPra" class="w3-col s10 m10 l10 w3-padding-small w3-border-white w3-border w3-round w3-border w3-border-theme" placeholder="ex: 20"  maxlength="2" min="00" max="100" onkeyup="Fields('1stGrading','1stTotal');Required();" required><b class="w3-padding-top w3-col s2 m2 l2 w3-center">%</b>
								</div>
							</div>
							<div class="w3-col s12 m2 l2 w3-padding-small w3-center">
								<div class="w3-col s12 m12 l12">
									<label class="w3-text-grey"><b>Total </b></label> 
								</div>
								<div class="w3-col s12 m12 l12 w3-display-container">
									<input type="number" name="s_hour" class="w3-col s12 m12 l12 w3-padding-small w3-border-white w3-border w3-round w3-border w3-center" placeholder="0%" required maxlength="3" min="100" max="100" id="1stTotal" disabled>
								</div>
							</div>
					</div> 
					<div class="w3-col s12 m12 l12 w3-padding-medium" id="2ndGrading">
							<label><b>Rating for 2nd Grading</label> 
							<div class="w3-clear"></div>
							<div class="w3-col s12 m2 l2 w3-padding-small">
								<div class="w3-col s12 m12 l12">
									<label class="w3-text-grey"><b>Quiz </b></label> 
								</div>
								<div class="w3-col s12 m12 l12">
									<input type="number" name="2ndQuiz" class="w3-col s10 m10 l10 w3-padding-small w3-border-white w3-border w3-round w3-border w3-border-theme" placeholder="ex: 20"  maxlength="2" min="00" max="100" onkeyup="Fields('2ndGrading','2ndTotal');Required();" required><b class="w3-padding-top w3-col s2 m2 l2 w3-center">%</b>
								</div>
							</div>
							<div class="w3-col s12 m2 l2 w3-padding-small">
								<div class="w3-col s12 m12 l12">
									<label class="w3-text-grey"><b>Long Test </b></label> 
								</div>
								<div class="w3-col s12 m12 l12">
									<input type="number" name="2ndLong" class="w3-col s10 m10 l10 w3-padding-small w3-border-white w3-border w3-round w3-border w3-border-theme" placeholder="ex: 20"  maxlength="2" min="00" max="100" onkeyup="Fields('2ndGrading','2ndTotal');Required();" required><b class="w3-padding-top w3-col s2 m2 l2 w3-center">%</b>
								</div>
							</div>
							<div class="w3-col s12 m2 l2 w3-padding-small">
								<div class="w3-col s12 m12 l12">
									<label class="w3-text-grey"><b>Assignment </b></label> 
								</div>
								<div class="w3-col s12 m12 l12">
									<input type="number" name="2ndAss" class="w3-col s10 m10 l10 w3-padding-small w3-border-white w3-border w3-round w3-border w3-border-theme" placeholder="ex: 20"  maxlength="2" min="00" max="100" onkeyup="Fields('2ndGrading','2ndTotal');Required();" required><b class="w3-padding-top w3-col s2 m2 l2 w3-center">%</b>
								</div>
							</div>
							<div class="w3-col s12 m2 l2 w3-padding-small">
								<div class="w3-col s12 m12 l12">
									<label class="w3-text-grey"><b>Exam </b></label> 
								</div>
								<div class="w3-col s12 m12 l12">
									<input type="number" name="2ndExam" class="w3-col s10 m10 l10 w3-padding-small w3-border-white w3-border w3-round w3-border w3-border-theme" placeholder="ex: 20"  maxlength="2" min="00" max="100" onkeyup="Fields('2ndGrading','2ndTotal');Required();" required><b class="w3-padding-top w3-col s2 m2 l2 w3-center">%</b>
								</div>
							</div>
							<div class="w3-col s12 m2 l2 w3-padding-small">
								<div class="w3-col s12 m12 l12">
									<label class="w3-text-grey"><b>Practical Exam </b></label> 
								</div>
								<div class="w3-col s12 m12 l12">
									<input type="number" name="2ndPra" class="w3-col s10 m10 l10 w3-padding-small w3-border-white w3-border w3-round w3-border w3-border-theme" placeholder="ex: 20"  maxlength="2" min="00" max="100" onkeyup="Fields('2ndGrading','2ndTotal');Required();" required><b class="w3-padding-top w3-col s2 m2 l2 w3-center">%</b>
								</div>
							</div>
							<div class="w3-col s12 m2 l2 w3-padding-small w3-center">
								<div class="w3-col s12 m12 l12">
									<label class="w3-text-grey"><b>Total </b></label> 
								</div>
								<div class="w3-col s12 m12 l12 w3-display-container">
									<input type="number" name="s_hour" class="w3-col s12 m12 l12 w3-padding-small w3-border-white w3-border w3-round w3-border w3-center" placeholder="0%" required maxlength="3" min="100" max="100" id="2ndTotal" disabled>
								</div>
							</div>
					</div> 
					<div class="w3-col s12 m12 l12 w3-padding-medium" id="3rdGrading">
							<label><b>Rating for 3rd Grading</label> 
							<div class="w3-clear"></div>
							<div class="w3-col s12 m2 l2 w3-padding-small">
								<div class="w3-col s12 m12 l12">
									<label class="w3-text-grey"><b>Quiz </b></label> 
								</div>
								<div class="w3-col s12 m12 l12">
									<input type="number" name="3rdQuiz" class="w3-col s10 m10 l10 w3-padding-small w3-border-white w3-border w3-round w3-border w3-border-theme" placeholder="ex: 20"  maxlength="2" min="00" max="100" onkeyup="Fields('3rdGrading','3rdTotal');Required();" required><b class="w3-padding-top w3-col s2 m2 l2 w3-center">%</b>
								</div>
							</div>
							<div class="w3-col s12 m2 l2 w3-padding-small">
								<div class="w3-col s12 m12 l12">
									<label class="w3-text-grey"><b>Long Test </b></label> 
								</div>
								<div class="w3-col s12 m12 l12">
									<input type="number" name="3rdLong" class="w3-col s10 m10 l10 w3-padding-small w3-border-white w3-border w3-round w3-border w3-border-theme" placeholder="ex: 20"  maxlength="2" min="00" max="100" onkeyup="Fields('3rdGrading','3rdTotal');Required();" required><b class="w3-padding-top w3-col s2 m2 l2 w3-center">%</b>
								</div>
							</div>
							<div class="w3-col s12 m2 l2 w3-padding-small">
								<div class="w3-col s12 m12 l12">
									<label class="w3-text-grey"><b>Assignment </b></label> 
								</div>
								<div class="w3-col s12 m12 l12">
									<input type="number" name="3rdAss" class="w3-col s10 m10 l10 w3-padding-small w3-border-white w3-border w3-round w3-border w3-border-theme" placeholder="ex: 20"  maxlength="2" min="00" max="100" onkeyup="Fields('3rdGrading','3rdTotal');Required();" required><b class="w3-padding-top w3-col s2 m2 l2 w3-center">%</b>
								</div>
							</div>
							<div class="w3-col s12 m2 l2 w3-padding-small">
								<div class="w3-col s12 m12 l12">
									<label class="w3-text-grey"><b>Exam </b></label> 
								</div>
								<div class="w3-col s12 m12 l12">
									<input type="number" name="3rdExam" class="w3-col s10 m10 l10 w3-padding-small w3-border-white w3-border w3-round w3-border w3-border-theme" placeholder="ex: 20"  maxlength="2" min="00" max="100" onkeyup="Fields('3rdGrading','3rdTotal');Required();" required><b class="w3-padding-top w3-col s2 m2 l2 w3-center">%</b>
								</div>
							</div>
							<div class="w3-col s12 m2 l2 w3-padding-small">
								<div class="w3-col s12 m12 l12">
									<label class="w3-text-grey"><b>Practical Exam </b></label> 
								</div>
								<div class="w3-col s12 m12 l12">
									<input type="number" name="3rdPra" class="w3-col s10 m10 l10 w3-padding-small w3-border-white w3-border w3-round w3-border w3-border-theme" placeholder="ex: 20"  maxlength="2" min="00" max="100" onkeyup="Fields('3rdGrading','3rdTotal');Required();" required><b class="w3-padding-top w3-col s2 m2 l2 w3-center">%</b>
								</div>
							</div>
							<div class="w3-col s12 m2 l2 w3-padding-small w3-center">
								<div class="w3-col s12 m12 l12">
									<label class="w3-text-grey"><b>Total </b></label> 
								</div>
								<div class="w3-col s12 m12 l12 w3-display-container">
									<input type="number" name="s_hour" class="w3-col s12 m12 l12 w3-padding-small w3-border-white w3-border w3-round w3-border w3-center" placeholder="0%" required maxlength="3" min="100" max="100" id="3rdTotal" disabled>
								</div>
							</div>
					</div> 
					<div class="w3-col s12 m12 l12 w3-padding-medium " id="4thGrading">
							<label><b>Rating for 4th Grading</label> 
							<div class="w3-clear"></div>
							<div class="w3-col s12 m2 l2 w3-padding-small">
								<div class="w3-col s12 m12 l12">
									<label class="w3-text-grey"><b>Quiz </b></label> 
								</div>
								<div class="w3-col s12 m12 l12">
									<input type="number" name="4thQuiz" class="w3-col s10 m10 l10 w3-padding-small w3-border-white w3-border w3-round w3-border w3-border-theme" placeholder="ex: 20"  maxlength="2" min="00" max="100" onkeyup="Fields('4thGrading','4thTotal');Required();" required><b class="w3-padding-top w3-col s2 m2 l2 w3-center">%</b>
								</div>
							</div>
							<div class="w3-col s12 m2 l2 w3-padding-small">
								<div class="w3-col s12 m12 l12">
									<label class="w3-text-grey"><b>Long Test </b></label> 
								</div>
								<div class="w3-col s12 m12 l12">
									<input type="number" name="4thLong" class="w3-col s10 m10 l10 w3-padding-small w3-border-white w3-border w3-round w3-border w3-border-theme" placeholder="ex: 20"  maxlength="2" min="00" max="100" onkeyup="Fields('4thGrading','4thTotal');Required();" required><b class="w3-padding-top w3-col s2 m2 l2 w3-center">%</b>
								</div>
							</div>
							<div class="w3-col s12 m2 l2 w3-padding-small">
								<div class="w3-col s12 m12 l12">
									<label class="w3-text-grey"><b>Assignment </b></label> 
								</div>
								<div class="w3-col s12 m12 l12">
									<input type="number" name="4thAss" class="w3-col s10 m10 l10 w3-padding-small w3-border-white w3-border w3-round w3-border w3-border-theme" placeholder="ex: 20"  maxlength="2" min="00" max="100" onkeyup="Fields('4thGrading','4thTotal');Required();" required><b class="w3-padding-top w3-col s2 m2 l2 w3-center">%</b>
								</div>
							</div>
							<div class="w3-col s12 m2 l2 w3-padding-small">
								<div class="w3-col s12 m12 l12">
									<label class="w3-text-grey"><b>Exam </b></label> 
								</div>
								<div class="w3-col s12 m12 l12">
									<input type="number" name="4thExam" class="w3-col s10 m10 l10 w3-padding-small w3-border-white w3-border w3-round w3-border w3-border-theme" placeholder="ex: 20"  maxlength="2" min="00" max="100" onkeyup="Fields('4thGrading','4thTotal');Required();" required><b class="w3-padding-top w3-col s2 m2 l2 w3-center">%</b>
								</div>
							</div>
							<div class="w3-col s12 m2 l2 w3-padding-small">
								<div class="w3-col s12 m12 l12">
									<label class="w3-text-grey"><b>Practical Exam </b></label> 
								</div>
								<div class="w3-col s12 m12 l12">
									<input type="number" name="4thPra" class="w3-col s10 m10 l10 w3-padding-small w3-border-white w3-border w3-round w3-border w3-border-theme" placeholder="ex: 20"  maxlength="2" min="00" max="100" onkeyup="Fields('4thGrading','4thTotal');Required();" required><b class="w3-padding-top w3-col s2 m2 l2 w3-center">%</b>
								</div>
							</div>
							<div class="w3-col s12 m2 l2 w3-padding-small w3-center">
								<div class="w3-col s12 m12 l12">
									<label class="w3-text-grey"><b>Total </b></label> 
								</div>
								<div class="w3-col s12 m12 l12 w3-display-container">
									<input type="number" name="s_hour" class="w3-col s12 m12 l12 w3-padding-small w3-border-white w3-border w3-round w3-border w3-center" placeholder="0%" required maxlength="3" min="100" max="100" id="4thTotal" disabled>
								</div>
							</div>
					</div> 
					<div class="w3-col s12 m12 l12 w3-padding-medium w3-grey ">
						<button id="btnAddsub" type="submit" name="submit" class="w3-btn w3-padding-large w3-round w3-green w3-right" onclick="send('add-subject','../libraries/php-func/add-subject.php','add-subjectForm')" disabled><i class="fa fa-save"></i> Save</button>
					</div>
				</form>
			</div>
			<?php
				footer("");
			?>
		</div>
	</div>  
