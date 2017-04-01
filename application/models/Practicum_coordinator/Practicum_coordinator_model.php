<?php
class Practicum_coordinator_model extends CI_Model{
	public function __construct(){
		//$this->load->database();	
	}
	
	
	// FUNCTIONS OF TRAINING STATION
	public function Deactivate_training_station($id){
		$this->db->set('u_isactive', '0');
		$this->db->where('u_global_id', $id);
		$this->db->update('tbl_users');
		
		return 'Training station  account successfully deactivated.';
	}
	public function Edit_training_station($id,$userdata){
		$this->db->where('pc_id_no', $id);
		$this->db->update('tbl_practicum_coordinator', $userdata);
		
		return 'Training station information successfully editted.';
	}
	public function Add_training_station($logindata, $userdata){
		$this->db->insert('tbl_users', $logindata);
		$this->db->insert('tbl_training_station', $userdata);
		
		return 'Training station information successfully added.';
	}
	public function Get_training_station($id){
		$row = $this->Misc_model->get_branch_id($this->session->userdata['g_id'], 2);//to get the branch
		$this->db->select('*');
		$this->db->from('tbl_users');
		$this->db->join('tbl_training_station', 'tbl_users.u_global_id = tbl_training_station.ts_id_no');
		$this->db->where('br_id = ' . $row->br_id );
		$this->db->where('tbl_users.u_global_id', $id);
		$this->db->where('tbl_users.u_isactive', 1);
		$query = $this->db->get();
		
		//return $query->result_array();
		return $query->row();
	}
	public function List_training_station($srch = '',  $params = array()){
		
		$row = $this->Misc_model->get_branch_id($this->session->userdata['g_id'], 2);//to get the branch
		
		$this->db->select('*');
		$this->db->from('tbl_users');
		$this->db->join('tbl_training_station', 'tbl_users.u_global_id = tbl_training_station.ts_id_no');

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
						'tbl_training_station.ts_name' => $srch
					);
			
			$this->db->group_start();
				$this->db->or_like($where);
				$this->db->or_like($orlike);
			$this->db->group_end();
			
			
		}
		
		/*if(!empty($br)){
			$this->db->where('tbl_practicum_coordinator.br_id', $br);
		}*/
		
		$this->db->where('tbl_users.u_role', 4);
		$this->db->where('tbl_users.u_isactive', 1);
		$this->db->where('tbl_training_station.br_id', $row->br_id);
		$this->db->order_by('tbl_training_station.ts_id_no', 'desc');
		
		$query = $this->db->get();
		return $query->result_array();
		
	}	
	// END OF TRAINING STATION
	
}