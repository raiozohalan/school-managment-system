
<?php
	include("connection.php");
	if(!empty($_GET["class_id"]) && !empty($_GET["subject_id"])){
		$query = $con->prepare("insert into tbl_class_subjects(class_id,subj_id)values('".$_GET["class_id"]."','".$_GET["subject_id"]."')");
		if($query->execute()){
			include("tbl-class-subjects.php");
		}else{
			?>
			<span>Error adding subject to class</span>
			<?php
		}
	}else{
		?>
		<span>Empty reference</span>
		<?php
	}
?>