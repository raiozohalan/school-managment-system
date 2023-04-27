<?php
	include("connection.php");
	include("faculty-session.php");
	$query = $con->query("select * from tbl_students where tbl_id='".$_GET["student_id"]."'"); 
	$row = $query->fetch();
	
?>

<div class="w3-modal-content w3-card-8 w3-animate-zoom w3-round w3-border w3-border-white w3-padding-0" style="max-width:1000px;overflow:hidden;">
	<div class="w3-padding-small w3-theme w3-col s12 m12 l12 w3-display-container">
		<h3 class="w3-margin-0 w3-padding-0"><i class="fa fa-plus"></i> Add Grade</h3>
		<button type="button" class="w3-btn w3-padding-medium w3-transparent w3-hover-white w3-right w3-display-topright" onclick="$('#StudentModal').fadeOut();" ><i class="fa fa-close"></i> Close</button>
	</div>
	<form class="w3-white w3-col s12 m12 l12 w3-card-4 w3-margin-0" method="POST" action="../libraries/php-func/add-grade.php" id="add-grade">
		<div class="w3-col s12 m12 l12 w3-padding-medium w3-grey">
			<label><b>Student Name: </b> <?=ucfirst($row["fname"])." ".ucfirst($row["mname"])." ".ucfirst($row["lname"]);?></label>
		</div>	
		<div class="w3-col s12 m6 l6 w3-white">
			<div class="w3-col s12 m12 l12 w3-padding-medium">
				<label><b>School Year / Year & Section</b></label> 
				<input type="hidden" name="student_id" value="<?=$_GET["student_id"];?>">
				<select name="class_id" class="w3-col s12 m12 l12 w3-padding-medium w3-border-white w3-border w3-round w3-border w3-border-theme" required onchange="if(this.value != ''){document.getElementById('subject_id').disabled =false;document.getElementById('quarter').disabled =false;loadContent('subject_id','../libraries/php-func/class-subjects.php?faculty_id=<?=$_SESSION["faculty_id"];?>&class_id='+this.value);}else{document.getElementById('subject_id').disabled =true;document.getElementById('quarter').disabled =true;}">
					<option value="" disabled selected>Select School Year</option>
					<?php 
						$querysy = $con->query("select * from tbl_class left join tbl_class_students on tbl_class.class_id = tbl_class_students.class_id where tbl_class_students.stud_id='".$_GET["student_id"]."' order by tbl_class.sy ASC");
						while($rowsy = $querysy->fetch()){
							$row_facultySY = $con->query("select * from tbl_subjects left join tbl_class_subjects on tbl_subjects.tbl_id = tbl_class_subjects.subj_id where tbl_class_subjects.class_id='".$rowsy["class_id"]."' and tbl_subjects.faculty_id='".$_SESSION["faculty_id"]."'");
							$rowSubejcts = $row_facultySY->rowCount();
							if($rowSubejcts > 0){
								?>
								<option value="<?=$rowsy["class_id"];?>">SY: <?=$rowsy["sy"];?> | Year & Section: <?=$rowsy["ys"];?></option>  
								<?php
							}
							
						}
					?>
				</select>
			</div> 
			<div class="w3-col s12 m12 l12 w3-padding-medium">
				<label><b>Quater</b></label>  
				<select name="quarter" id="quarter" disabled class="w3-col s12 m12 l12 w3-padding-medium w3-border-white w3-border w3-round w3-border w3-border-theme" required onchange="if(this.value != ''){document.getElementById('grade_type').disabled =false;document.getElementById('grade_txt').disabled =false;loadContent('grade_type','../libraries/php-func/load-grade-types.php?quarter='+this.value+'&subject_id='+$('#subject_id').val());}else{document.getElementById('grade_type').disabled =true;document.getElementById('grade_txt').disabled =true;}">
					<option value="" disabled selected>Select Quater</option> 	
					<option>1st Grading</option> 	
					<option>2nd Grading</option> 	
					<option>3rd Grading</option> 	
					<option>4th Grading</option> 	
				</select>
			</div> 
		</div>
		<div class="w3-col s12 m6 l6 w3-white">
			<div class="w3-col s12 m12 l12 w3-padding-medium">
				<label><b>Subject</b> (Faculty Name)</label> 
				<select name="subject_id" id="subject_id" disabled class="w3-col s12 m12 l12 w3-padding-medium w3-border-white w3-border w3-round w3-border w3-border-theme" required>  
				</select>
			</div>
			<div class="w3-col s12 m12 l12 w3-padding-medium">
				<label><b>Type</b></label>  
				<select name="type" id="grade_type" disabled class="w3-col s12 m12 l12 w3-padding-medium w3-border-white w3-border w3-round w3-border w3-border-theme" required> 	
				</select>
			</div> 
			<div class="w3-col s12 m12 l12 w3-padding-medium">
				<label><b>Grade</b></label> 
				<input type="text" name="grade" id="grade_txt" disabled class="w3-col s12 m12 l12 w3-padding-medium w3-border-white w3-border w3-round w3-border w3-border-theme" required min="01" max="100" placeholder="Enter grade ex: 90.50 " title=""> 
			</div> 
		</div>
		
		<div class="w3-col s12 m12 l12 w3-padding-medium w3-grey w3-margin-top">
			<button id="btnAddsub" type="submit" name="submit" class="w3-btn w3-padding-large w3-round w3-green w3-right" onclick="send('add-grade','../libraries/php-func/add-grade.php','add-grade')" ><i class="fa fa-save"></i> Save Updates</button>
		</div>
	</form>
</div>