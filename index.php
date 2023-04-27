<?php
	include("libraries/php-func/main-func.php");
	include("libraries/php-func/connection.php");
	head("Home","home");
?>
	<div class="w3-col s12 m12 l12 w3-container w3-theme">
		<div class="w3-col s12 m1 l1 w3-container"></div>
		<div class="w3-col s12 m10 l10 w3-container w3-padding-0">
			<img src="images/banner.png" width="100%">
			
			<div class="w3-clear w3-container w3-col s12 m12 l12"></div>
			<div class="w3-col s12 m12 l12 w3-margin-top">
				<a href="javascript:void:0;" class="w3-btn w3-round w3-padding-medium w3-right " style="margin-left:5px;background:#88c149;" onclick="$('#login-form').fadeIn()"><i class="fa fa-sign-in"></i> Login</a>
				<a href="register.php" class="w3-btn w3-round w3-padding-medium w3-right" style="background:#dd5600;"><i class="fa fa-list-alt"></i> Register</a>
			</div>
			<div class="w3-padding-small w3-white w3-round w3-col s12 m12 l12 w3-center w3-margin-top" >
				<a href="index.php" class="w3-btn w3-theme w3-padding-medium w3-hover-theme"><i class="fa fa-home w3-xlarge"></i> <b>HOME</b></a>
				<a href="gallery.php" class="w3-btn w3-white w3-padding-medium w3-hover-theme w3-text-theme"><i class="fa fa-image w3-xlarge"></i> <b>GALLERY</b></a>
				<a href="about-us.php" class="w3-btn w3-white w3-padding-medium w3-hover-theme w3-text-theme"><i class="fa fa-info-circle w3-xlarge"></i> <b>ABOUT US</b></a>
				<a href="contact-us.php" class="w3-btn w3-white w3-padding-medium w3-hover-theme w3-text-theme"><i class="fa fa-phone-square w3-xlarge"></i> <b>CONTACT US</b></a>
				<a href="news-and-events.php" class="w3-btn w3-white w3-padding-medium w3-hover-theme w3-text-theme"><i class="fa fa-flag w3-xlarge"></i> <b>NEWS & EVENTS</b></a>
			</div>
			<div class="w3-padding-medium w3-white w3-round w3-col s12 m12 l12 w3-center w3-margin-top" style="height:687px;min-height:687px;max-height:687px;overflow:hidden;">
				<div class="w3-col s9 m9 l9" style="height:657px;min-height:657px;max-height:657px;overflow:hidden;margin-top:7px;margin-bottom:7px;">
					<div class="w3-col s12 m12 l12" style="position:relative;margin-bottom:-657px;background:transparent;height:657px;min-height:657px;max-height:657px;">
						<h3 class="w3-col s12 m12 l12 w3-padding-medium w3-text-white w3-left-align w3-padding-left" style="background:rgba(0,0,0,0.70);margin-top:606px;" ><b>Welcome to Integrated Academy</b></h3>
					</div>
					<img class="mySlides w3-animate-opacity" src="images/slider-pictures/1.jpg" width="100%" >
					<img class="mySlides w3-animate-opacity" src="images/slider-pictures/2.jpg" width="100%" >
					<img class="mySlides w3-animate-opacity" src="images/slider-pictures/3.jpg" width="100%" >
					<img class="mySlides w3-animate-opacity" src="images/slider-pictures/4.jpg" width="100%" >
					<img class="mySlides w3-animate-opacity" src="images/slider-pictures/5.jpg" width="100%" >
					<img class="mySlides w3-animate-opacity" src="images/slider-pictures/6.jpg" width="100%" >
					<img class="mySlides w3-animate-opacity" src="images/slider-pictures/7.jpg" width="100%" >
					<img class="mySlides w3-animate-opacity" src="images/slider-pictures/8.jpg" width="100%" >
					<img class="mySlides w3-animate-opacity" src="images/slider-pictures/9.jpg" width="100%" >
					<img class="mySlides w3-animate-opacity" src="images/slider-pictures/10.jpg" width="100%" >
					<img class="mySlides w3-animate-opacity" src="images/slider-pictures/11.jpg" width="100%" >
					<img class="mySlides w3-animate-opacity" src="images/slider-pictures/12.jpg" width="100%" >
					<img class="mySlides w3-animate-opacity" src="images/slider-pictures/13.jpg" width="100%" >
					<img class="mySlides w3-animate-opacity" src="images/slider-pictures/14.jpg" width="100%" >
					<img class="mySlides w3-animate-opacity" src="images/slider-pictures/15.jpg" width="100%" >
					<img class="mySlides w3-animate-opacity" src="images/slider-pictures/16.jpg" width="100%" >
					<div class="w3-clear"></div>
				</div>
				<style>
					#img-style{
						border-right:0px solid transparent; 
					}
					#img-style:hover{
						border-right:2px solid red;
					}
				</style>
				<div class="w3-col s3 m3 l3 w3-white" style="height:657px;min-height:657px;max-height:657px;overflow:hidden;margin-top:7px;margin-bottom:7px;">
					<div class="w3-col s6 m6 l6 " style="padding-left:5px;">
						<img src="images/slider-pictures/1.jpg" class="img-style w3-btn w3-padding-0 w3-hover-border" width="100%" height="79.5px" style="margin-bottom:3.100px;height:79.5px;max-height:79.5px;min-height:79.5px;overflow:hidden;" id="img-style" onclick="showDivs(0)"> 
						<img src="images/slider-pictures/2.jpg" class="img-style w3-btn w3-padding-0 w3-hover-border" width="100%" height="79.5px" style="margin-bottom:3.100px;" id="img-style" onclick="showDivs(1)"> 
						<img src="images/slider-pictures/3.jpg" class="img-style w3-btn w3-padding-0 w3-hover-border" width="100%" height="79.5px" style="margin-bottom:3.100px;" id="img-style" onclick="showDivs(2)"> 
						<img src="images/slider-pictures/4.jpg" class="img-style w3-btn w3-padding-0 w3-hover-border" width="100%" height="79.5px" style="margin-bottom:3.100px;" id="img-style" onclick="showDivs(3)"> 
						<img src="images/slider-pictures/5.jpg" class="img-style w3-btn w3-padding-0 w3-hover-border" width="100%" height="79.5px" style="margin-bottom:3.100px;" id="img-style" onclick="showDivs(4)"> 
						<img src="images/slider-pictures/6.jpg" class="img-style w3-btn w3-padding-0 w3-hover-border" width="100%" height="79.5px" style="margin-bottom:3.100px;" id="img-style" onclick="showDivs(5)"> 
						<img src="images/slider-pictures/7.jpg" class="img-style w3-btn w3-padding-0 w3-hover-border" width="100%" height="79.5px" style="margin-bottom:3.100px;" id="img-style" onclick="showDivs(6)"> 
						<img src="images/slider-pictures/8.jpg" class="img-style w3-btn w3-padding-0 w3-hover-border" width="100%" height="79.5px" style="margin-bottom:3.100px;" id="img-style" onclick="showDivs(7)"> 
					</div>
					<div class="w3-col s6 m6 l6 " style="padding-left:5px;">
						<img src="images/slider-pictures/9.jpg" class="img-style w3-btn w3-padding-0 w3-hover-border" width="100%" height="79.5px" style="margin-bottom:3.100px;" id="img-style" onclick="showDivs(8)"> 
						<img src="images/slider-pictures/10.jpg" class="img-style w3-btn w3-padding-0 w3-hover-border" width="100%" height="79.5px" style="margin-bottom:3.100px;" id="img-style" onclick="showDivs(9)"> 
						<img src="images/slider-pictures/11.jpg" class="img-style w3-btn w3-padding-0 w3-hover-border" width="100%" height="79.5px" style="margin-bottom:3.100px;" id="img-style" onclick="showDivs(10)"> 
						<img src="images/slider-pictures/12.jpg" class="img-style w3-btn w3-padding-0 w3-hover-border" width="100%" height="79.5px" style="margin-bottom:3.100px;" id="img-style" onclick="showDivs(11)"> 
						<img src="images/slider-pictures/13.jpg" class="img-style w3-btn w3-padding-0 w3-hover-border" width="100%" height="79.5px" style="margin-bottom:3.100px;" id="img-style" onclick="showDivs(12)"> 
						<img src="images/slider-pictures/14.jpg" class="img-style w3-btn w3-padding-0 w3-hover-border" width="100%" height="79.5px" style="margin-bottom:3.100px;" id="img-style" onclick="showDivs(13)"> 
						<img src="images/slider-pictures/15.jpg" class="img-style w3-btn w3-padding-0 w3-hover-border" width="100%" height="79.5px" style="margin-bottom:3.100px;" id="img-style" onclick="showDivs(14)"> 
						<img src="images/slider-pictures/16.jpg" class="img-style w3-btn w3-padding-0 w3-hover-border" width="100%" height="79.5px" style="margin-bottom:3.100px;" id="img-style" onclick="showDivs(15)"> 
					</div>
					<div class="w3-clear"></div>
				</div>
			</div>
			
			<div class="w3-padding-medium w3-white w3-round w3-col s12 m12 l12 w3-center w3-margin-top">
				<h4><b class="w3-text-theme"><i class="fa fa-info-circle w3-xlarge"></i> About Us</b></h4>
				<div class="w3-clear"></div>
				<?php
					$query_about = $con->query("select * from tbl_about_us order by tbl_id ASC");
					$rowabout = $query_about->fetch();
					if(file_exists($rowabout["picture"]) && !empty($rowabout["picture"])){
						echo '<img src="'.$rowabout["picture"].'" width="100%" height="auto" >';
					}else{
						if(!empty($rowabout["picture"])){
							echo '<img src="images/img-error.png" class="w3-black" style="padding:10px 10px 30px 10px;" width="auto" height="200px"><div class="w3-clear"></div><b class="w3-padding-small w3-col s12 m12 l12" style="margin-top:-25px;position:relative;color:red;">';?>Image doesn't exists</b>
							<?php
						}
					}
					
				?>
				<h3 class="w3-col s12 m12 l12 w3-left-align w3-padding-small"><b><?=$rowabout["title"];?></b></h3>
				<p class="w3-col s12 m12 l12 w3-left-align w3-padding-small w3-margin-0 w3-justify w3-margin-bottom" style="text-indent: 50px;white-space: pre-wrap;height:auto;max-height:200px;overflow:hidden;text-overflow:ellipsis;"><?=$rowabout["content"];?></p> 
				<div class="w3-clear"></div> 
				<a href="about-us.php" class="w3-btn w3-round w3-theme w3-center w3-margin-bottom w3-padding-medium">Read More</a>
			</div>
			
			<div class="w3-padding-medium w3-white w3-round w3-col s12 m12 l12 w3-center w3-margin-top">
				<h4><b class="w3-text-theme"><i class="fa fa-flag w3-xlarge"></i> Latest News & Events</b></h4>
				<div class="w3-clear"></div>
				<div class="w3-col s12 m12 l12 w3-padding-0 w3-margin-0">
					<style>
						.news-container{
							height:450px;
							min-height:450px;
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
					<div id="viewPost" class="w3-modal w3-animate-zoom w3-padding-0" style="background:rgba(0,0,0,0.90);display:none;z-index:999;"></div>
					<?php
						// fetch all news and events from tbl_news_and_events
						$query = $con->query("select * from tbl_news_and_events order by  date_posted DESC limit 6");
						while($row = $query->fetch()){
							?>
							<div class="w3-col s12 m6 l6 w3-padding-small"> 
								<div class="w3-col s12 m12 l12 w3-white news-container"> 
									<div class="w3-black w3-display-container w3-center">
										<img src="<?php if(file_exists($row["picture"]) && !empty($row["picture"])){echo $row["picture"];}else{echo"images/img-error.png";}?>" width="100%" height="auto" class="news-img w3-card-2 w3-hover-shadow w3-hover-opacity w3-btn w3-margin-0" onclick="viewImage('<?php if(file_exists($row["picture"]) && !empty($row["picture"])){echo $row["picture"];}else{echo"images/img-error.png";}?>');">  
										<?php if(file_exists($row["picture"]) && !empty($row["picture"])){}else{ ?>
										<div class="w3-display-bottommiddle w3-padding-large" style="background:rgba(0,0,0,0.70);color:red;">
											<b>Image doesn't exists</b>
										</div>
										<?php }?>
									</div>
									<div class="w3-clear"></div>
										<div class="w3-padding-small w3-justify">
											<p class="news-content">
											<b class="w3-col s12 m12 l12 w3-padding-0 w3-margin-0 w3-text-theme"><?=$row["title"];?></b> 
											<?=$row["content"];?></p>
											<div class="w3-padding-top w3-padding-bottom w3-col s12 m12 l12">
												<div class="w3-right w3-text-grey w3-padding-small"><i class="fa fa-calendar"></i>  <?=date("F d, Y",strtotime($row["date_posted"]));?> | <?php
													if($row["type"] == "News"){
														echo '<i class="fa fa-bullhorn "></i> '.$row["type"];
													}else{
														echo '<i class="fa fa-flag "></i> '.$row["type"];
													}
												?></div>
												
												<button type="button" onclick="loadModalContent('viewPost','libraries/php-func/view-post-home.php?id=<?=$row["tbl_id"];?>','viewPost');" class="w3-btn w3-col s4 m4 l4 w3-theme w3-hover-theme-dark w3-left">Read More</button>
											</div>
										</div>
								</div> 
								</div> 
							<?php
						}
						
					?>
					
				</div>
				
				<a href="news-and-events.php" class="w3-btn w3-theme w3-round w3-padding-medium">View All News & Events</a>
			</div>
			
			
		</div>
	</div>
	<script> 
		var slideIndex = 0;
		document.body.onload = function(){carousel()}; 
		

		function carousel() {
			var i;
			var x = document.getElementsByClassName("mySlides");
			var y = document.getElementsByClassName("img-style");
			for (i = 0; i < x.length; i++) {
			  x[i].style.display = "none"; 
			  y[i].style.opacity = "0.4"; 
			}
			slideIndex++;
			if (slideIndex > x.length) {slideIndex = 1} 
			x[slideIndex-1].style.display = "block"; 
			y[slideIndex-1].style.opacity="1"; 
			setTimeout(carousel, 5000); // Change image every 2 seconds
		}
		function showDivs(n) {
			var i;
			var x = document.getElementsByClassName("mySlides");
			var y = document.getElementsByClassName("img-style");
			if (n > x.length) {slideIndex = 1} 
			if (n < 1) {slideIndex = x.length} ;
			for (i = 0; i < x.length; i++) {
				x[i].style.display = "none"; 
				y[i].style.opacity = "0.4"; 
			}
			slideIndex = n;
			x[slideIndex].style.display = "block";  
			y[slideIndex].style.opacity = "1"; 	
		}
	</script>
<?php
	footer("home");
?>