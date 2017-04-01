<?php
	class Practicum_coordinator extends CI_Controller{
		public function __construct(){
			parent::__construct();
			$this->load->model('Practicum_coordinator/Practicum_coordinator_model');
			$this->load->model('Misc/Misc_model');
			$this->load->library('Ajax_pagination');
			$this->load->library('table');	
			
			$this->perPage = 4;
		}
		
		public function Deactivate_training_station(){
			echo $this->Practicum_coordinator_model->Deactivate_training_station($this->input->post('id'));
		}
		public function Edit_training_station(){
			//preparing the array data that will be pass to the parameter of edit function in the director_model
			$userdata = array(
						'pc_fn' => $this->input->post('fn'),
						'pc_mn' => $this->input->post('mn'),
						'pc_ln' => $this->input->post('ln')
					);
			echo $this->Director_model->edit_Practicum_Coordinator($this->input->post('id'), $userdata);
			//echo "hello " . $this->input->post('id');
		}
		public function Add_training_station(){
			//get the global id by calling the function in the misc model
			
			$row = $this->Misc_model->get_branch_id($this->session->userdata['g_id'],2);//to get the branch
			
			$global_id = $this->Misc_model->generate_global_id(4,$row->br_id);
			//preparing the data to pass on the 1st parameter of add_Practicum_Coordinator function
			$logindata = array(
						'u_id' => null,
						'u_un' => $global_id,
						'u_pw' => '1234',
						'u_role' => '4',
						'u_isactive' => '1',
						'u_global_id' => $global_id
					);
			// 2nd array data that will be pass to the 2nd parameter of add_Practicum_Coordinator function
			$userdata = array(
						'ts_id' => null,
						'ts_id_no' => $global_id,
						'ts_name' => $this->input->post('cn'),
						'ts_contact_person' => $this->input->post('cp'),
						'ts_contact_person_position' => $this->input->post('pos'),
						'ts_contact_number' => $this->input->post('cnum'),
						'ts_address' => $this->input->post('address'),
						'br_id' => $row->br_id
					);
			
			echo $this->Practicum_coordinator_model->Add_training_station($logindata, $userdata);
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
		
		public function index(){
			
			// menu
			$data['side_menu'] = '<div class="col s1 m3 hide-on-small-only" id="menu-left-container">
			<ul class="collapsible black-text" data-collapsible="accordion">
				<li>
					<div class="collapsible-header waves-effect waves-red  active"><a style="display:block" href="' . base_url() . 'index.php/Director" class="black-text">Home</a></div>
				<!--<div class="collapsible-body"><p>Lorem ipsum dolor sit amet.</p></div>-->
				</li>
				<li>
					<div class="collapsible-header waves-effect waves-red ">Maintenance</div>
					<div class="collapsible-body">
							<div class="collection">
							   <a href="' . base_url() . 'index.php/Practicum_coordinator/Training_station" class="collection-item">Training Station</a>
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
		
		public function Training_station(){
			
			
			// Getting the data from database
			$rslist = $this->Practicum_coordinator_model->List_training_station('' , array( 'limit' => $this->perPage ));
			
			
			
			// start of ajax pagination
			
			
			$totalRec = count($this->Practicum_coordinator_model->List_training_station());	
			$config['first_link'] = 'First';
			$config['div'] = 'table-result';
			$config['base_url'] = base_url() . '/index.php/Practicum_coordinator/List_training_station/';
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
			$this->table->set_heading('Username', 'Company', 'Contact Person / Position', 'Contact Number', 'Action');
			
			if(!empty($rslist)){
				foreach($rslist as $itms):
					$g_id =$itms['u_global_id'];
					$this->table->add_row(
						$itms['u_global_id'] ,
						$itms['ts_name'] ,
						$itms['ts_contact_person'] . ' - ' . $itms['ts_contact_person_position']  ,
						$itms['ts_contact_number'] ,
						/*$itms['u_role'],*/
						"<button  class='btn col s12 m6'
						onClick=delete_ts('$g_id')>Deactivate</button>
						<button  class='btn col s12 m5'
						onClick=update_ts('$g_id')>Update</button>"
					);
				endforeach;
			}
			else{
				$this->table->add_row('No record found.', '', '', '', '');
			}
			//end of table
			
			
			
			
			
			// all the branches from the database
			$data['branches'] = $this->Misc_model->list_branches();
			
			
			// menu
			$data['side_menu'] = '<div class="col s1 m3 hide-on-small-only" id="menu-left-container">
			<ul class="collapsible black-text" data-collapsible="accordion">
				<li>
					<div class="collapsible-header waves-effect waves-red"><a style="display:block" href="' . base_url() . 'index.php/Director" class="black-text">Home</a></div>
				<!--<div class="collapsible-body"><p>Lorem ipsum dolor sit amet.</p></div>-->
				</li>
				<li>
					<div class="collapsible-header waves-effect waves-red  active">Maintenance</div>
					<div class="collapsible-body">
                    		<div class="collection">
							   <a href="' . base_url() . 'index.php/Practicum_coordinator/Training_station" class="collection-item">Training Station</a>
						</div>
                    	</div>
				</li>
				<li>
					<div class="collapsible-header waves-effect waves-red">Change Password</div>
				</li>
				<li>
					<div class="collapsible-header waves-effect waves-red"><a  style="display:block" href="' . base_url() . 'index.php/user/logout"  class="black-text">Logout</a></div>
				</li>
			</ul>
		</div>';
			//end of menu
			
			
			$data['current_page'] = 'Practicum Coordinator';
			
			//loading all the view
			$this->load->view('includes/header', $data);
			$this->load->view('Practicum_coordinator/practicum_coordinator_training_station_view',$data);
			$this->load->view('includes/footer');
		}
		
		
		
		public function List_training_station(){
			// Get the post data
			$srch = $this->input->post('srch');
			$page = $this->input->post('page');
			
			// validating
			if(!$page){
				$offset = 0;
			}else{
				$offset = $page;
			}
			
			// Getting the data from database
			$rslist = $this->Practicum_coordinator_model->List_training_station($srch, array( 'start' => $offset, 'limit' => $this->perPage ));
			
			
			// start of ajax pagination
			
			
			$totalRec = count($this->Practicum_coordinator_model->List_training_station($srch));
			$config['div'] = 'table-result';
			$config['base_url'] = base_url() . '/index.php/Practicum_coordinator/List_training_station/';
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
			$this->table->set_heading('Username', 'Company', 'Contact Person / Position', 'Contact Number', 'Action');
			
			if(!empty($rslist)){
				foreach($rslist as $itms):
					$g_id =$itms['u_global_id'];
					$this->table->add_row(
						$itms['u_global_id'] ,
						$itms['ts_name'] ,
						$itms['ts_contact_person'] . ' - ' . $itms['ts_contact_person_position']  ,
						$itms['ts_contact_number'] ,
						/*$itms['u_role'],*/
						"<button  class='btn col s12 m6'
						onClick=delete_ts('$g_id')>Deactivate</button>
						<button  class='btn col s12 m5'
						onClick=update_ts('$g_id')>Update</button>"
					);
				endforeach;
			}
			else{
				$this->table->add_row('No record found.', '', '', '', '');
			}
			//end of table
			
			
			$data['hello'] = "";
			
			
			
			echo $this->table->generate(); 
			echo $this->ajax_pagination->create_links();			
		}
		
		
		
		
	}