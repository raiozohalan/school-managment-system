<?php
	include("connection.php");
	if( !empty($_GET["quarter"]) && !empty($_GET["subject_id"]) ){
		$query = $con->query("select * from tbl_percentage where quarter='".$_GET["quarter"]."' and subject_id='".$_GET["subject_id"]."'");
		$row = $query->fetch();
		$err = 0;
		if($row["percentage_in_quiz"] > 0){
			?><option>Quiz</option> <?php
		}else{
			$err+=1;
		}
		if($row["percentage_in_longtest"] > 0){
			?><option>Long Test</option> <?php
		}else{
			$err+=1;
		}
		if($row["percentage_in_assignment"] > 0){
			?><option>Assignment</option> <?php
		}else{
			$err+=1;
		}
		if($row["percentage_in_exam"] > 0){
			?><option>Exam</option> <?php
		}else{
			$err+=1;
		}
		if($row["percentage_in_practicalexam"] > 0){
			?><option>Practical Exam</option> <?php
		}else{
			$err+=1;
		}
		if($err == 5){
			?><option value="" disabled>No Data Found</option> <?php
		}
	}else{
		?><option value="" disabled>Invalid Data</option> <?php
	}
?>