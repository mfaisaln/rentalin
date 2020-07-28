<?php 
class M_barang extends CI_Model{	
	function tambah($data){
        // $this->db->query("INSERT INTO merek (nama_merek) VALUES ('$nama_merek')");
        $this->db->insert('barang', $data);
	}
	public function tampil(){
        // return $this->db->get('barang')->result();
         $query = $this->db->query("SELECT id_barang, nama_barang, merek.nama_merek as nama_merek, harga, tahun FROM barang JOIN merek on merek.id_merek = barang.id_merek;");
         return $query->result();
	}
	function cek_kode($nama,$db){
        $query =  $this->db->query("SELECT * FROM $db where nama_barang = '$nama'");
        if($query->num_rows() ==''){
          return "";
        }else{
          return "masuk";
        }
      }	
      // function cek_nama($nama,$db){
      //   $query =  $this->db->query("SELECT id_merek FROM $db where nama_merek = '$nama'");
      //   return $query->num_rows();
      // }	
      public function delete($id){
        $this->db->where('id_barang', $id);
        $this->db->delete('barang'); // Untuk mengeksekusi perintah delete data
      }
      public function edit($id,$data){
        $this->db->where('id_barang', $id);
        $this->db->update('barang', $data); // Untuk mengeksekusi perintah update data
      }
      public function cari($where){
        return $this->db->get_where('barang',$where)->result();
      }
}
?>