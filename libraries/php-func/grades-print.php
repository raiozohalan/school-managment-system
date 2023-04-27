<style>  
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
.rotate1{transform: rotate(-90deg);display:block;padding:5px;padding-top:11px;margin-bottom:0px;}
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
</style><?php
	include("connection.php");
	include("grade-func.php");
	$search = "";
	if(!empty($_GET["sy"])){
		$search = " and sy like '".$_GET["sy"]."%'";
	} else{
		$searchSy = date("Y")-1;
		$search = " and sy like '".$searchSy."-".date("Y")."%'";
	}
					$query_school_year = $con->query("select DISTINCT sy from tbl_grades where student_id='".$_GET["tbl_id"]."'$search order by sy DESC");
					while($row_sy = $query_school_year->fetch()){
						?>
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
										$query_grades = $con->query("select DISTINCT tbl_grades.subject_id,tbl_subjects.subject_title,tbl_subjects.units from tbl_grades left join tbl_subjects on tbl_grades.subject_id = tbl_subjects.tbl_id where tbl_grades.sy='".$row_sy["sy"]."' and tbl_grades.student_id='".$_GET["tbl_id"]."' order by tbl_subjects.subject_title ASC");
										while($row_grades = $query_grades->fetch()){
											$genAVG = genAVG(gradeAVG($_GET["tbl_id"],$row_grades["subject_id"],$row_sy["sy"],"1st Grading","variable"),gradeAVG($_GET["tbl_id"],$row_grades["subject_id"],$row_sy["sy"],"2nd Grading","variable"),gradeAVG($_GET["tbl_id"],$row_grades["subject_id"],$row_sy["sy"],"3rd Grading","variable"),gradeAVG($_GET["tbl_id"],$row_grades["subject_id"],$row_sy["sy"],"4th Grading","variable"));
											
											$totalGrade+=$genAVG;
											$totalSubj++;
											?>
											<tr class="w3-hover-grey"> 
												<td class=" w3-border-right  w3-col l5 line-spacing"  style="padding-top:10px;"><?=$row_grades["subject_title"];?> </td>
												<td class=" w3-border-right w3-col l1 line-spacing"  style="padding-top:10px;"><center><?=gradeAVG($_GET["tbl_id"],$row_grades["subject_id"],$row_sy["sy"],"1st Grading","none")?></center></td>
												<td class=" w3-border-right w3-col l1 line-spacing"  style="padding-top:10px;"><center><?=gradeAVG($_GET["tbl_id"],$row_grades["subject_id"],$row_sy["sy"],"2nd Grading","none")?></center></td>
												<td class=" w3-border-right w3-col l1 line-spacing"  style="padding-top:10px;"><center><?=gradeAVG($_GET["tbl_id"],$row_grades["subject_id"],$row_sy["sy"],"3rd Grading","none")?></center></td> 
												<td class=" w3-border-right w3-col l1 line-spacing"  style="padding-top:10px;"><center><?=gradeAVG($_GET["tbl_id"],$row_grades["subject_id"],$row_sy["sy"],"4th Grading","none")?></center></td> 
												<td class=" w3-border-right  w3-col l1 line-spacing"  style="padding-top:10px;"><center><?=$genAVG?></center></td> 
												<td class=" w3-border-right w3-col l1 line-spacing"  style="padding-top:10px;"><center><?=$row_grades["units"];?></center></td> 
												<td class=" w3-border-right w3-col l1 line-spacing"  style="padding-top:10px;"><center><?php if($genAVG > 75){echo"Passed";}else{echo"Failed";}?></center></td> 
											</tr>
											<?php
											$totalUnits+=$row_grades["units"];
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
							<b class="padding w3-border w3-right" style="width:50px;display:block;"><?=round($totalGrade/$totalSubj,2);?></b>
							<b class="padding w3-right" style="border:1px solid transparent;">GENERAL AVERAGE:</b> </b>
						</div> 
						
						<?php
					}
				?>
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
								<tbody >
									<tr class="w3-white">
										<td class="line-spacing" style="width:135px;display:block;padding-bottom:8px;"><center>Mga Araw na may pasok<br>	(Days of School)<center></td>
										
										<td ><span class="rotate1">12</span></td>  
										<td ><span class="rotate1">12</span></td>  
										<td ><span class="rotate1">12</span></td>  
										<td ><span class="rotate1">12</span></td>  
										<td ><span class="rotate1">12</span></td>  
										<td ><span class="rotate1">12</span></td>  
										<td ><span class="rotate1">12</span></td>  
										<td ><span class="rotate1">12</span></td>  
										<td ><span class="rotate1">12</span></td>  
										<td ><span class="rotate1">12</span></td>  
										<td ><span class="rotate1">12</span></td>  
									</tr>
									<tr class="w3-white">
										<td class="line-spacing" style="width:135px;display:block;padding-bottom:8px;"><center>Mga Araw na Ipinasok<br>	(Days Present)<center></td>
										
										<td ><span class="rotate1">12</span></td>  
										<td ><span class="rotate1">12</span></td>  
										<td ><span class="rotate1">12</span></td>  
										<td ><span class="rotate1">12</span></td>  
										<td ><span class="rotate1">12</span></td>  
										<td ><span class="rotate1">12</span></td>  
										<td ><span class="rotate1">12</span></td>  
										<td ><span class="rotate1">12</span></td>  
										<td ><span class="rotate1">12</span></td>  
										<td ><span class="rotate1">12</span></td>  
										<td ><span class="rotate1">12</span></td>
									</tr>
									<tr class="w3-white">
										<td class="line-spacing" style="width:135px;display:block;padding-bottom:8px;"><center>Mga Araw na Nahuli<br>	(Days Tardy)<center></td>
										
										<td ><span class="rotate1">12</span></td>  
										<td ><span class="rotate1">12</span></td>  
										<td ><span class="rotate1">12</span></td>  
										<td ><span class="rotate1">12</span></td>  
										<td ><span class="rotate1">12</span></td>  
										<td ><span class="rotate1">12</span></td>  
										<td ><span class="rotate1">12</span></td>  
										<td ><span class="rotate1">12</span></td>  
										<td ><span class="rotate1">12</span></td>  
										<td ><span class="rotate1">12</span></td>  
										<td ><span class="rotate1">12</span></td>
									</tr>
								</tbody>
						</table>
						</div>   
