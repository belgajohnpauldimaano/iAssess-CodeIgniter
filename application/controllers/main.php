<?php
	class Main extends CI_Controller{
		public function __construct(){
		parent::__construct();
			$this->load->helper('url');	
		}
		public function index(){
			$this->load->view('includes/header');
			$this->load->view('main_view');
			$this->load->view('includes/footer');
		}	
		
		public function director(){
			
			$this->load->view('includes/header');
			$this->load->view('director_view');
			$this->load->view('includes/footer');	
		}
		
	}