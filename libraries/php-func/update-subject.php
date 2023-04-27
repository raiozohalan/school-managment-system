<?php
	include("connection.php");
	
	$starttime = $_POST["s_hour"].":".$_POST["s_minute"]." ".$_POST["s_maridiem"];
	$endtime = $_POST["e_hour"].":".$_POST["e_minute"]." ".$_POST["e_maridiem"];
	$query = "update tbl_subjects set subject_code='".$_POST["subject_code"]."',subject_title='".$_POST["subject_title"]."',faculty_id='".$_POST["faculty_id"]."',start_time='".$starttime."',end_time='".$endtime."',units='".$_POST["units"]."' where tbl_id='".$_POST["id"]."'";
	try{
		$con->exec($query);
		$tblid = $_POST["id"];
		
		$query1 = "update tbl_percentage set percentage_in_quiz='".$_POST["1stQuiz"]."',percentage_in_longtest='".$_POST["1stLong"]."',percentage_in_assignment='".$_POST["1stAss"]."',percentage_in_exam='".$_POST["1stExam"]."',percentage_in_practicalexam='".$_POST["1stPra"]."' where subject_id='".$tblid."' and quarter='1st Grading'";
		$con->exec($query1);
		
		$query2 = "update tbl_percentage set percentage_in_quiz='".$_POST["2ndQuiz"]."',percentage_in_longtest='".$_POST["2ndLong"]."',percentage_in_assignment='".$_POST["2ndAss"]."',percentage_in_exam='".$_POST["2ndExam"]."',percentage_in_practicalexam='".$_POST["2ndPra"]."' where subject_id='".$tblid."' and quarter='2nd Grading'";
		$con->exec($query2);
		
		$query3 = "update tbl_percentage set percentage_in_quiz='".$_POST["3rdQuiz"]."',percentage_in_longtest='".$_POST["3rdLong"]."',percentage_in_assignment='".$_POST["3rdAss"]."',percentage_in_exam='".$_POST["3rdExam"]."',percentage_in_practicalexam='".$_POST["3rdPra"]."' where subject_id='".$tblid."' and quarter='3rd Grading'";
		$con->exec($query3);
		
		$query4 = "update tbl_percentage set percentage_in_quiz='".$_POST["4thQuiz"]."',percentage_in_longtest='".$_POST["4thLong"]."',percentage_in_assignment='".$_POST["4thAss"]."',percentage_in_exam='".$_POST["4thExam"]."',percentage_in_practicalexam='".$_POST["4thPra"]."' where subject_id='".$tblid."' and quarter='4th Grading'";
		$con->exec($query4);
		?>
		<script>
			window.location.assign('view-subjects.php?msg=<p class="w3-green w3-padding-medium w3-margin-0"><i class="fa fa-check"></i> Success updating the subject</p>');
		</script>
		<?php
	}catch(PDOException $e){
		?>
		<p class="w3-red w3-padding-medium w3-margin-0"><i class="fa fa-warning"></i> <?=$e->getMessage();?></p>
		<?php
	}
?>