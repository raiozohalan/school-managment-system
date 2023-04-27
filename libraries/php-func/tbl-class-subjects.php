<?php
	include("connection.php");
	if(!empty($_GET["class_id"])){ 
		$query = $con->query("select tbl_subjects.tbl_id as subj_id,tbl_subjects.subject_code,tbl_subjects.subject_title,tbl_faculty.fname,tbl_faculty.mname,tbl_faculty.lname from tbl_subjects left join tbl_faculty on tbl_subjects.faculty_id = tbl_faculty.tbl_id order by tbl_subjects.subject_title ASC"); 
		while($row = $query->fetch()){
			$query_class = $con->query("select * from tbl_class_subjects where subj_id='".$row["subj_id"]."' and class_id='".$_GET["class_id"]."'");
			$rowC = $query_class->rowCount();
			if($rowC == 1){ 
				$rowClass = $query_class->fetch();
			?> 
				<tr id="subjecRowS<?=$row["subj_id"];?>"class="w3-hover-grey w3-animate-fade w3-text-black">
					<td><?=$row["subject_title"];?> (<?=$row["subject_code"];?>)</td> 
					<td><?=ucfirst($row["lname"]).", ".ucfirst($row["fname"])." ".ucfirst($row["mname"]).".";?></td>
					<td><button type="button" class="w3-btn w3-padding-small w3-red" onclick="loadContent('subjects','../libraries/php-func/delete-subject-to-class.php?tbl_id=<?=$rowClass["tbl_id"];?>&class_id=<?=$_GET["class_id"];?>');$('#subjecRowS<?=$row["subj_id"];?>').hide();"><b class="fa fa-trash w3-xlarge"></b></button></td>
				</tr> 
			<?php
			}
		} 
	}else{
		?>
			<tr>
			<td colspan="3" class="w3-center w3-text-black">Empty Class ID</td>
			</tr>
		<?php 
	}
?>