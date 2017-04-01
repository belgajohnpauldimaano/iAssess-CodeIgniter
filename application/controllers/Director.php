<?php
	class Director extends CI_Controller{
		public function __construct(){
			parent::__construct();
			$this->load->model('Director/Director_model');
			$this->load->model('Misc/Misc_model');
			$this->load->library('Ajax_pagination');
			$this->load->library('table');	
			
			$this->perPage = 10;
			$this->Misc_model->check_user();
		}
		
		public function generate_id(){
			echo $this->Misc_model->generate_global_id(4,1);
		}
		public function deactivate_Practicum_Coordinator(){
			echo $this->Director_model->deactivate_Practicum_Coordinator($this->input->post('id'));
		}
		public function edit_Practicum_Coordinator(){
			//preparing the array data that will be pass to the parameter of edit function in the director_model
			$userdata = array(
						'pc_fn' => $this->input->post('fn'),
						'pc_mn' => $this->input->post('mn'),
						'pc_ln' => $this->input->post('ln')
					);
			echo $this->Director_model->edit_Practicum_Coordinator($this->input->post('id'), $userdata);
			//echo "hello " . $this->input->post('id');
		}
		public function add_Practicum_Coordinator(){
			//get the global id by calling the function in the misc model
			
			$row = $this->Misc_model->get_branch_id($this->session->userdata['g_id'], 1);//to get the branch
			
			$global_id = $this->Misc_model->generate_global_id(2,$row->br_id);
			//preparing the data to pass on the 1st parameter of add_Practicum_Coordinator function
			$logindata = array(
						'u_id' => null,
						'u_un' => $this->input->post('un'),
						'u_pw' => $this->input->post('ln'),
						'u_role' => '2',
						'u_isactive' => '1',
						'u_global_id' => $global_id
					);
			// 2nd array data that will be pass to the 2nd parameter of add_Practicum_Coordinator function
		    	
			
			$userdata = array(
						'pc_id' => null,
						'pc_id_no' => $global_id,
						'pc_fn' => $this->input->post('fn'),
						'pc_mn' => $this->input->post('mn'),
						'pc_ln' => $this->input->post('ln'),
						'br_id' => $row->br_id
					);
			
			echo $this->Director_model->add_Practicum_Coordinator($logindata, $userdata);
		}
		
		public function view_individual_Practicum_Coordinator(){
			//$Practicum_Coordinator = $this->Practicum_Coordinator_model->get_Practicum_Coordinator('DIR-SMB-002');
     
			$Practicum_Coordinator = $this->Director_model->get_Practicum_Coordinator($this->input->post('id'));
			//foreach($Practicum_Coordinator as $dir):
				//echo $dir['u_id'];
				$dir_array = array(
								"id" 	=> $Practicum_Coordinator->u_global_id, // $dir['u_global_id'],
								"fn" 	=> $Practicum_Coordinator->pc_fn,//$dir['dir_fn'],
								"mn"		=> $Practicum_Coordinator->pc_mn,//$dir['dir_mn'],
								"ln" 	=> $Practicum_Coordinator->pc_ln,//$dir['dir_ln'],
								"br_id" 	=> $Practicum_Coordinator->br_id,//$dir['br_id'],
								"br_name" => $Practicum_Coordinator->br_name,//$dir['br_name']
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
							   <a href="' . base_url() . 'index.php/Director/Practicum_Coordinator" class="collection-item">Practicum Coordinator</a>
							   <a href="' . base_url() . 'index.php/Director/Faculty" class="collection-item">Faculty</a>
							   <a href="' . base_url() . 'index.php/Director/Class_list" class="collection-item">Class List</a>
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
		
		public function Practicum_Coordinator(){
			
			
			// Getting the data from database
			$rslist = $this->Director_model->list_Practicum_Coordinator('', '' , array( 'limit' => $this->perPage ));
			
			
			
			
			
			// start of ajax pagination
			
			
			$totalRec = count($this->Director_model->list_Practicum_Coordinator("",""));	
			$config['first_link'] = 'First';
			$config['div'] = 'table-result';
			$config['base_url'] = base_url() . '/index.php/Director/list_Practicum_Coordinator/';
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
						$itms['pc_fn'] . ' ' . $itms['pc_mn'] . ' ' . $itms['pc_ln']  ,
						/*$itms['u_role'],*/
						"<button  class='btn col s12 m6'
						onClick=delete_Practicum_Coordinator('$g_id')>Deactivate</button>
						<button  class='btn col s12 m5'
						onClick=update_Practicum_Coordinator('$g_id')>Update</button>"
					);
				endforeach;
			}
			else{
				$this->table->add_row("No record found.","","","");
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
							   <a href="' . base_url() . 'index.php/Director/Practicum_Coordinator" class="collection-item active">Practicum Coordinator</a>
							   <a href="' . base_url() . 'index.php/Director/Faculty" class="collection-item">Faculty</a>
							   <a href="' . base_url() . 'index.php/Director/Class_list" class="collection-item">Class List</a>
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
			$this->load->view('Director/Director_Practicum_Coordinator_view',$data);
			$this->load->view('includes/footer');
		}
		
		
		
		public function list_Practicum_Coordinator(){
			// Get the post data
			$srch = $this->input->post('srch');
			$br = '';//$this->input->post('brnch');
			$page = $this->input->post('page');
			
			// validating
			if(!$page){
				$offset = 0;
			}else{
				$offset = $page;
			}
			
			// Getting the data from database
			$rslist = $this->Director_model->list_Practicum_Coordinator($srch, $br, array( 'start' => $offset, 'limit' => $this->perPage ));
			
			
			// start of ajax pagination
			
			
			$totalRec = count($this->Director_model->list_Practicum_Coordinator($srch, $br));
			$config['div'] = 'table-result';
			$config['base_url'] = base_url() . '/index.php/Director/list_Practicum_Coordinator/';
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
						$itms['pc_fn'] . ' ' . $itms['pc_mn'] . ' ' . $itms['pc_ln']  ,
						/*$itms['u_role'],*/
						"<button  class='btn col s12 m6'
						onClick=alert('$g_id');delete_Practicum_Coordinator('$g_id')>Deactivate</button>
						<button  class='btn col s12 m5'
						onClick=update_Practicum_Coordinator('$g_id')>Update</button>"
					);
				endforeach;
			}
			else{
				$this->table->add_row("No record found.","","","");
			}
			//end of table
			
			
			$data['hello'] = "";
			
			
			
			echo $this->table->generate(); 
			echo $this->ajax_pagination->create_links();			
		}
		
		
		
		//DIRECTOR FUNCTION FOR FACULTY
		public function deactivate_Faculty(){
			echo $this->Director_model->deactivate_Faculty($this->input->post('id'));
		}
		public function edit_Faculty(){
			$row = $this->Misc_model->get_branch_id($this->session->userdata['g_id'], 1);//to get the branch
			//preparing the array data that will be pass to the parameter of edit function in the director_model
			$userdata = array(
						'fa_fn' => $this->input->post('fn'),
						'fa_mn' => $this->input->post('mn'),
						'fa_ln' => $this->input->post('ln'),
						'crs_id' => $this->input->post('cmd-course'),
						'br_id' => $row->br_id
					);
			
			echo $this->Director_model->edit_Faculty($this->input->post('id'), $userdata);
		}
		public function add_Faculty(){
			
			$row = $this->Misc_model->get_branch_id($this->session->userdata['g_id'], 1);//to get the branch
			
			//get the global id by calling the function in the misc model
			$global_id = $this->Misc_model->generate_global_id(3,$row->br_id);
			//preparing the data to pass on the 1st parameter of add_Faculty function
			$logindata = array(
						'u_id' => null,
						'u_un' => $this->input->post('un'),
						'u_pw' => $this->input->post('ln'),
						'u_role' => '3',
						'u_isactive' => '1',
						'u_global_id' => $global_id
					);
			// 2nd array data that will be pass to the 2nd parameter of add_Faculty function
			$userdata = array(
						'fa_id' => null,
						'fa_id_no' => $global_id,
						'fa_fn' => $this->input->post('fn'),
						'fa_mn' => $this->input->post('mn'),
						'fa_ln' => $this->input->post('ln'),
						'crs_id' => $this->input->post('cmd-course'),
						'fa_active' => '1',
						'br_id' => $row->br_id
					);
			echo $this->Director_model->add_Faculty($logindata, $userdata);
		}
		
		public function view_individual_Faculty(){
			// get the data from post request and pass to Faculty variable
			$Faculty = $this->Director_model->get_Faculty($this->input->post('id'));
			$dir_array = array(
							"id" 	=> $Faculty->u_global_id,
							"fn" 	=> $Faculty->fa_fn,
							"mn"		=> $Faculty->fa_mn,
							"ln" 	=> $Faculty->fa_ln,
							"br_id" 	=> $Faculty->br_id,
							"br_name" => $Faculty->br_name,
							"crs_id" 	=> $Faculty->crs_id,
							"crs_name" => $Faculty->crs_name,
						);
			
			echo json_encode($dir_array);
        	}
		
		public function Faculty(){
			
			
			// Getting the data from database
			$rslist = $this->Director_model->list_Faculty('', '', array( 'limit' => $this->perPage ));
			
			
			
			
			
			// start of ajax pagination
			
			
			$totalRec = count($this->Director_model->list_Faculty(''));	
			$config['first_link'] = 'First';
			$config['div'] = 'table-result';
			$config['base_url'] = base_url() . '/index.php/Director/list_Faculty/';
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
						$itms['fa_fn'] . ' ' . $itms['fa_mn'] . ' ' . $itms['fa_ln']  ,
						"<div class='row'><button class='btn col s12 m6'
						onClick=delete_Faculty('$g_id')>Deactivate</button>
						<button class='btn col s12 m5'
						onClick=update_Faculty('$g_id')>Update</button></div>"
					);
				endforeach;
			}
			else{
				$this->table->add_row("No record found.","","","","");
			}
			//end of table
			
			
			
			
			
			// all the courses from database
			$data['courses'] = $this->Misc_model->list_courses();
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
							   <a href="' . base_url() . 'index.php/Director/Practicum_Coordinator" class="collection-item">Practicum Coordinator</a>
							   <a href="' . base_url() . 'index.php/Director/Faculty" class="collection-item active">Faculty</a>
							   <a href="' . base_url() . 'index.php/Director/Class_list" class="collection-item">Class List</a>
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
			
			
			$data['current_page'] = 'Faculty';
			//loading all the view
			$this->load->view('includes/header', $data);
			$this->load->view('Director/Director_faculty_view',$data);
			$this->load->view('includes/footer');
		}
		
		
		
		public function list_Faculty(){
			// Get the post data
			$srch = $this->input->post('srch');
			$crs = $this->input->post('crs');
			$page = $this->input->post('page');
			
			// validating
			if(!$page){
				$offset = 0;
			}else{
				$offset = $page;
			}
			
			// Getting the data from database
			$rslist = $this->Director_model->list_Faculty($srch, $crs, array( 'start' => $offset, 'limit' => $this->perPage ));
			
			
			// start of ajax pagination
			
			
			$totalRec = count($this->Director_model->list_Faculty($srch, $crs));
			$config['div'] = 'table-result';
			$config['base_url'] = base_url() . '/index.php/Director/list_Faculty/';
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
						$itms['fa_fn'] . ' ' . $itms['fa_mn'] . ' ' . $itms['fa_ln']  ,
						/*$itms['u_role'],*/
						"<button  class='btn col s12 m6'
						onClick=delete_Faculty('$g_id')>Deactivate</button>
						<button  class='btn col s12 m5'
						onClick=update_Faculty('$g_id')>Update</button>"
					);
				endforeach;
			}
			else{
				$this->table->add_row("No record found.","","","");
			}
			//end of table
			
			
			$data['hello'] = "";
			
			
			
			echo $this->table->generate(); 
			echo $this->ajax_pagination->create_links();			
		}
		//END OF FACULTY
		public function crs(){
			$data['courses'] = $this->Misc_model->list_courses();
			foreach($data['courses'] as $course ):
                    	echo $course['crs_id']. " " . $course['crs_name'];
               endforeach;
		}
		
		
		
		
		
		
		//CLASS FUNCTIONS
		public function Class_List(){
			$br = $this->Misc_model->get_branch_id($this->session->userdata('g_id'), 1);
			// Getting the data from database
			$rslist = $this->Director_model->list_Class('' , '', array( 'limit' => $this->perPage ));
						
			
			// start of ajax pagination
			
			
			$totalRec = count($this->Director_model->list_Class(''));	
			$config['first_link'] = 'First';
			$config['div'] = 'table-result';
			$config['base_url'] = base_url() . '/index.php/Director/';
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
			$this->table->set_heading('ID', 'Section', 'Academic Year', 'Course', 'Subject Code', 'Faculty', 'Action');
			
			if(!empty($rslist)){
				foreach($rslist as $itms):
					$c_id =$itms['cls_id'];
					$this->table->add_row(
						$c_id,
						$itms['cls_section'] ,
						$itms['cls_ay'] ,
						$itms['crs_name'],
						$itms['subj_code'],
						$itms['fa_fn'] . ' ' . $itms['fa_ln']  ,
						/*$itms['u_role'],*/
						"<button  class='btn col s12 m6'
						onClick=Delete_class('$c_id')>Deactivate</button>
						<button  class='btn col s12 m5'
						onClick=Update_class('$c_id')>Edit</button>"
					);
				endforeach;
			}
			else{
				$this->table->add_row('No record found.', '', '', '', '', '', '');
			}
			//end of table
			
			
			
			
			
			// all the courses from database
			$data['courses'] = $this->Misc_model->list_courses();
			// distinct academic year from the database
			$data['acad_years'] = $this->Misc_model->distinct_acad_year();
			// all subjects
			$data['subjs'] = $this->Misc_model->list_subjects();
			
			
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
							   <a href="' . base_url() . 'index.php/Director/Practicum_Coordinator" class="collection-item">Practicum Coordinator</a>
							   <a href="' . base_url() . 'index.php/Director/Faculty" class="collection-item">Faculty</a>
							   <a href="' . base_url() . 'index.php/Director/Class_list" class="collection-item active">Class List</a>
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
			
			
			$data['current_page'] = 'Class';
			//loading all the view
			$this->load->view('includes/header', $data);
			$this->load->view('Director/Director_class_view',$data);
			$this->load->view('includes/footer');
		}
		
		
		public function View_individual_class(){
			$class_id = $this->input->post('id');
			$class_info = $this->Director_model->Get_single_class($class_id);
			
			$class_full_info = array(
								'id' => $class_info->cls_id,
								'section' => $class_info->cls_section,
								'ay' => $class_info->cls_ay,
								'fa_id' => $class_info->fa_id_no,
								'fa_name' => $class_info->fa_fn . ' ' . $class_info->fa_ln,
								'subj_id' => $class_info->subj_id,
								'subj' => $class_info->subj_code . ' ' . $class_info->subj_desc,
								'course_id' => $class_info->crs_id,
								'course_name' => $class_info->crs_name 
							);
			
			
			echo json_encode($class_full_info);
		}
		public function Deactivate_class(){
			echo $this->Director_model->Deactivate_class($this->input->post('id'));
		}
		public function Edit_class(){
			$class_info = array(
							'cls_section' => $this->input->post('sec'),
							'cls_ay' => $this->input->post('ay'),
							'crs_id' => $this->input->post('cmd-course'),
							'fa_id_no' => $this->input->post('cmd-fa'),
							'subj_id' => $this->input->post('cmd-subj')
						);
			echo $this->Director_model->Edit_class($this->input->post('id'), $class_info);
		}
		public function Add_class(){
			
			$row = $this->Misc_model->get_branch_id($this->session->userdata['g_id'], 1);
			$br_id = $row->br_id;
			// Preparation of array
			$class_info = array(
							'cls_id' => NULL,
							'cls_section' => $this->input->post('sec'),
							'cls_ay' => $this->input->post('ay'),
							'cls_active' => 1,
							'crs_id' => $this->input->post('cmd-course'),
							'fa_id_no' => $this->input->post('cmd-fa'),
							'subj_id' => $this->input->post('cmd-subj'),
							'br_id' => $br_id
						);
			echo $this->Director_model->Add_class($class_info);
		}
		
		public function list_Class(){
			// Get the post data
			$crs = $this->input->post('crs');
			$acad_yr = $this->input->post('acad_yr');
			$page = $this->input->post('page');
			
			// validating
			if(!$page){
				$offset = 0;
			}else{
				$offset = $page;
			}
			
			$br = $this->Misc_model->get_branch_id($this->session->userdata('g_id'), 1);
			// Getting the data from database
			$rslist = $this->Director_model->list_Class($acad_yr, $crs, array( 'start' => $offset, 'limit' => $this->perPage ) );
			
			
			// start of ajax pagination
			
			
			$totalRec = count($this->Director_model->list_Class($acad_yr, $crs ));
			$config['div'] = 'table-result';
			$config['base_url'] = base_url() . '/index.php/Director/list_Class';
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
			$this->table->set_heading('ID', 'Section', 'Academic Year', 'Course', 'Subject Code', 'Faculty', 'Action');
			
			if(!empty($rslist)){
				foreach($rslist as $itms):
					$g_id =$itms['cls_id'];
					$this->table->add_row(
						$g_id,
						$itms['cls_section'] ,
						$itms['cls_ay'] ,
						$itms['crs_name'],
						$itms['subj_code'],
						$itms['fa_fn'] . ' ' . $itms['fa_ln']  ,
						/*$itms['u_role'],*/
						"<button  class='btn col s12 m6'
						onClick=Delete_class('$g_id')>Deactivate</button>
						<button  class='btn col s12 m5'
						onClick=Update_class('$g_id')>Edit</button>"
					);
				endforeach;
			}
			else{
				$this->table->add_row('No record found.', '', '', '', '', '', '');
			}
			//end of table
			
			
			$data['hello'] = "";
			
			
			
			echo $this->table->generate(); 
			echo $this->ajax_pagination->create_links();			
		}
		public function find_subj_by_course($crs_id = '', $subj_id = '') {
			$rows = $this->Misc_model->list_subjects($crs_id);
			if(!empty($rows)){
				echo '<option disabled="disabled" selected="selected">Choose Subject</option>';
				foreach($rows as $row):
					if($subj_id == $row['subj_id']){
						echo '<option value="'.$row['subj_id'].'" selected="selected">' . $row['subj_code'] . ' - ' . $row['subj_desc'] . '</option>';
					}else{
						
						echo '<option value="'.$row['subj_id'].'">' . $row['subj_code'] . ' - ' . $row['subj_desc'] .'</option>';
					}
				endforeach;
			}else{
				echo '<option disabled="disabled" selected="selected">Empty Record</option>';
			}
		}
		
		public function find_faculty_by_course($crs_id = '', $fa_id = ''){
			$g_id = $this->Misc_model->get_branch_id($this->session->userdata['g_id'], 1);
			$rows = $this->Misc_model->list_faculty($crs_id, $g_id->br_id);
			if(!empty($rows)){
				echo '<option disabled="disabled" selected="selected">Choose Faculty</option>';
				foreach($rows as $row):
					if($fa_id == $row['fa_id_no']){
						echo '<option value="'.$row['fa_id_no'].'" selected="selected">' . $row['fa_fn'] . ' ' . $row['fa_ln'] . '</option>';
					}else{
						echo '<option value="'.$row['fa_id_no'].'">' . $row['fa_fn'] . ' ' . $row['fa_ln'] . '</option>';
					}
				endforeach;
			}else{
				echo '<option disabled="disabled" selected="selected">Empty Record</option>';
			}
		}
		
		public function list_year(){
			$br_id = $this->Misc_model->get_branch_id($this->session->userdata('g_id'), 1);
			echo 'DIR-SMB-002' . ' ' .  $this->session->userdata('g_id');
			$data['acad_years'] = $this->Misc_model->distinct_acad_year();
			echo json_encode($data['acad_years']);
			echo $br_id->br_id;
		}
	}