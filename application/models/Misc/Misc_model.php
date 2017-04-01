<?php
	class Misc_model extends CI_Model{
		public function check_user(){
			$alreadyLogged = $this->session->userdata('isLoggedIn');
			if(!isset($alreadyLogged) && $alreadyLogged == FALSE){
				
				//$this->load->view('login/login_view');
				redirect(base_url() . "index.php" );
			}
		}
		public function list_faculty( $crs_id = '', $br_id ){
			$this->db->select( '*' );
			$this->db->from( 'tbl_faculty' );
			if( !empty( $crs_id ) ){
				$this->db->where( 'crs_id', $crs_id );
			}
			$this->db->where( 'br_id', $br_id );
			$this->db->where( 'fa_active' , '1' );
			$query = $this->db->get();
			
			return $query->result_array();
		}
		public function list_subjects( $crs_id = '' ){
			$this->db->select( '*' );
			$this->db->from( 'tbl_subject' );
			if( !empty( $crs_id ) ){
				$this->db->where( 'crs_id', $crs_id );
			}
			$query = $this->db->get();
			
			return $query->result_array();
		}
		public function distinct_acad_year(){
			$query = $this->db->query('select distinct cls_ay from tbl_class order by cls_ay desc');
			return $query->result_array();			
		}
		public function latest_acad_year(){
			$this->db->select('cls_ay');
			$this->db->from('tbl_class');
			$this->db->limit(1);
			$this->db->order_by('cls_ay', 'desc');
			$query = $this->db->get();
			return $query->row();
		}
		public function get_branch_id($u_global_id , $u_role){
					
			$table_type;
			$where;
			if($u_role == 1){
				$table_type = 'tbl_director';
				$where = array( 'dir_id_no' => $u_global_id);
			}else if($u_role == 2){
				$table_type = 'tbl_practicum_coordinator';
				$where = array( 'pc_id_no' => $u_global_id);
			}else if($u_role == 3){
				$table_type = 'tbl_faculty';
				$where = array( 'fa_id_no' => $u_global_id);
			}else if($u_role == 4){
				$table_type = 'tbl_training_station';
				$where = array( 'ts_id_no' => $u_global_id);
			}
			
			$this->db->select('br_id');
			$this->db->from($table_type);
			$this->db->where($where);
			$query = $this->db->get();
			
			return $query->row();
		}
		public function list_branches(){
			$this->db->select('*');
			$this->db->from('tbl_branch');
			$query = $this->db->get();
			return $query->result_array();
		}
		public function list_courses(){
			$this->db->select('*');
			$this->db->from('tbl_course');
			$query = $this->db->get();
			return $query->result_array();
		}
		public function generate_global_id($role, $br){   //function to generate a global id for specific user . role is used to determine 
												//the role of the user and the br is for the specific branch
			
			$tbl = '';
			$order = '';
			$global_id = '';
			
			// for specific role
			if($role == 0){
				$tbl = 'tbl_users_profile';
				$order = 'up_id';
				$global_id .= 'ADM-000';
			}else if($role == 1){
				$tbl = 'tbl_director';
				$order = 'dir_id';
				$global_id .= 'DIR-000';
			}else if($role == 2){
				$tbl = 'tbl_practicum_coordinator';
				$order = 'pc_id';
				$global_id .= 'PC-000';
			}else if($role == 3){
				$tbl = 'tbl_faculty';
				$order = 'fa_id';
				$global_id .= 'FA-000';
			}else if($role == 4){
				$tbl = 'tbl_training_station';
				$order = 'ts_id';
				$global_id .= 'TS-000';
			}else if($role == 5){
				$tbl = 'tbl_student';
				$order = 'stud_id';
			}
			$this->db->select('*');
			$this->db->from($tbl);
			$this->db->order_by($order, 'Desc');
			$this->db->limit(1);
			$query = $this->db->get();
			
			$row = $query->row();
			
			$global_id .= ($row->$order + 1);
			
			//for specific branch
			$this->db->select('br_initial');
			$this->db->from('tbl_branch');
			$this->db->where('br_id', $br);
			$query = $this->db->get();
			
			$row = $query->row();
			
			$global_id .= '-' . $row->br_initial;
			
			return $global_id;
			
		}
	}