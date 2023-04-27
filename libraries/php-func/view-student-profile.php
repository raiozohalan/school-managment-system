<?php
	if(!empty($_GET["tbl_id"])){
		include("connection.php"); 
		$query = $con->query("select * from tbl_students where tbl_id='".$_GET["tbl_id"]."'");
		$row = $query->fetch();
		?> 
		<div class="w3-col s12 m1 l1 w3-container"></div>
		<div class="w3-col s12 m10 l10 w3-animate-top" id="profileDetails">
			<div class="w3-col s12 m12 l12 w3-padding-medium w3-black w3-center w3-display-container" style="height:300px;">
				<img src="../<?=$row["picture"];?>" height="100%" width="auto">
				<h3 class="w3-display-bottommiddle w3-margin-0" style="background:rgba(0,0,0,0.80);">Account Status: <b class="w3-text-orange"><?=$row["account_status"];?></b></h3>
			</div>
			<div class="w3-col s12 m12 l12 w3-light-grey ">
				<div class="w3-col s12 m6 l6 w3-padding w3-light-grey ">
					<h3 class="w3-text-grey w3-margin-0 w3-text-theme w3-border-bottom"><b>Personal Information</b></h3>
					<div class="w3-col s12 m12 l12 w3-padding-top">
						<b>First Name :</b> <?=$row["fname"];?>
					</div>
					<div class="w3-col s12 m12 l12 w3-padding-top">
						<b>Last Name :</b> <?=$row["lname"];?>
					</div>
					<div class="w3-col s12 m12 l12 w3-padding-top">
						<b>Middle Name :</b> <?=$row["mname"];?>
					</div>
					<div class="w3-col s12 m12 l12 w3-padding-top">
						<b>Gender :</b> <?=$row["gender"];?>
					</div>
					<div class="w3-col s12 m12 l12 w3-padding-top">
						<b>Birthday :</b> <?=date("F d, Y",strtotime($row["bday"]));?>
					</div>
					<div class="w3-col s12 m12 l12 w3-padding-top">
						<b>Religion :</b> <?=$row["religion"];?>
					</div>
					<div class="w3-col s12 m12 l12 w3-padding-top">
						<b>Address :</b> <?=$row["address"];?>
					</div>
					<div class="w3-col s12 m12 l12 w3-padding-top">
						<b>Mother Tongue :</b> <?=$row["mtongue"];?>
					</div>
				</div>
				<div class="w3-col s12 m6 l6 w3-padding w3-light-grey">
					<h3 class="w3-text-grey w3-margin-0 w3-text-theme w3-border-bottom"><b>Guardian Information</b></h3>
					<div class="w3-col s12 m12 l12 w3-padding-top">
						<b>Name :</b> <?=$row["guardian"];?>
					</div>
					<div class="w3-col s12 m12 l12 w3-padding-top">
						<b>Contact Number :</b> <?=$row["guardian_contact"];?>
					</div>
					<div class="w3-col s12 m12 l12 w3-padding-top">
						<b>Relationship of Guardian :</b> <?=$row["guardian_rel"];?>
					</div>
				</div>
				
				<div class="w3-col s12 m6 l6 w3-padding w3-light-grey">
					<h3 class="w3-text-grey w3-margin-0 w3-text-theme w3-border-bottom"><b>Family Information</b></h3>
					<div class="w3-col s12 m12 l12 w3-padding-top">
						<b>Mother :</b> <?=$row["mother"];?>
					</div>
					<div class="w3-col s12 m12 l12 w3-padding-top">
						<b>Father :</b> <?=$row["father"];?>
					</div>
				</div>
				<?php 
					if($row["account_status"] == "Pending"){
						?>
				<div class="w3-col s12 m12 l12 w3-padding">
					<button class="w3-btn w3-block w3-green w3-large" onclick="loadContent('rowPending<?=$_GET["tbl_id"];?>','../libraries/php-func/confirm-registration.php?tbl_id=<?=$_GET["tbl_id"];?>');$('#view-student').fadeOut();">Confirm Registration</button>
				</div>
						<?php
					}
				?>
				
			</div>
			
				
			<div class="w3-clear"></div>
			<div class="w3-col s12 m12 l12 w3-light-grey w3-padding-0 w3-margin-top w3-padding-bottom w3-margin-bottom"> 
				<h3 class="w3-margin-0 w3-padding-small w3-center w3-theme"><i class="fa fa-bar-chart"></i> Report Card</h3>
				<div class="w3-col s12 m12 l12 w3-padding-medium">
					<button type="button" class="w3-btn w3-padding-medium w3-green w3-hover-teal w3-right w3-border w3-border-green" onclick="PrintElem('<?=$_GET["tbl_id"];?>',document.getElementById('class_id').value);" <?php if(empty($_GET["class_id"])){echo "disabled";}?> id="btnPrintRC" style="margin-left:5px;"><i class="fa fa-print w3-xlarge"></i> Print</button>
					<div class="w3-right w3-transparent w3-padding-0 w3-col s8 m5 l5"> 
						<select name="school_year" id="class_id" class="w3-col s12 m12 l12 w3-padding-large w3-border-white w3-border w3-round w3-border w3-border-theme" placeholder="Select school year"  onchange="if(this.value > 0){loadContent('reportcardContainer','../libraries/php-func/report-card.php?tbl_id=<?=$_GET["tbl_id"];?>&class_id='+this.value);document.getElementById('btnPrintRC').disabled = false;}else{document.getElementById('btnPrintRC').disabled = true;}"> 
							<option value="" <?php if(empty($_GET["class_id"])){echo "selected";}?> >Select School Year</option>
							<?php 
								$query = $con->query("select * from tbl_class left join tbl_class_students on tbl_class.class_id = tbl_class_students.class_id where tbl_class_students.stud_id='".$_GET["tbl_id"]."' order by tbl_class.sy ASC");
								while($row = $query->fetch()){
									if(!empty($_GET["class_id"])){
										if($row["class_id"] == $_GET["class_id"]){
											?>
											<option value="<?=$row["class_id"];?>" selected>SY: <?=$row["sy"];?> | Year & Section: <?=$row["ys"];?></option>
											<?php 
										}else{
											?>
											<option value="<?=$row["class_id"];?>">SY: <?=$row["sy"];?> | Year & Section: <?=$row["ys"];?></option>
											<?php 
										}
									}else{
										?>
										<option value="<?=$row["class_id"];?>">SY: <?=$row["sy"];?> | Year & Section: <?=$row["ys"];?></option>
										<?php 
									}
								}
							?>
						</select> 
					</div>
				</div>
				
				<div id="reportcardContainer"> 
					<?php
						if(!empty($_GET["class_id"])){
							include("report-card.php");
						}
					?>
				</div>
			</div>
		</div>
		<div class="w3-clear"></div>
		<div class="w3-col s12 m1 l1 w3-container"></div>
		<div class="w3-col s12 m10 l10 w3-animate-bottom w3-white" id="ViewGradeDetails" style="display:none;margin-top:45px;">
			
		</div>
		<?php
	}else{
		?>
			<br>
			<br>
			<div class="w3-col s12 m4 l4 w3-container"></div>
			<div class="w3-col s12 m4 l4 w3-white w3-padding-medium">
				<b>Empty User</b>
			</div>
		<?php
	}
?>