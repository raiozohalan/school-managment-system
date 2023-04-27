<?php
	include("libraries/php-func/main-func.php");
	include("libraries/php-func/connection.php");
	head("ABOUT US","home");
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
				<a href="about-us.php" class="w3-btn w3-theme w3-padding-medium w3-hover-theme w3-text-white"><i class="fa fa-info-circle w3-xlarge"></i> <b>ABOUT US</b></a>
				<a href="contact-us.php" class="w3-btn w3-white w3-padding-medium w3-hover-theme w3-text-theme"><i class="fa fa-phone-square w3-xlarge"></i> <b>CONTACT US</b></a>
				<a href="news-and-events.php" class="w3-btn w3-white w3-padding-medium w3-hover-theme w3-text-theme"><i class="fa fa-flag w3-xlarge"></i> <b>NEWS & EVENTS</b></a>
			</div>
			
			
			<?php
				$query_about = $con->query("select * from tbl_about_us order by tbl_id ASC");
				while($rowabout = $query_about->fetch()){
			?>
			<div class="w3-padding-medium w3-white w3-round w3-col s12 m12 l12 w3-center w3-margin-top">
				<h4><b class="w3-text-theme"><i class="fa fa-info-circle w3-xlarge"></i> <?=$rowabout["title"];?></b></h4>
				<div class="w3-clear"></div>
			<?php
				if(file_exists($rowabout["picture"]) && !empty($rowabout["picture"])){
					echo '<img src="'.$rowabout["picture"].'" width="100%" height="auto" >';
				}else{
					if(!empty($rowabout["picture"])){
						echo '<img src="images/img-error.png" class="w3-black" style="padding:10px 10px 30px 10px;" width="auto" height="200px"><div class="w3-clear"></div><b class="w3-padding-small w3-col s12 m12 l12" style="margin-top:-25px;position:relative;color:red;">';?>Image doesn't exists</b>
						<?php
					}						
				}
					
			?>
				<p class="w3-col s12 m12 l12 w3-left-align w3-padding-small w3-margin-top w3-justify w3-margin-bottom" style="text-indent: 50px;white-space: pre-wrap;"><?=$rowabout["content"];?></p>			
			</div>
			<?php
				}
			?>
			
			
		</div>
	</div>
<?php
	footer("home");
?>