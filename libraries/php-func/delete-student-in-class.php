<?php
	include("connection.php");
	if(!empty($_GET["class_id"]) && !empty($_GET["tbl_id"])){
		$query = $con->prepare("delete from tbl_class_students where tbl_id='".$_GET["tbl_id"]."'");
		if($query->execute()){
			include("tbl-students.php");
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