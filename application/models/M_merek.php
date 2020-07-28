<?php 
class M_merek extends CI_Model{	
	function tambah($nama_merek){
		$this->db->query("INSERT INTO merek (nama_merek) VALUES ('$nama_merek')");
	}
	public function tampil(){
        return $this->db->get('merek')->result();
	}
	function cek_kode($nama,$db){
        $query =  $this->db->query("SELECT * FROM $db where nama_merek = '$nama'");
        if($query->num_rows() ==''){
          return "";
        }else{
          return "masuk";
        }
  }
  public function delete($id){
    $this->db->where('id_merek', $id);
    $this->db->delete('merek'); // Untuk mengeksekusi perintah delete data
  }
  public function edit($id,$data){
    $this->db->where('id_merek', $id);
    $this->db->update('merek', $data); // Untuk mengeksekusi perintah update data
  }
  public function cari($where){
    return $this->db->get_where('merek',$where)->result();
  }
}
?>