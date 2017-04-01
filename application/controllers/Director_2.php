<?php
	class Director extends CI_Controller{
		public function __constructor(){
		}
		public function view_individual_director($id){

        	}
		public function index(){
			
		}
		public function list_director(){
			$this->load->model('Director/Director_model');
			

			//$srch = $this->input->post('id');
			$srch = $this->input->get('id');
			$rslist = $this->Director_model->list_director($srch);
			
			
			$this->load->library('table');	
			
			$template = array(
					'table_open'            => '<table border="1" cellpadding="4" cellspacing="0" class="bordered striped highlight responsive-table">',
			
					'thead_open'            => '<thead>',
					'thead_close'           => '</thead>',
			
					'heading_row_start'     => '<tr>',
					'heading_row_end'       => '</tr>',
					'heading_cell_start'    => '<th>',
					'heading_cell_end'      => '</th>',
			
					'tbody_open'            => '<tbody>',
					'tbody_close'           => '</tbody>',
			
					'row_start'             => '<tr>',
					'row_end'               => '</tr>',
					'cell_start'            => '<td>',
					'cell_end'              => '</td>',
			
					'table_close'           => '</table>'
			);
			
			$this->table->set_template($template);			
			$this->table->set_heading('ID', 'Username', 'Name', 'Role', 'Action');
			
			if(!empty($rslist)){
				foreach($rslist as $itms):
					$g_id =$itms['u_global_id'];
					$this->table->add_row(
						$itms['u_global_id'] ,
						$itms['u_un'] ,
						$itms['up_fn'] . ' ' . $itms['up_mn'] . ' ' . $itms['up_ln']  ,
						$itms['u_role'],
						"<button class='btn' 
						onClick=alert('$g_id');delete_director('$g_id')>Deactivate</button>
						<button class='btn'
						onClick=update_director('$g_id')>Update</button>"
					);
				endforeach;
			}
			else{
				$this->table->add_row("No record found.","","","","");
			}
			echo $this->table->generate(); 
		}
	}