<?php
	include("connection.php");
	$sy = "";
	if(!empty($_GET["sy"])){
		$sy = "where tbl_class.sy = '".$_GET["sy"]."'";
	}
	$count = 0;
	$query = $con->query("select * from tbl_class left join tbl_faculty on tbl_class.adviser_id = tbl_faculty.tbl_id $sy order by tbl_class.sy ASC");
	while($row = $query->fetch()){
		$count++;
		?>
		<tr class="w3-white w3-hover-grey" >
			<td><?=$row["sy"];?></td> 
			<td><?=$row["ys"];?></td>
			<td><?=ucfirst($row["lname"]).", ".ucfirst($row["fname"])." ".ucfirst($row["lname"]).".";?></td>
			<td><?=$row["curriculum"];?></td>
			<td>
				<button type="button" onclick="loadContent('classDetails','../libraries/php-func/view-class-details.php?class_id=<?=$row["class_id"];?>');$('#classListContainer').hide();$('#classDetails').show();" class="w3-btn w3-green" title="View"><i class="fa fa-chevron-right"></i></button>
				<button type="button" onclick="loadModalContent('StudentModal','../libraries/php-func/confirm-class-delete.php?class_id=<?=$row["class_id"];?>','StudentModal')" class="w3-btn w3-red" title="delete"><i class="fa fa-trash"></i></button>
			</td>
		</tr>
		<?php
	}
	if($count == 0){
		?>
		<tr class="w3-white">
			<td colspan="5" class="w3-center">No Data Found</td>  
		</tr>
		<?php
	}
?>