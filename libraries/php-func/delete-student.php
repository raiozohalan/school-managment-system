<?php
	include("connection.php");
	try{
		$query = "delete from tbl_students where tbl_id='".$_GET["tbl_id"]."'";
		$con->exec($query);
		$picture = $_GET["picture"];
		if(file_exists("../../".$picture)){
			unlink("../../".$picture);
		}
		echo '<p class="w3-green w3-padding-medium w3-margin-0"><i class="fa fa-check"></i> Success Deleting the account</p>';
	}catch(PDOException $e){
		echo  '<p class="w3-red w3-padding-medium w3-margin-0"><i class="fa fa-warning"></i> '.$e->getMessage().'</p>';
	}

?>
<button type="button" class="w3-btn w3-padding-medium w3-grey w3-section w3-round"  onclick="loadContent('studentsList','../libraries/php-func/students.php');$('#StudentModal').fadeOut();"><i class="fa fa-close"></i> Close</button>