<?php
	include("connection.php");
	$query = $con->prepare("update tbl_class set sy='".$_POST["sy"]."',ys='".$_POST["ys"]."',adviser_id='".$_POST["adviser"]."',curriculum='".$_POST["curr"]."' where class_id='".$_POST["class_id"]."'");
	if($query->execute()){
		?>
		<div id="resMsg" class="w3-padding-medium w3-green w3-col s12 m12 l12"><i class="fa fa-check"></i> Success saving your updates <i class="fa fa-close w3-right w3-xlarge w3-hover-white" onclick="$('#resMsg').hide();"></i></div>
		<?php
	}else{
		?>
		<div id="resMsg" class="w3-padding-medium w3-green w3-col s12 m12 l12"><i class="fa fa-warning"></i> Error while saving data <i class="fa fa-close w3-right w3-xlarge w3-hover-white" onclick="$('#resMsg').hide();"></i></div>
		<?php
	}
?>