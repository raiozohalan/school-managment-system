<?php
	if(!empty($_GET["tbl_id"])){
		include("connection.php");
		try{
			$query_update =  "update tbl_students set account_status='Accepted' where tbl_id='".$_GET["tbl_id"]."'";
			$con->exec($query_update);
			?>  
			<div id="messageModal2" class="w3-modal w3-animate-zoom w3-padding-0" style="background:rgba(0,0,0,0.90);display:block;z-index:1000;"> 
				<div class="w3-modal-content w3-card-8 w3-animate-zoom w3-round w3-border w3-border-white w3-padding-0" style="max-width:600px;margin-top:200px;overflow:hidden;">
					<div class="w3-padding-medium w3-theme w3-col s12 m12 l12">
						<h3>Message</h3>
					</div>
					<div class="w3-padding-medium w3-white w3-col s12 m12 l12">
						<p>Account Successfully Confirmed</p>
						<button class="w3-btn w3-padding-medium w3-grey w3-section w3-round" type="button" onclick="$('#messageModal2').hide();loadContent('PendingStudList','../libraries/php-func/pending-students.php?limit=25');"><i class="fa fa-close"></i> Close</button> 
					</div>
				</div>
			</div>
			<?php
		}catch(PDOException $e){
			?> 
			<div id="messageModal1" class="w3-modal w3-animate-zoom w3-padding-0" style="background:rgba(0,0,0,0.90);display:block;z-index:1000;"> 
				<div class="w3-modal-content w3-card-8 w3-animate-zoom w3-round w3-border w3-border-white w3-padding-0" style="max-width:600px;margin-top:200px;overflow:hidden;">
					<div class="w3-padding-medium w3-theme w3-col s12 m12 l12">
						<h3>Message</h3>
					</div>
					<div class="w3-padding-medium w3-white w3-col s12 m12 l12">
						<p><?=$e->getMessage();?></p>
						<button class="w3-btn w3-padding-medium w3-grey w3-section w3-round" type="button" onclick="$('#messageModal1').hide();loadContent('PendingStudList','../libraries/php-func/pending-students.php?limit=25');"><i class="fa fa-close"></i> Close</button> 
					</div>
				</div>
			</div>
			<?php
		}
		
	}
?>