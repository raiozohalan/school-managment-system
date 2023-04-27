<html>
	<head>
		<style>
			.m-0{
				margin:0px; 
			}
			.p-0{
				padding:0px;
			}
			.p-s{
				padding:8px;
			}
			.p-m{
				padding:16px;
			}
			.b-n{
				font-weight:normal;
			}
			.center{
				text-align:center;
			}
			.bg-red{
				background:red;
			}
			.underline{
				border-bottom:1px solid black;
			}
			.c0.5{
				width:0px;
			}
			.c1{
				width:10%;
			}
			.c2{
				width:20%;
			}
			.c3{
				width:30%;
			}
			.c4{
				width:40%;
			}
			.c5{
				width:50%;
			}
			.c6{
				width:60%;
			}
			.c7{
				width:70%;
			}
			.c8{
				width:80%;
			}
			.c9{
				width:90%;
			}
			.c10{
				width:100%;
			}
			.wa{
				width:auto 90%;
			}
			.right{
				float:right;
			}
			.left{
				float:left;
			}
			.block{
				display:block;
			}
			.clear{
				clear:both;
			}
			.w3-border-0{border:0!important}
			.w3-border{border:1px solid black!important}
			.w3-border-top{border-top:1px solid black!important}
			.w3-border-bottom{border-bottom:1px solid black!important}
			.w3-border-left{border-left:1px solid black!important}.w3-border-right{border-right:1px solid black!important}


			.w3-col.l1{width:8.33333%}
			.w3-col.l2{width:16.66666%}
			.w3-col.l3,.w3-quarter{width:24.99999%}
			.w3-col.l4,.w3-third{width:33.33333%}
			.w3-col.l5{width:41.66666%}
			.w3-col.l6,.w3-half{width:49.99999%}
			.w3-col.l7{width:58.33333%}
			.w3-col.l8,.w3-twothird{width:66.66666%}
			.w3-col.l9,.w3-threequarter{width:74.99999%}
			.w3-col.l10{width:83.33333%}
			.w3-col.l11{width:91.66666%}
			.w3-col.l12{width:99.99999%}

			.padding{padding:6px 10px;height:15px;}

			.w3-table,.w3-table-all{border-collapse:collapse;border-spacing:0;width:100%;display:table}
			.w3-table-all{border:1px solid #ccc}
			.w3-bordered tr,.w3-table-all tr{border-bottom:1px solid black}
			.w3-striped tbody tr:nth-child(even){background-color:#f1f1f1}
			.w3-table-all tr:nth-child(odd){background-color:#fff}
			.w3-table-all tr:nth-child(even){background-color:#f1f1f1}
			.w3-hoverable tbody tr:hover,.w3-ul.w3-hoverable li:hover{background-color:#ccc}
			.w3-centered tr th,.w3-centered tr td{text-align:center}
			.w3-table td,.w3-table th,.w3-table-all td,.w3-table-all th{padding:4px 8px  0px 8px;display:table-cell;text-align:left;vertical-align:top}
			.w3-table th:first-child,.w3-table td:first-child,.w3-table-all th:first-child,.w3-table-all td:first-child{padding-left:5px}
			.w3-right{float:right;}
			.w3-left{float:left;}
			.w3-left-align{text-align:left!important}.w3-right-align{text-align:right!important}
			.w3-center{
				text-align:center;
			}
			.rotate{transform: rotate(-90deg);display:block;padding:5px;padding-top:11px;margin-bottom:-32px;}
			.rotate1{transform: rotate(-90deg);display:block;padding:5px;padding-top:11px;margin-bottom:-10px;}
			tr .rotate,tr .rotate1{width:10px;display:block;height:auto;text-align:center;}
			#attendance tr{
				border-bottom:none;
				
			} 
			#attendance tr td {
				border: 1px solid black;
			}

			.line-spacing{
				line-height:0.8;
				padding-top:10px;
			}
		</style>
	</head>
	<body>
		<div style="width:8.5in;">
			<div class="right" id="PrintContainer" style="width:4.05in;">
			<?php
			include("connection.php");
			include("grade-func.php"); 
			$query_class = $con->query("select * from tbl_class left join tbl_class_students on tbl_class.class_id = tbl_class_students.class_id where tbl_class_students.stud_id='".$_GET["tbl_id"]."' and tbl_class.class_id='".$_GET["class_id"]."' order by tbl_class.sy DESC limit 1");
			$row_class = $query_class->fetch();
			
			$query_student = $con->query("select * from tbl_students where tbl_id='".$_GET["tbl_id"]."'");
			$row = $query_student->fetch();
			?>
				<div class="center">  
					<br>
					<h2 class="m-0 p-0 b-n">Republika ng Pilipinas</h2>
					<h2 class="m-0 p-0" style="margin-top:-15px;">DEPARTAMENTO NG EDUKASYON</h2>
					<h2 class="m-0 p-0 b-n" style="margin-top:-15px;">Rehiyon VI - Kanluran Bisayas</h2>
					<h2 class="m-0 p-0 b-n" style="margin-top:-15px;">Dibisyon ng Iloilo</h2>
					
					<h1 class="m-0 p-0">Integrated Academy</h1>  
					<h2 class="m-0 p-0 b-n" style="margin-top:-15px;">Pototan, Iloilo </h2>
					<img src="../../images/logo.png" height="120px" width="auto">
					<br>
					<br>
					<h1 class="m-0 p-0" style="font-size:30px;">REPORT CARD</h1>
					<h2 class="m-0 p-0 b-n" style="margin-top:-15px;">Elementary School </h2> 		
					<br>
					<br>
				</div>
				<div class="p-s">  
					<h2 class="b-n m-0 p-0 c7 left">
						<b class="m-0 p-0 block left" >Name :</b> <span class="underline p-0 m-0 left block" style="height:22px;padding-left:5px;width:76%;"><?=strtoupper($row["lname"]).", ".strtoupper($row["fname"])." ".strtoupper($row["mname"]).".";?></span>
					</h2>
					<h2 class="b-n m-0 p-0 c3 right">
						<b class="m-0 p-0 block left" >Sex :</b> <span class="underline p-0 m-0 left c6 block" style="height:22px;padding-left:5px;"><?=strtoupper($row["gender"]);?></span>
					</h2>
				</div>
				<div class="p-s">  
					<h2 class="b-n m-0 p-0 c8 left">
						<b class="m-0 p-0 block left" >Year & Section :</b> <span class="underline p-0 m-0 left block" style="height:22px;padding-left:5px;width:58%;"><?=$row_class["ys"];?></span>
					</h2>
					<h2 class="b-n m-0 p-0 c2 right">
						<b class="m-0 p-0 block left" >Age :</b> <span class="underline p-0 m-0 left block" style="height:22px;padding-left:5px;width:37%;"><?=date("Y-m-d")-$row["bday"];?></span>
					</h2>
				</div>
				<div class="p-s">  
					<h2 class="b-n m-0 p-0 c10 left">
						<?php
							$query_adviser = $con->query("select * from tbl_faculty where tbl_id='".$row_class["adviser_id"]."'");
							$row_adviser = $query_adviser->fetch();
						?>
						<b class="m-0 p-0 block left" >Class Adviser :</b> <span class="underline p-0 m-0 left c7 block" style="height:22px;padding-left:5px;"><?=strtoupper($row_adviser["lname"]).", ".strtoupper($row_adviser["fname"])." ".strtoupper($row_adviser["mname"]).".";?></span>
					</h2> 
					
					<h2 class="b-n m-0 p-0 c10 left">
						<b class="m-0 p-0 block left" >School Year :</b> <span class="underline p-0 m-0 left block" style="height:22px;padding-left:5px;width:73%;"><?=strtoupper($row_class["sy"]);?></span>
					</h2> 
				</div>
			</div>
			
			<div class="clear"></div> 
		</div>  
		<div id="gradesPrinting" style="margin-top:12in;width:8.5in;padding-top:15px;">
			<div class="left"style="padding-right:10px;width:4.19in;display:block;margin:0px;">
				<div class="">  
					<div class="b-n m-0 c10 left">
						<span class="m-0 p-0 block left" >Name :</span> <b class="underline p-0 m-0 left c7 block" style="height:15px;padding-left:5px;"><?=strtoupper($row["lname"]).", ".strtoupper($row["fname"])." ".strtoupper($row["mname"]).".";?></b>
					</div> 
						
					<div class="b-n m-0 c10 left" style="padding-top:5px;">
						<span class="m-0 p-0 block left" >Curriculum :</span> <b class="underline p-0 m-0 left block" style="height:15px;padding-left:5px;width:20%;"><?=strtoupper($row_class["curriculum"]);?></b>
					</div> 
				</div>
				<div class="clear"></div>
				<b class="center c10 block p-s">ULAT TUNGKOL SA PAG-UNLAD NG MARKA</b>
				<div class="clear"></div>
				
				<!-- subjets and grades-->
				 
						<div class="c10 w3-display-container" style="width:100%;"> 
							<table class="w3-table w3-bordered w3-border w3-white w3-display-container" class="width:100%;display:block;">
								<thead>
									<tr class="w3-white" style="border-bottom:1px solid black;">
										<th rowspan="2" class=" w3-border-right w3-col s5 m5 l5 line-spacing" style="padding-top:18px;"><center><b>Mga Asignatura</b><br><span style="font-weight:normal;">(Subjects)</span></center></th>
										<th colspan="4" rowspan="1" class=" w3-border-right w3-col s4 m4 l4w3-center"><center>MARKAHAN</center></th> 
										<th rowspan="2" class=" w3-border-right  w3-col l1 line-spacing" style=" word-wrap: break-word;overflow:hidden;padding-top:18px;"><center>Huling <br>Marka</center></th>  
										<th rowspan="2" class="w3-border-right  w3-col l1" style="padding-top:19px"><center>Yunit</center></th>  
										<th rowspan="2" class="w3-border-right  w3-col l1 line-spacing"  style="word-wrap: break-word;overflow:hidden;padding-top:18px;">Pagpa-<br>pasiya</th>  
									</tr>
									<tr class="w3-white" style="border-bottom:1px solid black;"> 
										<th class=" w3-border-right line-spacing" style="padding-top:9px"><center>1</center></th> 
										<th class=" w3-border-right line-spacing"style="padding-top:9px"><center>2</center></th> 
										<th class=" w3-border-right line-spacing"style="padding-top:9px"><center>3</center></th> 
										<th class=" w3-border-right line-spacing"style="padding-top:9px"><center>4</center></th>
									</tr>
								</thead>
								<tbody >
									<?php
										$totalSubj = 0;
										$totalGrade = 0;
										$totalUnits = 0;
										$query_subject = $con->query("select tbl_subjects.units,tbl_subjects.tbl_id,tbl_subjects.subject_title from tbl_subjects left join tbl_class_subjects on tbl_subjects.tbl_id = tbl_class_subjects.subj_id where tbl_class_subjects.class_id='".$row_class["class_id"]."' order by tbl_subjects.subject_title ASC");
										while($row_subject = $query_subject->fetch()){
											$query_grades = $con->query("select * from tbl_grades where class_id='".$row_class["class_id"]."' and student_id='".$_GET["tbl_id"]."' and subject_id='".$row_subject["tbl_id"]."' ");
											$row_grades = $query_grades->fetch();
											if(gradeAVG($_GET["tbl_id"],$row_grades["subject_id"],$row_class["class_id"],"1st Grading","variable") > 0 || gradeAVG($_GET["tbl_id"],$row_grades["subject_id"],$row_class["class_id"],"2nd Grading","variable") > 0 || gradeAVG($_GET["tbl_id"],$row_grades["subject_id"],$row_class["class_id"],"3rd Grading","variable") > 0 ||gradeAVG($_GET["tbl_id"],$row_grades["subject_id"],$row_class["class_id"],"4th Grading","variable") > 0){
												$totalSubj+=1;
												$genAVG = genAVG(gradeAVG($_GET["tbl_id"],$row_grades["subject_id"],$row_class["class_id"],"1st Grading","variable"),gradeAVG($_GET["tbl_id"],$row_grades["subject_id"],$row_class["class_id"],"2nd Grading","variable"),gradeAVG($_GET["tbl_id"],$row_grades["subject_id"],$row_class["class_id"],"3rd Grading","variable"),gradeAVG($_GET["tbl_id"],$row_grades["subject_id"],$row_class["class_id"],"4th Grading","variable"));
											}else{ 
												$totalSubj+=0;
												$genAVG = "";
											}
											$totalGrade+=$genAVG;
											?>
											<tr class="w3-hover-grey"> 
												<td class=" w3-border-right  w3-col l5 line-spacing"  style="padding-top:10px;"><?=$row_subject["subject_title"];?> </td>
												<td class=" w3-border-right w3-col l1 line-spacing"  style="padding-top:10px;"><center><?=gradeAVG($_GET["tbl_id"],$row_grades["subject_id"],$row_class["class_id"],"1st Grading","none")?></center></td>
												<td class=" w3-border-right w3-col l1 line-spacing"  style="padding-top:10px;"><center><?=gradeAVG($_GET["tbl_id"],$row_grades["subject_id"],$row_class["class_id"],"2nd Grading","none")?></center></td>
												<td class=" w3-border-right w3-col l1 line-spacing"  style="padding-top:10px;"><center><?=gradeAVG($_GET["tbl_id"],$row_grades["subject_id"],$row_class["class_id"],"3rd Grading","none")?></center></td> 
												<td class=" w3-border-right w3-col l1 line-spacing"  style="padding-top:10px;"><center><?=gradeAVG($_GET["tbl_id"],$row_grades["subject_id"],$row_class["class_id"],"4th Grading","none")?></center></td> 
												<td class=" w3-border-right  w3-col l1 line-spacing"  style="padding-top:10px;"><center><?=$genAVG?></center></td> 
												<td class=" w3-border-right w3-col l1 line-spacing"  style="padding-top:10px;"><center><?=$row_subject["units"];?></center></td> 
												<td class=" w3-border-right w3-col l1 line-spacing"  style="padding-top:10px;"><center><?php if($genAVG > 0){ if($genAVG > 75){echo"Passed";}else{echo"Failed";} }else{echo"";}?></center></td> 
											</tr>
											<?php
											$totalUnits+=$row_subject["units"];
										}
									?>
								</tbody>
							</table> 
							<table class="w3-table w3-display-container" class="width:100%;display:block;">
								</tbody> 
									<tr>
										<td class="w3-col l4 w3-right-align" style="border:0px;border-bottom:1px solid black;"> TOTAL UNITS: </td>
										<td class=" w3-right-align" style="border:0px;border-bottom:1px solid black;width:43.3%;"></td>
										<td class="w3-right-align w3-col l1" style="border:0px;border-bottom:1px solid black; "><center><?=$totalUnits;?></center></td>
										<td class="w3-right-align" style="border:0px;border-bottom:1px solid black; ;"></td>
									</tr>
								</tbody>
							</table> 
						</div>
						<br> 
						<div class="clear"></div>
						<div  style="width:100%;display:block;float:left;">
							<b class="padding w3-border w3-right" style="width:50px;display:block;"><?php if($totalGrade > 0){echo round($totalGrade/$totalSubj,2);}?></b>
							<b class="padding w3-right" style="border:1px solid transparent;">GENERAL AVERAGE:</b>
						</div>  
		<div class="clear"></div>
						<br>
					<div  style="width:100%;display:block;float:left;">
						<table cellspacing="0" id ="attendance" style="width:100%;display:block;">
								<thead>
									<tr class="w3-white">
										<td class="line-spacing" style="width:135px;display:block;padding-top:15px;padding-bottom:8px;"><center><b>MGA BUWAN</b><div class="clear"></div>(MONTHS)</center></td>
										
										<td ><span class="rotate">Hunyo</span></td>  
										<td ><span class="rotate">Hulyo</span></td>  
										<td ><span class="rotate">Agosto</span></td>  
										<td ><span class="rotate">Set.</span></td>  
										<td ><span class="rotate">Okt.</span></td>  
										<td ><span class="rotate">Nob.</span></td>  
										<td ><span class="rotate">Dis.</span></td>  
										<td ><span class="rotate">Enero.</span></td>  
										<td ><span class="rotate">Peb.</span></td>  
										<td ><span class="rotate">Mar.</span></td>  
										<td ><span class="rotate">Kabuuan</span></td>  
									</tr>  
								</thead>
								<?php
									$query_attendance = $con->query("select * from tbl_attendance where class_id='".$row_class["class_id"]."' and stud_id='".$_GET["tbl_id"]."'");
									$row_attendanceCount = $query_attendance->rowCount();
									
									$hun = "";
									$hul = "";
									$ago = "";
									$set = "";
									$okt = "";
									$nob = "";
									$dis = "";
									$ene = "";
									$peb = "";
									$mar = "";
									
									$hun1 = "";
									$hul1 = "";
									$ago1 = "";
									$set1 = "";
									$okt1 = "";
									$nob1 = "";
									$dis1 = "";
									$ene1 = "";
									$peb1 = "";
									$mar1 = "";
									
									$totalMayPasok = 0;
									$totalIpinasok = 0;
									if($row_attendanceCount > 0){
										while($row_attendance = $query_attendance->fetch()){ 
											if($row_attendance["type"] == "Ipinasok"){
												$hun1 = $row_attendance["hun_"];
												$hul1 = $row_attendance["hul_"];
												$ago1 = $row_attendance["ago_"];
												$set1 = $row_attendance["set_"];
												$okt1 = $row_attendance["okt_"];
												$nob1 = $row_attendance["nob_"];
												$dis1 = $row_attendance["dis_"];
												$ene1 = $row_attendance["ene_"];
												$peb1 = $row_attendance["peb_"];
												$mar1 = $row_attendance["mar_"];
												$totalIpinasok = $hun1+$hul1+$ago1+$set1+$okt1+$nob1+$dis1+$ene1+$peb1+$mar1;
												
											}else{$hun = $row_attendance["hun_"];
												$hul = $row_attendance["hul_"];
												$ago = $row_attendance["ago_"];
												$set = $row_attendance["set_"];
												$okt = $row_attendance["okt_"];
												$nob = $row_attendance["nob_"];
												$dis = $row_attendance["dis_"];
												$ene = $row_attendance["ene_"];
												$peb = $row_attendance["peb_"];
												$mar = $row_attendance["mar_"];
												$totalMayPasok = $hun+$hul+$ago+$set+$okt+$nob+$dis+$ene+$peb+$mar;
											}  
										}
									}
								?>
								<tbody >
									<tr class=" w3-border-bottom w3-border-black">
										<td class="w3-border-right w3-border-black" style=""><center>Mga Araw na may pasok<br>	(Days of School)<center></td>
										
										<td class="w3-border-right w3-border-black"><span class="rotate1"><?=$hun;?></span></td>  
										<td class="w3-border-right w3-border-black"><span class="rotate1"><?=$hul;?></span></td>  
										<td class="w3-border-right w3-border-black"><span class="rotate1"><?=$ago;?></span></td>  
										<td class="w3-border-right w3-border-black"><span class="rotate1"><?=$set;?></span></td>  
										<td class="w3-border-right w3-border-black"><span class="rotate1"><?=$okt;?></span></td>  
										<td class="w3-border-right w3-border-black"><span class="rotate1"><?=$nob;?></span></td>  
										<td class="w3-border-right w3-border-black"><span class="rotate1"><?=$dis;?></span></td>  
										<td class="w3-border-right w3-border-black"><span class="rotate1"><?=$ene;?></span></td>  
										<td class="w3-border-right w3-border-black"><span class="rotate1"><?=$peb;?></span></td>  
										<td class="w3-border-right w3-border-black"><span class="rotate1"><?=$mar;?></span></td>  
										<td class="w3-border-right w3-border-black"><span class="rotate1"><?php if($totalMayPasok > 0){echo $totalMayPasok;}?></span></td>  
									</tr>
									<tr class=" w3-border-bottom w3-border-black">
										<td class="w3-border-right w3-border-black" style=""><center>Mga Araw na Ipinasok<br>	(Days Present)<center></td>
										
										<td class="w3-border-right w3-border-black"><span class="rotate1"><?=$hun1;?></span></td>  
										<td class="w3-border-right w3-border-black"><span class="rotate1"><?=$hul1;?></span></td>  
										<td class="w3-border-right w3-border-black"><span class="rotate1"><?=$ago1;?></span></td>  
										<td class="w3-border-right w3-border-black"><span class="rotate1"><?=$set1;?></span></td>  
										<td class="w3-border-right w3-border-black"><span class="rotate1"><?=$okt1;?></span></td>  
										<td class="w3-border-right w3-border-black"><span class="rotate1"><?=$nob1;?></span></td>  
										<td class="w3-border-right w3-border-black"><span class="rotate1"><?=$dis1;?></span></td>  
										<td class="w3-border-right w3-border-black"><span class="rotate1"><?=$ene1;?></span></td>  
										<td class="w3-border-right w3-border-black"><span class="rotate1"><?=$peb1;?></span></td>  
										<td class="w3-border-right w3-border-black"><span class="rotate1"><?=$mar1;?></span></td>   
										<td class="w3-border-right w3-border-black"><span class="rotate1"><?php if($totalIpinasok > 0){echo $totalIpinasok;}?></span></td>
									</tr>
									<tr class=" w3-border-bottom w3-border-black">
										<td class="w3-border-right w3-border-black" style=""><center>Mga Araw na Nahuli<br>	(Days Tardy)<center></td>
										
										<td class="w3-border-right w3-border-black">
											<span class="rotate1">
											<?php if($hun > 0 && $hun1 >0){$totalHun = $hun-$hun1;echo $totalHun;}else{$totalHun =0;} ?></span>
										</td>  
										<td class="w3-border-right w3-border-black">
											<span class="rotate1">
											<?php if($hul > 0 && $hul1 >0){$totalHul = $hul-$hul1;echo $totalHul;}else{$totalHul = 0;}?></span>
										</td>  
										<td class="w3-border-right w3-border-black">
											<span class="rotate1">
											<?php if($ago > 0 && $ago1 >0){$totalAgo = $ago-$ago1;echo $totalAgo;}else{$totalAgo = 0;}?></span>
										</td>  
										<td class="w3-border-right w3-border-black">
											<span class="rotate1">
											<?php if($set > 0 && $set1 >0){$totalSet = $set-$set1;echo $totalSet;}else{$totalSet = 0;}?></span>
										</td>  
										<td class="w3-border-right w3-border-black">
											<span class="rotate1">
											<?php if($okt > 0 && $okt1 >0){$totalOkt = $okt-$okt1;echo $totalOkt;}else{$totalOkt = 0;}?></span>
										</td>  
										<td class="w3-border-right w3-border-black">
											<span class="rotate1">
											<?php if($nob > 0 && $nob1 >0){$totalNob = $nob-$nob1;echo $totalNob;}else{$totalNob = 0;}?></span>
										</td>  
										<td class="w3-border-right w3-border-black">
											<span class="rotate1">
											<?php if($dis > 0 && $dis1 >0){$totalDis = $dis-$dis1;echo $totalDis;}else{$totalDis = 0;}?></span>
										</td>  
										<td class="w3-border-right w3-border-black">
											<span class="rotate1">
											<?php if($ene > 0 && $ene1 >0){$totalEne = $ene-$ene1;echo $totalEne;}else{$totalEne = 0;}?></span>
										</td>  
										<td class="w3-border-right w3-border-black">
											<span class="rotate1">
											<?php if($peb > 0 && $peb1 >0){$totalPeb = $peb-$peb1;echo $totalPeb;}else{$totalPeb = 0;}?></span>
										</td>  
										<td class="w3-border-right w3-border-black">
											<span class="rotate1">
											<?php if($mar > 0 && $mar1 >0){$totalMar = $mar-$mar1;echo $totalMar;}else{$totalMar = 0;}?></span>
										</td>   
										<?php
											$totalAbsent = $totalHun+$totalHul+$totalAgo+$totalSet+$totalOkt+$totalNob+$totalDis+$totalEne+$totalPeb+$totalMar;
										?>
										<td class="w3-border-right w3-border-black"><span class="rotate1"><?php if($totalAbsent > 0){echo $totalAbsent;}?></span></td>
									</tr>
								</tbody>
						</table>
					</div>  
				<!-- subjets and grades-->
			</div>
			<div class="left" style="width:4.00in;display:block;margin:0px;padding-left:10px;padding-right:5px;">
				<h2 style="margin:0px;padding:0px;text-align:center;line-height:0.8;">VALUES EDUCATION & CHRISTIAN<div class="clear"></div>LIVING EXPERIENCE</h2>
				<div class="clear"></div> 
				<?php
					$query_valed_1st = $con->query("select * from tbl_values_ed where class_id='".$row_class["class_id"]."' and stud_id='".$_GET["tbl_id"]."' and quarter='1st'");
					$row_valed_1 = $query_valed_1st->fetch();
					
					$query_valed_2nd = $con->query("select * from tbl_values_ed where class_id='".$row_class["class_id"]."' and stud_id='".$_GET["tbl_id"]."' and quarter='2nd'");
					$row_valed_2 = $query_valed_2nd->fetch();
					
					$query_valed_3rd = $con->query("select * from tbl_values_ed where class_id='".$row_class["class_id"]."' and stud_id='".$_GET["tbl_id"]."' and quarter='3rd'");
					$row_valed_3 = $query_valed_3rd->fetch();
					
					$query_valed_4th = $con->query("select * from tbl_values_ed where class_id='".$row_class["class_id"]."' and stud_id='".$_GET["tbl_id"]."' and quarter='4th'");
					$row_valed_4 = $query_valed_4th->fetch();
				?>
				<table class="w3-table w3-bordered w3-border w3-white w3-display-container" class="width:100%;display:block;">
					<thead> 
						<tr class="w3-white" style="border-bottom:1px solid black;"> 
							<th class="w3-border-right" style="padding-top:0px;padding-bottom:0px;height:5px;width:250px;"><center></center></th> 
							<th class="w3-border-right" style="padding-top:0px;padding-bottom:0px;height:5px;width:10px;"><center>1</center></th> 
							<th class="w3-border-right"style="padding-top:0px;padding-bottom:0px;height:5px;width:10px;"><center>2</center></th> 
							<th class="w3-border-right"style="padding-top:0px;padding-bottom:0px;height:5px;width:10px;"><center>3</center></th> 
							<th class="w3-border-right"style="padding-top:0px;padding-bottom:0px;height:5px;width:10px;"><center>4</center></th>
						</tr>
					</thead>
					<tbody >
						<tr class="w3-hover-grey"> 
							<td class="w3-border-right" style="padding-top:0px;padding-bottom:0px;height:5px;width:250px;">Knowledge of Christian Doctrine and Church Teachings</td> 
							<td class="w3-border-right" style="padding-top:0px;padding-bottom:0px;height:5px;width:10px;"><center><?=$row_valed_1["r1"];?></center></td>  
							<td class="w3-border-right" style="padding-top:0px;padding-bottom:0px;height:5px;width:10px;"><center><?=$row_valed_2["r1"];?></center></td>  
							<td class="w3-border-right" style="padding-top:0px;padding-bottom:0px;height:5px;width:10px;"><center><?=$row_valed_3["r1"];?></center></td>  
							<td class="w3-border-right" style="padding-top:0px;padding-bottom:0px;height:5px;width:10px;"><center><?=$row_valed_4["r1"];?></center></td>  
						</tr>
						<tr class="w3-hover-grey"> 
							<td class="w3-border-right" style="padding-top:5px;padding-bottom:0px;height:5px;width:250px;line-height:0.8;">Prayerfulness, Attendance / Attentiveness at <div class="clear"></div>Sundays Mass and Other Liturgical Services</td> 
							<td class="w3-border-right" style="padding-top:0px;padding-bottom:0px;height:5px;width:10px;"><center><?=$row_valed_1["r2"];?></center></td>  
							<td class="w3-border-right" style="padding-top:0px;padding-bottom:0px;height:5px;width:10px;"><center><?=$row_valed_2["r2"];?></center></td>  
							<td class="w3-border-right" style="padding-top:0px;padding-bottom:0px;height:5px;width:10px;"><center><?=$row_valed_3["r2"];?></center></td>  
							<td class="w3-border-right" style="padding-top:0px;padding-bottom:0px;height:5px;width:10px;"><center><?=$row_valed_4["r2"];?></center></td>  
						</tr>
						<tr class="w3-hover-grey"> 
							<td class="w3-border-right" style="padding-top:0px;padding-bottom:0px;height:5px;width:250px;">Self-Control & Discipline </td> 
							<td class="w3-border-right" style="padding-top:0px;padding-bottom:0px;height:5px;width:10px;"><center><?=$row_valed_1["r3"];?></center></td>  
							<td class="w3-border-right" style="padding-top:0px;padding-bottom:0px;height:5px;width:10px;"><center><?=$row_valed_2["r3"];?></center></td>  
							<td class="w3-border-right" style="padding-top:0px;padding-bottom:0px;height:5px;width:10px;"><center><?=$row_valed_3["r3"];?></center></td>  
							<td class="w3-border-right" style="padding-top:0px;padding-bottom:0px;height:5px;width:10px;"><center><?=$row_valed_4["r3"];?></center></td>   
						</tr>
						<tr class="w3-hover-grey"> 
							<td class="w3-border-right" style="padding-top:0px;padding-bottom:0px;height:5px;width:250px;">Honestly & Trustworthiness</td> 
							<td class="w3-border-right" style="padding-top:0px;padding-bottom:0px;height:5px;width:10px;"><center><?=$row_valed_1["r4"];?></center></td>  
							<td class="w3-border-right" style="padding-top:0px;padding-bottom:0px;height:5px;width:10px;"><center><?=$row_valed_2["r4"];?></center></td>  
							<td class="w3-border-right" style="padding-top:0px;padding-bottom:0px;height:5px;width:10px;"><center><?=$row_valed_3["r4"];?></center></td>  
							<td class="w3-border-right" style="padding-top:0px;padding-bottom:0px;height:5px;width:10px;"><center><?=$row_valed_4["r4"];?></center></td> 
						</tr>
						<tr class="w3-hover-grey"> 
							<td class="w3-border-right" style="padding-top:0px;padding-bottom:0px;height:5px;width:250px;">Neatness and Orderliness</td> 
							<td class="w3-border-right" style="padding-top:0px;padding-bottom:0px;height:5px;width:10px;"><center><?=$row_valed_1["r5"];?></center></td>  
							<td class="w3-border-right" style="padding-top:0px;padding-bottom:0px;height:5px;width:10px;"><center><?=$row_valed_2["r5"];?></center></td>  
							<td class="w3-border-right" style="padding-top:0px;padding-bottom:0px;height:5px;width:10px;"><center><?=$row_valed_3["r5"];?></center></td>  
							<td class="w3-border-right" style="padding-top:0px;padding-bottom:0px;height:5px;width:10px;"><center><?=$row_valed_4["r5"];?></center></td> 
						</tr>
						<tr class="w3-hover-grey"> 
							<td class="w3-border-right" style="padding-top:0px;padding-bottom:0px;height:5px;width:250px;">Kindness and Simplicity</td> 
							<td class="w3-border-right" style="padding-top:0px;padding-bottom:0px;height:5px;width:10px;"><center><?=$row_valed_1["r6"];?></center></td>  
							<td class="w3-border-right" style="padding-top:0px;padding-bottom:0px;height:5px;width:10px;"><center><?=$row_valed_2["r6"];?></center></td>  
							<td class="w3-border-right" style="padding-top:0px;padding-bottom:0px;height:5px;width:10px;"><center><?=$row_valed_3["r6"];?></center></td>  
							<td class="w3-border-right" style="padding-top:0px;padding-bottom:0px;height:5px;width:10px;"><center><?=$row_valed_4["r6"];?></center></td>  
						</tr>
						<tr class="w3-hover-grey"> 
							<td class="w3-border-right" style="padding-top:0px;padding-bottom:0px;height:5px;width:250px;">Openness to Corrections and Suggestions</td> 
							<td class="w3-border-right" style="padding-top:0px;padding-bottom:0px;height:5px;width:10px;"><center><?=$row_valed_1["r7"];?></center></td>  
							<td class="w3-border-right" style="padding-top:0px;padding-bottom:0px;height:5px;width:10px;"><center><?=$row_valed_2["r7"];?></center></td>  
							<td class="w3-border-right" style="padding-top:0px;padding-bottom:0px;height:5px;width:10px;"><center><?=$row_valed_3["r7"];?></center></td>  
							<td class="w3-border-right" style="padding-top:0px;padding-bottom:0px;height:5px;width:10px;"><center><?=$row_valed_4["r7"];?></center></td> 
						</tr>
						<tr class="w3-hover-grey"> 
							<td class="w3-border-right" style="padding-top:0px;padding-bottom:0px;height:5px;width:250px;">Obey Schools Rules and Regulations</td> 
							<td class="w3-border-right" style="padding-top:0px;padding-bottom:0px;height:5px;width:10px;"><center><?=$row_valed_1["r8"];?></center></td>  
							<td class="w3-border-right" style="padding-top:0px;padding-bottom:0px;height:5px;width:10px;"><center><?=$row_valed_2["r8"];?></center></td>  
							<td class="w3-border-right" style="padding-top:0px;padding-bottom:0px;height:5px;width:10px;"><center><?=$row_valed_3["r8"];?></center></td>  
							<td class="w3-border-right" style="padding-top:0px;padding-bottom:0px;height:5px;width:10px;"><center><?=$row_valed_4["r8"];?></center></td>
						</tr>
						<tr class="w3-hover-grey"> 
							<td class="w3-border-right" style="padding-top:0px;padding-bottom:0px;height:5px;width:250px;">Industry and Sense of Responsibility</td> 
							<td class="w3-border-right" style="padding-top:0px;padding-bottom:0px;height:5px;width:10px;"><center><?=$row_valed_1["r9"];?></center></td>  
							<td class="w3-border-right" style="padding-top:0px;padding-bottom:0px;height:5px;width:10px;"><center><?=$row_valed_2["r9"];?></center></td>  
							<td class="w3-border-right" style="padding-top:0px;padding-bottom:0px;height:5px;width:10px;"><center><?=$row_valed_3["r9"];?></center></td>  
							<td class="w3-border-right" style="padding-top:0px;padding-bottom:0px;height:5px;width:10px;"><center><?=$row_valed_4["r9"];?></center></td>   
						</tr>
						<tr class="w3-hover-grey"> 
							<td class="w3-border-right" style="padding-top:0px;padding-bottom:0px;height:5px;width:250px;">Concern for Others and Willingness to Serve</td> 
							<td class="w3-border-right" style="padding-top:0px;padding-bottom:0px;height:5px;width:10px;"><center><?=$row_valed_1["r10"];?></center></td>  
							<td class="w3-border-right" style="padding-top:0px;padding-bottom:0px;height:5px;width:10px;"><center><?=$row_valed_2["r10"];?></center></td>  
							<td class="w3-border-right" style="padding-top:0px;padding-bottom:0px;height:5px;width:10px;"><center><?=$row_valed_3["r10"];?></center></td>  
							<td class="w3-border-right" style="padding-top:0px;padding-bottom:0px;height:5px;width:10px;"><center><?=$row_valed_4["r10"];?></center></td>  
						</tr>
						<tr class="w3-hover-grey"> 
							<td class="w3-border-right" style="padding-top:0px;padding-bottom:0px;height:5px;width:250px;">Cooperation and Active Involvement in Group Work</td> 
							<td class="w3-border-right" style="padding-top:0px;padding-bottom:0px;height:5px;width:10px;"><center><?=$row_valed_1["r11"];?></center></td>  
							<td class="w3-border-right" style="padding-top:0px;padding-bottom:0px;height:5px;width:10px;"><center><?=$row_valed_2["r11"];?></center></td>  
							<td class="w3-border-right" style="padding-top:0px;padding-bottom:0px;height:5px;width:10px;"><center><?=$row_valed_3["r11"];?></center></td>  
							<td class="w3-border-right" style="padding-top:0px;padding-bottom:0px;height:5px;width:10px;"><center><?=$row_valed_4["r11"];?></center></td>   
						</tr>
						<tr class="w3-hover-grey"> 
							<td class="w3-border-right" style="padding-top:0px;padding-bottom:0px;height:5px;width:250px;">Sense of Fairness and Justice</td> 
							<td class="w3-border-right" style="padding-top:0px;padding-bottom:0px;height:5px;width:10px;"><center><?=$row_valed_1["r12"];?></center></td>  
							<td class="w3-border-right" style="padding-top:0px;padding-bottom:0px;height:5px;width:10px;"><center><?=$row_valed_2["r12"];?></center></td>  
							<td class="w3-border-right" style="padding-top:0px;padding-bottom:0px;height:5px;width:10px;"><center><?=$row_valed_3["r12"];?></center></td>  
							<td class="w3-border-right" style="padding-top:0px;padding-bottom:0px;height:5px;width:10px;"><center><?=$row_valed_4["r12"];?></center></td>  
						</tr>
						<tr class="w3-hover-grey"> 
							<td class="w3-border-right" style="padding-top:0px;padding-bottom:0px;height:5px;width:250px;">Sportsmanship</td> 
							<td class="w3-border-right" style="padding-top:0px;padding-bottom:0px;height:5px;width:10px;"><center><?=$row_valed_1["r13"];?></center></td>  
							<td class="w3-border-right" style="padding-top:0px;padding-bottom:0px;height:5px;width:10px;"><center><?=$row_valed_2["r13"];?></center></td>  
							<td class="w3-border-right" style="padding-top:0px;padding-bottom:0px;height:5px;width:10px;"><center><?=$row_valed_3["r13"];?></center></td>  
							<td class="w3-border-right" style="padding-top:0px;padding-bottom:0px;height:5px;width:10px;"><center><?=$row_valed_4["r13"];?></center></td> 
						</tr> 
						<tr class="w3-hover-grey"> 
							<td class="w3-border-right" style="padding-top:0px;padding-bottom:0px;height:5px;width:250px;">Love of Country and Care of the Environment</td> 
							<td class="w3-border-right" style="padding-top:0px;padding-bottom:0px;height:5px;width:10px;"><center><?=$row_valed_1["r14"];?></center></td>  
							<td class="w3-border-right" style="padding-top:0px;padding-bottom:0px;height:5px;width:10px;"><center><?=$row_valed_2["r14"];?></center></td>  
							<td class="w3-border-right" style="padding-top:0px;padding-bottom:0px;height:5px;width:10px;"><center><?=$row_valed_3["r14"];?></center></td>  
							<td class="w3-border-right" style="padding-top:0px;padding-bottom:0px;height:5px;width:10px;"><center><?=$row_valed_4["r14"];?></center></td> 
						</tr> 
					</tbody>
				</table> 
				<div class="clear"></div>
				<h2 style="margin:0px;margin-top:5px;padding:0px;">EVALUATION CODE:</h2>
				<div class="clear"></div>
				<table class="w3-table w3-white w3-display-container" class="width:100%;display:block;">
					<tbody>
						<tr class="w3-hover-grey" style="padding:0px;height:1px;"> 
							<th style="padding-top:0px;padding-bottom:0px;height:0px;width:1px;max-width:1px;min-width:1px;">A</th>  
							<th style="padding-top:0px;padding-bottom:0px;height:0px;width:10px;">94 - 96</th>  
							<th style="padding-top:0px;padding-bottom:0px;height:0px;width:80px;">Outstanding</th> 
						</tr> 
						<tr class="w3-hover-grey"> 
							<th style="padding-top:0px;padding-bottom:0px;height:5px;width:1px;max-width:1px;min-width:1px;">A-</th>  
							<th style="padding-top:0px;padding-bottom:0px;height:5px;width:10px;">90 - 93</th>  
							<th style="padding-top:0px;padding-bottom:0px;height:5px;width:80px;">Very Good</th> 
						</tr> 
						<tr class="w3-hover-grey"> 
							<th style="padding-top:0px;padding-bottom:0px;height:5px;width:1px;max-width:1px;min-width:1px;">B</th>  
							<th style="padding-top:0px;padding-bottom:0px;height:5px;width:10px;">85 - 89</th>  
							<th style="padding-top:0px;padding-bottom:0px;height:5px;width:80px;">Good</th> 
						</tr>
						<tr class="w3-hover-grey"> 
							<th style="padding-top:0px;padding-bottom:0px;height:5px;width:1px;max-width:1px;min-width:1px;">B-</th>  
							<th style="padding-top:0px;padding-bottom:0px;height:5px;width:10px;">80 - 84</th>  
							<th style="padding-top:0px;padding-bottom:0px;height:5px;width:80px;">Satisfactory</th> 
						</tr> 
						<tr class="w3-hover-grey"> 
							<th style="padding-top:0px;padding-bottom:0px;height:5px;width:1px;max-width:1px;min-width:1px;">C</th>  
							<th style="padding-top:0px;padding-bottom:0px;height:5px;width:10px;">77 - 79</th>  
							<th style="padding-top:0px;padding-bottom:0px;height:5px;width:80px;">Fair</th> 
						</tr> 
						<tr class="w3-hover-grey"> 
							<th style="padding-top:0px;padding-bottom:0px;height:5px;width:1px;max-width:1px;min-width:1px;">C-</th>  
							<th style="padding-top:0px;padding-bottom:0px;height:5px;width:10px;">75 - 76</th>  
							<th style="padding-top:0px;padding-bottom:0px;height:5px;width:80px;">Passing (But has difficulty in meeting the required knowledge, attitude & skill)</th> 
						</tr> 
						<tr class="w3-hover-grey"> 
							<th style="padding-top:0px;padding-bottom:0px;height:5px;width:1px;max-width:1px;min-width:1px;">D</th>  
							<th style="padding-top:0px;padding-bottom:0px;height:5px;width:10px;">74</th>  
							<th style="padding-top:0px;padding-bottom:0px;height:5px;width:80px;">Unsatisfactory</th> 
						</tr> 
						<tr class="w3-hover-grey"> 
							<th style="padding-top:0px;padding-bottom:0px;height:5px;width:1px;max-width:1px;min-width:1px;">D-</th>  
							<th style="padding-top:0px;padding-bottom:0px;height:5px;width:10px;">70 - 73</th>  
							<th style="padding-top:0px;padding-bottom:0px;height:5px;width:80px;">Below Grade Level (Failed)</th> 
						</tr> 
					</tbody>
				</table>
			</div>
			
			<div class="clear"></div> 
		</div>
	</body>
</html>
