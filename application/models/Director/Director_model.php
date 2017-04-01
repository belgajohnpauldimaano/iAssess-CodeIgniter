<?php
class Director_model extends CI_Model{
	public function __construct(){
		//$this->load->database();	
	}
	
	
	// FUNCTIONS OF PRACTICUM COORDINATOR
	public function deactivate_Practicum_Coordinator($id){
		$this->db->set('u_isactive', '0');
		$this->db->where('u_global_id', $id);
		$this->db->update('tbl_users');
		
		return 'Practicum coordinator account successfully deactivated.';
	}
	public function edit_Practicum_Coordinator($id,$userdata){
		$this->db->where('pc_id_no', $id);
		$this->db->update('tbl_practicum_coordinator', $userdata);
		
		return 'Practicum coordinator information successfully editted.';
	}
	public function add_Practicum_Coordinator($logindata, $userdata){
		$this->db->insert('tbl_users', $logindata);
		$this->db->insert('tbl_practicum_coordinator', $userdata);
		
		return 'Practicum coordinator information successfully added.';
	}
	public function get_Practicum_Coordinator($id){
		$row = $this->Misc_model->get_branch_id($this->session->userdata['g_id'], 1);//to get the branch
		$this->db->select('*');
		$this->db->from('tbl_users');
		$this->db->join('tbl_practicum_coordinator', 'tbl_users.u_global_id = tbl_practicum_coordinator.pc_id_no');
		$this->db->join('tbl_branch', 'tbl_practicum_coordinator.br_id = ' . $row->br_id );
		$this->db->where('tbl_users.u_global_id',$id);
		$query = $this->db->get();
		
		//return $query->result_array();
		return $query->row();
	}
	public function list_Practicum_Coordinator($srch = "", $br = "", $params = array()){
		
		$row = $this->Misc_model->get_branch_id($this->session->userdata['g_id'], 1);//to get the branch
		
		$this->db->select('*');
		$this->db->from('tbl_users');
		$this->db->join('tbl_practicum_coordinator', 'tbl_users.u_global_id = tbl_practicum_coordinator.pc_id_no');
		$this->db->join('tbl_branch', 'tbl_practicum_coordinator.br_id = tbl_branch.br_id');

		if(array_key_exists('limit', $params) && array_key_exists('start', $params)){
			$this->db->limit($params['limit'],$params['start']);
		}elseif(array_key_exists('limit',$params) && !array_key_exists('start', $params)){
			$this->db->limit($params['limit']);
		}
		
		if(!empty($srch)){
			$where = array(
						'tbl_users.u_global_id' => $srch,
						'tbl_users.u_un' => $srch

					);
			$orlike = array(
						'tbl_practicum_coordinator.pc_fn' => $srch,
						'tbl_practicum_coordinator.pc_mn' => $srch,
						'tbl_practicum_coordinator.pc_ln' => $srch
					);
			
			$this->db->group_start();
				$this->db->or_like($where);
				$this->db->or_like($orlike);
			$this->db->group_end();
			
			
		}
		
		/*if(!empty($br)){
			$this->db->where('tbl_practicum_coordinator.br_id', $br);
		}*/
		
		$this->db->where('tbl_users.u_role', 2);
		$this->db->where('tbl_users.u_isactive', 1);
		$this->db->where('tbl_practicum_coordinator.br_id', $row->br_id);
		$this->db->order_by('tbl_practicum_coordinator.pc_id_no', 'desc');
		
		$query = $this->db->get();
		return $query->result_array();
		
	}	
	// END OF PRACTICUM COORDINATOR
	
	
	// DIRECTOR FUNCTIONS FOR FACULTY
	public function deactivate_Faculty($id){
		$this->db->set('u_isactive', '0');
		$this->db->where('u_global_id', $id);
		$this->db->update('tbl_users');
		
		return 'Faculty account successfully deactivated.';
	}
	public function edit_Faculty($id,$userdata){
		$this->db->where('fa_id_no', $id);
		$this->db->update('tbl_faculty', $userdata);
		
		return 'Faculty information successfully editted.';
	}
	public function add_Faculty($logindata, $userdata){
		$this->db->insert('tbl_users', $logindata);
		$this->db->insert('tbl_faculty', $userdata);
		
		return 'Faculty information successfully added.';
	}
	public function get_Faculty($id){
        
		$row = $this->Misc_model->get_branch_id($this->session->userdata['g_id'], 1);//to get the branch
        
		$this->db->select('*');
		$this->db->from('tbl_users');
		$this->db->join('tbl_faculty', 'tbl_users.u_global_id = tbl_faculty.fa_id_no');
		$this->db->join('tbl_branch', 'tbl_faculty.br_id = ' . $row->br_id);
		$this->db->join('tbl_course', 'tbl_faculty.crs_id = tbl_course.crs_id');
		$this->db->where('tbl_users.u_global_id',$id);
		$query = $this->db->get();
		
		//return $query->result_array();
		return $query->row();
	}
	public function list_Faculty($srch = "", $crs = "", $params = array()){
		
		
		$row = $this->Misc_model->get_branch_id($this->session->userdata['g_id'], 1);//to get the branch
		$this->db->select('*');
		$this->db->from('tbl_users');
		$this->db->join('tbl_faculty', 'tbl_users.u_global_id = tbl_faculty.fa_id_no');
		$this->db->join('tbl_branch', 'tbl_faculty.br_id = tbl_branch.br_id');
		$this->db->join('tbl_course', 'tbl_faculty.crs_id = tbl_course.crs_id');

		if(array_key_exists('limit', $params) && array_key_exists('start', $params)){
			$this->db->limit($params['limit'],$params['start']);
		}elseif(array_key_exists('limit',$params) && !array_key_exists('start', $params)){
			$this->db->limit($params['limit']);
		}
		
		if(!empty($srch)){
			$where = array(
						'tbl_users.u_global_id' => $srch,
						'tbl_users.u_un' => $srch

					);
			$orlike = array(
						'tbl_faculty.fa_fn' => $srch,
						'tbl_faculty.fa_mn' => $srch,
						'tbl_faculty.fa_ln' => $srch
					);
			
			$this->db->group_start();
				$this->db->or_like($where);
				$this->db->or_like($orlike);
			$this->db->group_end();
			
			
		}
		
		/*if(!empty($br)){
			$this->db->where('tbl_faculty.br_id', $br);
		}*/
		
		if(!empty($crs)){
			$this->db->where('tbl_course.crs_id', $crs);
		}
		
		$this->db->where('tbl_users.u_role', 3);
		$this->db->where('tbl_users.u_isactive', 1);
		$this->db->where('tbl_faculty.br_id', $row->br_id);
		$this->db->order_by('tbl_faculty.fa_id_no', 'desc');
		
		$query = $this->db->get();
		return $query->result_array();
		
	}	
	// END OF PRACTICUM
	
	
	
	
	// CLASS
	public function list_Class($acad_yr='' , $crs = '', $params = array()){
		
		$row = $this->Misc_model->get_branch_id($this->session->userdata['g_id'], 1);//to get the branch
		
		$this->db->select('*');
		$this->db->from('tbl_class');
		$this->db->join('tbl_faculty', 'tbl_class.fa_id_no = tbl_faculty.fa_id_no');
		$this->db->join('tbl_subject', 'tbl_subject.subj_id = tbl_class.subj_id');
		$this->db->join('tbl_course', 'tbl_course.crs_id = tbl_class.crs_id');

		if(array_key_exists('limit', $params) && array_key_exists('start', $params)){
			$this->db->limit($params['limit'],$params['start']);
		}elseif(array_key_exists('limit',$params) && !array_key_exists('start', $params)){
			$this->db->limit($params['limit']);
		}
		
		/*if(!empty($srch)){
			$where = array(
						'tbl_users.u_global_id' => $srch,
						'tbl_users.u_un' => $srch

					);
			$orlike = array(
						'tbl_faculty.fa_fn' => $srch,
						'tbl_faculty.fa_mn' => $srch,
						'tbl_faculty.fa_ln' => $srch,
					);
			
			$this->db->group_start();
				$this->db->or_like($where);
				$this->db->or_like($orlike);
			$this->db->group_end();
			
			
		}*/
		
		
		if(!empty($crs)){
			$this->db->where('tbl_course.crs_id', $crs);
		}
		
		if(!empty($acad_yr)){
			$this->db->where('tbl_class.cls_ay', $acad_yr);
		}
		$this->db->where('tbl_class.cls_active', 1);
		$this->db->where('tbl_class.br_id', $row->br_id);
		$this->db->order_by('tbl_class.cls_ay', 'desc');
		
		$query = $this->db->get();
		return $query->result_array();
		
	}	
	
	public function Get_single_class($class_id){
		$this->db->select('*');
		$this->db->from('tbl_class');
		$this->db->join('tbl_course', 'tbl_course.crs_id = tbl_class.crs_id');
		$this->db->join('tbl_faculty', 'tbl_faculty.fa_id_no = tbl_class.fa_id_no');
		$this->db->join('tbl_subject', 'tbl_subject.subj_id = tbl_class.subj_id');
		$this->db->where('cls_id', $class_id);
		
		$query = $this->db->get();
		
		return $query->row();
	}
	public function Edit_class($class_id, $class_info){
		$this->db->where('cls_id', $class_id);
		$this->db->update('tbl_class', $class_info);
		
		echo "Class Information Successfully Editted.";
	}
	public function Add_class($class_info){
		$this->db->insert('tbl_class', $class_info);
		
		echo "Class Information Successfully Added.";
	}
	public function Deactivate_class($class_id){
		$this->db->set('cls_active', 0);
		$this->db->where('cls_id', $class_id);
		$this->db->update('tbl_class');
		
		echo "Class Information Successfully Deactivated.";
	}
	// END OF CLASS
	
}