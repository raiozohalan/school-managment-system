<?php
	include("connection.php");
	try{
		$query1 = $con->prepare("delete from tbl_class where class_id='".$_GET["class_id"]."'");
		$query2 = $con->prepare("delete from tbl_class_students where class_id='".$_GET["class_id"]."'");
		$query3 = $con->prepare("delete from tbl_class_subjects where class_id='".$_GET["class_id"]."'");
		$query4 = $con->prepare("delete from tbl_grades where class_id='".$_GET["class_id"]."'");
		$query5 = $con->prepare("delete from tbl_values_ed where class_id='".$_GET["class_id"]."'");
		$query6 = $con->prepare("delete from tbl_attendance where class_id='".$_GET["class_id"]."'");
		
		if($query1->execute() && $query2->execute() && $query3->execute() && $query4->execute() && $query5->execute() && $query6->execute()){
			echo '<p class="w3-green w3-padding-medium w3-margin-0"><i class="fa fa-check"></i> Success Deleting the class</p>';
		}
	}catch(PDOException $e){
		echo  '<p class="w3-red w3-padding-medium w3-margin-0"><i class="fa fa-warning"></i> '.$e->getMessage().'</p>';
	}

?>
<button type="button" class="w3-btn w3-padding-medium w3-grey w3-section w3-round"  onclick="loadContent('classList','../libraries/php-func/view-class.php');$('#StudentModal').fadeOut();"><i class="fa fa-close"></i> Close</button>