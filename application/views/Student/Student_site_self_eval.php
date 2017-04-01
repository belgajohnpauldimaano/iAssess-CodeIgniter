<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Student Evaluation</title>
	<?php //echo base_url('materializecss/css/materialize.css');?>
   <link href="<?php echo base_url('materializecss/css/materialize.css');?>" rel="stylesheet">
   
   <style>
		 body{
		   margin:0;
		   padding: 0;
			font-family: 'Roboto', Calibri, Trebuchet, sans-serif;
		 }
		  .scores{
				 font-weight: 300;
				 font-size: 90%;
		  }
		  .scores .card-title{
				 font-weight: 400;
				 font-size: 1.3em;
				 line-height: 1.1;
		  }
		  .page-title, .titles{
				 font-weight:  300;
				font-family: 'Roboto', Calibri, Trebuchet, sans-serif;
		  }
		  .td-indent{
				 padding-left:20px;
		  }
		  .italic{
				font-style: italic;
				 font-weight: 300;
		  }
		  ul.eval-item li{
				 opacity: 0;
		  }
		 dl{
				margin: 10px 0 0 0;

		 }
		 dt{
				 font-size: 90%;
		 }
		 dd{
				 font-size: 88%;
		 }
		.part h5{
		 	font-weight: 300;
		}
	   .wrapper{
		   font-weight: 300;
	   }
	   #pup-wrapper{
		   background: url("<?php echo base_url('materializecss/img/puplogo.png'); ?>") no-repeat;
		   background-position: -5px 0;
		   height: 130px;
		   padding-left: 130px;
		   padding-top: 10px;
	   }
	   #rp{
		   
	   }
	   #office-vp,#br,#pup{
		   margin: 0;
	   }
   </style>
</head>
<body>
<div class="purple lighten-5">
	
