<?php
	include("connection.php");
	$query_percentage = $con->query("select * from tbl_percentage where subject_id='".$_POST["subject_id"]."' and quarter='".$_POST["quarter"]."'");
	$row_percentage = $query_percentage->fetch();
		
	$err = 0;
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
		$query_save = "insert into tbl_grades(student_id,quarter,subject_id,grade,class_id,type)values('".$_POST["student_id"]."','".$_POST["quarter"]."','".$_POST["subject_id"]."','".filter_var($_POST["grade"], FILTER_SANITIZE_NUMBER_FLOAT,
	FILTER_FLAG_ALLOW_FRACTION)."','".$_POST["class_id"]."','".$_POST["type"]."')";
		try{
			$con->exec($query_save);
			?>
			<script>window.location.assign('students.php?msg=<p class="w3-green  w3-padding-medium w3-animate-top"><i class="fa fa-check"></i> Grade is successfully added</p>');</script>
			<?php
		}catch(PDOException $e){
			echo '<p class="w3-red w3-padding-medium w3-animate-top  w3-margin"><i class="fa fa-warning"></i>'.$e->getMessage().'</p>';
		}
	}else{
		echo '<p class="w3-red w3-padding-medium w3-animate-top w3-margin"><i class="fa fa-warning"></i>The percentage of <b class="w3-text-theme">'.$_POST["type"].'</b> is zero it must greater than zero</p>';
	}
	
?>