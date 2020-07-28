<?php 
class M_pesan extends CI_Model{	
	public function tampil(){
        // return $this->db->get('barang')->result();
        return $this->db->get('contactus')->result();
	}
  public function edit($id,$data){
    $this->db->where('id_cu', $id);
    $this->db->update('contactus', $data); // Untuk mengeksekusi perintah update data
  }
}
?>