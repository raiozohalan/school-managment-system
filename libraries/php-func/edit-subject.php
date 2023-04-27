<?php
	include("connection.php");
	$query = $con->query("select * from tbl_subjects where tbl_id='".$_GET["tbl_id"]."'"); 
	$row = $query->fetch();
	$s_h = date("h",strtotime($row["start_time"]));
	$s_m = date("i",strtotime($row["start_time"]));
	$s_me = date("A",strtotime($row["start_time"]));
	
	$e_h = date("h",strtotime($row["end_time"]));
	$e_m = date("i",strtotime($row["end_time"]));
	$e_me = date("A",strtotime($row["end_time"]));
	
?>

<div class="w3-modal-content w3-card-8 w3-animate-zoom w3-round w3-border w3-border-white w3-padding-0" style="max-width:1000px;overflow:hidden;">
	<div class="w3-padding-medium w3-theme w3-col s12 m12 l12 w3-display-container">
		<h3 class="w3-margin-0 w3-padding-0"><i class="fa fa-tasks"></i> Edit Subject</h3>
		<button type="button" class="w3-btn w3-padding-medium w3-transparent w3-hover-white w3-right w3-display-topright" onclick="$('#modalContainer').fadeOut();" ><i class="fa fa-close"></i> Close</button>
	</div>
	<form class="w3-white w3-col s12 m12 l12 w3-card-4 w3-margin-0" method="POST" action="../libraries/php-func/update-subject.php" id="update-subject"> 
		<div class="w3-col s12 m6 l6 w3-white">
			<div class="w3-col s12 m12 l12 w3-padding-medium">
				<label><b>Subject Code </b></label> 
				<input type="hidden" name="id" value="<?=$row["tbl_id"];?>">
				<input type="text" name="subject_code" class="w3-col s12 m12 l12 w3-padding-medium w3-border-white w3-border w3-round w3-border w3-border-theme" placeholder="Enter Subject Code" required value="<?=$row["subject_code"];?>" onkeyup="Required()">
			</div>
			<div class="w3-col s12 m12 l12 w3-padding-medium">
				<label><b>Subject Descriptive Title</b></label> 
				<input type="text" name="subject_title" class="w3-col s12 m12 l12 w3-padding-medium w3-border-white w3-border w3-round w3-border w3-border-theme" placeholder="Enter Subject Descriptive Title" required value="<?=$row["subject_title"];?>" onkeyup="Required()">
			</div>
			<div class="w3-col s12 m12 l12 w3-padding-medium">
				<label><b>Subject Units / Credits</b></label> 
				<input type="number" name="units" class="w3-col s12 m12 l12 w3-padding-medium w3-border-white w3-border w3-round w3-border w3-border-theme" placeholder="Enter Subject Units / Credits" required value="<?=$row["units"];?>" onkeyup="Required()">
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
							<option value="<?=$row_faculty["tbl_id"];?>" <?php if($row["faculty_id"] == $row_faculty["tbl_id"]){ echo "selected";}?> ><?=ucfirst($row_faculty["fname"])." ".ucfirst($row_faculty["mname"])." ".ucfirst($row_faculty["lname"]);?></option>
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
						<input type="number" name="s_hour" class="w3-col s12 m12 l12 w3-padding-medium w3-border-white w3-border w3-round w3-border w3-border-theme" placeholder="Hour" required maxlength="2" min="01" max="12" value="<?=$s_h;?>" onkeyup="Required()">
					</div>
					<div class="w3-col s4 m4 l4 w3-padding-left">
						<input type="number" name="s_minute" class="w3-col s12 m12 l12 w3-padding-medium w3-border-white w3-border w3-round w3-border w3-border-theme" placeholder="Minutes" required maxlength="2" min="00" max="60" value="<?=$s_m;?>" onkeyup="Required()">
					</div>
					<div class="w3-col s4 m4 l4 w3-padding-left">
						<select name="s_maridiem" class="w3-col s12 m12 l12 w3-padding-medium w3-border-white w3-border w3-round w3-border w3-border-theme" required>
							<option <?php if($s_me == "AM"){ echo "selected";}?> >AM</option>
							<option <?php if($s_me == "PM"){ echo "selected";}?> >PM</option> 
						</select>
					</div>
				</div>
				<div class="w3-col s12 m12 l12 w3-padding-small">
					<div class="w3-col s12 m12 l12">
						<label class="w3-text-grey"><b>End Time </b></label> 
					</div>
					<div class="w3-col s4 m4 l4 w3-padding-left">
						<input type="number" name="e_hour" class="w3-col s12 m12 l12 w3-padding-medium w3-border-white w3-border w3-round w3-border w3-border-theme" placeholder="Hour" required maxlength="2" min="01" max="12"  value="<?=$e_h;?>" onkeyup="Required()">
					</div>
					<div class="w3-col s4 m4 l4 w3-padding-left">
						<input type="number" name="e_minute" class="w3-col s12 m12 l12 w3-padding-medium w3-border-white w3-border w3-round w3-border w3-border-theme" placeholder="Minutes" required maxlength="2" min="00" max="60" value="<?=$e_m;?>" onkeyup="Required()">
					</div>
					<div class="w3-col s4 m4 l4 w3-padding-left">
						<select name="e_maridiem" class="w3-col s12 m12 l12 w3-padding-medium w3-border-white w3-border w3-round w3-border w3-border-theme" required>
							<option <?php if($e_me == "AM"){ echo "selected";}?> >AM</option>
							<option <?php if($e_me == "PM"){ echo "selected";}?> >PM</option> 
						</select>
					</div>
				</div>
			</div>
			
		</div>
		<div class="w3-clear"></div>
					<?php
						$query1 = $con->query("select * from tbl_percentage where quarter ='1st Grading' and subject_id='".$_GET["tbl_id"]."'");
						$row1 = $query1->fetch();
						$query2 = $con->query("select * from tbl_percentage where quarter ='2nd Grading' and subject_id='".$_GET["tbl_id"]."'");
						$row2 = $query2->fetch();
						$query3 = $con->query("select * from tbl_percentage where quarter ='3rd Grading' and subject_id='".$_GET["tbl_id"]."'");
						$row3 = $query3->fetch();
						$query4 = $con->query("select * from tbl_percentage where quarter ='4th Grading' and subject_id='".$_GET["tbl_id"]."'");
						$row4 = $query4->fetch();
					?>
					<div class="w3-col s12 m12 l12 w3-padding-medium" id="1stGrading">
							<label><b>Rating for 1st Grading</label> 
							<div class="w3-clear"></div>
							<div class="w3-col s12 m2 l2 w3-padding-small">
								<div class="w3-col s12 m12 l12">
									<label class="w3-text-grey"><b>Quiz </b></label> 
								</div>
								<div class="w3-col s12 m12 l12">
									<input type="number" name="1stQuiz" class="w3-col s10 m10 l10 w3-padding-small w3-border-white w3-border w3-round w3-border w3-border-theme" placeholder="ex: 20"  maxlength="2" min="00" max="100" onkeyup="Fields('1stGrading','1stTotal');Required();" required value="<?=$row1["percentage_in_quiz"]?>"><b class="w3-padding-top w3-col s2 m2 l2 w3-center">%</b>
								</div>
							</div>
							<div class="w3-col s12 m2 l2 w3-padding-small">
								<div class="w3-col s12 m12 l12">
									<label class="w3-text-grey"><b>Long Test </b></label> 
								</div>
								<div class="w3-col s12 m12 l12">
									<input type="number" name="1stLong" class="w3-col s10 m10 l10 w3-padding-small w3-border-white w3-border w3-round w3-border w3-border-theme" placeholder="ex: 20"  maxlength="2" min="00" max="100" onkeyup="Fields('1stGrading','1stTotal');Required();" required value="<?=$row1["percentage_in_longtest"]?>"><b class="w3-padding-top w3-col s2 m2 l2 w3-center">%</b>
								</div>
							</div>
							<div class="w3-col s12 m2 l2 w3-padding-small">
								<div class="w3-col s12 m12 l12">
									<label class="w3-text-grey"><b>Assignment </b></label> 
								</div>
								<div class="w3-col s12 m12 l12">
									<input type="number" name="1stAss" class="w3-col s10 m10 l10 w3-padding-small w3-border-white w3-border w3-round w3-border w3-border-theme" placeholder="ex: 20"  maxlength="2" min="00" max="100" onkeyup="Fields('1stGrading','1stTotal');Required();" required value="<?=$row1["percentage_in_assignment"]?>"><b class="w3-padding-top w3-col s2 m2 l2 w3-center">%</b>
								</div>
							</div>
							<div class="w3-col s12 m2 l2 w3-padding-small">
								<div class="w3-col s12 m12 l12">
									<label class="w3-text-grey"><b>Exam </b></label> 
								</div>
								<div class="w3-col s12 m12 l12">
									<input type="number" name="1stExam" class="w3-col s10 m10 l10 w3-padding-small w3-border-white w3-border w3-round w3-border w3-border-theme" placeholder="ex: 20"  maxlength="2" min="00" max="100" onkeyup="Fields('1stGrading','1stTotal');Required();" required value="<?=$row1["percentage_in_exam"]?>"><b class="w3-padding-top w3-col s2 m2 l2 w3-center">%</b>
								</div>
							</div>
							<div class="w3-col s12 m2 l2 w3-padding-small">
								<div class="w3-col s12 m12 l12">
									<label class="w3-text-grey"><b>Practical Exam </b></label> 
								</div>
								<div class="w3-col s12 m12 l12">
									<input type="number" name="1stPra" class="w3-col s10 m10 l10 w3-padding-small w3-border-white w3-border w3-round w3-border w3-border-theme" placeholder="ex: 20"  maxlength="2" min="00" max="100" onkeyup="Fields('1stGrading','1stTotal');Required();" required value="<?=$row1["percentage_in_practicalexam"]?>"><b class="w3-padding-top w3-col s2 m2 l2 w3-center">%</b>
								</div>
							</div>
							<div class="w3-col s12 m2 l2 w3-padding-small w3-center">
								<div class="w3-col s12 m12 l12">
									<label class="w3-text-grey"><b>Total </b></label> 
								</div>
								<div class="w3-col s12 m12 l12 w3-display-container">
									<input type="number" name="s_hour" class="w3-col s12 m12 l12 w3-padding-small w3-border-white w3-border w3-round w3-border w3-center" placeholder="0%" required maxlength="3" min="100" max="100" id="1stTotal" disabled value="100">
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
									<input type="number" name="2ndQuiz" class="w3-col s10 m10 l10 w3-padding-small w3-border-white w3-border w3-round w3-border w3-border-theme" placeholder="ex: 20"  maxlength="2" min="00" max="100" onkeyup="Fields('2ndGrading','2ndTotal');Required();" required value="<?=$row2["percentage_in_quiz"]?>"><b class="w3-padding-top w3-col s2 m2 l2 w3-center">%</b>
								</div>
							</div>
							<div class="w3-col s12 m2 l2 w3-padding-small">
								<div class="w3-col s12 m12 l12">
									<label class="w3-text-grey"><b>Long Test </b></label> 
								</div>
								<div class="w3-col s12 m12 l12">
									<input type="number" name="2ndLong" class="w3-col s10 m10 l10 w3-padding-small w3-border-white w3-border w3-round w3-border w3-border-theme" placeholder="ex: 20"  maxlength="2" min="00" max="100" onkeyup="Fields('2ndGrading','2ndTotal');Required();" required value="<?=$row2["percentage_in_longtest"]?>"><b class="w3-padding-top w3-col s2 m2 l2 w3-center">%</b>
								</div>
							</div>
							<div class="w3-col s12 m2 l2 w3-padding-small">
								<div class="w3-col s12 m12 l12">
									<label class="w3-text-grey"><b>Assignment </b></label> 
								</div>
								<div class="w3-col s12 m12 l12">
									<input type="number" name="2ndAss" class="w3-col s10 m10 l10 w3-padding-small w3-border-white w3-border w3-round w3-border w3-border-theme" placeholder="ex: 20"  maxlength="2" min="00" max="100" onkeyup="Fields('2ndGrading','2ndTotal');Required();" required value="<?=$row2["percentage_in_assignment"]?>"><b class="w3-padding-top w3-col s2 m2 l2 w3-center">%</b>
								</div>
							</div>
							<div class="w3-col s12 m2 l2 w3-padding-small">
								<div class="w3-col s12 m12 l12">
									<label class="w3-text-grey"><b>Exam </b></label> 
								</div>
								<div class="w3-col s12 m12 l12">
									<input type="number" name="2ndExam" class="w3-col s10 m10 l10 w3-padding-small w3-border-white w3-border w3-round w3-border w3-border-theme" placeholder="ex: 20"  maxlength="2" min="00" max="100" onkeyup="Fields('2ndGrading','2ndTotal');Required();" required value="<?=$row2["percentage_in_exam"]?>"><b class="w3-padding-top w3-col s2 m2 l2 w3-center">%</b>
								</div>
							</div>
							<div class="w3-col s12 m2 l2 w3-padding-small">
								<div class="w3-col s12 m12 l12">
									<label class="w3-text-grey"><b>Practical Exam </b></label> 
								</div>
								<div class="w3-col s12 m12 l12">
									<input type="number" name="2ndPra" class="w3-col s10 m10 l10 w3-padding-small w3-border-white w3-border w3-round w3-border w3-border-theme" placeholder="ex: 20"  maxlength="2" min="00" max="100" onkeyup="Fields('2ndGrading','2ndTotal');Required();" required value="<?=$row2["percentage_in_practicalexam"]?>"><b class="w3-padding-top w3-col s2 m2 l2 w3-center">%</b>
								</div>
							</div>
							<div class="w3-col s12 m2 l2 w3-padding-small w3-center">
								<div class="w3-col s12 m12 l12">
									<label class="w3-text-grey"><b>Total </b></label> 
								</div>
								<div class="w3-col s12 m12 l12 w3-display-container">
									<input type="number" name="s_hour" class="w3-col s12 m12 l12 w3-padding-small w3-border-white w3-border w3-round w3-border w3-center" placeholder="0%" required maxlength="3" min="100" max="100" id="2ndTotal" disabled value="100">
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
									<input type="number" name="3rdQuiz" class="w3-col s10 m10 l10 w3-padding-small w3-border-white w3-border w3-round w3-border w3-border-theme" placeholder="ex: 20"  maxlength="2" min="00" max="100" onkeyup="Fields('3rdGrading','3rdTotal');Required();" required value="<?=$row3["percentage_in_quiz"]?>"><b class="w3-padding-top w3-col s2 m2 l2 w3-center">%</b>
								</div>
							</div>
							<div class="w3-col s12 m2 l2 w3-padding-small">
								<div class="w3-col s12 m12 l12">
									<label class="w3-text-grey"><b>Long Test </b></label> 
								</div>
								<div class="w3-col s12 m12 l12">
									<input type="number" name="3rdLong" class="w3-col s10 m10 l10 w3-padding-small w3-border-white w3-border w3-round w3-border w3-border-theme" placeholder="ex: 20"  maxlength="2" min="00" max="100" onkeyup="Fields('3rdGrading','3rdTotal');Required();" required value="<?=$row3["percentage_in_longtest"]?>"><b class="w3-padding-top w3-col s2 m2 l2 w3-center">%</b>
								</div>
							</div>
							<div class="w3-col s12 m2 l2 w3-padding-small">
								<div class="w3-col s12 m12 l12">
									<label class="w3-text-grey"><b>Assignment </b></label> 
								</div>
								<div class="w3-col s12 m12 l12">
									<input type="number" name="3rdAss" class="w3-col s10 m10 l10 w3-padding-small w3-border-white w3-border w3-round w3-border w3-border-theme" placeholder="ex: 20"  maxlength="2" min="00" max="100" onkeyup="Fields('3rdGrading','3rdTotal');Required();" required  value="<?=$row3["percentage_in_assignment"]?>"><b class="w3-padding-top w3-col s2 m2 l2 w3-center">%</b>
								</div>
							</div>
							<div class="w3-col s12 m2 l2 w3-padding-small">
								<div class="w3-col s12 m12 l12">
									<label class="w3-text-grey"><b>Exam </b></label> 
								</div>
								<div class="w3-col s12 m12 l12">
									<input type="number" name="3rdExam" class="w3-col s10 m10 l10 w3-padding-small w3-border-white w3-border w3-round w3-border w3-border-theme" placeholder="ex: 20"  maxlength="2" min="00" max="100" onkeyup="Fields('3rdGrading','3rdTotal');Required();" required value="<?=$row3["percentage_in_exam"]?>"><b class="w3-padding-top w3-col s2 m2 l2 w3-center">%</b>
								</div>
							</div>
							<div class="w3-col s12 m2 l2 w3-padding-small">
								<div class="w3-col s12 m12 l12">
									<label class="w3-text-grey"><b>Practical Exam </b></label> 
								</div>
								<div class="w3-col s12 m12 l12">
									<input type="number" name="3rdPra" class="w3-col s10 m10 l10 w3-padding-small w3-border-white w3-border w3-round w3-border w3-border-theme" placeholder="ex: 20"  maxlength="2" min="00" max="100" onkeyup="Fields('3rdGrading','3rdTotal');Required();" required value="<?=$row3["percentage_in_practicalexam"]?>"><b class="w3-padding-top w3-col s2 m2 l2 w3-center">%</b>
								</div>
							</div>
							<div class="w3-col s12 m2 l2 w3-padding-small w3-center">
								<div class="w3-col s12 m12 l12">
									<label class="w3-text-grey"><b>Total </b></label> 
								</div>
								<div class="w3-col s12 m12 l12 w3-display-container">
									<input type="number" name="s_hour" class="w3-col s12 m12 l12 w3-padding-small w3-border-white w3-border w3-round w3-border w3-center" placeholder="0%" required maxlength="3" min="100" max="100" id="3rdTotal" disabled value="100">
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
									<input type="number" name="4thQuiz" class="w3-col s10 m10 l10 w3-padding-small w3-border-white w3-border w3-round w3-border w3-border-theme" placeholder="ex: 20"  maxlength="2" min="00" max="100" onkeyup="Fields('4thGrading','4thTotal');Required();" required value="<?=$row4["percentage_in_quiz"]?>"><b class="w3-padding-top w3-col s2 m2 l2 w3-center">%</b>
								</div>
							</div>
							<div class="w3-col s12 m2 l2 w3-padding-small">
								<div class="w3-col s12 m12 l12">
									<label class="w3-text-grey"><b>Long Test </b></label> 
								</div>
								<div class="w3-col s12 m12 l12">
									<input type="number" name="4thLong" class="w3-col s10 m10 l10 w3-padding-small w3-border-white w3-border w3-round w3-border w3-border-theme" placeholder="ex: 20"  maxlength="2" min="00" max="100" onkeyup="Fields('4thGrading','4thTotal');Required();" required value="<?=$row4["percentage_in_longtest"]?>"><b class="w3-padding-top w3-col s2 m2 l2 w3-center">%</b>
								</div>
							</div>
							<div class="w3-col s12 m2 l2 w3-padding-small">
								<div class="w3-col s12 m12 l12">
									<label class="w3-text-grey"><b>Assignment </b></label> 
								</div>
								<div class="w3-col s12 m12 l12">
									<input type="number" name="4thAss" class="w3-col s10 m10 l10 w3-padding-small w3-border-white w3-border w3-round w3-border w3-border-theme" placeholder="ex: 20"  maxlength="2" min="00" max="100" onkeyup="Fields('4thGrading','4thTotal');Required();" required value="<?=$row4["percentage_in_assignment"]?>"><b class="w3-padding-top w3-col s2 m2 l2 w3-center">%</b>
								</div>
							</div>
							<div class="w3-col s12 m2 l2 w3-padding-small">
								<div class="w3-col s12 m12 l12">
									<label class="w3-text-grey"><b>Exam </b></label> 
								</div>
								<div class="w3-col s12 m12 l12">
									<input type="number" name="4thExam" class="w3-col s10 m10 l10 w3-padding-small w3-border-white w3-border w3-round w3-border w3-border-theme" placeholder="ex: 20"  maxlength="2" min="00" max="100" onkeyup="Fields('4thGrading','4thTotal');Required();" required value="<?=$row4["percentage_in_exam"]?>"><b class="w3-padding-top w3-col s2 m2 l2 w3-center">%</b>
								</div>
							</div>
							<div class="w3-col s12 m2 l2 w3-padding-small">
								<div class="w3-col s12 m12 l12">
									<label class="w3-text-grey"><b>Practical Exam </b></label> 
								</div>
								<div class="w3-col s12 m12 l12">
									<input type="number" name="4thPra" class="w3-col s10 m10 l10 w3-padding-small w3-border-white w3-border w3-round w3-border w3-border-theme" placeholder="ex: 20"  maxlength="2" min="00" max="100" onkeyup="Fields('4thGrading','4thTotal');Required();" required value="<?=$row4["percentage_in_practicalexam"]?>"><b class="w3-padding-top w3-col s2 m2 l2 w3-center">%</b>
								</div>
							</div>
							<div class="w3-col s12 m2 l2 w3-padding-small w3-center">
								<div class="w3-col s12 m12 l12">
									<label class="w3-text-grey"><b>Total </b></label> 
								</div>
								<div class="w3-col s12 m12 l12 w3-display-container">
									<input type="number" name="s_hour" class="w3-col s12 m12 l12 w3-padding-small w3-border-white w3-border w3-round w3-border w3-center" placeholder="0%" required maxlength="3" min="100" max="100" id="4thTotal" disabled value="100">
								</div>
							</div>
					</div> 
		<div class="w3-col s12 m12 l12 w3-padding-medium w3-grey w3-margin-top">
			<button id="btnAddsub" type="submit" name="submit" class="w3-btn w3-padding-large w3-round w3-green w3-right" onclick="send('update-subject','../libraries/php-func/update-subject.php','modalContainer')"  disabled><i class="fa fa-save"></i> Save Updates</button>
		</div>
	</form>
</div>