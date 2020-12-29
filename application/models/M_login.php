<?php 

class M_login extends CI_Model{
	
	public function getDataByEmail($email){
		$this->db->where('email', $email);
		return $this->db->get('tbl_user_login');
	}

	public function getDataByID($id){
		$this->db->where('ID', $id);
		return $this->db->get('tbl_user_login');
	}

	public function updateLastLogin($id){
		$this->db->set("last_login", time())
				->where('ID', $id)
				->update('tbl_user_login');
	}

	public function insertDataUser($data){
		$this->db->insert('tbl_user_login', $data);
		return $this->db->insert_id();
	}
}