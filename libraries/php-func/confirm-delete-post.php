<?php
	include("connection.php");
?> 
			<div class="w3-modal-content w3-card-8 w3-animate-zoom w3-round w3-border w3-border-white w3-padding-0" style="max-width:600px;margin-top:20px;overflow:hidden;">
				<div class="w3-padding-medium w3-theme w3-col s12 m12 l12">
					<h3>Message</h3>
				</div>
				<div class="w3-padding-medium w3-white w3-col s12 m12 l12" id="msgContainer123">
					<?php
						$query = $con->query("select * from tbl_news_and_events where tbl_id='".$_GET["tbl_id"]."'");
						$row = $query->fetch();
					?>
					<p>Are you sure you want to delete <b class="w3-text-theme"><?=$row["title"];?></b> to News and Events list?</p>
					<button type="button" onclick="loadContent('msgContainer123','../libraries/php-func/delete-post.php?tbl_id=<?=$row["tbl_id"];?>&picture=<?=$row["picture"];?>')" class="w3-btn w3-padding-medium w3-green w3-section w3-round"  ><i class="fa fa-check"></i> Yes</button>
					<button type="button" onclick="$('#viewPost').fadeOut();" class="w3-btn w3-padding-medium w3-grey w3-section w3-round"  ><i class="fa fa-close"></i> No</button>
				</div>
			</div>  