
			<div class="w3-col s12 m12 l12 w3-padding-0">
				<h3 class="w3-col s4 m4 l4 w3-margin-0 w3-padding-small w3-grey w3-center w3-border-right w3-border-black"><b>1. Class Details</b> <i class="fa fa-chevron-right"></i> </h3>
				<h3 class="w3-col s4 m4 l4 w3-margin-0 w3-padding-small w3-grey w3-center w3-border-right w3-border-black"><b>2. Add Subjects</b> <i class="fa fa-chevron-right"></i> </h3>
				<h3 class="w3-col s4 m4 l4 w3-margin-0 w3-padding-small w3-green w3-center"><b>3. Add Students</b> <i class="fa fa-chevron-right"></i> </h3>
			</div>
			<div class="w3-col s12 m12 l12 w3-padding-small">
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
						</tbody>
					</table>
				</div>
				<div class="w3-clear"></div>
			</div>
			<div class="w3-col s12 m12 l12 w3-padding-small">
				<a href="add-class.php?msg=Success Adding New Class" class="w3-btn w3-padding-medium w3-right w3-theme">Finish <i class="fa fa-check"></i></a>
			</div> 