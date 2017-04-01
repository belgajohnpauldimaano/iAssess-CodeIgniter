<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Student Evaluation</title>
	<!--<?php echo base_url('materializecss/css/materialize.css');?>-->
   <link href="http://127.0.0.1/ci/ci_materializecss/CodeIgniter-3.0.2/materializecss/css/materialize.css" rel="stylesheet">
   
   <style>
	   body{
		   margin:0;
		   padding: 0;
			font-family: 'Roboto', Calibri, Trebuchet, sans-serif;
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
										<div class='container'>
												<?php
													echo $questionnaire;
												?>
												
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
		  <a class='btn-floating btn-large' href='<?php echo base_url() . "index.php/Training_station/Student_list"; ?> ' >
			  <i>Back</i>
		  </a>
	  </div>
	  <div class="col s3 m5 l3 hide-on-small-only ">
			 <div class='pinned '>
					<div class='card-panel scores'>
						  <div class="card-content">
								 <span class="card-title">
									  Kindly use the following rating scale to <br />measure the students’ performance <br />factors and behavioral traits 
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
