<?php
	
	class Admin extends CI_Controller{
		public function __construct(){
			parent::__construct();
			$this->load->model('Admin/Director/Director_model');
			$this->load->model('Misc/Misc_model');
			$this->load->library('Ajax_pagination');
			$this->load->library('table');	
			$this->perPage = 10;
			
			if(!$this->session->has_userdata('g_id')){
				redirect(base_url() . "index.php/" );
			}
		}
		
		public function generate_id(){
			echo $this->Misc_model->generate_global_id(4,1);
		}
		public function deactivate_director(){
			echo $this->Director_model->deactivate_director($this->input->post('id'));
		}
		public function edit_director(){
			//preparing the array data that will be pass to the parameter of edit function in the director_model
			$userdata = array(
						'dir_fn' => $this->input->post('fn'),
						'dir_mn' => $this->input->post('mn'),
						'dir_ln' => $this->input->post('ln'),
						'br_id' => $this->input->post('cmd-branch')
					);
			echo $this->Director_model->edit_director($this->input->post('id'), $userdata);
			//echo "hello " . $this->input->post('id');
		}
		public function add_director(){
			//get the global id by calling the function in the misc model
			$global_id = $this->Misc_model->generate_global_id(1,$this->input->post('cmd-branch'));
			
			//preparing the data to pass on the 1st parameter of add_director function
			$logindata = array(
						'u_id' => null,
						'u_un' => $this->input->post('un'),
						'u_pw' => $this->input->post('ln'),
						'u_role' => '1',
						'u_isactive' => '1',
						'u_global_id' => $global_id
					);
			// 2nd array data that will be pass to the 2nd parameter of add_director function
			$userdata = array(
						'dir_id' => null,
						'dir_id_no' => $global_id,
						'dir_fn' => $this->input->post('fn'),
						'dir_mn' => $this->input->post('mn'),
						'dir_ln' => $this->input->post('ln'),
						'br_id' => $this->input->post('cmd-branch')
					);
			
			echo $this->Director_model->add_director($logindata, $userdata);
		}
		
		public function view_individual_director(){
			//$director = $this->Director_model->get_director('DIR-SMB-002');
			$director = $this->Director_model->get_director($this->input->post('id'));
			//foreach($director as $dir):
				//echo $dir['u_id'];
				$dir_array = array(
								"id" 	=> $director->u_global_id, // $dir['u_global_id'],
								"fn" 	=> $director->dir_fn,//$dir['dir_fn'],
								"mn"		=> $director->dir_mn,//$dir['dir_mn'],
								"ln" 	=> $director->dir_ln,//$dir['dir_ln'],
								"br_id" 	=> $director->br_id,//$dir['br_id'],
								"br_name" => $director->br_name,//$dir['br_name']
							);
			//endforeach;
			
			echo json_encode($dir_array);
        	}
		public function index(){
			
			// menu
			$data['side_menu'] = '<div class="col s1 m3 hide-on-small-only" id="menu-left-container">
			<ul class="collapsible black-text" data-collapsible="accordion">
				<li>
					<div class="collapsible-header waves-effect waves-red  active"><a style="display:block" href="' . base_url() . 'index.php/Admin" class="black-text">Home</a></div>
				<!--<div class="collapsible-body"><p>Lorem ipsum dolor sit amet.</p></div>-->
				</li>
				<li>
					<div class="collapsible-header waves-effect waves-red ">Maintenance</div>
					<div class="collapsible-body">
							<div class="collection">
							   <a href="' . base_url() . 'index.php/Admin/Director" class="collection-item">Director</a>
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
			
			
			$data['current_page'] = 'home';
			//loading view
			$this->load->view('includes/header', $data);
			$this->load->view('home_view');
			$this->load->view('includes/footer');
		}
		public function Director(){
			
			
			// Getting the data from database
			$rslist = $this->Director_model->list_director('', '' , array( 'limit' => $this->perPage ));
			
			
			
			
			
			// start of ajax pagination
			
			
			$totalRec = count($this->Director_model->list_director("",""));	
			$config['first_link'] = 'First';
			$config['div'] = 'table-result';
			$config['base_url'] = base_url() . '/index.php/Admin/list_director/';
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
			$this->table->set_heading('ID', 'Username', 'Name', 'Action');
			
			if(!empty($rslist)){
				foreach($rslist as $itms):
					$g_id =$itms['u_global_id'];
					$this->table->add_row(
						$itms['u_global_id'] ,
						$itms['u_un'] ,
						$itms['dir_fn'] . ' ' . $itms['dir_mn'] . ' ' . $itms['dir_ln']  ,
						/*$itms['u_role'],*/
						"<button class='btn' 
						onClick=delete_director('$g_id')>Deactivate</button>
						<button class='btn'
						onClick=update_director('$g_id')>Update</button>"
					);
				endforeach;
			}
			else{
				$this->table->add_row("No record found.","","","","");
			}
			//end of table
			
			
			
			
			
			// all the branches from the database
			$data['branches'] = $this->Misc_model->list_branches();
			
			
			// menu
			$data['side_menu'] = '<div class="col s1 m3 hide-on-small-only" id="menu-left-container">
			<ul class="collapsible black-text" data-collapsible="accordion">
				<li>
					<div class="collapsible-header waves-effect waves-red"><a  style="display:block" href="' . base_url() . 'index.php/Admin" class="black-text">Home</a></div>
				<!--<div class="collapsible-body"><p>Lorem ipsum dolor sit amet.</p></div>-->
				</li>
				<li>
					<div class="collapsible-header waves-effect waves-red active">Maintenance</div>
					<div class="collapsible-body">
							<div class="collection">
							   <a href="' . base_url() . 'index.php/Admin/Director" class="collection-item active">Director</a>
							 </div>
                    	</div>
				</li>
				<li>
					<div class="collapsible-header waves-effect waves-red">Change Password</div>
				</li>
				<li>
					<div class="collapsible-header waves-effect waves-red"><a  style="display:block" href="' . base_url() . 'index.php/user/logout"  class="black-text">Logout</a></div>
					<!--<div class="collapsible-body"><p>Lorem ipsum dolor sit amet.</p></div>-->
				</li>
			</ul>
		</div>';
			//end of menu
			
			
			$data['current_page'] = 'Director';
			//loading all the view
			$this->load->view('includes/header', $data);
			$this->load->view('Admin/admin_director_view',$data);
			$this->load->view('includes/footer');
		}
		
		
		
		public function list_director(){
			// Get the post data
			$srch = $this->input->post('srch');
			$br = $this->input->post('brnch');
			$page = $this->input->post('page');
			
			// validating
			if(!$page){
				$offset = 0;
			}else{
				$offset = $page;
			}
			
			// Getting the data from database
			$rslist = $this->Director_model->list_director($srch, $br, array( 'start' => $offset, 'limit' => $this->perPage ));
			
			
			// start of ajax pagination
			
			
			$totalRec = count($this->Director_model->list_director($srch, $br));
			$config['div'] = 'table-result';
			$config['base_url'] = base_url() . '/index.php/Admin/list_director/';
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
			$this->table->set_heading('ID', 'Username', 'Name', 'Action');
			
			if(!empty($rslist)){
				foreach($rslist as $itms):
					$g_id =$itms['u_global_id'];
					$this->table->add_row(
						$itms['u_global_id'] ,
						$itms['u_un'] ,
						$itms['dir_fn'] . ' ' . $itms['dir_mn'] . ' ' . $itms['dir_ln']  ,
						/*$itms['u_role'],*/
						"<button class='btn' 
						onClick=delete_director('$g_id')>Deactivate</button>
						<button class='btn'
						onClick=update_director('$g_id')>Update</button>"
					);
				endforeach;
			}
			else{
				$this->table->add_row("No record found.","","","","");
			}
			//end of table
			
			
			$data['hello'] = "";
			
			
			
			echo $this->table->generate(); 
			echo $this->ajax_pagination->create_links();			
		}
	}