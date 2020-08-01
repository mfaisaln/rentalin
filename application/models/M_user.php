<?php 
class M_user extends CI_Model{	
	function tambah($data){
		$this->db->insert('admin', $data);
  }
  function tambah_user($data){
		$this->db->insert('users', $data);
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
  function cek_kodeUser($nama,$db){
    $query =  $this->db->query("SELECT * FROM $db where email = '$nama'");
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
    $row = $this->db->where('id_user',$id)->get('users')->row();
    if(($row->ktp != "default.jpg")||($row->kk != "default.jpg")){
      unlink('./upload/produk/'.$row->kk);
      unlink('./upload/produk/'.$row->ktp);
    }
    
    $this->db->where('id_user', $id);
    $this->db->delete('users');
    return true;  
    
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