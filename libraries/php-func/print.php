
<div class="w3-col s12 m12 l12 w3-padding-0 w3-margin-bottom " style="margin-top:45px"> 
	<button type="button" class="w3-btn w3-padding-medium w3-grey w3-hover-theme" onclick="loadContent('view-student-profile','../libraries/php-func/view-student-profile.php?tbl_id=<?=$_GET["tbl_id"];?>');"><i class="fa fa-chevron-left w3-xlarge"></i> Back</button>
	<button type="button" class="w3-btn w3-padding-medium w3-green w3-hover-teal" onclick="PrintElem('<?=$_GET["tbl_id"];?>',document.getElementById('class_id').value);"><i class="fa fa-print w3-xlarge"></i> Print</button>
	<div class="w3-right w3-transparent w3-padding-0"> 
		<select name="school_year" id="class_id" class="w3-col s12 m12 l12 w3-padding-medium w3-border-white w3-border w3-round w3-border w3-border-theme" placeholder="Select school year"  onchange="document.getElementById('PrintContainer').src='../libraries/php-func/RC-print.php?tbl_id=<?=$_GET["tbl_id"];?>&class_id='+this.value;">  
			<?php
				include("connection.php");
				$query = $con->query("select * from tbl_class left join tbl_class_students on tbl_class.class_id = tbl_class_students.class_id where tbl_class_students.stud_id='".$_GET["tbl_id"]."' order by tbl_class.sy ASC");
				while($row = $query->fetch()){
					?>
					<option value="<?=$row["class_id"];?>">SY: <?=$row["sy"];?> | Year & Section: <?=$row["ys"];?></option>  
					<?php
				}
			?>
		</select> 
	</div>
</div>
<iframe src="../libraries/php-func/RC-print.php?tbl_id=<?=$_GET["tbl_id"];?>&class_id=" class="w3-col s12 m12 l12 w3-white w3-padding-small w3-margin-bottom" height="680px" id="PrintContainer">
	
</iframe>
