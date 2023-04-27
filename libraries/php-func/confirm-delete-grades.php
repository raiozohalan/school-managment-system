<?php
	include("connection.php");
?> 
<div id="gradesModalConfirmation" class="w3-modal w3-animate-zoom w3-padding-0" style="background:rgba(0,0,0,0.90);display:block;z-index:1000;"> 
			<div class="w3-modal-content w3-card-8 w3-animate-zoom w3-round w3-border w3-border-white w3-padding-0" style="max-width:600px;margin-top:20px;overflow:hidden;">
				<div class="w3-padding-medium w3-white w3-col s12 m12 l12" id="msgContainer123">
					<?php
						$query = $con->query("select * from tbl_grades left join tbl_subjects on tbl_grades.subject_id = tbl_subjects.tbl_id where tbl_grades.tbl_id='".$_GET["tbl_id"]."'");
						$row = $query->fetch();
					?>
					<p>You want to delete the grade?</p>
					<table class="w3-table w3-bordered w3-border w3-white w3-display-container">
						<thead>
							<tr class="w3-theme-dark">
								<th class=" w3-border-right ">Quarter</th>
								<th class=" w3-border-right ">Subject</th>
								<th class=" w3-border-right ">Type</th>
								<th class=" w3-border-right ">Grade</th>
								<th class="">Date Added</th>  
							</tr>
						</thead>
						<tbody >
						<tr>
							<td class=" w3-border-right  "><?=$row["quarter"];?></td> 
							<td class=" w3-border-right  "><?=$row["subject_title"];?></td> 
							<td class=" w3-border-right  "><?=$row["type"];?></td> 
							<td class=" w3-border-right  "><?=$row["grade"];?></td> 
							<td class="w3-border-right "><?=date("h:m a M d,Y",strtotime($row["date_added"]));?></td>  
						</tr>
						</tbody >
					</table >
					<button type="button" onclick="loadContent('msgContainer123','../libraries/php-func/delete-grades.php?tbl_id=<?=$_GET["tbl_id"];?>&student_id=<?=$_GET["student_id"];?>&class_id=<?=$_GET["class_id"];?>&subject_id=<?=$_GET["subject_id"];?>')" class="w3-btn w3-padding-medium w3-green w3-section w3-round"  ><i class="fa fa-check"></i> Yes</button>
					<button type="button" onclick="$('#gradesModalConfirmation').fadeOut();" class="w3-btn w3-padding-medium w3-grey w3-section w3-round"  ><i class="fa fa-close"></i> No</button>
				</div>
			</div>  
</div>  