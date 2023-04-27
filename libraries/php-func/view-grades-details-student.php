<?php
	include("connection.php");
	$query_faculty_info = $con->query("select * from tbl_faculty left join tbl_subjects on tbl_faculty.tbl_id = tbl_subjects.faculty_id where tbl_subjects.tbl_id='".$_GET["subject_id"]."'");
	$row_faculty_info = $query_faculty_info->fetch();
	?>
<div class="w3-col s12 m1 l1 w3-container"></div>
<div class="w3-modal-content w3-card-8 w3-animate-zoom w3-round w3-padding-0 w3-col s12 m10 l10" style="margin-top:20px;overflow:hidden;">
	<button class="w3-btn w3-padding-medium w3-margin-0 w3-display-topright w3-theme w3-hover-grey w3-text-white w3-border w3-border-theme w3-large" onclick="$('#StudentModal').hide();" style="z-index:888;"><i class="fa fa-close"></i> Close</button>
	<h3 class="w3-padding-small w3-col s9 m9 l9 w3-transparent  w3-margin-0 w3-text-theme "><b>Grades Details</b></h3> 
	<hr class="w3-col s12 m12 l12 w3-border-theme w3-padding-0 w3-margin-0">
	<div id="trGradesDetailsResponse"></div>
	<div class="w3-col s12 m12 l12 w3-padding-medium w3-light-grey w3-border-bottom w3-border-grey w3-margin-0" > 
		<p class="w3-text-theme w3-margin-0"><b>Teacher :</b> <?=ucfirst($row_faculty_info["fname"])." ".ucfirst($row_faculty_info["mname"])." ".ucfirst($row_faculty_info["lname"]);?></p>
		<p class="w3-text-theme w3-margin-0"><b>Subject Tile :</b> <?=ucfirst($row_faculty_info["subject_title"]);?></p>
	</div>
	<div class="w3-col s12 m12 l12 w3-padding-small">
		<?php
			$query1 = $con->query("select * from tbl_percentage where quarter ='1st Grading' and subject_id='".$_GET["subject_id"]."'");
			$row1 = $query1->fetch();
			$query2 = $con->query("select * from tbl_percentage where quarter ='2nd Grading' and subject_id='".$_GET["subject_id"]."'");
			$row2 = $query2->fetch();
			$query3 = $con->query("select * from tbl_percentage where quarter ='3rd Grading' and subject_id='".$_GET["subject_id"]."'");
			$row3 = $query3->fetch();
			$query4 = $con->query("select * from tbl_percentage where quarter ='4th Grading' and subject_id='".$_GET["subject_id"]."'");
			$row4 = $query4->fetch();
		?>
		<div class="w3-col s12 m3 l3 w3-display-container w3-padding-small" style="overflow-x:auto;">
			<label class="w3-text-theme"><b>Rating for 1st Grading</label> 
			<table class="w3-table w3-bordered w3-border w3-white w3-display-container">
				<thead>
					<tr class="w3-theme-dark">
						<th class=" w3-border-right">Type</th>
						<th class=" w3-border-right">Weight</th>  
					</tr>
				</thead>
				<tbody>
					<tr >
						<td class=" w3-border-right">Quiz</td>
						<td class=" w3-border-right"><?=$row1["percentage_in_quiz"]?>%</td>
					</tr>
					<tr >
						<td class=" w3-border-right">Long Test</td>
						<td class=" w3-border-right"><?=$row1["percentage_in_longtest"]?>%</td>
					</tr>
					<tr >
						<td class=" w3-border-right">Assignment</td>
						<td class=" w3-border-right"><?=$row1["percentage_in_assignment"]?>%</td>
					</tr>
					<tr >
						<td class=" w3-border-right">Exam</td>
						<td class=" w3-border-right"><?=$row1["percentage_in_exam"]?>%</td>
					</tr>
					<tr >
						<td class=" w3-border-right">Practical Exam</td>
						<td class=" w3-border-right"><?=$row1["percentage_in_practicalexam"]?>%</td>
					</tr>
					<tr class="w3-grey">
						<td class=" w3-border-right">Total</td>
						<td class=" w3-border-right">100%</td>
					</tr>
				</tbody>
			</table>
		</div>
		<div class="w3-col s12 m3 l3 w3-display-container  w3-padding-small" style="overflow-x:auto;">
			<label class="w3-text-theme"><b>Rating for 2nd Grading</label> 
			<table class="w3-table w3-bordered w3-border w3-white w3-display-container">
				<thead>
					<tr class="w3-theme-dark">
						<th class=" w3-border-right">Type</th>
						<th class=" w3-border-right">Weight</th>  
					</tr>
				</thead>
				<tbody>
					<tr >
						<td class=" w3-border-right">Quiz</td>
						<td class=" w3-border-right"><?=$row2["percentage_in_quiz"]?>%</td>
					</tr>
					<tr >
						<td class=" w3-border-right">Long Test</td>
						<td class=" w3-border-right"><?=$row2["percentage_in_longtest"]?>%</td>
					</tr>
					<tr >
						<td class=" w3-border-right">Assignment</td>
						<td class=" w3-border-right"><?=$row2["percentage_in_assignment"]?>%</td>
					</tr>
					<tr >
						<td class=" w3-border-right">Exam</td>
						<td class=" w3-border-right"><?=$row2["percentage_in_exam"]?>%</td>
					</tr>
					<tr >
						<td class=" w3-border-right">Practical Exam</td>
						<td class=" w3-border-right"><?=$row2["percentage_in_practicalexam"]?>%</td>
					</tr>
					<tr class="w3-grey">
						<td class=" w3-border-right">Total</td>
						<td class=" w3-border-right">100%</td>
					</tr>
				</tbody>
			</table>
		</div>	
		<div class="w3-col s12 m3 l3 w3-display-container w3-padding-small" style="overflow-x:auto;">
			<label class="w3-text-theme"><b>Rating for 3rd Grading</label> 
			<table class="w3-table w3-bordered w3-border w3-white w3-display-container">
				<thead>
					<tr class="w3-theme-dark">
						<th class=" w3-border-right">Type</th>
						<th class=" w3-border-right">Weight</th>  
					</tr>
				</thead>
				<tbody>
					<tr >
						<td class=" w3-border-right">Quiz</td>
						<td class=" w3-border-right"><?=$row3["percentage_in_quiz"]?>%</td>
					</tr>
					<tr >
						<td class=" w3-border-right">Long Test</td>
						<td class=" w3-border-right"><?=$row3["percentage_in_longtest"]?>%</td>
					</tr>
					<tr >
						<td class=" w3-border-right">Assignment</td>
						<td class=" w3-border-right"><?=$row3["percentage_in_assignment"]?>%</td>
					</tr>
					<tr >
						<td class=" w3-border-right">Exam</td>
						<td class=" w3-border-right"><?=$row3["percentage_in_exam"]?>%</td>
					</tr>
					<tr >
						<td class=" w3-border-right">Practical Exam</td>
						<td class=" w3-border-right"><?=$row3["percentage_in_practicalexam"]?>%</td>
					</tr>
					<tr class="w3-grey">
						<td class=" w3-border-right">Total</td>
						<td class=" w3-border-right">100%</td>
					</tr>
				</tbody>
			</table>
		</div>
		<div class="w3-col s12 m3 l3 w3-display-container w3-padding-small" style="overflow-x:auto;">
			<label class="w3-text-theme"><b>Rating for 4th Grading</label> 
			<table class="w3-table w3-bordered w3-border w3-white w3-display-container">
				<thead>
					<tr class="w3-theme-dark">
						<th class=" w3-border-right">Type</th>
						<th class=" w3-border-right">Weight</th>  
					</tr>
				</thead>
				<tbody>
					<tr >
						<td class=" w3-border-right">Quiz</td>
						<td class=" w3-border-right"><?=$row4["percentage_in_quiz"]?>%</td>
					</tr>
					<tr >
						<td class=" w3-border-right">Long Test</td>
						<td class=" w3-border-right"><?=$row4["percentage_in_longtest"]?>%</td>
					</tr>
					<tr >
						<td class=" w3-border-right">Assignment</td>
						<td class=" w3-border-right"><?=$row4["percentage_in_assignment"]?>%</td>
					</tr>
					<tr >
						<td class=" w3-border-right">Exam</td>
						<td class=" w3-border-right"><?=$row4["percentage_in_exam"]?>%</td>
					</tr>
					<tr >
						<td class=" w3-border-right">Practical Exam</td>
						<td class=" w3-border-right"><?=$row4["percentage_in_practicalexam"]?>%</td>
					</tr>
					<tr class="w3-grey">
						<td class=" w3-border-right">Total</td>
						<td class=" w3-border-right">100%</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
	<div class="w3-col s12 m12 l12 w3-padding-medium" style="overflow-x:auto;">
		<table class="w3-table w3-bordered w3-border w3-white w3-display-container">
			<thead>
				<tr class="w3-theme-dark">
					<th class=" w3-border-right ">Quarter</th>
					<th class=" w3-border-right ">Type</th>
					<th class=" w3-border-right ">Grade</th>
					<th class="">Date Added</th>  
				</tr>
			</thead>
			<tbody >
		<?php
		$query_grades = $con->query("select tbl_grades.quarter,tbl_grades.tbl_id,tbl_grades.type,tbl_grades.grade,tbl_subjects.subject_title,tbl_grades.date_added from tbl_grades left join tbl_subjects on tbl_grades.subject_id = tbl_subjects.tbl_id where tbl_grades.class_id='".$_GET["class_id"]."' and tbl_grades.student_id='".$_GET["student_id"]."' and tbl_grades.subject_id='".$_GET["subject_id"]."' order by tbl_grades.quarter ASC");
		while($row_grades = $query_grades->fetch()){
			?>
			<tr >
				<td class=" w3-border-right  "><?=$row_grades["quarter"];?></td>
				<td class=" w3-border-right  "><?=$row_grades["type"];?></td> 
				<td class=" w3-border-right  "><?=$row_grades["grade"];?></td> 
				<td class="w3-border-right "><?=date("h:m a M d,Y",strtotime($row_grades["date_added"]));?></td>  
			</tr>
			<?php
		}
?>
			</tbody >
		</table >
		<br>
	</div >
</div >