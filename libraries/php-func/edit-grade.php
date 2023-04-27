<?php
	include("connection.php");
	session_start();
	$query = $con->query("select tbl_grades.grade,tbl_grades.quarter,tbl_grades.type,tbl_subjects.tbl_id,tbl_grades.class_id from tbl_grades left join tbl_subjects on tbl_grades.subject_id = tbl_subjects.tbl_id where tbl_grades.tbl_id='".$_GET["tbl_id"]."'"); 
	$row = $query->fetch();
?>
<div id="editGradesDetails" class="w3-modal w3-animate-zoom w3-padding-0" style="background:rgba(0,0,0,0.90);display:block;z-index:999;"> 
	<div class="w3-modal-content w3-card-8 w3-animate-zoom w3-round w3-border w3-border-white w3-padding-0" style="max-width:1000px;overflow:hidden;margin-top:20px;">
		<div class="w3-padding-small w3-theme w3-col s12 m12 l12 w3-display-container">
			<h3 class="w3-margin-0 w3-padding-0"><i class="fa fa-edit"></i> Update Grade</h3>
			<button type="button" class="w3-btn w3-padding-medium w3-transparent w3-hover-white w3-right w3-display-topright" onclick="$('#editGradesDetails').fadeOut();" ><i class="fa fa-close"></i> Close</button>
		</div>
		<form class="w3-white w3-col s12 m12 l12 w3-card-4 w3-margin-0" method="POST" action="../libraries/php-func/edit-grade.php" id="edit-grade">
			<div class="w3-col s12 m6 l6 w3-white">
				<div class="w3-col s12 m12 l12 w3-padding-medium">
					<label><b>School Year </b></label> 
					<input type="hidden" name="student_id" value="<?=$_GET["student_id"];?>"> 
					<input type="hidden" name="tbl_id" value="<?=$_GET["tbl_id"];?>"> 
					<select name="class_id" class="w3-col s12 m12 l12 w3-padding-medium w3-border-white w3-border w3-round w3-border w3-border-theme" required onchange="if(this.value != ''){document.getElementById('subject_id').disabled =false;document.getElementById('quarter').disabled =false;loadContent('subject_id','../libraries/php-func/class-subjects.php?faculty_id=<?php if(!empty($_SESSION["faculty_id"])){echo $_SESSION["faculty_id"];}?>&class_id='+this.value);}else{document.getElementById('subject_id').disabled =true;document.getElementById('quarter').disabled =true;}">
						<option value="" disabled>Select School Year</option> 
						<?php 
						$querysy = $con->query("select * from tbl_class left join tbl_class_students on tbl_class.class_id = tbl_class_students.class_id where tbl_class_students.stud_id='".$_GET["student_id"]."' order by tbl_class.sy ASC");
						while($rowsy = $querysy->fetch()){
							if(!empty($_SESSION["faculty_id"])){ 
								$row_facultySY = $con->query("select * from tbl_subjects left join tbl_class_subjects on tbl_subjects.tbl_id = tbl_class_subjects.subj_id where tbl_class_subjects.class_id='".$rowsy["class_id"]."' and tbl_subjects.faculty_id='".$_SESSION["faculty_id"]."'");
								$rowSubejcts = $row_facultySY->rowCount();
								if($rowSubejcts > 0){
									?>
									<option value="<?=$rowsy["class_id"];?>" <?php if($row["class_id"] == $rowsy["class_id"]){ echo "selected";}?> >SY: <?=$rowsy["sy"];?> | Year & Section: <?=$rowsy["ys"];?></option>  
									<?php
								}
							}else{
								?>
								<option value="<?=$rowsy["class_id"];?>" <?php if($row["class_id"] == $rowsy["class_id"]){ echo "selected";}?> >SY: <?=$rowsy["sy"];?> | Year & Section: <?=$rowsy["ys"];?></option>  
								<?php
							}
							
						}
					?>
					</select>
				</div> 
				<div class="w3-col s12 m12 l12 w3-padding-medium">
					<label><b>Quater</b></label>  
					<select name="quarter" id="quarter" class="w3-col s12 m12 l12 w3-padding-medium w3-border-white w3-border w3-round w3-border w3-border-theme" required>
						<option <?php if($row["quarter"] == "1st Grading"){echo "selected";}?> >1st Grading</option> 	
						<option <?php if($row["quarter"] == "2nd Grading"){echo "selected";}?> >2nd Grading</option> 	
						<option <?php if($row["quarter"] == "3rd Grading"){echo "selected";}?> >3rd Grading</option> 	
						<option <?php if($row["quarter"] == "4th Grading"){echo "selected";}?> >4th Grading</option> 	
					</select>
				</div> 
			</div>
			<div class="w3-col s12 m6 l6 w3-white">
				<div class="w3-col s12 m12 l12 w3-padding-medium">
					<label><b>Subject</b> (Faculty Name)</label> 
					<select name="subject_id" id="subject_id" class="w3-col s12 m12 l12 w3-padding-medium w3-border-white w3-border w3-round w3-border w3-border-theme" required>
					<?php
						$x = 0;
						if(!empty($_SESSION["faculty_id"])){
							$query_subject = $con->query("select * from tbl_subjects where faculty_id='".$_SESSION["faculty_id"]."' order by subject_title ASC");
							while($row_subject = $query_subject->fetch()){
								$x++; 
								?>
									<option value="<?=$row_subject["tbl_id"];?>" ><?=$row_subject["subject_code"]." : ".ucfirst($row_subject["subject_title"]);?></option>
								<?php
							}
						}else{
							$query_subject = $con->query("select tbl_subjects.tbl_id,subject_title,fname,lname,mname from tbl_subjects left join tbl_faculty on tbl_subjects.faculty_id = tbl_faculty.tbl_id order by tbl_subjects.subject_title ASC");
							while($row_subject = $query_subject->fetch()){
								$x++; 
								?>
									<option value="<?=$row_subject["tbl_id"];?>" <?php if($row["tbl_id"] == $row_subject["tbl_id"]){echo "selected";}?>  ><?=ucfirst($row_subject["subject_title"])." : ".ucfirst($row_subject["fname"])." ".ucfirst($row_subject["mname"])." ".ucfirst($row_subject["lname"]);?></option>
								<?php
							}
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
					<label><b>Type</b></label>  
					<select name="type" class="w3-col s12 m12 l12 w3-padding-medium w3-border-white w3-border w3-round w3-border w3-border-theme" required>
						<option <?php if($row["type"] == "Quiz"){echo "selected";}?> >Quiz</option> 	
						<option <?php if($row["type"] == "Long Test"){echo "selected";}?> >Long Test</option> 	
						<option <?php if($row["type"] == "Assignment"){echo "selected";}?> >Assignment</option> 	
						<option <?php if($row["type"] == "Exam"){echo "selected";}?> >Exam</option> 	
						<option <?php if($row["type"] == "Practical Exam"){echo "selected";}?> >Practical Exam</option> 	
					</select>
				</div> 
				<div class="w3-col s12 m12 l12 w3-padding-medium">
					<label><b>Grade</b></label> 
					<input type="text" name="grade" class="w3-col s12 m12 l12 w3-padding-medium w3-border-white w3-border w3-round w3-border w3-border-theme" required min="01" max="100" placeholder="Enter grade ex: 90.50 " title="" value="<?=$row["grade"];?>"> 
				</div> 
			</div>
			
			<div class="w3-col s12 m12 l12 w3-padding-medium w3-grey w3-margin-top">
				<button id="btnAddsub" type="submit" name="submit" class="w3-btn w3-padding-large w3-round w3-green w3-right" onclick="send('edit-grade','../libraries/php-func/update-grade.php','editGradesDetails')" ><i class="fa fa-save"></i> Save Updates</button>
			</div>
		</form>
	</div>
</div>