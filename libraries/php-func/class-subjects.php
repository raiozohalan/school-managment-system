<?php
	if(!empty($_GET["class_id"])){
		include("connection.php");
		$x = 0;
		$search = "";
		if(!empty($_GET["faculty_id"])){
			$search = "and tbl_subjects.faculty_id = '".$_GET["faculty_id"]."'";
		}
		$query_subject = $con->query("select tbl_subjects.faculty_id,tbl_subjects.tbl_id,tbl_subjects.subject_title from tbl_subjects left join tbl_class_subjects on tbl_subjects.tbl_id = tbl_class_subjects.subj_id where tbl_class_subjects.class_id='".$_GET["class_id"]."' $search order by tbl_subjects.subject_title ASC");
		while($row_subject = $query_subject->fetch()){
			$query_teacher = $con->query("select * from tbl_faculty where tbl_id='".$row_subject["faculty_id"]."'");
			$row_teacher = $query_teacher->fetch();
			$x++; 
			?>
				<option value="<?=$row_subject["tbl_id"];?>" ><?=ucfirst($row_subject["subject_title"])." : ".ucfirst($row_teacher["fname"])." ".ucfirst($row_teacher["mname"])." ".ucfirst($row_teacher["lname"]);?></option>
			<?php
		}
		if($x == 0){
			?>
				<option value="" disabled> Empty subject</option>
			<?php
		}
	}else{
		?>
			<option value="" disabled> Empty class_id</option>
		<?php
	}
	
?>