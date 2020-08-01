<?php 
class M_login extends CI_Model{	
	function cek_login($table,$where){
		$this->db->select('*');		
		return $this->db->get_where($table,$where);
	}
	function cek_loginUser($table,$where){
		$this->db->select('*');		
		return $this->db->get_where($table,$where);
	}
	function cek_id($table,$where){
		$row = $this->db->get_where($table,$where)->row();
    	return $row->id_user;	
	}		
	
}
?>