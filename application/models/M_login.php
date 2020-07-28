<?php 
class M_login extends CI_Model{	
	function cek_login($table,$where){
		$this->db->select('*');		
		return $this->db->get_where($table,$where);
	}	
}
?>