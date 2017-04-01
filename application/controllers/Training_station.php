<?php
	class Training_station extends CI_Controller{
		public function __construct(){
			parent::__construct();
			$this->load->model('Training_station/Training_station_model');
			$this->load->model('Misc/Misc_model');
			$this->load->library('Ajax_pagination');
			$this->load->library('table');	
			$this->perPage = 10;
			$this->my_key = '1';
			$this->Misc_model->check_user();
		}
		
		public function View_individual_training_station(){
     
			$row = $this->Practicum_coordinator_model->Get_training_station($this->input->post('id'));
				$dir_array = array(
								"id" 	=> $row->ts_id_no,
								"name" 	=> $row->ts_name,
								"cp"		=> $row->ts_contact_person,
								"cpp" 	=> $row->ts_contact_person_position,
								"cpn" 	=> $row->ts_contact_number,
								"adr" 	=> $row->ts_address
							);
			//endforeach;
			
			echo json_encode($dir_array);
      }
		/*PRINT EVALUATION*/
		public function Eval_student_print(){
			$part_row = $this->Training_station_model->List_survey_question_part();
			
			
			$stud_id = $this->input->get('stud_id');
			
			$data['questionnaire'] = '<input type="hidden" name="stud_id" value="'.$stud_id.'">';
			foreach($part_row as $p_row):
				$data['questionnaire'] .= "		<h5 class='titles center-align'>
																<div id='performance-factors' >".$p_row['part_title']."</div>
															</h5>
										";
				$data['questionnaire'] .= "		<ul id='list-p". $p_row['part_id'] ."' class='eval-item blue-grey-text'>
																<li>
																	<table class=''>
													";
				$part_item = $this->Training_station_model->List_survey_question_item($p_row['part_id']);
				
				foreach($part_item as $p_item):
					$data['questionnaire'] .= "			  <tr class='scrollspy '  id='list-p-item". $p_item['item_id'] ."' >
																			 <td >
																				 <div><b>". $p_item['item_title']  ."</b></div>
																				 <div class='td-indent italic'>
																							". $p_item['item_desc'] ."	 
																				 </div>
																		  </td>
																	  </tr>
														";
					$sub_item = $this->Training_station_model->List_survey_sub_item($p_item['item_id']);
					foreach($sub_item as $s_item):
						$data['questionnaire'] .= "
																		<tr>
																			<td class='td-indent'>
																				<div>
																					<div>
																						". $s_item['si_desc'] ."
																					</div>
																					<span>
																						<input class='with-gap' name='sub-item". $s_item['si_id'] ."' type='radio' value='1'  id='sub-item". $s_item['si_id'] ."-1' />
																						<label for='sub-item". $s_item['si_id'] ."-1'>1</label>
																						
																						<input class='with-gap' name='sub-item". $s_item['si_id'] ."' type='radio' value='2'  id='sub-item". $s_item['si_id'] ."-2' />
																						<label for='sub-item". $s_item['si_id'] ."-2'>2</label>
																						
																						<input class='with-gap' name='sub-item". $s_item['si_id'] ."' type='radio' value='3'  id='sub-item". $s_item['si_id'] ."-3' />
																						<label for='sub-item". $s_item['si_id'] ."-3'>3</label>
																						
																						<input class='with-gap' name='sub-item". $s_item['si_id'] ."' type='radio' value='4'  id='sub-item". $s_item['si_id'] ."-4' />
																						<label for='sub-item". $s_item['si_id'] ."-4'>4</label>
																						
																						<input class='with-gap' name='sub-item". $s_item['si_id'] ."' type='radio' value='5'  id='sub-item". $s_item['si_id'] ."-5'/>
																						<label for='sub-item". $s_item['si_id'] ."-5'>5</label>
																					</span>
																				</div>
																	 		</td>
																		</tr>
															";
					endforeach;
			
				endforeach;
			
				$data['questionnaire'] .= "				</table>
																</li>
															</ul>		
													";
			endforeach;
			
			//List_survery_question_part_item($part_id)
			//List_survery_question_sub_item($item_id)
			
			$html = $this->load->view('a');	

		} 
		/*PRINT EVALUATION*/
		public function Eval_student(){
			$part_row = $this->Training_station_model->List_survey_question_part();
			
			
			$stud_id = $this->input->get('stud_id');
			
			$data['questionnaire'] = '<input type="hidden" name="stud_id" value="'.$stud_id.'">';
			foreach($part_row as $p_row):
				$data['questionnaire'] .= "		<h5 class='titles center-align'>
																<div id='performance-factors' >".$p_row['part_title']."</div>
															</h5>
										";
				$data['questionnaire'] .= "		<ul id='list-p". $p_row['part_id'] ."' class='eval-item blue-grey-text'>
																<li>
																	<table class=''>
													";
				$part_item = $this->Training_station_model->List_survey_question_item($p_row['part_id']);
				
				foreach($part_item as $p_item):
					$data['questionnaire'] .= "			  <tr class='scrollspy '  id='list-p-item". $p_item['item_id'] ."' >
																			 <td >
																				 <div><b>". $p_item['item_title']  ."</b></div>
																				 <div class='td-indent italic'>
																							". $p_item['item_desc'] ."	 
																				 </div>
																		  </td>
																	  </tr>
														";
					$sub_item = $this->Training_station_model->List_survey_sub_item($p_item['item_id']);
					foreach($sub_item as $s_item):
						$data['questionnaire'] .= "
																		<tr>
																			<td class='td-indent'>
																				<div>
																					<div>
																						". $s_item['si_desc'] ."
																					</div>
																					<span>
																						<input class='with-gap' name='sub-item". $s_item['si_id'] ."' type='radio' value='1'  id='sub-item". $s_item['si_id'] ."-1' />
																						<label for='sub-item". $s_item['si_id'] ."-1'>1</label>
																						
																						<input class='with-gap' name='sub-item". $s_item['si_id'] ."' type='radio' value='2'  id='sub-item". $s_item['si_id'] ."-2' />
																						<label for='sub-item". $s_item['si_id'] ."-2'>2</label>
																						
																						<input class='with-gap' name='sub-item". $s_item['si_id'] ."' type='radio' value='3'  id='sub-item". $s_item['si_id'] ."-3' />
																						<label for='sub-item". $s_item['si_id'] ."-3'>3</label>
																						
																						<input class='with-gap' name='sub-item". $s_item['si_id'] ."' type='radio' value='4'  id='sub-item". $s_item['si_id'] ."-4' />
																						<label for='sub-item". $s_item['si_id'] ."-4'>4</label>
																						
																						<input class='with-gap' name='sub-item". $s_item['si_id'] ."' type='radio' value='5'  id='sub-item". $s_item['si_id'] ."-5'/>
																						<label for='sub-item". $s_item['si_id'] ."-5'>5</label>
																					</span>
																				</div>
																	 		</td>
																		</tr>
															";
					endforeach;
			
				endforeach;
			
				$data['questionnaire'] .= "				</table>
																</li>
															</ul>		
													";
			endforeach;
			
			//List_survery_question_part_item($part_id)
			//List_survery_question_sub_item($item_id)
			
			
			$this->load->view('Training_station/Training_station_eval_view.php',$data);
		} 
		public function index(){
			
			// menu
			$data['side_menu'] = '<div class="col s1 m3 hide-on-small-only" id="menu-left-container">
			<ul class="collapsible black-text" data-collapsible="accordion">
				<li>
					<div class="collapsible-header waves-effect waves-red  active"><a style="display:block" href="' . base_url() . 'index.php" class="black-text">Home</a></div>
				<!--<div class="collapsible-body"><p>Lorem ipsum dolor sit amet.</p></div>-->
				</li>
				<li>
					<div class="collapsible-header waves-effect waves-red ">Evaluate</div>
					<div class="collapsible-body">
							<div class="collection">
							   <a href="' . base_url() . 'index.php/Training_station/Student_list" class="collection-item">Student</a>
							 </div>
                    	</div>
				</li>
				<li>
					<div class="collapsible-header waves-effect waves-red">Change Password</div>
				</li>
				<li>
					<div class="collapsible-header waves-effect waves-red"><a style="display:block" href="' . base_url() . 'index.php/user/logout"  class="black-text">Logout</a></div>
					<!--<div class="collapsible-body"><p>Lorem ipsum dolor sit amet.</p></div>-->
				</li>
			</ul>
		</div>';
			//end of menu
			
			
			$data['current_page'] = 'Home';
			//loading view
			$this->load->view('includes/header', $data);
			$this->load->view('home_view');
			$this->load->view('includes/footer');
		}
		
		public function Student_list(){
			
			
			// Getting the data from database
			$rslist = $this->Training_station_model->List_student_info(array('limit' => $this->perPage));
			
			
			// start of ajax pagination
			
			
			$totalRec = count($this->Training_station_model->List_student_info());	
			$config['first_link'] = 'First';
			$config['div'] = 'table-result';
			$config['base_url'] = base_url() . 'index.php/Training_station/List_student_info';
			$config['total_rows'] = $totalRec;
			$config['per_page'] = $this->perPage;
			
			$this->ajax_pagination->initialize($config);
			
			
			// end of ajax pagination
						
			
			//start of table
			$template = array(
					'table_open'            => '<table class="bordered striped highlight ">',
					'table_close'           => '</table>'
			);
			
			$this->table->set_template($template);
			// Headings of the table
			$this->table->set_heading('Student ID', 'Name', 'Course', 'Action');
			
			if(!empty($rslist)){
				foreach($rslist as $itms):
					$action;
					$g_id =$itms['stud_id'];
					$stud_id = $itms['stud_id_no'];
					if($itms['stud_isevaluated'] == 0){
						$action = "<a href='" . base_url() . "index.php/Training_station/Eval_student?stud_id=". $stud_id ."' class='btn'>Evaluate</a>" ;
					}else{
						$action = "<b>Evaluated</b>";
					}
					$this->table->add_row(
						$itms['stud_id_no'] ,
						$itms['stud_fn'] . ' ' . $itms['stud_mn'] . ' ' . $itms['stud_ln'] ,
						$itms['crs_name'],
						$action
					);
				endforeach;
			}
			else{
				$this->table->add_row('No record found.', '', '', '');
			}
			//end of table
			
			
			
			
			// menu
			$data['side_menu'] = '<div class="col s1 m3 hide-on-small-only" id="menu-left-container">
			<ul class="collapsible black-text" data-collapsible="accordion">
				<li>
					<div class="collapsible-header waves-effect waves-red"><a style="display:block" href="' . base_url() . 'index.php" class="black-text">Home</a></div>
				<!--<div class="collapsible-body"><p>Lorem ipsum dolor sit amet.</p></div>-->
				</li>
				<li>
					<div class="collapsible-header waves-effect waves-red   active">Evaluate</div>
					<div class="collapsible-body">
							<div class="collection">
							   <a href="' . base_url() . 'index.php/Training_station/Student_list" class="collection-item  active">Student</a>
							 </div>
                    	</div>
				</li>
				<li>
					<div class="collapsible-header waves-effect waves-red">Change Password</div>
				</li>
				<li>
					<div class="collapsible-header waves-effect waves-red"><a style="display:block" href="' . base_url() . 'index.php/user/logout"  class="black-text">Logout</a></div>
					<!--<div class="collapsible-body"><p>Lorem ipsum dolor sit amet.</p></div>-->
				</li>
			</ul>
		</div>';
			//end of menu
			
			
			// all the courses from database
			$data['courses'] = $this->Misc_model->list_courses();
			$data['current_page'] = 'Student List';
			
			//loading all the view
			$this->load->view('includes/header', $data);
			$this->load->view('Training_station/Training_station_student_view',$data);
			$this->load->view('includes/footer');
		}
		
		
		
		public function List_student_info(){
			// Get the post data
			$srch = $this->input->post('srch');
			$page = $this->input->post('page');
			$crs = $this->input->post('crs');
			
			// validating
			if(!$page){
				$offset = 0;
			}else{
				$offset = $page;
			}
			
			// Getting the data from database
			$rslist = $this->Training_station_model->List_student_info(array( 'start' => $offset, 'limit' => $this->perPage, 'srch' => $srch, 'crs' => $crs ));
			
			
			// start of ajax pagination
			
			
			$totalRec = count($this->Training_station_model->List_student_info(array('srch' => $srch, 'crs' => $crs)));
			$config['div'] = 'table-result';
			$config['base_url'] = base_url() . '/index.php/Training_station/List_student_info/';
			$config['total_rows'] = $totalRec;
			$config['per_page'] = $this->perPage;

			$this->ajax_pagination->initialize($config);
			
			
			// end of ajax pagination
			
			
			
			
			
			
			//start of table
			$template = array(
					'table_open'            => '<table class="bordered striped highlight">',
					'table_close'           => '</table>'
			);
			
			
			
			
			$this->table->set_template($template);
			// Headings of the table
			$this->table->set_heading('Student ID', 'Name', 'Course', 'Action');
			
			if(!empty($rslist)){
				foreach($rslist as $itms):
					$action;
					
				
					$g_id =$itms['stud_id'];
					$stud_id = $itms['stud_id_no'];
					if($itms['stud_isevaluated'] == 0){
						$action = "<a href='" . base_url() . "index.php/Training_station/Eval_student?stud_id=". $stud_id ."' class='btn'>Evaluate</a>" ;
					}else{
						$action = "<b>Evaluated</b>";
					}
					$this->table->add_row(
						$itms['stud_id_no'] ,
						$itms['stud_fn'] . ' ' . $itms['stud_mn'] . ' ' . $itms['stud_ln'] ,
						$itms['crs_name'],
						$action
					);
				endforeach;
			}
			else{
				$this->table->add_row('No record found.', '', '', '');
			}
			//end of table
			
			
			
			
			
			echo $this->table->generate(); 
			echo $this->ajax_pagination->create_links();			
		}
		
		
		
		
	}