<?php
	include("libraries/php-func/main-func.php");
	include("libraries/php-func/connection.php");
	head("NEWS & EVENTS","home");
?>
	<div class="w3-col s12 m12 l12 w3-container w3-theme">
		<div class="w3-col s12 m1 l1 w3-container"></div>
		<div class="w3-col s12 m10 l0 w3-container w3-padding-0">
			<img src="images/banner.png" width="100%">
			
			<div class="w3-clear w3-container w3-col s12 m12 l12"></div>
			<div class="w3-col s12 m12 l12 w3-margin-top">
				<a href="javascript:void:0;" class="w3-btn w3-round w3-padding-medium w3-right " style="margin-left:5px;background:#88c149;" onclick="$('#login-form').fadeIn()"><i class="fa fa-sign-in"></i> Login</a>
				<a href="register.php" class="w3-btn w3-round w3-padding-medium w3-right" style="background:#dd5600;"><i class="fa fa-list-alt"></i> Register</a>
			</div>
			<div class="w3-padding-small w3-white w3-round w3-col s12 m12 l12 w3-center w3-margin-top" >
				<a href="index.php" class="w3-btn w3-white w3-padding-medium w3-hover-theme w3-text-theme"><i class="fa fa-home w3-xlarge"></i> <b>HOME</b></a>
				<a href="gallery.php" class="w3-btn w3-white w3-padding-medium w3-hover-theme w3-text-theme"><i class="fa fa-image w3-xlarge"></i> <b>GALLERY</b></a>
				<a href="about-us.php" class="w3-btn w3-white w3-padding-medium w3-hover-theme w3-text-theme"><i class="fa fa-info-circle w3-xlarge"></i> <b>ABOUT US</b></a>
				<a href="contact-us.php" class="w3-btn w3-white w3-padding-medium w3-hover-theme w3-text-theme"><i class="fa fa-phone-square w3-xlarge"></i> <b>CONTACT US</b></a>
				<a href="news-and-events.php" class="w3-btn w3-theme w3-padding-medium w3-hover-theme w3-text-white"><i class="fa fa-flag w3-xlarge"></i> <b>NEWS & EVENTS</b></a>
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
			<div id="viewPost" class="w3-modal w3-animate-zoom w3-padding-0" style="background:rgba(0,0,0,0.90);display:none;z-index:999;"> 
			</div>
			<div class="w3-padding-0 w3-col s12 m12 l12 w3-margin-top">
				<div class=" w3-transparent w3-col s12 m12 l12">
					<div class="w3-padding-small w3-transparent w3-col s12 m12 l12">
						<h3 class="w3-margin-0 w3-padding-0 w3-left-align w3-col s12 m4 l4"><i class="fa fa-flag"></i> News & Events</h3>
						<form method="POST" class="w3-col s12 m8 l8 " action="libraries/php-func/news-and-events-home.php" id="searchNewsAndEventsForm">
							<button type="submit" name="submit"  class="w3-btn w3-padding-small w3-green w3-border w3-border-theme-dark w3-right " onclick="send('searchNewsAndEventsForm','libraries/php-func/news-and-events-home.php','newAndEvents')"><i class="fa fa-search"></i> Search</button>
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
				document.body.onload = loadContent('newAndEvents','libraries/php-func/news-and-events-home.php'); 
			</script> 	
			
			
		</div>
	</div> 
<?php
	footer("home");
?>