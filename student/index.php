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
				<img src="../<?=$row["picture"];?>" width="100%" class="w3-card-8">
				<div class="w3-clear w3-container w3-col s12 m12 l12 w3-margin-top"></div> 
				<a href="index.php" class="w3-btn w3-padding-medium w3-btn-block w3-white w3-border-theme-dark w3-border  w3-hover-white"><i class="fa fa-user"></i> Profile</a>
				<a href="update-profile.php" class="w3-btn w3-padding-medium w3-btn-block w3-theme w3-border-theme-dark w3-border  w3-hover-white"><i class="fa fa-edit"></i> Update Profile</a>
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
					<h1 class="w3-text-grey"><i class="fa fa-user"></i> My Profile</h1>
					<div class="w3-col s12 m12 l12 w3-padding w3-light-grey  w3-card-8">
						<h3 class="w3-text-grey w3-margin-0 w3-text-theme w3-border-bottom"><b>Personal Information</b></h3>
						<div class="w3-col s12 m12 l12 w3-padding-top">
							<b>First Name :</b> <?=$row["fname"];?>
						</div>
						<div class="w3-col s12 m12 l12 w3-padding-top">
							<b>Last Name :</b> <?=$row["lname"];?>
						</div>
						<div class="w3-col s12 m12 l12 w3-padding-top">
							<b>Middle Name :</b> <?=$row["mname"];?>
						</div>
						<div class="w3-col s12 m12 l12 w3-padding-top">
							<b>Gender :</b> <?=$row["gender"];?>
						</div>
						<div class="w3-col s12 m12 l12 w3-padding-top">
							<b>Birthday :</b> <?=date("F d, Y",strtotime($row["bday"]));?>
						</div>
						<div class="w3-col s12 m12 l12 w3-padding-top">
							<b>Religion :</b> <?=$row["religion"];?>
						</div>
						<div class="w3-col s12 m12 l12 w3-padding-top">
							<b>Address :</b> <?=$row["address"];?>
						</div>
						<div class="w3-col s12 m12 l12 w3-padding-top">
							<b>Mother Tongue :</b> <?=$row["mtongue"];?>
						</div>
					</div>
					<div class="w3-col s12 m12 l12 w3-padding w3-light-grey w3-margin-top w3-card-8">
						<h3 class="w3-text-grey w3-margin-0 w3-text-theme w3-border-bottom"><b>Family Information</b></h3>
						<div class="w3-col s12 m12 l12 w3-padding-top">
							<b>Mother :</b> <?=$row["mother"];?>
						</div>
						<div class="w3-col s12 m12 l12 w3-padding-top">
							<b>Father :</b> <?=$row["father"];?>
						</div>
					</div>
					<div class="w3-col s12 m12 l12 w3-padding w3-light-grey w3-margin-top w3-card-8">
						<h3 class="w3-text-grey w3-margin-0 w3-text-theme w3-border-bottom"><b>Guardian Information</b></h3>
						<div class="w3-col s12 m12 l12 w3-padding-top">
							<b>Name :</b> <?=$row["guardian"];?>
						</div>
						<div class="w3-col s12 m12 l12 w3-padding-top">
							<b>Contact Number :</b> <?=$row["guardian_contact"];?>
						</div>
						<div class="w3-col s12 m12 l12 w3-padding-top">
							<b>Relationship of Guardian :</b> <?=$row["guardian_rel"];?>
						</div>
					</div>
					
				</div>
			</div>
			
			
		</div>
	</div> 
<?php
	footer("");
?>