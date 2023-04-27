
<?php
	include("connection.php");
	if(!empty($_POST["search"])){
		$search = $_POST["search"];
		$searchtxt = "where fname like '$search%' or  mname like '$search%' or lname like '$search%'";
	}else{
		$searchtxt = "";
	}
	$limit = "";
	if(!empty($_POST["limit"])){
		$limit = $_POST["limit"];
	}else{
		$limit = 25;
	}
	$query = $con->query("select * from tbl_admin $searchtxt order by fname DESC limit $limit");
	$count = 0;
	while($row = $query->fetch()){ 
		$count++;
		?>
		<tr id="rowPending<?=$row["tbl_id"];?>">
			<td class=" w3-border-right"><?=$row["fname"];?></td>
			<td class=" w3-border-right"><?=$row["mname"];?></td>
			<td class=" w3-border-right"><?=$row["lname"];?></td> 
			<td class=" w3-border-right"><?=$row["position"];?></td>
			<td class=" w3-border-right"><?=$row["username"];?></td>
			<td class=" w3-border-right w3-center">
				<button type="button" class="w3-btn w3-padding-small w3-green" onclick="loadModalContent('adminEdit','../libraries/php-func/edit-admin.php?tbl_id=<?=$row["tbl_id"];?>','adminEdit')"><i class="fa fa-edit"></i> Edit</button>
				<button type="button" class="w3-btn w3-padding-small w3-red " onclick="loadModalContent('adminDelete','../libraries/php-func/confirm-admin-delete.php?tbl_id=<?=$row["tbl_id"];?>','adminDelete')"><i class="fa fa-trash"></i> Delete</button>
			</td> 
		</tr>  
		<?php
	} 
	
	$query_admins = $con->query("select count(tbl_id)as Rowcount from tbl_admin");
	$row_admins = $query_admins->fetch();
?>

<tr >
	<td colspan="7" class="w3-padding-medium w3-grey">
	Showing <b><?php if($count == 0){echo"0";}else{echo"1";}?></b> to <b ><?=$count;?></b> of <b><?=$row_admins["Rowcount"];?></b> entries
	</td>
</tr>