<div class="row">
	  
	  <div class="col s12 m9 l9">
			 <div class="row">
					<form action="aa">
						  <div class="col s12 m12 l12">
								 <div class=" card-panel">
									 	<div class=" container">
											<div id="pup-wrapper">

												<div id="rp">Republic of the Philippines</div>
												<h5 id="pup">POLYTECHNIC UNIVERSITY OF THE PHILIPPINES</h5>
												<h6 id="office-vp">OFFICE OF THE VICE PRESIDENT FOR BRANCHES AND CAMPUSES</h6>
												<h6 id="br">BATAAN BRANCH</h6>

											</div>
										</div>
										<span class="card-title">
											  <h3 class="page-title center-align red-text">Practicum Site and Self Evaluation</h3>
										</span>
										<div class="container section">
										   <span>Use the following scale : </span>
										   <dl>
											   <dt>1 UNACCEPTABLE </dt>
											   <dd> Consistently fails to meet job requirements; performance clearly below minimum requirements.
											   </dd>
										   </dl>
										   
										   <dl>
											<dt>2 NEEDS IMPROVEMENT</dt>
											<dd>
												Occasionally fails to meet job requirements 
											</dd>
										   </dl>
										   
										   <dl>
											   <dt>4 EXCEEDS EXPECTATIONS</dt>
											   <dd>
												   3 MEET EXPECTATIONS - Able to perform 100% of job duties satisfactorily. Normal guidance and
	  supervision are required.
											   </dd>
										   </dl>
										   
										   <dl>
											   <dt>4 EXCEEDS EXPECTATIONS</dt>
											   <dd>
												   Frequently exceeds job requirements; all planned objectives were
	  achieved above the established standards and accomplishments were made in unexpected areas as well.

											   </dd>
										   </dl>
										   
										   <dl>
											   <dt>5 OUTSTANDING</dt>
											   <dd>
												   Consistently exceeds job requirements; this is the highest level of performance that can be attained.
											   </dd>
										   </dl>
										</div>
										<div class="divider"></div>
										<div class="container wrapper">
												<?php
													//echo $questionnaire;
												?>
												
												<ul>
													<li>
														<table class="">
															  <tr>
																  <td >
																   <div class="part">
																		 <h5>PART I. PRACTICUM SITE / SUPERVISOR ASSESSMENT</h5>
																	</div>
																  </td>
															  </tr>
																<!--1--->
															  	<tr  class=" scrollspy" id="aa">
																	 <td class="td-indent">
																		 <div>
																			<dl >
																				<dt>
																				1.	Acceptance of you as a functional member of the staff; willingness to integrate you into all appropriate levels of activities, programs, and projects.
																				</dt>
																				<dt>
																					<?php
																						for($i=1;$i<=5;$i++){
																							echo '<input class="with-gap" name="pp1" type="radio" value="'.$i.'"  id="pp1-'.$i.'"  />
																					<label for="pp1-' . $i . '">'.$i.'</label>';
																						}
																					?>
																				</dt>
																			</dl>
																		 </div>
																	 </td>
															  	</tr>
																<!--1--->
																<!--2--->
															  	<tr  class=" scrollspy" id="aa">
																	 <td class="td-indent">
																		 <div>
																			<dl >
																				<dt>
																				2.	Assistance in helping you meet your personal and professional goals and objectives.
																				</dt>
																				<dt>
																					<?php
																						for($i=1;$i<=5;$i++){
																							echo '<input class="with-gap" name="pp2" type="radio" value="'.$i.'"  id="pp2-'.$i.'"  />
																					<label for="pp2-' . $i . '">'.$i.'</label>';
																						}
																					?>
																				</dt>
																			</dl>
																		 </div>
																	 </td>
															  	</tr>
																<!--2--->
																<!--3--->
															  	<tr  class=" scrollspy" id="aa">
																	 <td class="td-indent">
																		 <div>
																			<dl >
																				<dt>
																				3.	Conferences with you and ongoing evaluation of your performance, followed up by brief written progress reports.
																				</dt>
																				<dt>
																					<?php
																						for($i=1;$i<=5;$i++){
																							echo '<input class="with-gap" name="pp3" type="radio" value="'.$i.'"  id="pp3-'.$i.'"  />
																					<label for="pp3-' . $i . '">'.$i.'</label>';
																						}
																					?>
																				</dt>
																			</dl>
																		 </div>
																	 </td>
															  	</tr>
																<!--3--->
																<!--4--->
															  	<tr  class=" scrollspy" id="aa">
																	 <td class="td-indent">
																		 <div>
																			<dl >
																				<dt>
																				4.	Allowance for relating classroom theory to practical situations.
																				</dt>
																				<dt>
																					<?php
																						for($i=1;$i<=5;$i++){
																							echo '<input class="with-gap" name="pp4" type="radio" value="'.$i.'"  id="pp4-'.$i.'"  />
																					<label for="pp4-' . $i . '">'.$i.'</label>';
																						}
																					?>
																				</dt>
																			</dl>
																		 </div>
																	 </td>
															  	</tr>
																<!--4--->
																<!--5--->
															  	<tr  class=" scrollspy" id="aa">
																	 <td class="td-indent">
																		 <div>
																			<dl >
																				<dt>
																				5.	Willingness to listen to whatever suggestions or recommendations are made.
																				</dt>
																				<dt>
																					<?php
																						for($i=1;$i<=5;$i++){
																							echo '<input class="with-gap" name="pp5" type="radio" value="'.$i.'"  id="pp5-'.$i.'"  />
																					<label for="pp5-' . $i . '">'.$i.'</label>';
																						}
																					?>
																					
																				</dt>
																			</dl>
																		 </div>
																	 </td>
															  	</tr>
																<!--5--->
																<!--6--->
															  	<tr  class=" scrollspy" id="aa">
																	 <td class="td-indent">
																		 <div>
																			<dl >
																				<dt>
																				6.	The job supervisor was willing to discuss the full range of your activities at the site.
																				</dt>
																				<dt>
																					<?php
																						for($i=1;$i<=5;$i++){
																							echo '<input class="with-gap" name="pp6" type="radio" value="'.$i.'"  id="pp6-'.$i.'"  />
																					<label for="pp6-' . $i . '">'.$i.'</label>';
																						}
																					?>
																				</dt>
																			</dl>
																		 </div>
																	 </td>
															  	</tr>
																<!--6--->
																<!--7--->
															  	<tr  class=" scrollspy" id="aa">
																	 <td class="td-indent">
																		 <div>
																			<dl >
																				<dt>
																				7.	The job supervisor was willing to discuss the full range of your activities at the site.
																				</dt>
																				<dt>
																					<?php
																						for($i=1;$i<=5;$i++){
																							echo '<input class="with-gap" name="pp7" type="radio" value="'.$i.'"  id="pp7-'.$i.'"  />
																					<label for="pp7-' . $i . '">'.$i.'</label>';
																						}
																					?>
																				</dt>
																			</dl>
																		 </div>
																	 </td>
															  	</tr>
																<!--7--->
																<!--8--->
															  	<tr  class=" scrollspy" id="aa">
																	 <td class="td-indent">
																		 <div>
																			<dl >
																				<dt>
																				8.	The job supervisor was able to respond to your problems and to help you work toward solutions.
																				</dt>
																				<dt>
																					<?php
																						for($i=1;$i<=5;$i++){
																							echo '<input class="with-gap" name="pp8" type="radio" value="'.$i.'"  id="pp8-'.$i.'"  />
																					<label for="pp8-' . $i . '">'.$i.'</label>';
																						}
																					?>
																				</dt>
																			</dl>
																		 </div>
																	 </td>
															  	</tr>
																<!--8--->
																<!--9--->
															  	<tr  class=" scrollspy" id="aa">
																	 <td class="td-indent">
																		 <div>
																			<dl >
																				<dt>
																				9.	Adequacy of arrangements made to orient you to the site.
																				</dt>
																				<dt>
																					<?php
																						for($i=1;$i<=5;$i++){
																							echo '<input class="with-gap" name="pp9" type="radio" value="'.$i.'"  id="pp9-'.$i.'"  />
																					<label for="pp9-' . $i . '">'.$i.'</label>';
																						}
																					?>
																				</dt>
																			</dl>
																		 </div>
																	 </td>
															  	</tr>
																<!--9--->
																<!--10--->
															  	<tr  class=" scrollspy" id="aa">
																	 <td class="td-indent">
																		 <div>
																			<dl >
																				<dt>
																				10.	Possession of resources essential to the preparation of professionals (library, computers, supplies, etc.)
																				</dt>
																				<dt>
																					<?php
																						for($i=1;$i<=5;$i++){
																							echo '<input class="with-gap" name="pp10" type="radio" value="'.$i.'"  id="pp10-'.$i.'"  />
																					<label for="pp10-' . $i . '">'.$i.'</label>';
																						}
																					?>
																				</dt>
																			</dl>
																		 </div>
																	 </td>
															  	</tr>
																<!--10--->
																<tr>
																  <td >
																	   <div class="part">
																			 <h5>PART II. SELF ASSESSMENT</h5>
																		</div>
																  </td>
																</tr>
																<tr>
																  <td >
																	   <div>
																			 <h6>Answer the following quetions.</h6>
																		</div>
																  </td>
																</tr>
																<tr>
																	<td >
																	   <div>
																			A.	Has the practicum/fieldwork experience helped you prepare for a job in a computer field? Why or why not?
																			<div class="input-field">
																			  <textarea id="part-2-a" name="part-2-a" class="materialize-textarea"></textarea>
																			  <label for="part-2-a">Answer</label>
																			</div>
																		</div>
																		<div>
																			B.	Which of the subjects you have taken were of the most value during the Practicum?
																			<div class="input-field">
																			  <textarea id="part-2-b" name="part-2-b" class="materialize-textarea"></textarea>
																			  <label for="part-2-b">Answer</label>
																			</div>
																		</div>
																		<div>
																			C.	What could your company/job supervisor have done to improve your practicum/fieldwork experience?
																			<div class="input-field">
																			  <textarea id="part-2-b" name="part-2-b" class="materialize-textarea"></textarea>
																			  <label for="part-2-b">Answer</label>
																			</div>
																		</div>
																		<div>
																			D.	What could you have done to improve your practicum/fieldwork experience?
																			<div class="input-field">
																			  <textarea id="part-2-b" name="part-2-b" class="materialize-textarea"></textarea>
																			  <label for="part-2-b">Answer</label>
																			</div>
																		</div>
																		<div>
																			E.	What skills/competencies were you required to use in your fieldwork that:
																			<br />
																			<br />
																			<div>1.	You felt prepared to do:</div>
																			<div class="input-field">
																				<textarea id="part-2-b" name="part-2-e-1" class="materialize-textarea"></textarea>
																				<label for="part-2-b">Answer</label>
																			</div>
																			
																			<br />
																			<div>2.	You felt unprepared to do:</div>
																			<div class="input-field">
																				<textarea id="part-2-b" name="part-2-e-2" class="materialize-textarea"></textarea>
																				<label for="part-2-b">Answer</label>
																			</div>
																		</div>
																		<div>
																			F.	What other courses or learning experiences would have helped in the Practicum?
																			<div class="input-field">
																			  <textarea id="part-2-b" name="part-2-b" class="materialize-textarea"></textarea>
																			  <label for="part-2-b">Answer</label>
																			</div>
																		</div>
																		<div>
																			G.	What suggestions can you make to help improve the Practicum Program?
																			<div class="input-field">
																			  <textarea id="part-2-b" name="part-2-b" class="materialize-textarea"></textarea>
																			  <label for="part-2-b">Answer</label>
																			</div>
																		</div>
																	</td>
																</tr>
														</table>
													</li>
												</ul>
						  					<input class="btn" type="submit" value="Done">
										</div>
								 </div>
						  </div>
			 		</form>
			 </div>
	  </div>
	  <div class="fixed-action-btn" style="top: 100px;right:20px">
		  <a class='btn-floating btn-large' href='<?php echo base_url() . "index.php/Training_station/Student_list"; ?> ' >
			  <i>Back</i>
		  </a>
	  </div>
	  <div class="col s4 m3 l3 hide-on-small-only ">
			 <div class='pinned '>
					<!--<div class='card-panel scores'>
						  <div class="card-content">
								 <span class="card-title">
									  Please rate the strengths and weaknesses of the COMPANY and your IMMEDIATE SUPERVISOR in terms of meeting your needs as a practicum student. 
								 </span>
								 <ul>
									<li>
										<dl>
											<dt><b>1 UNACCEPTABLE </b></dt>
											<dd> Consistently fails to meet job requirements; performance clearly below minimum requirements.
											</dd>
										</dl>
									 </li>			 
									<li>
										<dl>
											<dt><b>2 NEEDS IMPROVEMENT </b></dt>
											<dd>
												Occasionally fails to meet job requirements 
											</dd>
										</dl>
									 </li>			 
									<li>
										<dl>
											<dt><b>4 EXCEEDS EXPECTATIONS</b></dt>
											<dd>
												3 MEET EXPECTATIONS - Able to perform 100% of job duties satisfactorily. Normal guidance and
