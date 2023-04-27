<?php
	include("connection.php");
	if(!empty($_GET["class_id"])){
		$search = "";
		if(!empty($_GET["search"])){
			$search = "where fname like'".$_GET["search"]."%' or lname like'".$_GET["search"]."%' or mname like'".$_GET["search"]."%'";
		}
		$query = $con->query("select * from tbl_students $search order by lname ASC");
		$total = 0;
			while($row = $query->fetch()){
				$query_class = $con->query("select * from tbl_class_students where stud_id='".$row["tbl_id"]."' and class_id='".$_GET["class_id"]."'");
				$rowC = $query_class->rowCount();
				if($rowC == 0){
					$total++;
				?> 
					<tr id="subjecRow<?=$row["tbl_id"];?>" class="w3-hover-grey w3-animate-fade w3-text-black">
						<td><?=ucfirst($row["lname"]).", ".ucfirst($row["fname"])." ".ucfirst($row["mname"]).".";?></td> 
						<td><?=$row["gender"];?></td>
						<td><button type="button" class="w3-btn w3-padding-small w3-green" onclick="loadContent('classStudents','../libraries/php-func/add-student-in-class.php?stud_id=<?=$row["tbl_id"];?>&class_id=<?=$_GET["class_id"];?>');$('#subjecRow<?=$row["tbl_id"];?>').hide();"><b class="fa fa-plus w3-xlarge"></b></button></td>
					</tr> 
				<?php
				}
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