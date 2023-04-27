<?php
	include("connection.php");
			if(!empty($_GET["id"])){
				$query_news = $con->query("select * from tbl_news_and_events where tbl_id='".$_GET["id"]."'");
				if($rownews = $query_news->fetch()){
			?>
			<div class="w3-padding-small w3-white w3-col s12 m12 l12 w3-center" id="viewer">
				<div class="w3-black w3-display-container">
					<button class="w3-display-topright w3-btn w3-hover-white w3-text-grey" onclick="$('#viewPost').hide(1000);" style="z-index:999;"><i class="fa fa-close"></i> Close</button>
					<img src="../<?php if(file_exists("../../".$rownews["picture"]) && !empty($rownews["picture"])){echo $rownews["picture"];}else{echo"images/img-error.png";}?>" width="autos" height="auto" class="w3-card-2 w3-hover-shadow w3-hover-opacity w3-btn w3-margin-0 news-img-view" >
					<?php if(file_exists("../../".$rownews["picture"]) && !empty($rownews["picture"])){}else{ ?>
						<div class="w3-display-bottommiddle w3-padding-large" style="background:rgba(0,0,0,0.70);color:red;">
							<b>Image doesn't exists</b>
						</div>
					<?php }?>
				</div>
				<div class="w3-col s12 m12 l12 w3-padding-small">
					<h3 class="w3-left-align w3-margin-0 w3-padding-0"><b class="w3-text-theme"><?php if($rownews["type"] == "News"){echo '<i class="fa fa-bullhorn "></i> '; }else{ echo '<i class="fa fa-flag "></i>'; }?> <?=$rownews["title"];?></b></h3> 
					<div class="w3-left w3-padding-0 w3-text-grey w3-padding-bottom"><i class="fa fa-calendar"></i>  <?=date("H:i a F d, Y",strtotime($rownews["date_posted"]));?> | 
							<?php
							if($rownews["type"] == "News"){
								echo '<i class="fa fa-bullhorn "></i> '.$rownews["type"];
							}else{
								echo '<i class="fa fa-flag "></i> '.$rownews["type"];
							}
							?></div>
					<p class="w3-col s12 m12 l12 w3-left-align w3-padding-0  w3-padding-bottom w3-justify w3-margin-0" style="text-indent: 50px;white-space: pre-wrap;"><?=$rownews["content"];?></p>		
				</div> 
			</div> 
			<?php 
				}
			}
			?>