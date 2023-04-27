
			<?php
			include("connection.php");
			include("grade-func.php");
			$search = "";
			if(!empty($_GET["class_id"])){
				$search = "and tbl_class.class_id='".$_GET["class_id"]."'";
			}else{
				$thiSY = date("Y")-1;
				$search = "and tbl_class.sy='".$thiSY."-".date("Y")."'";
			}
			$query_class = $con->query("select * from tbl_class left join tbl_class_students on tbl_class.class_id = tbl_class_students.class_id where tbl_class_students.stud_id='".$_GET["tbl_id"]."' $search order by tbl_class.sy DESC limit 1");
			$row_class = $query_class->fetch(); 
			if(!empty($row_class["class_id"])){ 
				
				?>
				<div class="w3-clear"></div>
				<div class="w3-padding-0 w3-padding-left w3-margin-bottom w3-border-bottom w3-border-top w3-marigin-top w3-border-theme" id="studentGradesProfile">
					<br>
					<div class="w3-col s12 m12 l12">
						<?php
							$query_adviser = $con->query("select * from tbl_faculty where tbl_id='".$row_class["adviser_id"]."'");
							$row_adviser = $query_adviser->fetch();
						?>
						<b class="m-0 p-0 block left" >Class Adviser:</b> <span class="underline p-0 m-0 left c7 block" style="height:22px;padding-left:5px;"><?=strtoupper($row_adviser["lname"]).", ".strtoupper($row_adviser["fname"])." ".strtoupper($row_adviser["mname"]).".";?></span>
						<div class="w3-clear"></div>
						<b class="m-0 p-0 block left" >School Year:</b> <span class="underline p-0 m-0 left c7 block" style="height:22px;padding-left:5px;"><?=$row_class["sy"];?></span>
						<div class="w3-clear"></div>
						<b class="m-0 p-0 block left" >Year & Section:</b> <span class="underline p-0 m-0 left c7 block" style="height:22px;padding-left:5px;"><?=$row_class["ys"];?></span>
						<div class="w3-clear"></div>
						<b class="m-0 p-0 block left" >Curriculum:</b> <span class="underline p-0 m-0 left c7 block" style="height:22px;padding-left:5px;"><?=$row_class["curriculum"];?></span>
					</div>
					<div class="w3-col s12 m12 l12 " style="overflow-x:auto;"> 
						<h3 class="w3-center">ULAT TUNGKOL SA PAG-UNLAD NG MARKA</h3>
						<div class="clear"></div>
							<table class="w3-table w3-bordered w3-border  w3-white w3-border-black">
								<thead>
									<tr class="w3-dark-grey  w3-border-bottom w3-border-black">
										<th rowspan="2" class=" w3-border-right  w3-border-black"><center>Mga Asignatura <div class="w3-clear"></div>(Subject)</center></th>
										<th colspan="4" class=" w3-border-right  w3-border-black  "><center>1st</center></th>
										<th  rowspan="2" class="  w3-border-right  w3-border-black  "><center>Huling Marka</center></th>
										<th  rowspan="2" class="  w3-border-right  w3-border-black  "><center>Yunits</center></th>
										<th  rowspan="2" class=""><center>Pagpapasya</center></th>
									</tr>
									<tr class="w3-dark-grey  w3-border-bottom w3-border-black"> 
										<th class=" w3-border-right  w3-border-black  "><center>1st</center></th>
										<th class=" w3-border-right  w3-border-black  "><center>2nd</center></th>
										<th class=" w3-border-right  w3-border-black  "><center>3rd</center></th> 
										<th class=" w3-border-right  w3-border-black  "><center>4th</center></th>  
									</tr>
								</thead>
								<tbody >
									<?php
									$totalSubj = 0;
										$totalGrade = 0;
										$totalUnits = 0; 
										$totalSubj=0;
										$query_subject = $con->query("select tbl_subjects.units,tbl_subjects.tbl_id,tbl_subjects.subject_title from tbl_subjects left join tbl_class_subjects on tbl_subjects.tbl_id = tbl_class_subjects.subj_id where tbl_class_subjects.class_id='".$row_class["class_id"]."' order by tbl_subjects.subject_title ASC");
										while($row_subject = $query_subject->fetch()){
											$query_grades = $con->query("select * from tbl_grades where class_id='".$row_class["class_id"]."' and student_id='".$_GET["tbl_id"]."' and subject_id='".$row_subject["tbl_id"]."' ");
											$row_grades = $query_grades->fetch();
											if(gradeAVG($_GET["tbl_id"],$row_grades["subject_id"],$row_class["class_id"],"1st Grading","variable") > 0 || gradeAVG($_GET["tbl_id"],$row_grades["subject_id"],$row_class["class_id"],"2nd Grading","variable") > 0 || gradeAVG($_GET["tbl_id"],$row_grades["subject_id"],$row_class["class_id"],"3rd Grading","variable") > 0 ||gradeAVG($_GET["tbl_id"],$row_grades["subject_id"],$row_class["class_id"],"4th Grading","variable") > 0){
												$totalSubj+=1;
												$genAVG = genAVG(gradeAVG($_GET["tbl_id"],$row_grades["subject_id"],$row_class["class_id"],"1st Grading","variable"),gradeAVG($_GET["tbl_id"],$row_grades["subject_id"],$row_class["class_id"],"2nd Grading","variable"),gradeAVG($_GET["tbl_id"],$row_grades["subject_id"],$row_class["class_id"],"3rd Grading","variable"),gradeAVG($_GET["tbl_id"],$row_grades["subject_id"],$row_class["class_id"],"4th Grading","variable"));
											}else{ 
												$totalSubj+=0;
												$genAVG = 0;
											}
											
											$totalGrade+=$genAVG; 
											?>
											<tr class="w3-hover-grey w3-border-bottom w3-border-black" onclick="loadModalContent('StudentModal','../libraries/php-func/view-grades-details-student.php?student_id=<?=$_GET["tbl_id"];?>&subject_id=<?=$row_grades["subject_id"];?>&class_id=<?=$row_class["class_id"];?>','StudentModal');">
												<td class=" w3-border-right  w3-border-black" ><?=$row_subject["subject_title"];?> </td>
												<td class=" w3-border-right  w3-border-black  " ><center><?=gradeAVG($_GET["tbl_id"],$row_grades["subject_id"],$row_class["class_id"],"1st Grading","")?></center></td>
												<td class=" w3-border-right  w3-border-black " ><center><?=gradeAVG($_GET["tbl_id"],$row_grades["subject_id"],$row_class["class_id"],"2nd Grading","")?></center></td>
												<td class=" w3-border-right  w3-border-black " ><center><?=gradeAVG($_GET["tbl_id"],$row_grades["subject_id"],$row_class["class_id"],"3rd Grading","")?> </center></td> 
												<td class=" w3-border-right  w3-border-black" ><center><?=gradeAVG($_GET["tbl_id"],$row_grades["subject_id"],$row_class["class_id"],"4th Grading","")?></center></td> 
												<td class=" w3-border-right  w3-border-black " ><center><?=$genAVG;?></center></td> 
												<td class=" w3-border-right  w3-border-black " ><center><?=$row_subject["units"];?></center></td> 
												<td class="" ><center><?php if($genAVG > 0){ if($genAVG > 75){echo"Passed";}else{echo"Failed";} }else{echo"?";}?></center></td> 
											</tr>
											<?php
											$totalUnits+=$row_subject["units"]; 
										} 
									?>
									
									<tr class="w3-border-bottom w3-border-black"> 
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td class="w3-right-align">TOTAL UNITS: </td>
										<td class=" "><center><?=$totalUnits;?></center></td> 
										<td></td>
									</tr> 
								</tbody>
							</table> 
						<div class="w3-padding-top" style="width:100%;display:block;float:left;">
							<b class="padding w3-border w3-border-red w3-right w3-padding-medium" ><?php if($totalGrade > 0){echo round($totalGrade/$totalSubj,2);}else{ echo "0";}?></b>
							<b class="padding w3-right w3-padding-medium" style="border:1px solid transparent;">GENERAL AVERAGE:</b>
						</div> 
					</div>
					<div class="w3-clear"></div>
					<div class="w3-col s12 m12 l12" style="overflow-x:auto;margin-top:30px;">
						<table class="w3-table w3-white w3-bordered w3-border w3-border-black">
								<thead>
									<tr class="w3-dark-grey w3-border-bottom w3-border-black">
										<th class="w3-border-right w3-border-black" style=""><center><b>MGA BUWAN</b><div class="clear"></div>(MONTHS)</center></th>
										
										<th class="w3-border-right w3-border-black"><span class="rotate">Hunyo</span></th>  
										<th class="w3-border-right w3-border-black"><span class="rotate">Hulyo</span></th>  
										<th class="w3-border-right w3-border-black"><span class="rotate">Agosto</span></th>  
										<th class="w3-border-right w3-border-black"><span class="rotate">Set.</span></th>  
										<th class="w3-border-right w3-border-black"><span class="rotate">Okt.</span></th>  
										<th class="w3-border-right w3-border-black"><span class="rotate">Nob.</span></th>  
										<th class="w3-border-right w3-border-black"><span class="rotate">Dis.</span></th>  
										<th class="w3-border-right w3-border-black"><span class="rotate">Enero.</span></th>  
										<th class="w3-border-right w3-border-black"><span class="rotate">Peb.</span></th>  
										<th class="w3-border-right w3-border-black"><span class="rotate">Mar.</span></th>  
										<th class="w3-border-right w3-border-black"><span class="rotate">Kabuuan</span></th>  
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
											<?php if($hun > 0 && $hun1 >0){$totalHun = $hun-$hun1;echo $totalHun;}else{$totalHun =0;} ?>
										</td>  
										<td class="w3-border-right w3-border-black">
											<?php if($hul > 0 && $hul1 >0){$totalHul = $hul-$hul1;echo $totalHul;}else{$totalHul = 0;}?>
										</td>  
										<td class="w3-border-right w3-border-black">
											<?php if($ago > 0 && $ago1 >0){$totalAgo = $ago-$ago1;echo $totalAgo;}else{$totalAgo = 0;}?>
										</td>  
										<td class="w3-border-right w3-border-black">
											<?php if($set > 0 && $set1 >0){$totalSet = $set-$set1;echo $totalSet;}else{$totalSet = 0;}?>
										</td>  
										<td class="w3-border-right w3-border-black">
											<?php if($okt > 0 && $okt1 >0){$totalOkt = $okt-$okt1;echo $totalOkt;}else{$totalOkt = 0;}?>
										</td>  
										<td class="w3-border-right w3-border-black">
											<?php if($nob > 0 && $nob1 >0){$totalNob = $nob-$nob1;echo $totalNob;}else{$totalNob = 0;}?>
										</td>  
										<td class="w3-border-right w3-border-black">
											<?php if($dis > 0 && $dis1 >0){$totalDis = $dis-$dis1;echo $totalDis;}else{$totalDis = 0;}?>
										</td>  
										<td class="w3-border-right w3-border-black">
											<?php if($ene > 0 && $ene1 >0){$totalEne = $ene-$ene1;echo $totalEne;}else{$totalEne = 0;}?>
										</td>  
										<td class="w3-border-right w3-border-black">
											<?php if($peb > 0 && $peb1 >0){$totalPeb = $peb-$peb1;echo $totalPeb;}else{$totalPeb = 0;}?>
										</td>  
										<td class="w3-border-right w3-border-black">
											<?php if($mar > 0 && $mar1 >0){$totalMar = $mar-$mar1;echo $totalMar;}else{$totalMar = 0;}?>
										</td>   
										<?php
											$totalAbsent = $totalHun+$totalHul+$totalAgo+$totalSet+$totalOkt+$totalNob+$totalDis+$totalEne+$totalPeb+$totalMar;
										?>
										<td class="w3-border-right w3-border-black"><?php if($totalAbsent > 0){echo $totalAbsent;}?></td>
									</tr>
								</tbody>
						</table>
					</div>  
					<br> 
				<h3><center>VALUES EDUCATION & CHRISTIAN LIVING EXPERIENCE</center></h3> 
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
				<table class="w3-table w3-bordered w3-border w3-border-black w3-white w3-display-container" class="width:100%;display:block;">
					<thead> 
						<tr class="w3-dark-grey w3-border-bottom w3-border-black"> 
							<th class="w3-border-right w3-border-black" style="width:250px;"><center></center></th> 
							<th class="w3-border-right w3-border-black" style="width:10px;"><center>1</center></th> 
							<th class="w3-border-right w3-border-black"style="width:10px;"><center>2</center></th> 
							<th class="w3-border-right w3-border-black"style="width:10px;"><center>3</center></th> 
							<th class="w3-border-right w3-border-black"style="width:10px;"><center>4</center></th>
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
				<br>
				</div>
		<?php
			}else{
				?>
				<center><b>No record for this school year</b></center>
				<?php
			}
			
		?>