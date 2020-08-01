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
  public function editAkun($id,$data){
    $this->db->where('id_user', $id);
    $this->db->update('users', $data); // Untuk mengeksekusi perintah update data
  }
  public function cari($where){
    return $this->db->get_where('admin',$where)->result();
  }
  public function cariUsers($where){
    return $this->db->get_where('users',$where)->result();
  }
  // public function cariEmail($where){
  //   return $this->db->get_where('users',$where)->result();
  // }
  public function editF($id){
    $row = $this->db->where('id_user',$id)->get('users')->row();
    if($row->foto_users != "default.jpg"){
      unlink('./upload/produk/'.$row->foto_users);
    }
    return true;     

    // $this->db->where('id_barang', $id);
    // $this->db->delete('barang'); // Untuk mengeksekusi perintah delete data
  }
  public function editFoto($id,$data){
    $this->db->where('id_user', $id);
    $this->db->update('users', $data); // Untuk mengeksekusi perintah update data
  }
  public function editKT($id){
    $row = $this->db->where('id_user',$id)->get('users')->row();
    if($row->ktp != "default.jpg"){
      unlink('./upload/produk/'.$row->ktp);
    }
    return true;     

    // $this->db->where('id_barang', $id);
    // $this->db->delete('barang'); // Untuk mengeksekusi perintah delete data
  }
  public function editKK($id){
    $row = $this->db->where('id_user',$id)->get('users')->row();
    if($row->kk != "default.jpg"){
      unlink('./upload/produk/'.$row->kk);
    }
    return true;     

    // $this->db->where('id_barang', $id);
    // $this->db->delete('barang'); // Untuk mengeksekusi perintah delete data
  }
  function cek_pass($table,$where){
		$row = $this->db->get_where($table,$where)->row();
    	return $row->password;	
	}		
  
}
?>