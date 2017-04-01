<?php
class Faculty_model extends CI_Model{
	public function __construct(){
	}
	
	// CLASS
	public function list_Class($acad_yr='' , $crs = '', $params = array()){
		
		$row = $this->Misc_model->get_branch_id($this->session->userdata['g_id'], 3);//to get the branch
		
		$this->db->select('*');
		$this->db->from('tbl_class');
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
		$this->db->where('tbl_class.fa_id_no', $this->session->userdata['g_id']);
		$this->db->order_by('tbl_class.cls_ay', 'desc');
		
		$query = $this->db->get();
		return $query->result_array();
		
	}	
	// END OF CLASS
	
	public function List_student_info($params = array()){
		
		$row = $this->Misc_model->get_branch_id($this->session->userdata['g_id'], 3);//to get the branch $this->session->userdata['g_id']
		$fa_id = $this->session->userdata['g_id'];
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
		if(array_key_exists('cls_id', $params)){
			$this->db->where('tbl_class.cls_id', $params['cls_id']);	
		}
		$this->db->where('tbl_student.stud_isactive', 1);
		//$this->db->where('tbl_training_station.br_id', $row->br_id);
		$this->db->where('tbl_class.fa_id_no', $fa_id);
		$this->db->order_by('tbl_student.stud_id', 'asc');
		
		$query = $this->db->get();
		return $query->result_array();
		
	}	
	// END OF TRAINING STATION
	
}