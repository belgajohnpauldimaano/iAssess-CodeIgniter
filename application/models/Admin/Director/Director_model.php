<?php
class Director_model extends CI_Model{
	public function __construct(){
		//$this->load->database();	
	}
	public function deactivate_director($id){
		$this->db->set('u_isactive', '0');
		$this->db->where('u_global_id', $id);
		$this->db->update('tbl_users');
		
		return 'Director account successfully deactivated.';
	}
	public function edit_director($id,$userdata){
		$this->db->where('dir_id_no', $id);
		$this->db->update('tbl_director', $userdata);
		
		return 'Director information successfully editted.';
	}
	public function add_director($logindata, $userdata){
		$this->db->insert('tbl_users', $logindata);
		$this->db->insert('tbl_director', $userdata);
		
		return 'Director information successfully added.';
	}
	public function get_director($id){
		$this->db->select('*');
		$this->db->from('tbl_users');
		$this->db->join('tbl_director', 'tbl_users.u_global_id = tbl_director.dir_id_no');
		$this->db->join('tbl_branch', 'tbl_director.br_id = tbl_branch.br_id');
		$this->db->where('tbl_users.u_global_id',$id);
		$query = $this->db->get();
		
		//return $query->result_array();
		return $query->row();
	}
	public function list_director($srch = "", $br = "", $params = array()){
		
		
		$this->db->select('*');
		$this->db->from('tbl_users');
		$this->db->join('tbl_director', 'tbl_users.u_global_id = tbl_director.dir_id_no');
		$this->db->join('tbl_branch', 'tbl_director.br_id = tbl_branch.br_id');

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
						'tbl_director.dir_fn' => $srch,
						'tbl_director.dir_mn' => $srch,
						'tbl_director.dir_ln' => $srch,
					);
			
			$this->db->group_start();
				$this->db->or_like($where);
				$this->db->or_like($orlike);
			$this->db->group_end();
			
			
		}
		
		if(!empty($br)){
			$this->db->where('tbl_director.br_id', $br);
		}
		
		$this->db->where('tbl_users.u_role', 1);
		$this->db->where('tbl_users.u_isactive', 1);
		$this->db->order_by('tbl_director.dir_id_no', 'desc');
		
		$query = $this->db->get();
		return $query->result_array();
		
	}	
}