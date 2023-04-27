<?php
	include("connection.php");
?> 
			<div class="w3-modal-content w3-card-8 w3-animate-zoom w3-round w3-border w3-border-white w3-padding-0" style="max-width:600px;margin-top:20px;overflow:hidden;">
				<div class="w3-padding-medium w3-theme w3-col s12 m12 l12">
					<h3>Message</h3>
				</div>
				<div class="w3-padding-medium w3-white w3-col s12 m12 l12" id="msgContainer123"> 
					<p>Are you sure, you want to delete the class? All data that related in this class will also deleted like grades, attendance etc.<p>
					<table class="w3-table w3-bordered w3-border w3-border-grey">
						<thead>
							<tr class="w3-theme-dark">
								<th class="">School Year</th> 
								<th>Year & Section</th>
								<th>Adviser</th>
								<th>Curriculum</th> 
							</tr>
						</thead>
						<tbody id="classList">
							<?php
								$query = $con->query("select * from tbl_class left join tbl_faculty on tbl_class.adviser_id = tbl_faculty.tbl_id where tbl_class.class_id='".$_GET["class_id"]."' order by tbl_class.sy ASC");
								$row = $query->fetch(); 
							?>
							<tr class="w3-white w3-hover-grey" >
								<td><?=$row["sy"];?></td> 
								<td><?=$row["ys"];?></td>
								<td><?=ucfirst($row["lname"]).", ".ucfirst($row["fname"])." ".ucfirst($row["lname"]).".";?></td>
								<td><?=$row["curriculum"];?></td> 
							</tr> 
						</tbody>
					</table>
					<button type="button" onclick="loadContent('msgContainer123','../libraries/php-func/delete-class.php?class_id=<?=$_GET["class_id"];?>')" class="w3-btn w3-padding-medium w3-green w3-section w3-round"  ><i class="fa fa-check"></i> Yes</button>
					<button type="button" onclick="$('#StudentModal').fadeOut();" class="w3-btn w3-padding-medium w3-grey w3-section w3-round"  ><i class="fa fa-close"></i> No</button>
				</div>
			</div>  