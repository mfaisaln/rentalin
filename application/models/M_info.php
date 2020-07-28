<?php 
class M_info extends CI_Model{	
	public function tampil(){
        // return $this->db->get('barang')->result();
        return $this->db->get('contactusinfo')->result();
	}
  public function edit($id,$data){
    $this->db->where('id_info', $id);
    $this->db->update('contactusinfo', $data); // Untuk mengeksekusi perintah update data
  }
}
?>