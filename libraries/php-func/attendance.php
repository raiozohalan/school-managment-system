<?php
	include("connection.php");
	$query = $con->query("select * from tbl_attendance where class_id='".$_GET["class_id"]."' and stud_id='".$_GET["stud_id"]."' and type='".$_GET["type"]."'");
	$rowCount = $query->rowCount();
	if($rowCount > 0){
		$data = $_GET["col"]."='".$_GET["val"]."'";
		$querySave = $con->prepare("update tbl_attendance set $data where class_id='".$_GET["class_id"]."' and stud_id='".$_GET["stud_id"]."' and type='".$_GET["type"]."'");
		if($querySave->execute()){ 
			echo filter_var($_GET["val"], FILTER_SANITIZE_NUMBER_FLOAT,
	FILTER_FLAG_ALLOW_FRACTION);
		}
	}else{ 
		$col = $_GET["col"];
		$querySave1 = $con->prepare("insert into tbl_attendance ($col ,class_id,stud_id,type)values('".$_GET["val"]."','".$_GET["class_id"]."','".$_GET["stud_id"]."','".$_GET["type"]."')");
		if($querySave1->execute()){
			echo filter_var($_GET["val"], FILTER_SANITIZE_NUMBER_FLOAT,
	FILTER_FLAG_ALLOW_FRACTION);
		}
	}
?>