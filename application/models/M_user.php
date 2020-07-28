<?php 
class M_user extends CI_Model{	
	function tambah($data){
		$this->db->insert('admin', $data);
	}
	public function tampil(){
        return $this->db->get('users')->result();
    }
    public function tampilA(){
        return $this->db->get('admin')->result();
	}
	function cek_kode($nama,$db){
        $query =  $this->db->query("SELECT * FROM $db where username = '$nama'");
        if($query->num_rows() ==''){
          return "";
        }else{
          return "masuk";
        }
  }
  public function delete($id){
    $this->db->where('username', $id);
    $this->db->delete('admin'); // Untuk mengeksekusi perintah delete data
  }
  public function deleteU($id){
    $this->db->where('id_user', $id);
    $this->db->delete('users'); // Untuk mengeksekusi perintah delete data
  }
  public function edit($id,$data){
    $this->db->where('username', $id);
    $this->db->update('admin', $data); // Untuk mengeksekusi perintah update data
  }
  public function cari($where){
    return $this->db->get_where('admin',$where)->result();
  }
}
?>