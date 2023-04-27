<div class="w3-col s12 m12 l12 w3-padding-0">
	<button type="button" onclick="loadContent('classList','../libraries/php-func/view-class.php?sy='+document.getElementById('schoolYear').value);$('#classListContainer').show();$('#classDetails').hide();" class="w3-btn w3-padding-medium w3-left w3-white w3-hover-grey"><i class="fa fa-chevron-left"></i> Back</button> 
</div>
<?php
	if(!empty($_GET["class_id"])){
	include("connection.php");
	$query = $con->query("select * from tbl_class where class_id='".$_GET["class_id"]."'");
	$row = $query->fetch();
?>

<form method="POST" action="../libraries/php-func/update-class-details.php" id="class-details" class="w3-white w3-margin-top w3-col s12 m12 l12">
	<h3 class="w3-margin-0 w3-padding-small w3-dark-grey">Class Details</h3>
	<div id="updateResponse"></div>
	<input type="hidden" name="class_id" value="<?=$_GET["class_id"];?>" required>
	<div class="w3-col s6 m6 l6 w3-padding-small">
		<label>Year & Section</label>
		<input type="text" id="ys" name="ys" value="<?=$row["ys"];?>" class="w3-input w3-padding-medium w3-border w3-border-theme w3-round" required>
	</div>
	<div class="w3-col s6 m6 l6 w3-padding-small">
		<label>Curriculum</label>
		<input type="text" id="cu" name="curr" value="<?=$row["curriculum"];?>" class="w3-input w3-padding-medium w3-border w3-border-theme w3-round" required>
	</div>
	<div class="w3-col s6 m6 l6 w3-padding-small">
		<label>School Year</label>
		<select name="sy" id="sy" class="w3-input w3-padding-medium w3-border w3-border-theme w3-round" required>
			<option selected disabled value="">Select School Year</option>
			<?php
				$sy = date("2000");
				for($i = 0 ;$i <= 30; $i++){
					$shyear = $sy."-".$sy+=1;
				?>
					<option <?php if($shyear == $row["sy"]){echo "selected";}?> ><?=$shyear;?></option>
				<?php
				}
			?>
		</select>
	</div>
	<div class="w3-col s6 m6 l6 w3-padding-small">
		<label>Adviser</label>
		<select name="adviser" id="ad" class="w3-input w3-padding-medium w3-border w3-border-theme w3-round" required>
			<option selected disabled value="">Select Adviser</option>
			<?php
				include("connection.php");
				$query_adviser = $con->query("select * from tbl_faculty order by fname ASC");
				while($row_adviser = $query_adviser->fetch()){
			?>
				<option value="<?=$row_adviser["tbl_id"];?>" <?php if($row_adviser["tbl_id"] == $row["adviser_id"]){echo "selected";} ?> ><?=ucfirst($row_adviser["lname"]).", ".ucfirst($row_adviser["fname"])." ".ucfirst($row_adviser["mname"]).".";?></option>
			<?php
				}
			?>
		</select>
	</div> 
	<div class="w3-col s12 m12 l12 w3-padding-small">
		<button type="submit" onclick="send('class-details','../libraries/php-func/update-class-details.php','updateResponse');" class="w3-btn w3-padding-medium w3-right w3-theme">Save Updates <i class="fa fa-chevron-right"></i></button>
	</div>
	<br>
</form> 
<div class="w3-col s12 m12 l12 w3-padding-0 w3-white">
	<h3 class="w3-margin-0 w3-padding-small w3-dark-grey">Subjects</h3>
	<div class="w3-col s12 m6 l6 w3-padding-small w3-left">
		<form method="GET" action="../libraries/php-func/tbl-subjects.php" class="w3-col s12 m12 l12 w3-padding-0 " style="margin-bottom:5px;"> 
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
				<?php include("tbl-subjects.php"); ?>
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
				<?php include("tbl-class-subjects.php"); ?>
			</tbody>
		</table>
	</div>
	<div class="w3-clear"></div>
	<br>
</div> 
<div class="w3-col s12 m12 l12 w3-padding-0 w3-white w3-margin-top">
	<h3 class="w3-margin-0 w3-padding-small w3-dark-grey">Students</h3>
	<div class="w3-col s12 m6 l6 w3-padding-small w3-left">
					<div class="w3-col s12 m12 l12 w3-padding-0" style="margin-bottom:5px;"> 
						<input type="search" name="search" class="w3-col s6 m6 l6 w3-input w3-padding-small w3-border w3-border-grey w3-right" placeholder="Search Subject Title" onkeyup="loadContent('studentList','../libraries/php-func/tbl-students.php?class_id=<?=$_GET["class_id"];?>&search='+this.value);"> 
						<b class="w3-col s4 l4 m4">Students</b>
					</div>
					<table class="w3-table w3-bordered w3-border w3-border-grey">
						<thead>
							<tr class="w3-theme">
								<th class="">Name</th> 
								<th>Gender</th>
								<th></th>
							</tr>
						</thead>
						<tbody id="studentList">
							<?php
								include("tbl-students.php");
							?>
						</tbody>
					</table>
				</div>
				<div class="w3-col s12 m6 l6 w3-padding-small w3-right"> 
					<b>Class Students</b>
					<table class="w3-table w3-bordered w3-border w3-border-grey">
						<thead>
							<tr class="w3-theme">
								<th>Name</th> 
								<th>Gender</th>
								<th></th>
							</tr>
						</thead>
						<tbody id="classStudents">
							<?php
								include("tbl-class-students.php");
							?>
						</tbody>
					</table>
				</div>
				<div class="w3-clear"></div><br>
</div> 
	<?php  
	}else{
		echo '<center>Empty Class ID</center>';
	} ?>