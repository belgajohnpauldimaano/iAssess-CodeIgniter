<?php
class Users_model extends CI_Model{
    public function user_auth($un,$pw){
        $query = $this->db->query("SELECT * FROM tbl_users WHERE u_un='$un' AND u_pw='$pw'");
        if($query->num_rows() > 0){
		   $row = $query->row();
		   
            //foreach($query->result() as $row):
                $data = array(
						'g_id'     => $row->u_global_id,
						'username' => $row->u_un,
						'u_role'   => $row->u_role,
						'isLoggedIn' => TRUE
                        		);
            //endforeach;
	  
				$this->session->set_userdata($data);
	        
            return TRUE;
        }else{
            return FALSE;
        }
    }
}