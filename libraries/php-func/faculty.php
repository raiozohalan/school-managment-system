
<?php
	include("connection.php");
	$searchtxt = ""; 
	if(!empty($_POST["limit"])){
		$limit = $_POST["limit"];
	}else{
		$limit = 25;
	}
	if(!empty($_POST["search"])){
		$search = $_POST["search"]; 
			$searchtxt = " where fname like '$search%' or mname like '$search%' or lname like '$search%'"; 
	}else{
		$searchtxt = "";
	}
	$query_faculty = $con->query("select * from tbl_faculty $searchtxt order by fname ASC limit $limit");
	$count = 0;
	while($row = $query_faculty->fetch()){ 
		$count++;
		?>
		<tr id="rowPending<?=$row["tbl_id"];?>">
			<td class=" w3-border-right"><?=$row["fname"];?></td>
			<td class=" w3-border-right"><?=$row["mname"];?></td>
			<td class=" w3-border-right"><?=$row["lname"];?></td>
			<td class=" w3-border-right"><?=$row["gender"];?></td> 
			<td class=" w3-border-right"><?=$row["address"];?></td> 
			<td class=" w3-border-right"><?=$row["position"];?></td> 
			<td class=" w3-border-right"><?=$row["username"];?></td> 
			<td class=" w3-border-right w3-center">
				<button type="button" class="w3-btn w3-padding-small w3-green w3-col s6 m6 l6" onclick="loadModalContent('FacultyEditResponse','../libraries/php-func/edit-faculty.php?tbl_id=<?=$row["tbl_id"];?>','FacultyEdit')"><i class="fa fa-edit"></i> Edit</button>
				<button type="button" class="w3-btn w3-padding-small w3-red w3-col s6 m6 l6 " onclick="loadModalContent('FacultyModal','../libraries/php-func/confirm-faculty-delete.php?tbl_id=<?=$row["tbl_id"];?>','FacultyModal')"><i class="fa fa-trash"></i> Delete</button>
			</td> 
		</tr>  
		<?php
	} 
	
	$query_faculty_count = $con->query("select count(tbl_id)as Rowcount from tbl_faculty");
	$row_faculty = $query_faculty_count->fetch();
?>

<tr >
	<td colspan="8" class="w3-padding-medium w3-grey">
	Showing <b><?php if($count == 0){echo"0";}else{echo"1";}?></b> to <b ><?=$count;?></b> of <b><?=$row_faculty["Rowcount"];?></b> entries
	</td>
</tr>