<?php
	include("../libraries/php-func/main-func.php");
	include("../libraries/php-func/faculty-session.php");
	head("View Subject","");
?>
	<div class="w3-col s12 m12 l12 w3-theme w3-padding-0" style="height:100%;">
		<div class="w3-col s10 m3 l3 w3-border-right w3-border-light-grey w3-card-8 w3-theme-dark w3-animate-left" style="height:100%;position:fixed;z-index:998;" id="navigationBar">
			<div class="w3-clear"></div> 
			<button class="w3-btn w3-transparent w3-padding-large w3-hover-theme w3-text-theme w3-hide-large w3-hide-medium w3-display-topright" onclick="$('#navigationBar').fadeOut();"><i class="fa fa-close w3-xlarge"></i></button>
			<h3 class="w3-center w3-margin-0 w3-black w3-padding-top w3-padding-bottom">
				<b class=" w3-margin-0 w3-text-white" style="background:rgba(0,0,0,0.70);">Faculty Panel</b>
			</h3>
			
			<script>
				function drpMenu(container){
					$('#'+container).toggle();
				}
			</script>
			<div class="w3-padding-top" style="height:auto;max-height:68%;min-height:auto;overflow-x:hidden;overflow-y:auto;">
				<a href="profile.php" class="w3-padding-medium w3-left-align w3-col s12 m12 l12 w3-btn w3-hover-white w3-transparent"><i class=" fa fa-user w3-xlarge"></i> <?=ucfirst($row["fname"])." ".ucfirst($row["mname"])." ".ucfirst($row["lname"]);?></a>
				<a href="students.php" class="w3-padding-medium w3-left-align w3-col s12 m12 l12 w3-btn w3-hover-white w3-transparent"><i class=" fa fa-users w3-xlarge "></i> Students</a> 
				<a href="news-and-events.php" class="w3-padding-medium w3-left-align w3-col s12 m12 l12 w3-btn w3-hover-white w3-transparent"><i class=" fa fa-flag w3-xlarge"></i> News & Events</a> 
				<a href="my-subjects.php" class="w3-padding-medium w3-left-align w3-col s12 m12 l12 w3-btn w3-hover-white w3-white"><i class=" fa fa-tasks w3-xlarge"></i> My Subjects</a> 
			</div>
		</div>
		<div class="w3-col s12 m9 l9 w3-padding-0 w3-right w3-margin-0 " >
			<div class="w3-padding-0 w3-col s12 m12 l12 w3-center w3-theme-dark w3-margin-0 w3-display-container w3-animate-right w3-border-bottom w3-border-white">
				<button class="w3-left w3-btn w3-padding-medium w3-theme w3-hide-large w3-hide-medium w3-hover-white" onclick="$('#navigationBar').fadeIn();"><i class="fa fa-reorder w3-xlarge" ></i></button>
				<a href="../libraries/php-func/faculty-logout.php" class="w3-right w3-btn w3-padding-medium w3-theme w3-hover-white w3-hide-small"><i class="fa fa-sign-out" ></i> Logout</a>
				<a href="../libraries/php-func/faculty-logout.php" class="w3-right w3-btn w3-padding-medium w3-theme w3-hide-large w3-hide-medium w3-hover-white"><i class="fa fa-sign-out w3-xlarge" ></i></a>
				
				<h3 class="w3-margin-0 w3-display-middle w3-padding-0 w3-text-white w3-col s8  m8 l8"><b>Integrated Academy</b></h3>
			</div>
			<style>
				.hover-underline{
					text-decoration: none;
				}
				.hover-underline:hover{
					text-decoration: underline;
				}
				
			</style>
			<script>
						function Fields(formID,totalTxtObj){
							var formCount = document.getElementById(formID);
							var total= 0 ;
							var i;
							document.getElementById(totalTxtObj).value= 0; 
							for (i = 0; i < formCount.getElementsByTagName("input").length ;i++) { 
								if(formCount.getElementsByTagName("input")[i].disabled == false){
									total+=Number(formCount.getElementsByTagName("input")[i].value); 
								}
							}  
							document.getElementById(totalTxtObj).value=total;  
						} 
						function Required(){
							var formCount = document.getElementById('update-subject');
							var err= 0 ;
							var i;
							for (i = 0; i < formCount.getElementsByTagName("input").length ;i++) { 
								if(formCount.getElementsByTagName("input")[i].value == ""){
									err+=1; 
								}
							}  
							var stTotal = document.getElementById('1stTotal');
							var ndTotal = document.getElementById('2ndTotal');
							var rdTotal = document.getElementById('3rdTotal');
							var thTotal = document.getElementById('4thTotal');
							if(err == 0 && stTotal.value == 100 && ndTotal.value == 100 && rdTotal.value == 100 && thTotal.value == 100){
								document.getElementById('btnAddsub').disabled = false;
							}else{
								document.getElementById('btnAddsub').disabled = true;
							}
						} 
					</script>
			<div class="w3-padding-large w3-col s12 m12 l12 w3-margin-top">
				<div class="w3-padding-medium w3-col s12 m12 l12 w3-white"><a class="w3-padding-small w3-white">My Subjects</a> 
				</div>
			</div>
			<div id="modalContainer" class="w3-modal w3-animate-zoom w3-padding-0" style="background:rgba(0,0,0,0.90);display:none;z-index:999;"> 
			</div>
			<div class="w3-padding-medium w3-col s12 m12 l12 w3-theme">
				<div class="w3-col s12 m12 l12 w3-padding-small">
					<div class="w3-col s12 m12 l12">
						<h3 class="w3-col s12 m3 l3 w3-margin-0">Subject List</h3>
						<form class="w3-col s12 m9 l9" action="../libraries/php-func/my-subjects.php" method="POST" id="studentSearch">
							<button type="submit" name="submit"  class="w3-btn w3-padding-small w3-green w3-border w3-border-theme-dark w3-right " onclick="send('studentSearch','../libraries/php-func/my-subjects.php','studentsList')"><i class="fa fa-search"></i> Search</button>
							<select name="limit"  class="w3-btn w3-medium w3-white w3-border w3-border-theme-dark w3-right ">
								<option>25</option>
								<option>50</option>
								<option>100</option>
								<option>250</option>
								<option>500</option>
							</select> 
							<input type="search" name="search" class="w3-input w3-padding-small w3-border w3-border-theme-dark w3-col s5 m4 l4 w3-right" placeholder="Search" >
						</form>
					</div> 
					<div class="w3-col s12 m12 l12 w3-display-container" style="overflow-x:auto;">
						<table class="w3-table w3-bordered w3-border w3-white w3-display-container">
							<thead>
								<tr class="w3-theme-dark">
									<th class=" w3-border-right">Subject Code</th>
									<th class=" w3-border-right">Subject Title</th> 
									<th class=" w3-border-right">Units</th>
									<th class=" w3-border-right">Faculty</th>  
									<th>Action</th>
								</tr>
							</thead>
							<tbody id="studentsList">
							</tbody>
						</table>
					</div>
				</div>
			</div>
			
			<script>
				document.body.onload = loadContent('studentsList','../libraries/php-func/my-subjects.php'); 
			</script>
			<?php
				footer("");
			?>
		</div>
	</div>  
