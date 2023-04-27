<?php
	include("connection.php");
	$query_percentage = $con->query("select * from tbl_percentage where subject_id='".$_POST["subject_id"]."' and quarter='".$_POST["quarter"]."'");
	$row_percentage = $query_percentage->fetch();
		
	$err = 0;
	$msg = "";
	if($_POST["type"] == "Quiz"){
		if($row_percentage["percentage_in_quiz"] == 0){
			$err++;
		}
	}elseif($_POST["type"] == "Long Test"){
		if($row_percentage["percentage_in_longtest"] == 0){
			$err++;
		}
	}elseif($_POST["type"] == "Assignment"){
		if($row_percentage["percentage_in_assignment"] == 0){
			$err++;
		}
	}elseif($_POST["type"] == "Exam"){
		if($row_percentage["percentage_in_exam"] == 0){
			$err++;
		}
	}elseif($_POST["type"] == "Practical Exam"){
		if($row_percentage["percentage_in_practicalexam"] == 0){
			$err++;
		}
	}
	if($err == 0){
		$query_save = "update tbl_grades set student_id='".$_POST["student_id"]."',quarter='".$_POST["quarter"]."',subject_id='".$_POST["subject_id"]."',grade='".filter_var($_POST["grade"], FILTER_SANITIZE_NUMBER_FLOAT,
	FILTER_FLAG_ALLOW_FRACTION)."',class_id='".$_POST["class_id"]."',type='".$_POST["type"]."' where tbl_id='".$_POST["tbl_id"]."'";
		try{
			$con->exec($query_save);
			$msg = '<p class="w3-green  w3-padding-medium w3-animate-top"><i class="fa fa-check"></i> Grade is successfully updated</p>';
		}catch(PDOException $e){
			$msg =  '<p class="w3-red w3-padding-medium w3-animate-top  w3-margin"><i class="fa fa-warning"></i>'.$e->getMessage().'</p>';
		}
	}else{
		$msg =  '<p class="w3-red w3-padding-medium w3-animate-top w3-margin"><i class="fa fa-warning"></i>The percentage of <b class="w3-text-theme">'.$_POST["type"].'</b> is zero it must greater than zero</p>';
	}
	
?>
<div class="w3-modal-content w3-card-8 w3-animate-zoom w3-round w3-border w3-border-white w3-padding-0" style="max-width:600px;margin-top:20px;overflow:hidden;">
	<div class="w3-padding-medium w3-theme w3-col s12 m12 l12">
		<h3>Message</h3>
	</div>
	<div class="w3-padding-medium w3-white w3-col s12 m12 l12" id="msgContainer123">
		<?=$msg;?>
		<button type="button" onclick="$('#editGradesDetails').fadeOut();loadContent('ViewGradeDetails','../libraries/php-func/view-grades-details.php?student_id=<?=$_POST["student_id"];?>&class_id=<?=$_POST["class_id"];?>&subject_id=<?=$_POST["subject_id"];?>');" class="w3-btn w3-padding-medium w3-grey w3-section w3-round"  ><i class="fa fa-close"></i> Close</button>
	</div>
</div>  