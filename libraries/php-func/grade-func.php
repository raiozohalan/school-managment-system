<?php
	function genAVG($first,$second,$third,$fourth){
		$total = $first+$second+$third+$fourth;
		$count = 0;
		if($first > 0){
			$count++;
		}
		if($second > 0){
			$count++;
		}
		if($third > 0){
			$count++;
		}
		if($fourth > 0){
			$count++;
		}
		$genAVG = $total/$count;
		return round($genAVG,2);
	}
	function gradeAVG($student_id,$subject_id,$class_id,$quarter,$opt){
		include("connection.php");
		if(empty($con)){
			include("../../libraries/php-func/connection.php");
		}
		$quiz = 0;
		$longTest = 0;
		$assignment = 0;
		$exam = 0;
		$practicalExam = 0;
			
		$query_percentage = $con->query("select * from tbl_percentage where subject_id='$subject_id' and quarter='$quarter'");
		$row_percentage = $query_percentage->fetch();
		
		$quizPecentage = "0.".$row_percentage["percentage_in_quiz"];
		$longTestPecentage = "0.".$row_percentage["percentage_in_longtest"];
		$assignmentPecentage = "0.".$row_percentage["percentage_in_assignment"];
		$examPecentage = "0.".$row_percentage["percentage_in_exam"];
		$practicalExamPecentage = "0.".$row_percentage["percentage_in_practicalexam"];
											
		$query_quiz_avg = $con->query("select AVG(grade)as average from tbl_grades where subject_id='$subject_id' and student_id='$student_id' and quarter='$quarter' and type='Quiz' and class_id='$class_id'");
		$row_quiz_avg = $query_quiz_avg->fetch();
		$quiz = $row_quiz_avg["average"];
		
		$query_longtest_avg = $con->query("select AVG(grade)as average from tbl_grades where subject_id='$subject_id' and student_id='$student_id' and quarter='$quarter' and type='Long Test' and class_id='$class_id'");
		$row_longtest_avg = $query_longtest_avg->fetch();
		$longTest = $row_longtest_avg["average"];
		
		$query_assignment_avg = $con->query("select AVG(grade)as average from tbl_grades where subject_id='$subject_id' and student_id='$student_id' and quarter='$quarter' and type='Assignment' and class_id='$class_id'");
		$row_assignment_avg = $query_assignment_avg->fetch();
		$assignment = $row_assignment_avg["average"];
		
		$query_exam_avg = $con->query("select AVG(grade)as average from tbl_grades where subject_id='$subject_id' and student_id='$student_id' and quarter='$quarter' and type='Exam' and class_id='$class_id'");
		$row_exam_avg = $query_exam_avg->fetch();
		$exam = $row_exam_avg["average"];
		
		$query_practicalexam_avg = $con->query("select AVG(grade)as average from tbl_grades where subject_id='$subject_id' and student_id='$student_id' and quarter='$quarter' and type='Practical Exam' and class_id='$class_id'");
		$row_practicalexam_avg = $query_practicalexam_avg->fetch();
		$practicalExam = $row_practicalexam_avg["average"];
		
		$genAVG = $quiz*$quizPecentage+$longTest*$longTestPecentage+$assignment*$assignmentPecentage+$exam*$examPecentage+$practicalExam*$practicalExamPecentage;
		
		if($opt == "variable"){
			return round($genAVG,2);
		}elseif($opt == "none"){
			if($genAVG > 0){
				return round($genAVG,2);
			}else{
				return "";
			}
		}else{
			if($genAVG > 0){
				return round($genAVG,2);
			}else{
				return "?";
			}
		}
	}

?>