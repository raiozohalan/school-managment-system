<?php
	include("connection.php");
	if(!empty($_GET["tbl_id"])){
		$query = $con->prepare("delete from tbl_class_subjects where tbl_id='".$_GET["tbl_id"]."'");
		if($query->execute()){ 
			include("tbl-subjects.php");
		}else{
			?>
			<tr>
				<td colspan="3" class="w3-center w3-text-black">Error deleting subject in class</td>
			</tr>
			<?php
		}
	}else{
		?>
		<tr>
			<td colspan="3" class="w3-center w3-text-black">Empty reference</td>
		</tr> 
		<?php
	}
?>