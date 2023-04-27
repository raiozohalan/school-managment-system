<?php
	include("libraries/php-func/main-func.php");
	include("libraries/php-func/connection.php");
	head("CONTACT US","home");
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
				<a href="gallery.php" class="w3-btn w3-theme w3-padding-medium w3-hover-theme w3-text-white"><i class="fa fa-image w3-xlarge"></i> <b>GALLERY</b></a>
				<a href="about-us.php" class="w3-btn w3-white w3-padding-medium w3-hover-theme w3-text-theme"><i class="fa fa-info-circle w3-xlarge"></i> <b>ABOUT US</b></a>
				<a href="contact-us.php" class="w3-btn w3-white w3-padding-medium w3-hover-theme w3-text-theme"><i class="fa fa-phone-square w3-xlarge"></i> <b>CONTACT US</b></a>
				<a href="news-and-events.php" class="w3-btn w3-white w3-padding-medium w3-hover-theme w3-text-theme"><i class="fa fa-flag w3-xlarge"></i> <b>NEWS & EVENTS</b></a>
			</div>
			
			<style>
				#gallery-container{
					width:24%;
					margin:6px;
					padding:5px
					transition:box-shadow 2s;
				}
				#gallery-container:hover img{
					box-shadow:2px 0px 10px black;
				}
				.gallery-img{
					margin-left:auto;
					margin-right:auto;
					margin-top:10px;
					margin-bottom:10px;
					height:200px;
					min-height:200px;
					max-height:200px;
					width:auto;
					min-width:auto;
					min-width:auto;
				}
				.w3-banned{
					cursor:no;
				}
			</style>
			<div class="w3-padding-medium w3-col s12 m12 l12 w3-white w3-round w3-margin-top w3-center">
				<h4><b class="w3-text-theme"><i class="fa fa-flag w3-xlarge"></i> News & Events Pictures</b></h4>
				<div class="w3-clear"></div>
				<?php
					$query = $con->query("select * from tbl_news_and_events");
					while($row = $query->fetch()){
						if(file_exists($row["picture"])){
					?>
						<div class="w3-btn w3-col s12 m4 l4 w3-border w3-round w3-border-theme w3-padding-small w3-hover-theme w3-light-grey" id="gallery-container" onclick="viewImage('<?=$row["picture"];?>');">
							<img src="<?=$row["picture"];?>" class="gallery-img">
						</div>
					<?php
						}
					}
				?> 
			</div>
			
			<div class="w3-padding-medium w3-col s12 m12 l12 w3-white w3-round w3-margin-top w3-center">
				<h4><b class="w3-text-theme"><i class="fa fa-info-circle w3-xlarge"></i> About Us Pictures</b></h4>
				<div class="w3-clear"></div>
				<?php
					$query = $con->query("select * from tbl_about_us");
					while($row = $query->fetch()){
						if(file_exists($row["picture"])){
					?>
						<div class="w3-btn w3-col s12 m4 l4 w3-border w3-round w3-border-theme w3-padding-small w3-hover-theme w3-light-grey" id="gallery-container" onclick="viewImage('<?=$row["picture"];?>');">
							<img src="<?=$row["picture"];?>" class="gallery-img">
						</div>
					<?php
						}
					}
				?> 
			</div>
			
			<div class="w3-padding-medium w3-col s12 m12 l12 w3-white w3-round w3-margin-top w3-center">
				<h4><b class="w3-text-theme"><i class="fa fa-image w3-xlarge"></i> Slider Pictures</b></h4>
				<div class="w3-clear"></div>
				<?php
					$directory = "images/slider-pictures/";
					$imagelist = scandir($directory,1);
					$imageCount = count($imagelist)-2; 
					$x = 0;
					while($x < $imageCount){ 
						if(file_exists($directory.$imagelist[$x])){
					?>
						<div class="w3-btn w3-col s12 m4 l4 w3-border w3-round w3-border-theme w3-padding-small w3-hover-theme w3-light-grey" id="gallery-container" onclick="viewImage('<?=$directory.$imagelist[$x];?>');">
							<img src="<?=$directory.$imagelist[$x];?>" class="gallery-img">
						</div>
					<?php
						}
						$x++;
					}
				?> 
			</div>
			
		</div>
	</div> 
<?php
	footer("home");
?>