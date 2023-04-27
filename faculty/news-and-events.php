<?php
	include("../libraries/php-func/main-func.php");
	include("../libraries/php-func/faculty-session.php");
	head("NEWS & EVENTS","");
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
				<a href="news-and-events.php" class="w3-padding-medium w3-left-align w3-col s12 m12 l12 w3-btn w3-hover-white w3-white"><i class=" fa fa-flag w3-xlarge"></i> News & Events</a> 
				<a href="my-subjects.php" class="w3-padding-medium w3-left-align w3-col s12 m12 l12 w3-btn w3-hover-white w3-transparent"><i class=" fa fa-tasks w3-xlarge"></i> My Subjects</a> 
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
				
				.news-container{
					height:auto;
					min-height:auto;
					max-height:450px;
					overflow:hidden;
				}
				.news-img{
					margin-left:auto;
					margin-right:auto;
					margin-top:10px;
					margin-bottom:10px;
					height:250px;
					min-height:250px;
					max-height:250px;
					width:auto;
					min-width:auto;
					min-width:auto;
				}
				.news-img-view{
					margin-left:auto;
					margin-right:auto;
					margin-top:10px;
					margin-bottom:10px;
					height:auto;
					min-height:auto;
					max-height:450px;
					width:auto;
					min-width:auto;
					max-width:100%;
				}
				.news-content{
					height:auto;
					min-height:auto;
					max-height:110px;
					text-overflow:ellipsis;
					overflow:hidden;
					margin-top:5px;
					margin-bottom:5px;
				}
			</style>
			<div class="w3-padding-large w3-col s12 m12 l12 w3-margin-top">
				<div class="w3-padding-medium w3-col s12 m12 l12 w3-white"><a class="w3-padding-small w3-white "> News & Events</a> 
				</div>
			</div>
			<div id="viewPost" class="w3-modal w3-animate-zoom w3-padding-0" style="background:rgba(0,0,0,0.90);display:none;z-index:999;"> 
			</div>
			<div class="w3-padding-medium w3-col s12 m12 l12">
				<div class=" w3-transparent w3-col s12 m12 l12">
					<div class="w3-padding-small w3-transparent w3-col s12 m12 l12">
						<h3 class="w3-margin-0 w3-padding-0 w3-left-align w3-col s12 m4 l4"><i class="fa fa-flag"></i> News & Events</h3>
						<form method="POST" class="w3-col s12 m8 l8 " action="../libraries/php-func/news-and-events.php" id="searchNewsAndEventsForm">
							<button type="submit" name="submit"  class="w3-btn w3-padding-small w3-green w3-border w3-border-theme-dark w3-right " onclick="send('searchNewsAndEventsForm','../libraries/php-func/news-and-events.php','newAndEvents')"><i class="fa fa-search"></i> Search</button>
							<select name="limit"  class="w3-btn w3-medium w3-white w3-border w3-border-theme-dark w3-right ">
								<option>25</option>
								<option>50</option>
								<option>100</option>
								<option>250</option>
								<option>500</option>
							</select> 
							<select name="type"  class="w3-btn w3-medium w3-white w3-border w3-border-theme-dark w3-right ">
								<option value="" selected>Type</option>
								<option>News</option>
								<option>Event</option> 
							</select> 
							<input type="search" name="search" class="w3-input w3-padding-small w3-border w3-border-theme-dark w3-col s4 m4 l4 w3-right" placeholder="Search" >
						</form>
					</div>
					<div id="newAndEvents">
					</div>
				</div>
			</div> 
			<script>
				document.body.onload = loadContent('newAndEvents','../libraries/php-func/news-and-events.php'); 
			</script> 
			<?php
				footer("");
			?>
		</div>
	</div>  
