<?php
	include("connection.php");
	$query = $con->query("select * from tbl_subjects where tbl_id='".$_GET["tbl_id"]."'"); 
	$row = $query->fetch(); 
	
?>

<div class="w3-modal-content w3-card-8 w3-animate-zoom w3-padding-0 w3-transparent" style="width:95%;overflow:hidden;">
	<div class="w3-padding-0 w3-transparent w3-col s12 m12 l12">
		<button type="button" class="w3-btn w3-padding-medium w3-transparent w3-hover-white w3-right w3-right" onclick="$('#modalContainer').fadeOut();" ><i class="fa fa-close"></i> Close</button>
	</div>
	<div class="w3-clear"></div>
	<div class="w3-white w3-col s12 m12 l12 w3-card-4 w3-margin-0 w3-padding-small" > 
		<div class="w3-col s12 m6 l6 w3-white">
			<div class="w3-col s12 m12 l12 w3-padding-medium">
				<label><b>Subject Code :</b> <?=$row["subject_code"];?></label> 
			</div>
			<div class="w3-col s12 m12 l12 w3-padding-medium">
				<label><b>Subject Descriptive Title :</b> <?=$row["subject_title"];?></label>  
			</div>
			<div class="w3-col s12 m12 l12 w3-padding-medium">
				<label><b>Subject Units / Credits :</b> <?=$row["units"];?></label>  
			</div> 
			
		</div>
		<div class="w3-col s12 m6 l6 w3-white">
		
			<div class="w3-col s12 m12 l12 w3-padding-medium">
				<?php
					$query_faculty = $con->query("select * from tbl_faculty where tbl_id='".$row["faculty_id"]."' order by fname");
					$row_faculty = $query_faculty->fetch();
				?>
				<label><b>Instructor :</b> <?=ucfirst($row_faculty["fname"])." ".ucfirst($row_faculty["mname"])." ".ucfirst($row_faculty["lname"]);?></label>  
			</div>
			<div class="w3-col s12 m12 l12 w3-padding-medium">
				<label><b>Schedule</b> ( Hour:Minutes Maridiem)</label> 
				<div class="w3-clear"></div>
				<div class="w3-col s12 m12 l12 w3-padding-small">
					<div class="w3-col s12 m12 l12">
						<label><b>Start Time :</b> <?=$row["start_time"];?></label> 
					</div>  
					<div class="w3-col s12 m12 l12">
						<label><b>End Time :</b> <?=$row["end_time"];?></label> 
					</div>  
				</div> 
			</div>
			
		</div>
		<hr class="w3-col s12 m12 l12 w3-padding-0 w3-border-theme">
		<div class="w3-clear"></div>
		<?php
			$query1 = $con->query("select * from tbl_percentage where quarter ='1st Grading' and subject_id='".$_GET["tbl_id"]."'");
			$row1 = $query1->fetch();
			$query2 = $con->query("select * from tbl_percentage where quarter ='2nd Grading' and subject_id='".$_GET["tbl_id"]."'");
			$row2 = $query2->fetch();
			$query3 = $con->query("select * from tbl_percentage where quarter ='3rd Grading' and subject_id='".$_GET["tbl_id"]."'");
			$row3 = $query3->fetch();
			$query4 = $con->query("select * from tbl_percentage where quarter ='4th Grading' and subject_id='".$_GET["tbl_id"]."'");
			$row4 = $query4->fetch();
		?>
		<div class="w3-col s12 m3 l3 w3-display-container w3-padding-small" style="overflow-x:auto;">
			<label><b>Rating for 1st Grading</label> 
			<table class="w3-table w3-bordered w3-border w3-white w3-display-container">
				<thead>
					<tr class="w3-theme-dark">
						<th class=" w3-border-right">Type</th>
						<th class=" w3-border-right">Weight</th>  
					</tr>
				</thead>
				<tbody>
					<tr >
						<td class=" w3-border-right">Quiz</td>
						<td class=" w3-border-right"><?=$row1["percentage_in_quiz"]?>%</td>
					</tr>
					<tr >
						<td class=" w3-border-right">Long Test</td>
						<td class=" w3-border-right"><?=$row1["percentage_in_longtest"]?>%</td>
					</tr>
					<tr >
						<td class=" w3-border-right">Assignment</td>
						<td class=" w3-border-right"><?=$row1["percentage_in_assignment"]?>%</td>
					</tr>
					<tr >
						<td class=" w3-border-right">Exam</td>
						<td class=" w3-border-right"><?=$row1["percentage_in_exam"]?>%</td>
					</tr>
					<tr >
						<td class=" w3-border-right">Practical Exam</td>
						<td class=" w3-border-right"><?=$row1["percentage_in_practicalexam"]?>%</td>
					</tr>
					<tr class="w3-grey">
						<td class=" w3-border-right">Total</td>
						<td class=" w3-border-right">100%</td>
					</tr>
				</tbody>
			</table>
		</div>
		<div class="w3-col s12 m3 l3 w3-display-container  w3-padding-small" style="overflow-x:auto;">
			<label><b>Rating for 2nd Grading</label> 
			<table class="w3-table w3-bordered w3-border w3-white w3-display-container">
				<thead>
					<tr class="w3-theme-dark">
						<th class=" w3-border-right">Type</th>
						<th class=" w3-border-right">Weight</th>  
					</tr>
				</thead>
				<tbody>
					<tr >
						<td class=" w3-border-right">Quiz</td>
						<td class=" w3-border-right"><?=$row2["percentage_in_quiz"]?>%</td>
					</tr>
					<tr >
						<td class=" w3-border-right">Long Test</td>
						<td class=" w3-border-right"><?=$row2["percentage_in_longtest"]?>%</td>
					</tr>
					<tr >
						<td class=" w3-border-right">Assignment</td>
						<td class=" w3-border-right"><?=$row2["percentage_in_assignment"]?>%</td>
					</tr>
					<tr >
						<td class=" w3-border-right">Exam</td>
						<td class=" w3-border-right"><?=$row2["percentage_in_exam"]?>%</td>
					</tr>
					<tr >
						<td class=" w3-border-right">Practical Exam</td>
						<td class=" w3-border-right"><?=$row2["percentage_in_practicalexam"]?>%</td>
					</tr>
					<tr class="w3-grey">
						<td class=" w3-border-right">Total</td>
						<td class=" w3-border-right">100%</td>
					</tr>
				</tbody>
			</table>
		</div>	
		<div class="w3-col s12 m3 l3 w3-display-container w3-padding-small" style="overflow-x:auto;">
			<label><b>Rating for 3rd Grading</label> 
			<table class="w3-table w3-bordered w3-border w3-white w3-display-container">
				<thead>
					<tr class="w3-theme-dark">
						<th class=" w3-border-right">Type</th>
						<th class=" w3-border-right">Weight</th>  
					</tr>
				</thead>
				<tbody>
					<tr >
						<td class=" w3-border-right">Quiz</td>
						<td class=" w3-border-right"><?=$row3["percentage_in_quiz"]?>%</td>
					</tr>
					<tr >
						<td class=" w3-border-right">Long Test</td>
						<td class=" w3-border-right"><?=$row3["percentage_in_longtest"]?>%</td>
					</tr>
					<tr >
						<td class=" w3-border-right">Assignment</td>
						<td class=" w3-border-right"><?=$row3["percentage_in_assignment"]?>%</td>
					</tr>
					<tr >
						<td class=" w3-border-right">Exam</td>
						<td class=" w3-border-right"><?=$row3["percentage_in_exam"]?>%</td>
					</tr>
					<tr >
						<td class=" w3-border-right">Practical Exam</td>
						<td class=" w3-border-right"><?=$row3["percentage_in_practicalexam"]?>%</td>
					</tr>
					<tr class="w3-grey">
						<td class=" w3-border-right">Total</td>
						<td class=" w3-border-right">100%</td>
					</tr>
				</tbody>
			</table>
		</div>
		<div class="w3-col s12 m3 l3 w3-display-container w3-padding-small" style="overflow-x:auto;">
			<label><b>Rating for 4th Grading</label> 
			<table class="w3-table w3-bordered w3-border w3-white w3-display-container">
				<thead>
					<tr class="w3-theme-dark">
						<th class=" w3-border-right">Type</th>
						<th class=" w3-border-right">Weight</th>  
					</tr>
				</thead>
				<tbody>
					<tr >
						<td class=" w3-border-right">Quiz</td>
						<td class=" w3-border-right"><?=$row4["percentage_in_quiz"]?>%</td>
					</tr>
					<tr >
						<td class=" w3-border-right">Long Test</td>
						<td class=" w3-border-right"><?=$row4["percentage_in_longtest"]?>%</td>
					</tr>
					<tr >
						<td class=" w3-border-right">Assignment</td>
						<td class=" w3-border-right"><?=$row4["percentage_in_assignment"]?>%</td>
					</tr>
					<tr >
						<td class=" w3-border-right">Exam</td>
						<td class=" w3-border-right"><?=$row4["percentage_in_exam"]?>%</td>
					</tr>
					<tr >
						<td class=" w3-border-right">Practical Exam</td>
						<td class=" w3-border-right"><?=$row4["percentage_in_practicalexam"]?>%</td>
					</tr>
					<tr class="w3-grey">
						<td class=" w3-border-right">Total</td>
						<td class=" w3-border-right">100%</td>
					</tr>
				</tbody>
			</table>
		</div>
		
	</div>
</div>