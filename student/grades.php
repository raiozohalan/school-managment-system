<?php
	include("../libraries/php-func/main-func.php");
	include("../libraries/php-func/connection.php"); 
	include("../libraries/php-func/student-session.php");
	
	head("Grades","");
?>
	<div class="w3-col s12 m12 l12 w3-container w3-theme">
		<div class="w3-col s12 m1 l1 w3-container"></div>
		<div class="w3-col s12 m10 l0 w3-container w3-padding-0">
			<img src="../images/banner.png" width="100%">
			
			<div class="w3-clear w3-container w3-col s12 m12 l12"></div>
			
			<div class="w3-col s12 m3 l3 w3-margin-top">
				<img src="../<?=$row["picture"];?>" width="100%" class="w3-card-8">
				<div class="w3-clear w3-container w3-col s12 m12 l12 w3-margin-top"></div> 
				<a href="index.php" class="w3-btn w3-padding-medium w3-btn-block w3-theme w3-border-theme-dark w3-border  w3-hover-white"><i class="fa fa-user"></i> Profile</a>
				<a href="update-profile.php" class="w3-btn w3-padding-medium w3-btn-block w3-theme w3-border-theme-dark w3-border  w3-hover-white"><i class="fa fa-edit"></i> Update Profile</a>
				<a href="grades.php" class="w3-btn w3-padding-medium w3-btn-block w3-white w3-border-theme-dark w3-border  w3-hover-white"><i class="fa fa-edit"></i> Grades</a>
			</div>
			<div id="StudentModal" class="w3-modal w3-animate-zoom w3-padding-0" style="background:rgba(0,0,0,0.90);display:none;z-index:999;"> 
			</div>
			<div class="w3-col s12 m9 l9 w3-margin-top">
				<div class="w3-col s12 m12 l12  w3-padding-0 w3-padding-left w3-padding-bottom">
					<h3 class="w3-left w3-margin-0 "><b><?=ucfirst($row["fname"])." ".ucfirst($row["mname"])." ".ucfirst($row["lname"]);?></b> <label class="w3-text-orange"> ( Account <?=$row["account_status"];?> )</label></h3>
					<a href="../libraries/php-func/logout.php" class="w3-btn w3-round w3-padding-medium w3-right w3-red"><i class="fa fa-sign-out"></i> Logout</a>
					<div class="w3-clear w3-padding-top"></div>
					<hr class="w3-border-bottom w3-border-theme-dark w3-margin-0 w3-margin-top">
				</div>
				<h3 class="w3-margin-0 w3-padding-small w3-center w3-theme"><i class="fa fa-bar-chart"></i> Report Card</h3>
				<div class="w3-right w3-transparent w3-padding-0"> 
						<select name="school_year" id="class_id" class="w3-col s12 m12 l12 w3-padding-large w3-border-white w3-border w3-round w3-border w3-border-theme" placeholder="Select school year"  onchange="loadContent('reportcardContainer','../libraries/php-func/report-card-student.php?tbl_id=<?=$row["tbl_id"];?>&class_id='+this.value);">  
							<option value="" disabled selected>Select School Year</option>
							<?php 
								$query_classList = $con->query("select * from tbl_class left join tbl_class_students on tbl_class.class_id = tbl_class_students.class_id where tbl_class_students.stud_id='".$row["tbl_id"]."' order by tbl_class.sy ASC");
								while($row_classList = $query_classList->fetch()){
									?>
									<option value="<?=$row_classList["class_id"];?>">SY: <?=$row_classList["sy"];?> | Year & Section: <?=$row_classList["ys"];?></option>  
									<?php
								}
							?>
						</select> 
					</div>
					
					<script>
						loadContent('reportcardContainer','../libraries/php-func/report-card-student.php?tbl_id=<?=$row["tbl_id"];?>&class_id=');
					</script>
					<div class="w3-clear"></div> <br>
				<div class="" id="reportcardContainer">  
				
				</div>
			
			
		</div>
	</div> 
<?php
	footer("");
?>