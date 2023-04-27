
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
			$searchtxt = " where subject_title like '$search%'"; 
	}else{
		$searchtxt = "";
	}
	$query_subjects = $con->query("select * from tbl_subjects $searchtxt order by subject_title ASC limit $limit");
	$count = 0;
	while($row_subjects = $query_subjects->fetch()){ 
		$count++;
		$query_faculty = $con->query("select * from tbl_faculty where tbl_id='".$row_subjects["faculty_id"]."'");
		$row_faculty = $query_faculty->fetch();
		?>
		<tr id="rowPending<?=$row_subjects["tbl_id"];?>">
			<td class=" w3-border-right"><?=$row_subjects["subject_code"];?></td>
			<td class=" w3-border-right"><?=$row_subjects["subject_title"];?></td> 
			<td class=" w3-border-right"><?=$row_subjects["units"];?></td> 
			<td class=" w3-border-right"><?=ucfirst($row_faculty["fname"])." ".ucfirst($row_faculty["mname"])." ".ucfirst($row_faculty["lname"]);?></td>  
			<td class=" w3-border-right w3-center">
				<button type="button" class="w3-btn w3-padding-small w3-orange w3-text-white " onclick="loadModalContent('modalContainer','../libraries/php-func/view-subject.php?tbl_id=<?=$row_subjects["tbl_id"];?>','modalContainer')"><i class="fa fa-info"></i> Details</button>
				<button type="button" class="w3-btn w3-padding-small w3-green " onclick="loadModalContent('modalContainer','../libraries/php-func/edit-subject.php?tbl_id=<?=$row_subjects["tbl_id"];?>','modalContainer')"><i class="fa fa-edit"></i> Edit</button>
				<button type="button" class="w3-btn w3-padding-small w3-red " onclick="loadModalContent('modalContainer','../libraries/php-func/confirm-delete-subject.php?tbl_id=<?=$row_subjects["tbl_id"];?>','modalContainer')"><i class="fa fa-trash"></i> Delete</button>
			</td> 
		</tr>  
		<?php
	} 
	
	$query_subjects_count = $con->query("select count(tbl_id)as Rowcount from tbl_subjects");
	$row_subjectsCount = $query_subjects_count->fetch();
?>

<tr >
	<td colspan="7" class="w3-padding-medium w3-grey">
	Showing <b><?php if($count == 0){echo"0";}else{echo"1";}?></b> to <b ><?=$count;?></b> of <b><?=$row_subjectsCount["Rowcount"];?></b> entries
	</td>
</tr>