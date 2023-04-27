<?php
	include("../libraries/php-func/main-func.php");
	include("../libraries/php-func/faculty-session.php");
	head("My Profile","");
?>
	<div class="w3-col s12 m12 l12 w3-theme w3-padding-0" style="height:100%;">
		<div class="w3-col s10 m3 l3 w3-border-right w3-border-light-grey w3-card-8 w3-theme-dark w3-animate-left" style="height:100%;position:fixed;z-index:998;" id="navigationBar">
			<div class="w3-clear"></div> 
			<button class="w3-btn w3-transparent w3-padding-large w3-hover-theme w3-text-theme w3-hide-large w3-hide-medium w3-display-topright" onclick="$('#navigationBar').fadeOut();"><i class="fa fa-close w3-xlarge"></i></button>
			<h3 class="w3-center w3-margin-0 w3-black w3-padding-top w3-padding-bottom">
				<b class=" w3-margin-0 w3-text-white" style="background:rgba(0,0,0,0.70);">Faculty Panel</b>
			</h3>
			
			<script>
				function drpMenu(container){
					$('#'+container).toggle();
				}
			</script>
			<div class="w3-padding-top" style="height:auto;max-height:68%;min-height:auto;overflow-x:hidden;overflow-y:auto;">
				<a href="profile.php" class="w3-padding-medium w3-left-align w3-col s12 m12 l12 w3-btn w3-hover-white w3-white"><i class=" fa fa-user w3-xlarge"></i> <?=ucfirst($row["fname"])." ".ucfirst($row["mname"])." ".ucfirst($row["lname"]);?></a>
				<a href="students.php" class="w3-padding-medium w3-left-align w3-col s12 m12 l12 w3-btn w3-hover-white w3-transparent"><i class=" fa fa-users w3-xlarge "></i> Students</a> 
				<a href="news-and-events.php" class="w3-padding-medium w3-left-align w3-col s12 m12 l12 w3-btn w3-hover-white w3-transparent"><i class=" fa fa-flag w3-xlarge"></i> News & Events</a> 
				<a href="my-subjects.php" class="w3-padding-medium w3-left-align w3-col s12 m12 l12 w3-btn w3-hover-white w3-transparent"><i class=" fa fa-tasks w3-xlarge"></i> My Subjects</a> 
			</div>
		</div>
		<div class="w3-col s12 m9 l9 w3-padding-0 w3-right w3-margin-0 " >
			<div class="w3-padding-0 w3-col s12 m12 l12 w3-center w3-theme-dark w3-margin-0 w3-display-container w3-animate-right w3-border-bottom w3-border-white">
				<button class="w3-left w3-btn w3-padding-medium w3-theme w3-hide-large w3-hide-medium w3-hover-white" onclick="$('#navigationBar').fadeIn();"><i class="fa fa-reorder w3-xlarge" ></i></button>
				<a href="../libraries/php-func/faculty-logout.php" class="w3-right w3-btn w3-padding-medium w3-theme w3-hover-white w3-hide-small"><i class="fa fa-sign-out" ></i> Logout</a>
				<a href="../libraries/php-func/faculty-logout.php" class="w3-right w3-btn w3-padding-medium w3-theme w3-hide-large w3-hide-medium w3-hover-white"><i class="fa fa-sign-out w3-xlarge" ></i></a>
				
				<h3 class="w3-margin-0 w3-display-middle w3-padding-0 w3-text-white w3-col s8  m8 l8"><b>Integrated Academy</b></h3>
			</div> 
			<div class="w3-padding-large w3-col s12 m12 l12 w3-margin-top">
				<div class="w3-padding-medium w3-col s12 m12 l12 w3-white">
					<a class="w3-padding-small w3-white"> My Profile</a>
				</div>
			</div>
			<div id="FacultyEdit" class="w3-modal w3-animate-zoom w3-padding-0" style="background:rgba(0,0,0,0.90);display:none;z-index:999;"> 
				<div class="w3-modal-content w3-card-8 w3-animate-zoom w3-round w3-border w3-border-white w3-padding-0" style="max-width:600px;margin-top:20px;overflow:hidden;">
					<div class="w3-padding-medium w3-theme w3-col s12 m12 l12">
						<h3 class="w3-margin-0 w3-padding-0"><i class="fa fa-image"></i> Edit Faculty Information</h3>
					</div>
					<form src="../libraries/php-func/update-faculty.php" method="POST" class="w3-padding-medium w3-white w3-col s12 m12 l12" id="updateFaculty">
						<div id="FacultyEditResponse1"></div>
						<div id="FacultyEditResponse"></div>
						<button class="w3-btn w3-padding-medium w3-green w3-round" type="submit" onclick="send('updateFaculty','../libraries/php-func/update-faculty.php','FacultyEditResponse1')"><i class="fa fa-save"></i> Save Updates</button> 
						<button class="w3-btn w3-padding-medium w3-grey w3-round" type="button" onclick="$('#FacultyEdit').hide();"><i class="fa fa-close"></i> Close</button> 
					</form>
				</div>
			</div>
			<div class="w3-col s12 m12 l12 w3-padding-small">
				<div class="w3-col s12 m8 l8 w3-padding-left w3-padding-right">
					<div class="w3-col s12 m12 l12 w3-white w3-padding-small">
						<div class="w3-col s12 m12 l12"><b>First Name:</b> <?=$row["fname"];?></div>
						<div class="w3-col s12 m12 l12"><b>Middle Name:</b> <?=$row["mname"];?></div>
						<div class="w3-col s12 m12 l12"><b>Last Name:</b> <?=$row["lname"];?></div>
						<div class="w3-col s12 m12 l12"><b>Gender :</b> <?=$row["gender"];?></div>
						<div class="w3-col s12 m12 l12"><b>Birthday :</b> <?=$row["bday"];?></div>
						<div class="w3-col s12 m12 l12"><b>Address :</b> <?=$row["address"];?></div>
						<div class="w3-col s12 m12 l12"><b>Position :</b> <?=$row["position"];?></div>
						<div class="w3-col s12 m12 l12"><b>Username :</b> <?=$row["username"];?></div>
						<div class="w3-col s12 m12 l12">
							<button type="button" class="w3-btn w3-padding-medium w3-btn-block w3-green" onclick="loadModalContent('FacultyEditResponse','../libraries/php-func/edit-faculty.php?tbl_id=<?=$row["tbl_id"];?>','FacultyEdit')"><i class="fa fa-edit"></i> Update Profile</button>
						</div>
					</div>
				</div>
			</div>
			
			<?php
				footer("");
			?>
		</div>
	</div>  