supervision are required.
											</dd>
										</dl>
									</li>			 
									<li>
										<dl>
											<dt><b>4 EXCEEDS EXPECTATIONS</b></dt>
											<dd>
												Frequently exceeds job requirements; all planned objectives were
achieved above the established standards and accomplishments were made in unexpected areas as well.
												
											</dd>
										</dl>
 									</li>			 
									<li>
										<dl>
											<dt><b>5 OUTSTANDING</b></dt>
											<dd>
												Consistently exceeds job requirements; this is the highest level of performance that can be attained.
											</dd>
										</dl>
									</li>			 
								 </ul>
						  </div>
					  </div>-->
					
						<div class='card-panel'>
						  <div class="card-content toc-wrapper">
								 <span class="card-title">
										<h5>Evaluation Content</h5>
								 </span>
								 <ul style='list-style-type: upper-roman;' class='table-of-contents'  data-collapsible='accordion'>
										<li>
											<div><a href='#performance-factors'>Performance Factors</a></div>
											<div>
												<ol style="list-style-type: lower-alpha;">
												 	<li><a href='#list-p-item1'>Knowledge, Skills, Abilities</a></li>			 
													<li><a href='#list-p-item2'>Quality of Work</a></li>			 
													<li><a href='#list-p-item3'>Quantity of Work</a></li>			 
													<li><a href='#list-p-item4'>Work Habits</a></li>			 
													<li><a href='#list-p-item5'>Communication Skills</a></li>			 
											  	</ol>
											</div>
										</li>
										<li>
											<div><a href='#behavioral-traits'>Behavioral Traits</a></div>
											<div>
												<ol style="list-style-type: lower-alpha;">
													<li><a href='#list-p-item6'>Punctuality and Attendance</a></li>			 
													<li><a href='#list-p-item7'>Dependability</a></li>			 
													<li><a href='#list-p-item8'>Initiative</a></li>			 
													<li><a href='#list-p-item9'>Adaptability</a></li>			 
													<li><a href='#list-p-item10'>Cooperation</a></li>			 
											  	</ol>
											</div>
										</li>
								 </ul>
						  </div>
					  </div>
			 </div>
	  </div>
</div>
	
	<footer class="page-footer orange darken-1">
		<div class="footer-copyright">
			<div class="container">
				Theme by <i class="brown-text text-lighten-3">Materializecss</i>
			</div>
		</div>
	</footer>
</div>
	

   <script src="http://127.0.0.1/jquery/jquery-1.9.1.js"></script>
	<script src="<?php echo base_url('materializecss/js/materialize.js');?>"></script>
	<script>
		/*alert($('document').length));
		if ($('window').length) {
			  $('#content-wrapper').pushpin({ top: $('#nav-a').height() });
			}
			else {
			  $('#content-wrapper').pushpin({ top: 0 });
			}*/
		$(document).ready(function(){
			$('.scrollspy').scrollSpy();
			
			var options = [
				{selector: '#list-p1', offset: 300, callback: 'Materialize.showStaggeredList("#list-p1")' },
				{selector: '#list-p2', offset: 300, callback: 'Materialize.showStaggeredList("#list-p2")' }
			];
			Materialize.scrollFire(options);
		});
	</script>
</body>
</html>
