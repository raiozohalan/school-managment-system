<?php
	include("connection.php");
	try{
		$query = "delete from tbl_about_us where tbl_id='".$_GET["tbl_id"]."'";
		$con->exec($query);
		$picture = $_GET["picture"];
		if(file_exists("../../".$picture) && !empty($picture)){
			unlink("../../".$picture);
		}
		echo '<p class="w3-green w3-padding-medium w3-margin-0"><i class="fa fa-check"></i> Success Deleting the post</p>';
	}catch(PDOException $e){
		echo  '<p class="w3-red w3-padding-medium w3-margin-0"><i class="fa fa-warning"></i> '.$e->getMessage().'</p>';
	}

?>
<a href="about-us.php" class="w3-btn w3-padding-medium w3-grey w3-section w3-round"  ><i class="fa fa-close"></i> Close</a>