<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class Home extends CI_Controller{
		
		public function index(){
			
			// menu
			$data['side_menu'] = '<div class="col s1 m3 hide-on-small-only" id="menu-left-container">
			<ul class="collapsible black-text" data-collapsible="accordion">
				<li>
					<div class="collapsible-header waves-effect waves-red  active"><a  style="display:block" href="' . base_url() . 'index.php/home/" class="black-text">Home</a></div>
				<!--<div class="collapsible-body"><p>Lorem ipsum dolor sit amet.</p></div>-->
				</li>
				<li>
					<div class="collapsible-header waves-effect waves-red ">Maintenance</div>
					<div class="collapsible-body">
							<div class="collection">
							   <a href="' . base_url() . 'index.php/Admin" class="collection-item">Director</a>
							   <a href="' . base_url() . 'index.php/Director/Class_list" class="collection-item">Class List</a>
							 </div>
                    	</div>
				</li>
				<li>
					<div class="collapsible-header waves-effect waves-red">Third</div>
					<div class="collapsible-body"><p>Lorem ipsum dolor sit amet.</p></div>
				</li>
				<li>
					<div class="collapsible-header waves-effect waves-red"><a href="#"  class="black-text">Logout</a></div>
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
		
	}