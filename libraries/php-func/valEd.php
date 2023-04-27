<?php
	include("connection.php");
	$query = $con->query("select * from tbl_values_ed where class_id='".$_GET["class_id"]."' and stud_id='".$_GET["stud_id"]."' and quarter='".$_GET["quarter"]."'");
	$rowCount = $query->rowCount();
	if($rowCount > 0){
		$data = $_GET["col"]."='".$_GET["val"]."'";
		$querySave = $con->prepare("update tbl_values_ed set $data where class_id='".$_GET["class_id"]."' and stud_id='".$_GET["stud_id"]."' and quarter='".$_GET["quarter"]."'");
		if($querySave->execute()){ 
			echo $_GET["val"];
		}
	}else{ 
		$col = $_GET["col"];
		$querySave1 = $con->prepare("insert into tbl_values_ed ($col ,class_id,stud_id,quarter)values('".$_GET["val"]."','".$_GET["class_id"]."','".$_GET["stud_id"]."','".$_GET["quarter"]."')");
		if($querySave1->execute()){
			echo $_GET["val"];
		}
	}
?>