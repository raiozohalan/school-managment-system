<?php
	include("connection.php");
	try{
		$query = "delete from tbl_grades where tbl_id='".$_GET["tbl_id"]."'"; 
		$con->exec($query); 
		
		echo '<p class="w3-green w3-padding-medium w3-margin-0"><i class="fa fa-check"></i> Success Deleting the subject</p>';
	}catch(PDOException $e){
		echo  '<p class="w3-red w3-padding-medium w3-margin-0"><i class="fa fa-warning"></i> '.$e->getMessage().'</p>';
	}

?>
<button type="button" onclick="$('#gradesModalConfirmation').fadeOut();loadContent('ViewGradeDetails','../libraries/php-func/view-grades-details.php?student_id=<?=$_GET["student_id"];?>&class_id=<?=$_GET["class_id"];?>&subject_id=<?=$_GET["subject_id"];?>');" class="w3-btn w3-padding-medium w3-grey w3-section w3-round"  ><i class="fa fa-close"></i> Close</button>