<?php
	class Faculty extends CI_Controller{
		public function __construct(){
			parent::__construct();
			$this->load->model('Faculty/Faculty_model');
			$this->load->model('Misc/Misc_model');
			$this->load->library('Ajax_pagination');
			$this->load->library('table');	
			$this->perPage = 10;
			$this->Misc_model->check_user();
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
					<div class="collapsible-header waves-effect waves-red ">List</div>
					<div class="collapsible-body">
							<div class="collection">
							   <a href="' . base_url() . 'index.php/Faculty/Class_list" class="collection-item">Class List</a>
							 </div>
                    	</div>
				</li>
				<li>
					<div class="collapsible-header waves-effect waves-red">Change Password</div>
				</li>
				<li>
					<div class="collapsible-header waves-effect waves-red"><a style="display:block" href="' . base_url() . 'index.php/user/logout"  class="black-text">Logout</a></div>
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
			$cls_id = $this->input->get('cls_id');
			// Getting the data from database
			$rslist = $this->Faculty_model->List_student_info(array('limit' => $this->perPage, 'cls_id' => $cls_id));
			
			
			// start of ajax pagination
			
			
			$totalRec = count($this->Faculty_model->List_student_info(array('cls_id' => $cls_id)));	
			$config['first_link'] = 'First';
			$config['div'] = 'table-result';
			$config['base_url'] = base_url() . 'index.php/Faculty/Class_list';
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
			$this->table->set_heading('Student ID', 'Name', 'Course', 'Training Station', 'Evaluation Status');
			
			if(!empty($rslist)){
				foreach($rslist as $itms):
					$action;
					$g_id =$itms['stud_id'];
					$stud_id = $itms['stud_id_no'];
					if($itms['stud_isevaluated'] == 0){
						$action = "<b>Not yet Evaluated</b>";
					}else{
						$action = "<a href='" . base_url() . "index.php/Faculty/Evaluation_result?stud_id=". $stud_id ."' class='btn'>View Result</a>" ;
					}
					$this->table->add_row(
						$itms['stud_id_no'] ,
						$itms['stud_fn'] . ' ' . $itms['stud_mn'] . ' ' . $itms['stud_ln'] ,
						$itms['crs_name'],
						$itms['ts_name'],
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
					<div class="collapsible-header waves-effect waves-red   active">List</div>
					<div class="collapsible-body">
							<div class="collection">
							   <a href="' . base_url() . 'index.php/Faculty/Class_list" class="collection-item  active">Class</a>
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
			$this->load->view('Faculty/Faculty_student_view',$data);
			$this->load->view('includes/footer');
		}
		
		
		
		public function List_student_info(){
			// Get the post data
			$srch = $this->input->post('srch');
			$page = $this->input->post('page');
			$crs = $this->input->post('crs');
			$cls_id = $this->input->post('cls_id');
			
			// validating
			if(!$page){
				$offset = 0;
			}else{
				$offset = $page;
			}
			
			// Getting the data from database
			$rslist = $this->Faculty_model->List_student_info(array('start' => $offset, 'limit' => $this->perPage, 'srch' => $srch, 'crs' => $crs, 'cls_id' => $cls_id));
			
			
			// start of ajax pagination
			
			
			$totalRec = count($this->Faculty_model->List_student_info(array('srch' => $srch, 'crs' => $crs, 'cls_id' => $cls_id )));
			$config['div'] = 'table-result';
			$config['base_url'] = base_url() . '/index.php/Faculty/Class_list/';
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
			$this->table->set_heading('Student ID', 'Name', 'Course', 'Evaluation Status');
			
			if(!empty($rslist)){
				foreach($rslist as $itms):
					$action;
					
				
					$g_id =$itms['stud_id'];
					$stud_id = $itms['stud_id_no'];
					if($itms['stud_isevaluated'] == 0){
						$action = "<b>Not yet Evaluated</b>";
					}else{
						$action = "<a href='" . base_url() . "index.php/Faculty/Evaluation_result?stud_id=". $stud_id ."' class='btn'>View Result</a>" ;
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
		
		
		//CLASS FUNCTIONS
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
			
			
			$br = $this->Misc_model->get_branch_id($this->session->userdata('g_id'), 3);
			// Getting the data from database
			$rslist = $this->Faculty_model->list_Class($acad_yr, $crs, array( 'limit' => $this->perPage ));
						
			
			// start of ajax pagination
			
			
			$totalRec = count($this->Faculty_model->list_Class($acad_yr, $crs));	
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
			$this->table->set_heading('ID', 'Section', 'Academic Year', 'Course', 'Subject Code', 'Action');
			
			if(!empty($rslist)){
				foreach($rslist as $itms):
					$c_id =$itms['cls_id'];
					$this->table->add_row(
						$c_id,
						$itms['cls_section'] ,
						$itms['cls_ay'] ,
						$itms['crs_name'],
						$itms['subj_code'],
						/*$itms['u_role'],*/
						"<a  class='btn col s12 m12' href='". base_url() ."index.php/Faculty/Student_list?cls_id=$c_id'>View</a>"
					);
				endforeach;
			}
			else{
				$this->table->add_row('No record found.', '', '', '', '', '');
			}
			//end of table
			
			
			$data['hello'] = "";
			
			
			
			echo $this->table->generate(); 
			echo $this->ajax_pagination->create_links();			
		}
		
		
		public function Class_List(){
			$br = $this->Misc_model->get_branch_id($this->session->userdata('g_id'), 4);
			// Getting the data from database
			$rslist = $this->Faculty_model->list_Class('' , '', array( 'limit' => $this->perPage ));
						
			
			// start of ajax pagination
			
			
			$totalRec = count($this->Faculty_model->list_Class(''));	
			$config['first_link'] = 'First';
			$config['div'] = 'table-result';
			$config['base_url'] = base_url() . '/index.php/Faculty/';
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
			$this->table->set_heading('ID', 'Section', 'Academic Year', 'Course', 'Subject Code', 'Action');
			
			if(!empty($rslist)){
				foreach($rslist as $itms):
					$c_id =$itms['cls_id'];
					$this->table->add_row(
						$c_id,
						$itms['cls_section'] ,
						$itms['cls_ay'] ,
						$itms['crs_name'],
						$itms['subj_code'],
						/*$itms['u_role'],*/
						"<a  class='btn col s12 m12' href='". base_url() ."index.php/Faculty/Student_list?cls_id=$c_id'>View</a>"
					);
				endforeach;
			}
			else{
				$this->table->add_row('No record found.', '', '', '', '', '');
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
				</li>
				<li>
					<div class="collapsible-header waves-effect waves-red  active">List</div>
					<div class="collapsible-body">
                    		<div class="collection">
							   <a href="' . base_url() . 'index.php/Faculty/Class_list" class="collection-item active">Class List</a>
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
			$this->load->view('Faculty/Faculty_class_view',$data);
			$this->load->view('includes/footer');
		}
		
		
	}