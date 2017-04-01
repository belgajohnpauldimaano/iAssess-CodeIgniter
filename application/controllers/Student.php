<?php
	class Student extends CI_Controller{
		public function __construct(){
			parent::__construct();
			$this->load->model('Student/Student_model');
			$this->load->model('Misc/Misc_model');
			$this->load->library('Ajax_pagination');
			$this->load->library('table');	
			$this->Misc_model->check_user();
		}
		public function Site_Self_Eval(){
			$this->load->view('Student/Student_site_self_eval');
		}
		public function Training_station(){
			
			$row = $this->Student_model->Get_training_station();
			
			$data['ts_info'] = '<tbody><tr>
											<td>Training Station</td><td>'. $row->ts_name .'</td>
										</tr>
										<tr>
											<td>Contact Person</td><td>'. $row->ts_contact_person .'</td>
										</tr>
										<tr>
											<td>Position</td><td>'. $row->ts_contact_person_position .'</td>
										</tr>
										<tr>
											<td>Contact Number</td><td>'. $row->ts_contact_number .'</td>
										</tr>
										<tr>
											<td>Address</td><td>'. $row->ts_address .'</td>
										</tr>
										<tr>
											<td></td>
											<td>
												<form method="post" action="Site_Self_Eval"> 
													<input type="hidden" value="'. $row->ts_id_no .'" />
													<input type="submit" value="Evaluate" class="btn" />
												</form>
											</td>
										</tr>
										</tbody>';
			
			// menu
			$data['side_menu'] = '<div class="col s1 m3 hide-on-small-only" id="menu-left-container">
			<ul class="collapsible black-text" data-collapsible="accordion">
				<li>
					<div class="collapsible-header waves-effect waves-red"><a style="display:block" href="' . base_url() . 'index.php" class="black-text">Home</a></div>
				<!--<div class="collapsible-body"><p>Lorem ipsum dolor sit amet.</p></div>-->
				</li>
				<li>
					<div class="collapsible-header waves-effect waves-red  active ">Evaluate</div>
					<div class="collapsible-body">
							<div class="collection">
							   <a href="' . base_url() . 'index.php/Student/Training_station" class="collection-item  active">Site & Self Evaluation</a>
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
			$this->load->view('includes/header',$data);
			$this->load->view('Student/Student_training_station_info',$data);
			$this->load->view('includes/footer');
		}
		public function View_individual_training_station(){
     
			//$row = $this->Practicum_coordinator_model->Get_training_station($this->input->post());
				/*$dir_array = array(
								"id" 	=> $row->ts_id_no,
								"name" 	=> $row->ts_name,
								"cp"		=> $row->ts_contact_person,
								"cpp" 	=> $row->ts_contact_person_position,
								"cpn" 	=> $row->ts_contact_number,
								"adr" 	=> $row->ts_address
							);
			//endforeach;
			
			echo json_encode($dir_array);*/
      }
		
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
							   <a href="' . base_url() . 'index.php/Student/Training_station" class="collection-item">Site & Self Evaluation</a>
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
		
	}