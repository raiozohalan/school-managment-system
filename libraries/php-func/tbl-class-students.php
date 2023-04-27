<?php
	include("connection.php");
	if(!empty($_GET["class_id"])){ 
		$query = $con->query("select tbl_students.fname,tbl_students.lname,tbl_students.mname,tbl_class_students.tbl_id,tbl_students.gender from tbl_class_students left join tbl_students on tbl_class_students.stud_id = tbl_students.tbl_id where tbl_class_students.class_id='".$_GET["class_id"]."' order by tbl_students.lname ASC");
		$total = 0;
			while($row = $query->fetch()){ 
				$total++;
				?> 
					<tr id="subjecRow<?=$row["tbl_id"];?>" class="w3-hover-grey w3-animate-fade w3-text-black">
						<td><?=ucfirst($row["lname"]).", ".ucfirst($row["fname"])." ".ucfirst($row["mname"]).".";?></td> 
						<td><?=$row["gender"];?></td>
						<td><button type="button" class="w3-btn w3-padding-small w3-red" onclick="loadContent('studentList','../libraries/php-func/delete-student-in-class.php?tbl_id=<?=$row["tbl_id"];?>&class_id=<?=$_GET["class_id"];?>');$('#subjecRow<?=$row["tbl_id"];?>').hide();"><b class="fa fa-trash w3-xlarge"></b></button></td>
					</tr> 
				<?php 
			}
		
		if($total == 0){
			?>
			<tr>
			<td colspan="3" class="w3-center w3-text-black">Empty Data</td>
			</tr>
			<?php
		}
	}else{
		?> 
			<tr>
			<td colspan="3" class="w3-center w3-text-black">Empty Class ID</td>
			</tr> 
		<?php
	}
?>