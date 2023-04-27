<?php
	include("connection.php");
	session_start();
	$query_stud_info = $con->query("select * from tbl_students where tbl_id='".$_GET["student_id"]."'");
	$row_student = $query_stud_info->fetch();
	?>
	<button class="w3-btn w3-padding-medium w3-margin-0 w3-display-topright w3-theme w3-hover-grey w3-text-white w3-border w3-border-theme w3-large" onclick="$('#ViewGradeDetails').hide();$('#profileDetails').show();loadContent('view-student-profile','../libraries/php-func/view-student-profile.php?tbl_id=<?=$_GET["student_id"];?>&class_id=<?=$_GET["class_id"];?>');" style="z-index:888;"><i class="fa fa-chevron-left"></i> Back</button>
	<h3 class="w3-padding-small w3-col s9 m9 l9 w3-transparent  w3-margin-0"><b><?=ucfirst($row_student["fname"])." ".ucfirst($row_student["mname"])." ".ucfirst($row_student["lname"]);?></b></h3> 
	<hr class="w3-col s12 m12 l12 w3-border-theme w3-padding-small w3-margin-0">
		<div id="trGradesDetailsResponse"></div>
	<div class="w3-col s12 m12 l12 w3-padding-medium" style="overflow-x:auto;"> 
		<table class="w3-table w3-bordered w3-border w3-white w3-display-container">
			<thead>
				<tr class="w3-theme-dark">
					<th class=" w3-border-right ">Quarter</th>
					<th class=" w3-border-right ">Subject</th>
					<th class=" w3-border-right ">Type</th>
					<th class=" w3-border-right ">Grade</th>
					<th class="">Date Added</th> 
					<th class="">Action</th> 
				</tr>
			</thead>
			<tbody >
		<?php
		$query_grades = $con->query("select tbl_grades.quarter,tbl_grades.tbl_id,tbl_grades.type,tbl_grades.grade,tbl_subjects.subject_title,tbl_grades.date_added,tbl_subjects.faculty_id from tbl_grades left join tbl_subjects on tbl_grades.subject_id = tbl_subjects.tbl_id where tbl_grades.class_id='".$_GET["class_id"]."' and tbl_grades.student_id='".$_GET["student_id"]."' and tbl_grades.subject_id='".$_GET["subject_id"]."' order by tbl_grades.quarter ASC");
		while($row_grades = $query_grades->fetch()){
			?>
			<tr >
				<td class=" w3-border-right  "><?=$row_grades["quarter"];?></td> 
				<td class=" w3-border-right  "><?=$row_grades["subject_title"];?></td> 
				<td class=" w3-border-right  "><?=$row_grades["type"];?></td> 
				<td class=" w3-border-right  "><?=$row_grades["grade"];?></td> 
				<td class="w3-border-right "><?=date("h:m a M d,Y",strtotime($row_grades["date_added"]));?></td> 
				<td class="">
				<?php
					if(!empty($_SESSION["faculty_id"]) && $_SESSION["faculty_id"] == $row_grades["faculty_id"] || !empty($_SESSION["admin_id"])){
				?>
					<button type="button" class="w3-btn w3-padding-small w3-col s12 m6 l6 w3-green"  onclick="loadContent('trGradesDetailsResponse','../libraries/php-func/edit-grade.php?tbl_id=<?=$row_grades["tbl_id"];?>&student_id=<?=$_GET["student_id"];?>');"><i class="fa fa-edit"></i> Edit</button><button type="button" class="w3-btn w3-padding-small w3-col s12 m6 l6 w3-red" onclick="loadContent('trGradesDetailsResponse','../libraries/php-func/confirm-delete-grades.php?tbl_id=<?=$row_grades["tbl_id"];?>&class_id=<?=$_GET["class_id"];?>&student_id=<?=$_GET["student_id"];?>&subject_id=<?=$_GET["subject_id"];?>');"><i class="fa fa-trash"></i> Delete</button> 
				<?php } ?>
				</td>
			</tr>
			<?php
		}
?>
			</tbody >
		</table >
		<br>
	</div >