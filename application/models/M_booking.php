<?php 
class M_booking extends CI_Model{	
	public function tampilOngkir(){
    $this->db->select('kode_booking, ongkir');
    $query = $this->db->get('booking');
    return $query->result();
	}
  public function editOngkir($id,$data){
    $this->db->where('kode_booking', $id);
    $this->db->update('booking', $data); // Untuk mengeksekusi perintah update data
  }
}
?>