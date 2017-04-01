<?php
    class User extends CI_Controller{
	    
		public function __construct(){
			parent::__construct();
			$this->load->model('user/users_model');
			$this->load->model('Misc/Misc_model');
		}
	    
		public function index(){
			$alreadyLogged = $this->session->userdata('isLoggedIn');
			if(isset($alreadyLogged) && $alreadyLogged == TRUE){
				$role = $this->session->userdata('u_role');
				echo $role;
				if($role == 0){
					redirect(base_url() . "index.php/Admin" );	
				}else if($role == 1){
					redirect(base_url() . "index.php/Director" );
				}else if($role == 2){
					redirect(base_url() . "index.php/Practicum_coordinator" );
				}else if($role == 3){
					redirect(base_url() . "index.php/Faculty" );
				}else if($role == 4){
					redirect(base_url() . "index.php/Training_station" );
				}else if($role == 5){
					redirect(base_url() . "index.php/Student" );
				}
				
			}else{
				$this->load->view('login/login_view');
			}
		}
	    
		public function validate_user(){
			$un = $this->input->post("username");
			$pw = $this->input->post("password");
			if($result_set = $this->users_model->user_auth($un,$pw)){
				$rs = array('isLoggedIn'=>TRUE,'msg'=>'Successfully logged in');
				echo json_encode($rs);
			}else{
				$rs = array('isLoggedIn'=>FALSE,'msg'=>'Invalid username or password');
				echo json_encode($rs);
			}
		}
	    
		public function logout(){
			$this->session->sess_destroy();
			redirect('user/');
		}
    }