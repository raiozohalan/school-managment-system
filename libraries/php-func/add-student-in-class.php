<?php
	include("connection.php");
	if(!empty($_GET["class_id"]) && !empty($_GET["stud_id"])){
		$query = $con->prepare("insert into tbl_class_students(class_id,stud_id)values('".$_GET["class_id"]."','".$_GET["stud_id"]."')");
		if($query->execute()){
			include("tbl-class-students.php");
		}else{
			?>
			<span>Error adding student in class</span>
			<?php
		}
	}else{
		?>
		<span>Empty reference</span>
		<?php
	}
?>