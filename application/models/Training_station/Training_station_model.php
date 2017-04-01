<?php
class Training_station_model extends CI_Model{
	public function __construct(){
	}
	
	
	public function List_survey_question_part(){
		$this->db->select('*');
		$this->db->from('tbl_survey_ts_part');
		$query = $this->db->get();
		
		return $query->result_array();
	}
	public function List_survey_question_item($part_id = ''){
		$this->db->select('*');
		$this->db->from('tbl_survey_ts_part_item');
		$this->db->where('part_id', $part_id);
		$query = $this->db->get();
		
		return $query->result_array();
	}
	public function List_survey_sub_item($item_id = ''){
		$this->db->select('*');
		$this->db->from('tbl_survey_ts_sub_item');
		$this->db->where('item_id', $item_id);
		$query = $this->db->get();
		
		return $query->result_array();
	}
	
	// FUNCTIONS OF TRAINING STATION
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
	public function List_student_info($params = array()){
		
		$row = $this->Misc_model->get_branch_id($this->session->userdata['g_id'], 4);//to get the branch
		$ts_id = $this->session->userdata['g_id'];
		$latest_acad_yr = $this->Misc_model->latest_acad_year();
		
		
		$this->db->select('*');
		$this->db->from('tbl_student');
		$this->db->join('tbl_class', 'tbl_class.cls_id = tbl_student.cls_id');
		$this->db->join('tbl_course', 'tbl_course.crs_id = tbl_class.crs_id');
		$this->db->join('tbl_training_station', 'tbl_student.ts_id_no = tbl_training_station.ts_id_no');

		if(array_key_exists('limit', $params) && array_key_exists('start', $params)){
			$this->db->limit($params['limit'],$params['start']);
		}elseif(array_key_exists('limit',$params) && !array_key_exists('start', $params)){
			$this->db->limit($params['limit']);
		}
		//!empty($srch)
		if(array_key_exists('srch',$params)){
			$where = array(
						'tbl_student.stud_id_no' => $params['srch']

					);
			$orlike = array(
						'tbl_student.stud_fn' =>  $params['srch'],
						'tbl_student.stud_mn' =>  $params['srch'],
						'tbl_student.stud_ln' =>  $params['srch']
					);
			
			$this->db->group_start();
				$this->db->or_like($where);
				$this->db->or_like($orlike);
			$this->db->group_end();
			
			
		}
		
		/*if(!empty($br)){
			$this->db->where('tbl_practicum_coordinator.br_id', $br);
		}*/
		if(array_key_exists('crs', $params)){
			if($params['crs'] != 0){
				$this->db->where('tbl_course.crs_id', $params['crs']);
			}
		}
		$this->db->where('tbl_student.stud_isactive', 1);
		$this->db->where('tbl_training_station.br_id', $row->br_id);
		$this->db->where('tbl_student.ts_id_no', $ts_id);
		$this->db->where('tbl_class.cls_ay', $latest_acad_yr->cls_ay);
		$this->db->order_by('tbl_training_station.ts_id_no', 'desc');
		
		$query = $this->db->get();
		return $query->result_array();
		
	}	
	// END OF TRAINING STATION
	
}