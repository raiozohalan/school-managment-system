<?php
	include("connection.php");
	
	$starttime = $_POST["s_hour"].":".$_POST["s_minute"]." ".$_POST["s_maridiem"];
	$endtime = $_POST["e_hour"].":".$_POST["e_minute"]." ".$_POST["e_maridiem"];
	$query = "insert into tbl_subjects(subject_code,subject_title,faculty_id,start_time,end_time,units)values('".$_POST["subject_code"]."','".$_POST["subject_title"]."','".$_POST["faculty_id"]."','".$starttime."','".$endtime."','".$_POST["units"]."')";
	try{
		$con->exec($query);
		$tblid = $con->lastInsertId();
		
		$query1 = "insert into tbl_percentage(subject_id,quarter,percentage_in_quiz,percentage_in_longtest,percentage_in_assignment,percentage_in_exam,percentage_in_practicalexam)values('".$tblid."','1st Grading','".$_POST["1stQuiz"]."','".$_POST["1stLong"]."','".$_POST["1stAss"]."','".$_POST["1stExam"]."','".$_POST["1stPra"]."')";
		$con->exec($query1);
		
		$query2 = "insert into tbl_percentage(subject_id,quarter,percentage_in_quiz,percentage_in_longtest,percentage_in_assignment,percentage_in_exam,percentage_in_practicalexam)values('".$tblid."','2nd Grading','".$_POST["2ndQuiz"]."','".$_POST["2ndLong"]."','".$_POST["2ndAss"]."','".$_POST["2ndExam"]."','".$_POST["2ndPra"]."')";
		$con->exec($query2);
		
		$query3 = "insert into tbl_percentage(subject_id,quarter,percentage_in_quiz,percentage_in_longtest,percentage_in_assignment,percentage_in_exam,percentage_in_practicalexam)values('".$tblid."','3rd Grading','".$_POST["3rdQuiz"]."','".$_POST["3rdLong"]."','".$_POST["3rdAss"]."','".$_POST["3rdExam"]."','".$_POST["3rdPra"]."')";
		$con->exec($query3);
		
		$query4 = "insert into tbl_percentage(subject_id,quarter,percentage_in_quiz,percentage_in_longtest,percentage_in_assignment,percentage_in_exam,percentage_in_practicalexam)values('".$tblid."','4th Grading','".$_POST["4thQuiz"]."','".$_POST["4thLong"]."','".$_POST["4thAss"]."','".$_POST["4thExam"]."','".$_POST["4thPra"]."')";
		$con->exec($query4);
		?>
		<script>
			window.location.assign('add-subject.php?msg=<p class="w3-green w3-padding-medium w3-margin-0"><i class="fa fa-check"></i> New subject is added</p>');
		</script>
		<?php
	}catch(PDOException $e){
		?>
		<p class="w3-red w3-padding-medium w3-margin-0"><i class="fa fa-warning"></i> <?=$e->getMessage();?></p>
		<?php
	}
?>