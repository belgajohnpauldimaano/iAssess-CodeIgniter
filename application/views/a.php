
<?php
	$html = '
<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Student Evaluation</title>
   <link href="http://127.0.0.1/ci/ci_materializecss/CodeIgniter-3.0.2/materializecss/css/materialize.css" rel="stylesheet">
   
   <style>
	   body{
		   margin:0;
		   padding: 0;
			font-family: "Roboto", Calibri, Trebuchet, sans-serif;
	   }
		  .scores{
				 font-weight: 300;
				 font-size: 78%;
		  }
		  .scores .card-title{
				 font-weight: 400;
				 font-size: 1.3em;
				 line-height: 1.1;
		  }
		  .page-title, .titles{
				 font-weight:  300;
				font-family: "Roboto", Calibri, Trebuchet, sans-serif;
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
   </style>
</head>
<body>
	
<div class="purple lighten-5">
	
<div class="row grey-text">
	  
	  <div class="col s12 m7 l9">
			 <div class="row">
					<form action="aa">
						  <div class="col s12 m12 l12">
								 <div class=" card-panel">
										<span class="card-title">
											  <h3 class="page-title center-align red-text">Student Evaluation</h3>
										</span>
										<div class="divider"></div>
										<div class="container">
												<input type="hidden" name="stud_id" value="">		<h5 class="titles center-align">
																<div id="performance-factors" >PART I. Performance Factors</div>
															</h5>
												<ul id="list-p1" class="eval-item blue-grey-text">
																<li>
																	<table class="">
																  <tr class="scrollspy "  id="list-p-item1" >
																			 <td >
																				 <div><b>1. Knowledge, Skills, Abilities</b></div>
																				 <div class="td-indent italic">
																							The extent to which the students exhibits the required level of job knowledge and/or skills  to perform the task assigned to him/her	 
																				 </div>
																		  </td>
																	  </tr>
														
																		<tr>
																			<td class="td-indent">
																				<div>
																					<div>
																						a. Considers comprehension of job procedures
																					</div>
																					<span>
																						<input class="with-gap" name="sub-item1" type="radio" value="1"  id="sub-item1-1" />
																						<label for="sub-item1-1">1</label>
																						
																						<input class="with-gap" name="sub-item1" type="radio" value="2"  id="sub-item1-2" />
																						<label for="sub-item1-2">2</label>
																						
																						<input class="with-gap" name="sub-item1" type="radio" value="3"  id="sub-item1-3" />
																						<label for="sub-item1-3">3</label>
																						
																						<input class="with-gap" name="sub-item1" type="radio" value="4"  id="sub-item1-4" />
																						<label for="sub-item1-4">4</label>
																						
																						<input class="with-gap" name="sub-item1" type="radio" value="5"  id="sub-item1-5"/>
																						<label for="sub-item1-5">5</label>
																					</span>
																				</div>
																	 		</td>
																		</tr>
															
																		<tr>
																			<td class="td-indent">
																				<div>
																					<div>
																						b. Understands responsibility and scope of duties
																					</div>
																					<span>
																						<input class="with-gap" name="sub-item2" type="radio" value="1"  id="sub-item2-1" />
																						<label for="sub-item2-1">1</label>
																						
																						<input class="with-gap" name="sub-item2" type="radio" value="2"  id="sub-item2-2" />
																						<label for="sub-item2-2">2</label>
																						
																						<input class="with-gap" name="sub-item2" type="radio" value="3"  id="sub-item2-3" />
																						<label for="sub-item2-3">3</label>
																						
																						<input class="with-gap" name="sub-item2" type="radio" value="4"  id="sub-item2-4" />
																						<label for="sub-item2-4">4</label>
																						
																						<input class="with-gap" name="sub-item2" type="radio" value="5"  id="sub-item2-5"/>
																						<label for="sub-item2-5">5</label>
																					</span>
																				</div>
																	 		</td>
																		</tr>
															
																		<tr>
																			<td class="td-indent">
																				<div>
																					<div>
																						c. Exhibits ability to learn and apply new skills
																					</div>
																					<span>
																						<input class="with-gap" name="sub-item3" type="radio" value="1"  id="sub-item3-1" />
																						<label for="sub-item3-1">1</label>
																						
																						<input class="with-gap" name="sub-item3" type="radio" value="2"  id="sub-item3-2" />
																						<label for="sub-item3-2">2</label>
																						
																						<input class="with-gap" name="sub-item3" type="radio" value="3"  id="sub-item3-3" />
																						<label for="sub-item3-3">3</label>
																						
																						<input class="with-gap" name="sub-item3" type="radio" value="4"  id="sub-item3-4" />
																						<label for="sub-item3-4">4</label>
																						
																						<input class="with-gap" name="sub-item3" type="radio" value="5"  id="sub-item3-5"/>
																						<label for="sub-item3-5">5</label>
																					</span>
																				</div>
																	 		</td>
																		</tr>
															
																		<tr>
																			<td class="td-indent">
																				<div>
																					<div>
																						d. Requires minimal supervision
																					</div>
																					<span>
																						<input class="with-gap" name="sub-item4" type="radio" value="1"  id="sub-item4-1" />
																						<label for="sub-item4-1">1</label>
																						
																						<input class="with-gap" name="sub-item4" type="radio" value="2"  id="sub-item4-2" />
																						<label for="sub-item4-2">2</label>
																						
																						<input class="with-gap" name="sub-item4" type="radio" value="3"  id="sub-item4-3" />
																						<label for="sub-item4-3">3</label>
																						
																						<input class="with-gap" name="sub-item4" type="radio" value="4"  id="sub-item4-4" />
																						<label for="sub-item4-4">4</label>
																						
																						<input class="with-gap" name="sub-item4" type="radio" value="5"  id="sub-item4-5"/>
																						<label for="sub-item4-5">5</label>
																					</span>
																				</div>
																	 		</td>
																		</tr>
															
																		<tr>
																			<td class="td-indent">
																				<div>
																					<div>
																						e. Displays understanding of the task assigned
																					</div>
																					<span>
																						<input class="with-gap" name="sub-item5" type="radio" value="1"  id="sub-item5-1" />
																						<label for="sub-item5-1">1</label>
																						
																						<input class="with-gap" name="sub-item5" type="radio" value="2"  id="sub-item5-2" />
																						<label for="sub-item5-2">2</label>
																						
																						<input class="with-gap" name="sub-item5" type="radio" value="3"  id="sub-item5-3" />
																						<label for="sub-item5-3">3</label>
																						
																						<input class="with-gap" name="sub-item5" type="radio" value="4"  id="sub-item5-4" />
																						<label for="sub-item5-4">4</label>
																						
																						<input class="with-gap" name="sub-item5" type="radio" value="5"  id="sub-item5-5"/>
																						<label for="sub-item5-5">5</label>
																					</span>
																				</div>
																	 		</td>
																		</tr>
																		  <tr class="scrollspy "  id="list-p-item2" >
																			 <td >
																				 <div><b>2. Quality of Work     </b></div>
																				 <div class="td-indent italic">
																							The degree of accuracy, neatness, and thoroughness of the completion of the assigned task	 
																				 </div>
																		  </td>
																	  </tr>
														
																		<tr>
																			<td class="td-indent">
																				<div>
																					<div>
																						a. Evaluates quality of work performed
																					</div>
																					<span>
																						<input class="with-gap" name="sub-item6" type="radio" value="1"  id="sub-item6-1" />
																						<label for="sub-item6-1">1</label>
																						
																						<input class="with-gap" name="sub-item6" type="radio" value="2"  id="sub-item6-2" />
																						<label for="sub-item6-2">2</label>
																						
																						<input class="with-gap" name="sub-item6" type="radio" value="3"  id="sub-item6-3" />
																						<label for="sub-item6-3">3</label>
																						
																						<input class="with-gap" name="sub-item6" type="radio" value="4"  id="sub-item6-4" />
																						<label for="sub-item6-4">4</label>
																						
																						<input class="with-gap" name="sub-item6" type="radio" value="5"  id="sub-item6-5"/>
																						<label for="sub-item6-5">5</label>
																					</span>
																				</div>
																	 		</td>
																		</tr>
															
																		<tr>
																			<td class="td-indent">
																				<div>
																					<div>
																						b. Exhibits accuracy and neatness of work
																					</div>
																					<span>
																						<input class="with-gap" name="sub-item7" type="radio" value="1"  id="sub-item7-1" />
																						<label for="sub-item7-1">1</label>
																						
																						<input class="with-gap" name="sub-item7" type="radio" value="2"  id="sub-item7-2" />
																						<label for="sub-item7-2">2</label>
																						
																						<input class="with-gap" name="sub-item7" type="radio" value="3"  id="sub-item7-3" />
																						<label for="sub-item7-3">3</label>
																						
																						<input class="with-gap" name="sub-item7" type="radio" value="4"  id="sub-item7-4" />
																						<label for="sub-item7-4">4</label>
																						
																						<input class="with-gap" name="sub-item7" type="radio" value="5"  id="sub-item7-5"/>
																						<label for="sub-item7-5">5</label>
																					</span>
																				</div>
																	 		</td>
																		</tr>
															
																		<tr>
																			<td class="td-indent">
																				<div>
																					<div>
																						c. Attends to details
																					</div>
																					<span>
																						<input class="with-gap" name="sub-item8" type="radio" value="1"  id="sub-item8-1" />
																						<label for="sub-item8-1">1</label>
																						
																						<input class="with-gap" name="sub-item8" type="radio" value="2"  id="sub-item8-2" />
																						<label for="sub-item8-2">2</label>
																						
																						<input class="with-gap" name="sub-item8" type="radio" value="3"  id="sub-item8-3" />
																						<label for="sub-item8-3">3</label>
																						
																						<input class="with-gap" name="sub-item8" type="radio" value="4"  id="sub-item8-4" />
																						<label for="sub-item8-4">4</label>
																						
																						<input class="with-gap" name="sub-item8" type="radio" value="5"  id="sub-item8-5"/>
																						<label for="sub-item8-5">5</label>
																					</span>
																				</div>
																	 		</td>
																		</tr>
																		  <tr class="scrollspy "  id="list-p-item3" >
																			 <td >
																				 <div><b>3. Quantity of Work</b></div>
																				 <div class="td-indent italic">
																							The ability of the student to perform multiple task simultaneously in a more productive and timely manner	 
																				 </div>
																		  </td>
																	  </tr>
														
																		<tr>
																			<td class="td-indent">
																				<div>
																					<div>
																						a. Estimates the amount of task to be done
																					</div>
																					<span>
																						<input class="with-gap" name="sub-item9" type="radio" value="1"  id="sub-item9-1" />
																						<label for="sub-item9-1">1</label>
																						
																						<input class="with-gap" name="sub-item9" type="radio" value="2"  id="sub-item9-2" />
																						<label for="sub-item9-2">2</label>
																						
																						<input class="with-gap" name="sub-item9" type="radio" value="3"  id="sub-item9-3" />
																						<label for="sub-item9-3">3</label>
																						
																						<input class="with-gap" name="sub-item9" type="radio" value="4"  id="sub-item9-4" />
																						<label for="sub-item9-4">4</label>
																						
																						<input class="with-gap" name="sub-item9" type="radio" value="5"  id="sub-item9-5"/>
																						<label for="sub-item9-5">5</label>
																					</span>
																				</div>
																	 		</td>
																		</tr>
															
																		<tr>
																			<td class="td-indent">
																				<div>
																					<div>
																						b. Monitors the efficiency of works
																					</div>
																					<span>
																						<input class="with-gap" name="sub-item10" type="radio" value="1"  id="sub-item10-1" />
																						<label for="sub-item10-1">1</label>
																						
																						<input class="with-gap" name="sub-item10" type="radio" value="2"  id="sub-item10-2" />
																						<label for="sub-item10-2">2</label>
																						
																						<input class="with-gap" name="sub-item10" type="radio" value="3"  id="sub-item10-3" />
																						<label for="sub-item10-3">3</label>
																						
																						<input class="with-gap" name="sub-item10" type="radio" value="4"  id="sub-item10-4" />
																						<label for="sub-item10-4">4</label>
																						
																						<input class="with-gap" name="sub-item10" type="radio" value="5"  id="sub-item10-5"/>
																						<label for="sub-item10-5">5</label>
																					</span>
																				</div>
																	 		</td>
																		</tr>
															
																		<tr>
																			<td class="td-indent">
																				<div>
																					<div>
																						c. Displays ability to comply under pressure
																					</div>
																					<span>
																						<input class="with-gap" name="sub-item11" type="radio" value="1"  id="sub-item11-1" />
																						<label for="sub-item11-1">1</label>
																						
																						<input class="with-gap" name="sub-item11" type="radio" value="2"  id="sub-item11-2" />
																						<label for="sub-item11-2">2</label>
																						
																						<input class="with-gap" name="sub-item11" type="radio" value="3"  id="sub-item11-3" />
																						<label for="sub-item11-3">3</label>
																						
																						<input class="with-gap" name="sub-item11" type="radio" value="4"  id="sub-item11-4" />
																						<label for="sub-item11-4">4</label>
																						
																						<input class="with-gap" name="sub-item11" type="radio" value="5"  id="sub-item11-5"/>
																						<label for="sub-item11-5">5</label>
																					</span>
																				</div>
																	 		</td>
																		</tr>
															
																		<tr>
																			<td class="td-indent">
																				<div>
																					<div>
																						d. Exercises effective use of time
																					</div>
																					<span>
																						<input class="with-gap" name="sub-item12" type="radio" value="1"  id="sub-item12-1" />
																						<label for="sub-item12-1">1</label>
																						
																						<input class="with-gap" name="sub-item12" type="radio" value="2"  id="sub-item12-2" />
																						<label for="sub-item12-2">2</label>
																						
																						<input class="with-gap" name="sub-item12" type="radio" value="3"  id="sub-item12-3" />
																						<label for="sub-item12-3">3</label>
																						
																						<input class="with-gap" name="sub-item12" type="radio" value="4"  id="sub-item12-4" />
																						<label for="sub-item12-4">4</label>
																						
																						<input class="with-gap" name="sub-item12" type="radio" value="5"  id="sub-item12-5"/>
																						<label for="sub-item12-5">5</label>
																					</span>
																				</div>
																	 		</td>
																		</tr>
																		  <tr class="scrollspy "  id="list-p-item4" >
																			 <td >
																				 <div><b>4. Work Habits</b></div>
																				 <div class="td-indent italic">
																							The capability of the student to display positive and cooperative attitude towards the assigned task	 
																				 </div>
																		  </td>
																	  </tr>
														
																		<tr>
																			<td class="td-indent">
																				<div>
																					<div>
																						a. Accepts constructive criticisms
																					</div>
																					<span>
																						<input class="with-gap" name="sub-item13" type="radio" value="1"  id="sub-item13-1" />
																						<label for="sub-item13-1">1</label>
																						
																						<input class="with-gap" name="sub-item13" type="radio" value="2"  id="sub-item13-2" />
																						<label for="sub-item13-2">2</label>
																						
																						<input class="with-gap" name="sub-item13" type="radio" value="3"  id="sub-item13-3" />
																						<label for="sub-item13-3">3</label>
																						
																						<input class="with-gap" name="sub-item13" type="radio" value="4"  id="sub-item13-4" />
																						<label for="sub-item13-4">4</label>
																						
																						<input class="with-gap" name="sub-item13" type="radio" value="5"  id="sub-item13-5"/>
																						<label for="sub-item13-5">5</label>
																					</span>
																				</div>
																	 		</td>
																		</tr>
															
																		<tr>
																			<td class="td-indent">
																				<div>
																					<div>
																						b. Exhibits etiquette
																					</div>
																					<span>
																						<input class="with-gap" name="sub-item14" type="radio" value="1"  id="sub-item14-1" />
																						<label for="sub-item14-1">1</label>
																						
																						<input class="with-gap" name="sub-item14" type="radio" value="2"  id="sub-item14-2" />
																						<label for="sub-item14-2">2</label>
																						
																						<input class="with-gap" name="sub-item14" type="radio" value="3"  id="sub-item14-3" />
																						<label for="sub-item14-3">3</label>
																						
																						<input class="with-gap" name="sub-item14" type="radio" value="4"  id="sub-item14-4" />
																						<label for="sub-item14-4">4</label>
																						
																						<input class="with-gap" name="sub-item14" type="radio" value="5"  id="sub-item14-5"/>
																						<label for="sub-item14-5">5</label>
																					</span>
																				</div>
																	 		</td>
																		</tr>
																		  <tr class="scrollspy "  id="list-p-item5" >
																			 <td >
																				 <div><b>5. Communication Skills	  </b></div>
																				 <div class="td-indent italic">
																							The manner of how the student express ideas both in oral and written form including the ability to listen well and respond appropriately	 
																				 </div>
																		  </td>
																	  </tr>
														
																		<tr>
																			<td class="td-indent">
																				<div>
																					<div>
																						a. Exhibits good written communication skills
																					</div>
																					<span>
																						<input class="with-gap" name="sub-item15" type="radio" value="1"  id="sub-item15-1" />
																						<label for="sub-item15-1">1</label>
																						
																						<input class="with-gap" name="sub-item15" type="radio" value="2"  id="sub-item15-2" />
																						<label for="sub-item15-2">2</label>
																						
																						<input class="with-gap" name="sub-item15" type="radio" value="3"  id="sub-item15-3" />
																						<label for="sub-item15-3">3</label>
																						
																						<input class="with-gap" name="sub-item15" type="radio" value="4"  id="sub-item15-4" />
																						<label for="sub-item15-4">4</label>
																						
																						<input class="with-gap" name="sub-item15" type="radio" value="5"  id="sub-item15-5"/>
																						<label for="sub-item15-5">5</label>
																					</span>
																				</div>
																	 		</td>
																		</tr>
															
																		<tr>
																			<td class="td-indent">
																				<div>
																					<div>
																						b. Communicates well orally
																					</div>
																					<span>
																						<input class="with-gap" name="sub-item16" type="radio" value="1"  id="sub-item16-1" />
																						<label for="sub-item16-1">1</label>
																						
																						<input class="with-gap" name="sub-item16" type="radio" value="2"  id="sub-item16-2" />
																						<label for="sub-item16-2">2</label>
																						
																						<input class="with-gap" name="sub-item16" type="radio" value="3"  id="sub-item16-3" />
																						<label for="sub-item16-3">3</label>
																						
																						<input class="with-gap" name="sub-item16" type="radio" value="4"  id="sub-item16-4" />
																						<label for="sub-item16-4">4</label>
																						
																						<input class="with-gap" name="sub-item16" type="radio" value="5"  id="sub-item16-5"/>
																						<label for="sub-item16-5">5</label>
																					</span>
																				</div>
																	 		</td>
																		</tr>
															
																		<tr>
																			<td class="td-indent">
																				<div>
																					<div>
																						c. Provides information to others
																					</div>
																					<span>
																						<input class="with-gap" name="sub-item17" type="radio" value="1"  id="sub-item17-1" />
																						<label for="sub-item17-1">1</label>
																						
																						<input class="with-gap" name="sub-item17" type="radio" value="2"  id="sub-item17-2" />
																						<label for="sub-item17-2">2</label>
																						
																						<input class="with-gap" name="sub-item17" type="radio" value="3"  id="sub-item17-3" />
																						<label for="sub-item17-3">3</label>
																						
																						<input class="with-gap" name="sub-item17" type="radio" value="4"  id="sub-item17-4" />
																						<label for="sub-item17-4">4</label>
																						
																						<input class="with-gap" name="sub-item17" type="radio" value="5"  id="sub-item17-5"/>
																						<label for="sub-item17-5">5</label>
																					</span>
																				</div>
																	 		</td>
																		</tr>
															
																		<tr>
																			<td class="td-indent">
																				<div>
																					<div>
																						d. Displays ability to listen to instructions
																					</div>
																					<span>
																						<input class="with-gap" name="sub-item18" type="radio" value="1"  id="sub-item18-1" />
																						<label for="sub-item18-1">1</label>
																						
																						<input class="with-gap" name="sub-item18" type="radio" value="2"  id="sub-item18-2" />
																						<label for="sub-item18-2">2</label>
																						
																						<input class="with-gap" name="sub-item18" type="radio" value="3"  id="sub-item18-3" />
																						<label for="sub-item18-3">3</label>
																						
																						<input class="with-gap" name="sub-item18" type="radio" value="4"  id="sub-item18-4" />
																						<label for="sub-item18-4">4</label>
																						
																						<input class="with-gap" name="sub-item18" type="radio" value="5"  id="sub-item18-5"/>
																						<label for="sub-item18-5">5</label>
																					</span>
																				</div>
																	 		</td>
																		</tr>
															
																		<tr>
																			<td class="td-indent">
																				<div>
																					<div>
																						e. Responds appropriately
																					</div>
																					<span>
																						<input class="with-gap" name="sub-item19" type="radio" value="1"  id="sub-item19-1" />
																						<label for="sub-item19-1">1</label>
																						
																						<input class="with-gap" name="sub-item19" type="radio" value="2"  id="sub-item19-2" />
																						<label for="sub-item19-2">2</label>
																						
																						<input class="with-gap" name="sub-item19" type="radio" value="3"  id="sub-item19-3" />
																						<label for="sub-item19-3">3</label>
																						
																						<input class="with-gap" name="sub-item19" type="radio" value="4"  id="sub-item19-4" />
																						<label for="sub-item19-4">4</label>
																						
																						<input class="with-gap" name="sub-item19" type="radio" value="5"  id="sub-item19-5"/>
																						<label for="sub-item19-5">5</label>
																					</span>
																				</div>
																	 		</td>
																		</tr>
																			</table>
																</li>
															</ul>		
															<h5 class="titles center-align">
																<div id="performance-factors" >PART II. Behavioral Traits</div>
															</h5>
												<ul id="list-p2" class="eval-item blue-grey-text">
																<li>
																	<table class="">
																  <tr class="scrollspy "  id="list-p-item6" >
																			 <td >
																				 <div><b>1. Punctuality and Attendance</b></div>
																				 <div class="td-indent italic">
																							The event of how the students reports on duty and coordinates absences	 
																				 </div>
																		  </td>
																	  </tr>
														
																		<tr>
																			<td class="td-indent">
																				<div>
																					<div>
																						a. Arrives on time
																					</div>
																					<span>
																						<input class="with-gap" name="sub-item20" type="radio" value="1"  id="sub-item20-1" />
																						<label for="sub-item20-1">1</label>
																						
																						<input class="with-gap" name="sub-item20" type="radio" value="2"  id="sub-item20-2" />
																						<label for="sub-item20-2">2</label>
																						
																						<input class="with-gap" name="sub-item20" type="radio" value="3"  id="sub-item20-3" />
																						<label for="sub-item20-3">3</label>
																						
																						<input class="with-gap" name="sub-item20" type="radio" value="4"  id="sub-item20-4" />
																						<label for="sub-item20-4">4</label>
																						
																						<input class="with-gap" name="sub-item20" type="radio" value="5"  id="sub-item20-5"/>
																						<label for="sub-item20-5">5</label>
																					</span>
																				</div>
																	 		</td>
																		</tr>
															
																		<tr>
																			<td class="td-indent">
																				<div>
																					<div>
																						b. Keeps commitments
																					</div>
																					<span>
																						<input class="with-gap" name="sub-item21" type="radio" value="1"  id="sub-item21-1" />
																						<label for="sub-item21-1">1</label>
																						
																						<input class="with-gap" name="sub-item21" type="radio" value="2"  id="sub-item21-2" />
																						<label for="sub-item21-2">2</label>
																						
																						<input class="with-gap" name="sub-item21" type="radio" value="3"  id="sub-item21-3" />
																						<label for="sub-item21-3">3</label>
																						
																						<input class="with-gap" name="sub-item21" type="radio" value="4"  id="sub-item21-4" />
																						<label for="sub-item21-4">4</label>
																						
																						<input class="with-gap" name="sub-item21" type="radio" value="5"  id="sub-item21-5"/>
																						<label for="sub-item21-5">5</label>
																					</span>
																				</div>
																	 		</td>
																		</tr>
															
																		<tr>
																			<td class="td-indent">
																				<div>
																					<div>
																						c. Reports and coordinates absences
																					</div>
																					<span>
																						<input class="with-gap" name="sub-item22" type="radio" value="1"  id="sub-item22-1" />
																						<label for="sub-item22-1">1</label>
																						
																						<input class="with-gap" name="sub-item22" type="radio" value="2"  id="sub-item22-2" />
																						<label for="sub-item22-2">2</label>
																						
																						<input class="with-gap" name="sub-item22" type="radio" value="3"  id="sub-item22-3" />
																						<label for="sub-item22-3">3</label>
																						
																						<input class="with-gap" name="sub-item22" type="radio" value="4"  id="sub-item22-4" />
																						<label for="sub-item22-4">4</label>
																						
																						<input class="with-gap" name="sub-item22" type="radio" value="5"  id="sub-item22-5"/>
																						<label for="sub-item22-5">5</label>
																					</span>
																				</div>
																	 		</td>
																		</tr>
																		  <tr class="scrollspy "  id="list-p-item7" >
																			 <td >
																				 <div><b>2. Dependability</b></div>
																				 <div class="td-indent italic">
																							The span of time spent by the student to correctly perform tasks at a given time frame 	 
																				 </div>
																		  </td>
																	  </tr>
														
																		<tr>
																			<td class="td-indent">
																				<div>
																					<div>
																						a. Completes tasks on time
																					</div>
																					<span>
																						<input class="with-gap" name="sub-item23" type="radio" value="1"  id="sub-item23-1" />
																						<label for="sub-item23-1">1</label>
																						
																						<input class="with-gap" name="sub-item23" type="radio" value="2"  id="sub-item23-2" />
																						<label for="sub-item23-2">2</label>
																						
																						<input class="with-gap" name="sub-item23" type="radio" value="3"  id="sub-item23-3" />
																						<label for="sub-item23-3">3</label>
																						
																						<input class="with-gap" name="sub-item23" type="radio" value="4"  id="sub-item23-4" />
																						<label for="sub-item23-4">4</label>
																						
																						<input class="with-gap" name="sub-item23" type="radio" value="5"  id="sub-item23-5"/>
																						<label for="sub-item23-5">5</label>
																					</span>
																				</div>
																	 		</td>
																		</tr>
															
																		<tr>
																			<td class="td-indent">
																				<div>
																					<div>
																						b. Shows ability to organize and prioritize tasks
																					</div>
																					<span>
																						<input class="with-gap" name="sub-item24" type="radio" value="1"  id="sub-item24-1" />
																						<label for="sub-item24-1">1</label>
																						
																						<input class="with-gap" name="sub-item24" type="radio" value="2"  id="sub-item24-2" />
																						<label for="sub-item24-2">2</label>
																						
																						<input class="with-gap" name="sub-item24" type="radio" value="3"  id="sub-item24-3" />
																						<label for="sub-item24-3">3</label>
																						
																						<input class="with-gap" name="sub-item24" type="radio" value="4"  id="sub-item24-4" />
																						<label for="sub-item24-4">4</label>
																						
																						<input class="with-gap" name="sub-item24" type="radio" value="5"  id="sub-item24-5"/>
																						<label for="sub-item24-5">5</label>
																					</span>
																				</div>
																	 		</td>
																		</tr>
															
																		<tr>
																			<td class="td-indent">
																				<div>
																					<div>
																						c. Performs task in a timely manner
																					</div>
																					<span>
																						<input class="with-gap" name="sub-item25" type="radio" value="1"  id="sub-item25-1" />
																						<label for="sub-item25-1">1</label>
																						
																						<input class="with-gap" name="sub-item25" type="radio" value="2"  id="sub-item25-2" />
																						<label for="sub-item25-2">2</label>
																						
																						<input class="with-gap" name="sub-item25" type="radio" value="3"  id="sub-item25-3" />
																						<label for="sub-item25-3">3</label>
																						
																						<input class="with-gap" name="sub-item25" type="radio" value="4"  id="sub-item25-4" />
																						<label for="sub-item25-4">4</label>
																						
																						<input class="with-gap" name="sub-item25" type="radio" value="5"  id="sub-item25-5"/>
																						<label for="sub-item25-5">5</label>
																					</span>
																				</div>
																	 		</td>
																		</tr>
																		  <tr class="scrollspy "  id="list-p-item8" >
																			 <td >
																				 <div><b>3. Initiative</b></div>
																				 <div class="td-indent italic">
																							The ability of the student to seek and assume responsibility on task assigned	 
																				 </div>
																		  </td>
																	  </tr>
														
																		<tr>
																			<td class="td-indent">
																				<div>
																					<div>
																						a. Accepts tasks new to him/her
																					</div>
																					<span>
																						<input class="with-gap" name="sub-item26" type="radio" value="1"  id="sub-item26-1" />
																						<label for="sub-item26-1">1</label>
																						
																						<input class="with-gap" name="sub-item26" type="radio" value="2"  id="sub-item26-2" />
																						<label for="sub-item26-2">2</label>
																						
																						<input class="with-gap" name="sub-item26" type="radio" value="3"  id="sub-item26-3" />
																						<label for="sub-item26-3">3</label>
																						
																						<input class="with-gap" name="sub-item26" type="radio" value="4"  id="sub-item26-4" />
																						<label for="sub-item26-4">4</label>
																						
																						<input class="with-gap" name="sub-item26" type="radio" value="5"  id="sub-item26-5"/>
																						<label for="sub-item26-5">5</label>
																					</span>
																				</div>
																	 		</td>
																		</tr>
															
																		<tr>
																			<td class="td-indent">
																				<div>
																					<div>
																						b. Completes task before leaving the workplace
																					</div>
																					<span>
																						<input class="with-gap" name="sub-item27" type="radio" value="1"  id="sub-item27-1" />
																						<label for="sub-item27-1">1</label>
																						
																						<input class="with-gap" name="sub-item27" type="radio" value="2"  id="sub-item27-2" />
																						<label for="sub-item27-2">2</label>
																						
																						<input class="with-gap" name="sub-item27" type="radio" value="3"  id="sub-item27-3" />
																						<label for="sub-item27-3">3</label>
																						
																						<input class="with-gap" name="sub-item27" type="radio" value="4"  id="sub-item27-4" />
																						<label for="sub-item27-4">4</label>
																						
																						<input class="with-gap" name="sub-item27" type="radio" value="5"  id="sub-item27-5"/>
																						<label for="sub-item27-5">5</label>
																					</span>
																				</div>
																	 		</td>
																		</tr>
																		  <tr class="scrollspy "  id="list-p-item9" >
																			 <td >
																				 <div><b>4. Adaptability</b></div>
																				 <div class="td-indent italic">
																							The capability of the student to changes in the assigned tasks, procedure or work environment	 
																				 </div>
																		  </td>
																	  </tr>
														
																		<tr>
																			<td class="td-indent">
																				<div>
																					<div>
																						a. Displays acceptance to changes	
																					</div>
																					<span>
																						<input class="with-gap" name="sub-item28" type="radio" value="1"  id="sub-item28-1" />
																						<label for="sub-item28-1">1</label>
																						
																						<input class="with-gap" name="sub-item28" type="radio" value="2"  id="sub-item28-2" />
																						<label for="sub-item28-2">2</label>
																						
																						<input class="with-gap" name="sub-item28" type="radio" value="3"  id="sub-item28-3" />
																						<label for="sub-item28-3">3</label>
																						
																						<input class="with-gap" name="sub-item28" type="radio" value="4"  id="sub-item28-4" />
																						<label for="sub-item28-4">4</label>
																						
																						<input class="with-gap" name="sub-item28" type="radio" value="5"  id="sub-item28-5"/>
																						<label for="sub-item28-5">5</label>
																					</span>
																				</div>
																	 		</td>
																		</tr>
															
																		<tr>
																			<td class="td-indent">
																				<div>
																					<div>
																						b. Demonstrates initiative
																					</div>
																					<span>
																						<input class="with-gap" name="sub-item29" type="radio" value="1"  id="sub-item29-1" />
																						<label for="sub-item29-1">1</label>
																						
																						<input class="with-gap" name="sub-item29" type="radio" value="2"  id="sub-item29-2" />
																						<label for="sub-item29-2">2</label>
																						
																						<input class="with-gap" name="sub-item29" type="radio" value="3"  id="sub-item29-3" />
																						<label for="sub-item29-3">3</label>
																						
																						<input class="with-gap" name="sub-item29" type="radio" value="4"  id="sub-item29-4" />
																						<label for="sub-item29-4">4</label>
																						
																						<input class="with-gap" name="sub-item29" type="radio" value="5"  id="sub-item29-5"/>
																						<label for="sub-item29-5">5</label>
																					</span>
																				</div>
																	 		</td>
																		</tr>
															
																		<tr>
																			<td class="td-indent">
																				<div>
																					<div>
																						c. Asks for help when needed
																					</div>
																					<span>
																						<input class="with-gap" name="sub-item30" type="radio" value="1"  id="sub-item30-1" />
																						<label for="sub-item30-1">1</label>
																						
																						<input class="with-gap" name="sub-item30" type="radio" value="2"  id="sub-item30-2" />
																						<label for="sub-item30-2">2</label>
																						
																						<input class="with-gap" name="sub-item30" type="radio" value="3"  id="sub-item30-3" />
																						<label for="sub-item30-3">3</label>
																						
																						<input class="with-gap" name="sub-item30" type="radio" value="4"  id="sub-item30-4" />
																						<label for="sub-item30-4">4</label>
																						
																						<input class="with-gap" name="sub-item30" type="radio" value="5"  id="sub-item30-5"/>
																						<label for="sub-item30-5">5</label>
																					</span>
																				</div>
																	 		</td>
																		</tr>
															
																		<tr>
																			<td class="td-indent">
																				<div>
																					<div>
																						d. Undertakes self-development activities
																					</div>
																					<span>
																						<input class="with-gap" name="sub-item31" type="radio" value="1"  id="sub-item31-1" />
																						<label for="sub-item31-1">1</label>
																						
																						<input class="with-gap" name="sub-item31" type="radio" value="2"  id="sub-item31-2" />
																						<label for="sub-item31-2">2</label>
																						
																						<input class="with-gap" name="sub-item31" type="radio" value="3"  id="sub-item31-3" />
																						<label for="sub-item31-3">3</label>
																						
																						<input class="with-gap" name="sub-item31" type="radio" value="4"  id="sub-item31-4" />
																						<label for="sub-item31-4">4</label>
																						
																						<input class="with-gap" name="sub-item31" type="radio" value="5"  id="sub-item31-5"/>
																						<label for="sub-item31-5">5</label>
																					</span>
																				</div>
																	 		</td>
																		</tr>
																		  <tr class="scrollspy "  id="list-p-item10" >
																			 <td >
																				 <div><b>5. Cooperation</b></div>
																				 <div class="td-indent italic">
																							The willingness of the student to work with others while maintaining rapport as a team member	 
																				 </div>
																		  </td>
																	  </tr>
														
																		<tr>
																			<td class="td-indent">
																				<div>
																					<div>
																						a. Maintains effective relationship among others
																					</div>
																					<span>
																						<input class="with-gap" name="sub-item32" type="radio" value="1"  id="sub-item32-1" />
																						<label for="sub-item32-1">1</label>
																						
																						<input class="with-gap" name="sub-item32" type="radio" value="2"  id="sub-item32-2" />
																						<label for="sub-item32-2">2</label>
																						
																						<input class="with-gap" name="sub-item32" type="radio" value="3"  id="sub-item32-3" />
																						<label for="sub-item32-3">3</label>
																						
																						<input class="with-gap" name="sub-item32" type="radio" value="4"  id="sub-item32-4" />
																						<label for="sub-item32-4">4</label>
																						
																						<input class="with-gap" name="sub-item32" type="radio" value="5"  id="sub-item32-5"/>
																						<label for="sub-item32-5">5</label>
																					</span>
																				</div>
																	 		</td>
																		</tr>
															
																		<tr>
																			<td class="td-indent">
																				<div>
																					<div>
																						b. Exhibits tack and considerations
																					</div>
																					<span>
																						<input class="with-gap" name="sub-item33" type="radio" value="1"  id="sub-item33-1" />
																						<label for="sub-item33-1">1</label>
																						
																						<input class="with-gap" name="sub-item33" type="radio" value="2"  id="sub-item33-2" />
																						<label for="sub-item33-2">2</label>
																						
																						<input class="with-gap" name="sub-item33" type="radio" value="3"  id="sub-item33-3" />
																						<label for="sub-item33-3">3</label>
																						
																						<input class="with-gap" name="sub-item33" type="radio" value="4"  id="sub-item33-4" />
																						<label for="sub-item33-4">4</label>
																						
																						<input class="with-gap" name="sub-item33" type="radio" value="5"  id="sub-item33-5"/>
																						<label for="sub-item33-5">5</label>
																					</span>
																				</div>
																	 		</td>
																		</tr>
															
																		<tr>
																			<td class="td-indent">
																				<div>
																					<div>
																						c. Responds to company discretions
																					</div>
																					<span>
																						<input class="with-gap" name="sub-item34" type="radio" value="1"  id="sub-item34-1" />
																						<label for="sub-item34-1">1</label>
																						
																						<input class="with-gap" name="sub-item34" type="radio" value="2"  id="sub-item34-2" />
																						<label for="sub-item34-2">2</label>
																						
																						<input class="with-gap" name="sub-item34" type="radio" value="3"  id="sub-item34-3" />
																						<label for="sub-item34-3">3</label>
																						
																						<input class="with-gap" name="sub-item34" type="radio" value="4"  id="sub-item34-4" />
																						<label for="sub-item34-4">4</label>
																						
																						<input class="with-gap" name="sub-item34" type="radio" value="5"  id="sub-item34-5"/>
																						<label for="sub-item34-5">5</label>
																					</span>
																				</div>
																	 		</td>
																		</tr>
															
																		<tr>
																			<td class="td-indent">
																				<div>
																					<div>
																						d. Display positive outlook among others
																					</div>
																					<span>
																						<input class="with-gap" name="sub-item35" type="radio" value="1"  id="sub-item35-1" />
																						<label for="sub-item35-1">1</label>
																						
																						<input class="with-gap" name="sub-item35" type="radio" value="2"  id="sub-item35-2" />
																						<label for="sub-item35-2">2</label>
																						
																						<input class="with-gap" name="sub-item35" type="radio" value="3"  id="sub-item35-3" />
																						<label for="sub-item35-3">3</label>
																						
																						<input class="with-gap" name="sub-item35" type="radio" value="4"  id="sub-item35-4" />
																						<label for="sub-item35-4">4</label>
																						
																						<input class="with-gap" name="sub-item35" type="radio" value="5"  id="sub-item35-5"/>
																						<label for="sub-item35-5">5</label>
																					</span>
																				</div>
																	 		</td>
																		</tr>
															
																		<tr>
																			<td class="td-indent">
																				<div>
																					<div>
																						e. Works cooperatively
																					</div>
																					<span>
																						<input class="with-gap" name="sub-item36" type="radio" value="1"  id="sub-item36-1" />
																						<label for="sub-item36-1">1</label>
																						
																						<input class="with-gap" name="sub-item36" type="radio" value="2"  id="sub-item36-2" />
																						<label for="sub-item36-2">2</label>
																						
																						<input class="with-gap" name="sub-item36" type="radio" value="3"  id="sub-item36-3" />
																						<label for="sub-item36-3">3</label>
																						
																						<input class="with-gap" name="sub-item36" type="radio" value="4"  id="sub-item36-4" />
																						<label for="sub-item36-4">4</label>
																						
																						<input class="with-gap" name="sub-item36" type="radio" value="5"  id="sub-item36-5"/>
																						<label for="sub-item36-5">5</label>
																					</span>
																				</div>
																	 		</td>
																		</tr>
																			</table>
																</li>
															</ul>		
																									
												<!--<ul>
													<li>
														<table class="">
															  <tr>
																	 <td >
																		 <div><h5>1.	Knowledge, Skills, Abilities</h5></div>
																		 <div class="td-indent italic">
																			 The extent to which the students exhibits the required level of job knowledge and/or skills to perform the task assigned to him/her
																		 </div>
				
																  </td>
															  </tr>
															  <tr  class=" scrollspy" id="aa">
																	 <td class="td-indent">
																		 <div>
																		<dl >
																			<dt>
																				a.	Considers comprehension of job procedures
																			</dt>
																			<dt>
																				<input class="with-gap" name="pf1" type="radio" value="1"  id="ppf1-1"  />
																				<label for="ppf1-1">1</label>
																				<input class="with-gap" name="pf1" type="radio" value="2"  id="ppf1-2"  />
																				<label for="ppf1-2">2</label>
																				<input class="with-gap" name="pf1" type="radio" value="3"  id="ppf1-3"  />
																				<label for="ppf1-3">3</label>
																				<input class="with-gap" name="pf1" type="radio" value="4"  id="ppf1-4"  />
																				<label for="ppf1-4">4</label>
																				<input class="with-gap" name="pf1" type="radio" value="5"  id="ppf1-5"  />
																				<label for="ppf1-5">5</label>
																			</dt>
																		</dl>
																			 </div>
																	 </td>
															  </tr>
																<tr class="scrollspy" id="bb">
																	<td class="td-indent">
																		<dl >
																			<dt>
																				b.	Understands responsibility and scope of duties
																			</dt>
																			<dt>
																				<input class="with-gap" name="pf1" type="radio" value="1"  id="ppf1-1"  />
																				<label for="ppf1-1">1</label>
																				<input class="with-gap" name="pf1" type="radio" value="2"  id="ppf1-2"  />
																				<label for="ppf1-2">2</label>
																				<input class="with-gap" name="pf1" type="radio" value="3"  id="ppf1-3"  />
																				<label for="ppf1-3">3</label>
																				<input class="with-gap" name="pf1" type="radio" value="4"  id="ppf1-4"  />
																				<label for="ppf1-4">4</label>
																				<input class="with-gap" name="pf1" type="radio" value="5"  id="ppf1-5"  />
																				<label for="ppf1-5">5</label>
																			</dt>
																		</dl>
																	 </td>
																</tr>
																<tr>
																	<td class="td-indent">
																		<dl >
																			<dt>
																				c.	Exhibits ability to learn and apply new skills
																			</dt>
																			<dt>
																				<input class="with-gap" name="pf1" type="radio" value="1"  id="ppf1-1"  />
																				<label for="ppf1-1">1</label>
																				<input class="with-gap" name="pf1" type="radio" value="2"  id="ppf1-2"  />
																				<label for="ppf1-2">2</label>
																				<input class="with-gap" name="pf1" type="radio" value="3"  id="ppf1-3"  />
																				<label for="ppf1-3">3</label>
																				<input class="with-gap" name="pf1" type="radio" value="4"  id="ppf1-4"  />
																				<label for="ppf1-4">4</label>
																				<input class="with-gap" name="pf1" type="radio" value="5"  id="ppf1-5"  />
																				<label for="ppf1-5">5</label>
																			</dt>
																		</dl>
																	 </td>
																</tr>
														</table>
													</li>
												</ul>-->
						  					<input class="btn" type="submit" value="Done">
										</div>
								 </div>
						  </div>
			 		</form>
			 </div>
	  </div>
	  <div class="fixed-action-btn" style="top: 100px;right:20px">
		  <a class="btn-floating btn-large" href="http://127.0.0.1/ci/ci_materializecss/CodeIgniter-3.0.2/index.php/Training_station/Student_list " >
			  <i>Back</i>
		  </a>
	  </div>
	  <div class="col s3 m5 l3 hide-on-small-only ">
			 <div class="pinned ">
					<div class="card-panel scores">
						  <div class="card-content">
								 <span class="card-title">
									  Kindly use the following rating scale to <br />measure the students performance <br />factors and behavioral traits 
								 </span>
								 <ul>
									<li>1 - UNACCEPTABLE</li>			 
									<li>2 - NEEDS IMPROVEMENT</li>			 
									<li>3 - MEET EXPECTATIONS</li>			 
									<li>4 - EXCEEDS EXPECTATIONS </li>			 
									<li>5 - OUTSTANDING</li>			 
								 </ul>
						  </div>
					  </div>
					
						<div class="card-panel">
						  <div class="card-content toc-wrapper">
								 <span class="card-title">
										<h5>Evaluation Content</h5>
								 </span>
								 <ul style="list-style-type: upper-roman;" class="table-of-contents"  data-collapsible="accordion">
										<li>
											<div><a href="#performance-factors">Performance Factors</a></div>
											<div>
												<ol style="list-style-type: lower-alpha;">
												 	<li><a href="#list-p-item1">Knowledge, Skills, Abilities</a></li>			 
													<li><a href="#list-p-item2">Quality of Work</a></li>			 
													<li><a href="#list-p-item3">Quantity of Work</a></li>			 
													<li><a href="#list-p-item4">Work Habits</a></li>			 
													<li><a href="#list-p-item5">Communication Skills</a></li>			 
											  	</ol>
											</div>
										</li>
										<li>
											<div><a href="#behavioral-traits">Behavioral Traits</a></div>
											<div>
												<ol style="list-style-type: lower-alpha;">
													<li><a href="#list-p-item6">Punctuality and Attendance</a></li>			 
													<li><a href="#list-p-item7">Dependability</a></li>			 
													<li><a href="#list-p-item8">Initiative</a></li>			 
													<li><a href="#list-p-item9">Adaptability</a></li>			 
													<li><a href="#list-p-item10">Cooperation</a></li>			 
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
	<script src="http://127.0.0.1/ci/ci_materializecss/CodeIgniter-3.0.2/materializecss/js/materialize.js"></script>
	<script>
		/*alert($("document").length));
		if ($("window").length) {
			  $("#content-wrapper").pushpin({ top: $("#nav-a").height() });
			}
			else {
			  $("#content-wrapper").pushpin({ top: 0 });
			}*/
		$(document).ready(function(){
			$(".scrollspy").scrollSpy();
			
			var options = [
				{selector: "#list-p1", offset: 300, callback: "Materialize.showStaggeredList(#list-p1)" },
				{selector: "#list-p2", offset: 300, callback: "Materialize.showStaggeredList(#list-p2)" }
			];
			Materialize.scrollFire(options);
		});
	</script>
</body>
</html>
';
	
	
?>

<?php

    include_once APPPATH."/third_party/mpdf/mpdf.php";
	
	$mpdf=new mPDF(); 
	//$mpdf = $this->pdf->load(""en-GB-x","letter","","",10,10,10,10,6,3"); 
	$mpdf->SetFooter($_SERVER["HTTP_HOST"]."|{PAGENO}|".date(DATE_RFC822)); // Add a footer for good measure 
	$mpdf->WriteHTML($html); // write the HTML into the PDF
	$mpdf->Output(); // save to file because we can
?>
