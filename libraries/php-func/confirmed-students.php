
<?php
	include("connection.php");
	if(!empty($_POST["search"])){
		$search = $_POST["search"];
		$searchtxt = "and fname like '$search%' or account_status='Accepted' and mname like '$search%' or account_status='Accepted' and lname like '$search%'";
	}else{
		$searchtxt = "";
	}
	if(!empty($_POST["limit"])){
		$limit = $_POST["limit"];
	}else{
		$limit = 25;
	}
	$query_confirmed = $con->query("select * from tbl_students where account_status='Accepted' $searchtxt order by fname ASC limit $limit");
	$count = 0;
	while($row_confirmed = $query_confirmed->fetch()){ 
		$count++;
		?>
		<tr id="rowAccepted<?=$row_confirmed["tbl_id"];?>">
			<td class=" w3-border-right"><?=$row_confirmed["fname"];?></td>
			<td class=" w3-border-right"><?=$row_confirmed["mname"];?></td>
			<td class=" w3-border-right"><?=$row_confirmed["lname"];?></td>
			<td class=" w3-border-right"><?=$row_confirmed["gender"];?></td>
			<td class=" w3-border-right w3-center">
				<button type="button" class="w3-btn w3-padding-small w3-theme-dark w3-btn-block" onclick="loadModalContent('view-student-profile','../libraries/php-func/view-student-profile.php?tbl_id=<?=$row_confirmed["tbl_id"];?>','view-student')"><i class="fa fa-user"></i> View</button>
			</td> 
		</tr>  
		<?php
	} 
	
	$query_confirmed_students = $con->query("select count(tbl_id)as Rowcount from tbl_students where account_status='Accepted'");
	$row_confirmed_students = $query_confirmed_students->fetch();
?>

<tr >
	<td colspan="5" class="w3-padding-medium w3-grey">
	Showing <b><?php if($count == 0){echo"0";}else{echo"1";}?></b> to <b ><?=$count;?></b> of <b><?=$row_confirmed_students["Rowcount"];?></b> entries
	</td>
</tr>