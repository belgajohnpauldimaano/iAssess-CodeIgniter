<?php
class Director_model extends CI_Model{
	public function __construct(){
		$this->load->database();	
	}
	public function list_director($srch = ""){
		if($srch == ""){
			$this->db->select('*');	
			$this->db->from('tbl_users');
			$this->db->join('tbl_users_profile', 'tbl_users.u_global_id = tbl_users_profile.up_global_id');
			$query = $this->db->get();
			return $query->result_array();	
		}
		
		$this->db->select('*');	
		$this->db->from('tbl_users');
		$this->db->join('tbl_users_profile', 'tbl_users.u_global_id = tbl_users_profile.up_global_id');
		$where = array(
					'tbl_users.u_global_id' => $srch,
					'tbl_users.u_un' => $srch, 
				);
		$orlike = array(
					'tbl_users_profile.up_fn' => $srch,
					'tbl_users_profile.up_mn' => $srch,
					'tbl_users_profile.up_ln' => $srch,
				);
		$this->db->where($where);
		$this->db->or_like($orlike);
		$query = $this->db->get();
		
		return $query->result_array();
	}	
	public function director_row_count($srch = ""){
		if($srch == ""){
			$this->db->select('*');	
			$this->db->from('tbl_users');
			$this->db->join('tbl_users_profile', 'tbl_users.u_global_id = tbl_users_profile.up_global_id');
			$query = $this->db->get()->num_rows();
			return $query;	
		}
		
		$this->db->select('*');	
		$this->db->from('tbl_users');
		$this->db->join('tbl_users_profile', 'tbl_users.u_global_id = tbl_users_profile.up_global_id');
		$where = array(
					'tbl_users.u_global_id' => $srch,
					'tbl_users.u_un' => $srch, 
				);
		$orlike = array(
					'tbl_users_profile.up_fn' => $srch,
					'tbl_users_profile.up_mn' => $srch,
					'tbl_users_profile.up_ln' => $srch,
				);
		$this->db->where($where);
		$this->db->or_like($orlike);
		$query = $this->db->get()->num_rows();
		
		return $query;
	}	
}