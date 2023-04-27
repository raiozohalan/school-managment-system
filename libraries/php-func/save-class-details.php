<?php
	include("connection.php");
	
	$query = $con->prepare("insert into tbl_class(sy,ys,adviser_id,curriculum)values('".$_POST["sy"]."','".$_POST["ys"]."','".$_POST["adviser"]."','".$_POST["curr"]."')");
	if($query->execute()){
		$class_id = $con->lastInsertID(); 
		?>
			<script>
				loadContent('subjects','../libraries/php-func/tbl-subjects.php?class_id=<?=$class_id;?>');
			</script>
			<div class="w3-col s12 m12 l12 w3-padding-0">
				<h3 class="w3-col s4 m4 l4 w3-margin-0 w3-padding-small w3-grey w3-center w3-border-right w3-border-black"><b>1. Class Details</b> <i class="fa fa-chevron-right"></i> </h3>
				<h3 class="w3-col s4 m4 l4 w3-margin-0 w3-padding-small w3-green w3-center w3-border-right w3-border-black"><b>2. Add Subjects</b> <i class="fa fa-chevron-right"></i> </h3>
				<h3 class="w3-col s4 m4 l4 w3-margin-0 w3-padding-small w3-grey w3-center"><b>3. Add Students</b> <i class="fa fa-chevron-right"></i> </h3>
			</div>
			<div class="w3-col s12 m12 l12 w3-padding-small">
				<div class="w3-col s12 m6 l6 w3-padding-small w3-left">
					<form method="GET" action="../libraries/php-func/tbl-subjects.php" class="w3-col s12 m12 l12 w3-padding-0"> 
						<input type="search" name="search" class="w3-col s6 m6 l6 w3-input w3-padding-small w3-border w3-border-grey w3-right" placeholder="Search Subject Title" onkeyup="loadContent('subjects','../libraries/php-func/tbl-subjects.php?class_id=<?=$class_id;?>&search='+this.value);"> 
						<b class="w3-col s4 l4 m4">Subjects</b>
					</form>
					<table class="w3-table w3-bordered w3-border w3-border-grey">
						<thead>
							<tr class="w3-theme">
								<th class="">Subject (Subject Code)</th> 
								<th>Teacher</th>
								<th></th>
							</tr>
						</thead>
						<tbody id="subjects">
						</tbody>
					</table>
				</div>
				<div class="w3-col s12 m6 l6 w3-padding-small w3-right"> 
					<b>Class Subjects</b>
					<table class="w3-table w3-bordered w3-border w3-border-grey">
						<thead>
							<tr class="w3-theme">
								<th>Subject (Subject Code)</th> 
								<th>Teacher</th>
								<th></th>
							</tr>
						</thead>
						<tbody id="classSubjects">
						</tbody>
					</table>
				</div>
				<div class="w3-clear"></div>
			</div> 

			<div class="w3-col s12 m12 l12 w3-padding-small">
				<button type="submit" onclick="loadContent('addNewClass','../libraries/php-func/add-student-to-class.php?class_id=<?=$class_id;?>')" class="w3-btn w3-padding-medium w3-right w3-theme">Next <i class="fa fa-chevron-right"></i></button>
			</div>  
		<?php
	}else{
		echo "Error saving the class";
	}
?>