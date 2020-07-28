<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct(){
        parent::__construct();
        if($this->session->userdata('status') != "login"){
          redirect(base_url('login'));
        }
        $this->load->model('m_barang'); 
        $this->load->model('m_merek'); 
      }
	public function index()
	{
		
		$data['barang'] = $this->m_barang->tampil();
		$this->load->view('admin/v_tampilBarang', $data);
		// $this->session->set_userdata('pesan', '');
	}
	public function tambah(){
		// $this->session->set_userdata('pesan', '');
        $data['merek'] = $this->m_merek->tampil();
		$this->load->view('admin/v_tambahBarang',$data);
	}
	public function aksi_tambah()
	{
		$nama_barang=$this->input->post('nama_barang');
		$id_merek=$this->input->post('id_merek');
        // $id_merek = $this->m_barang->cek_nama($id_merek,'merek');  
        $spec=$this->input->post('spec');
        $deskripsi=$this->input->post('deskripsi');
        $harga=$this->input->post('harga');
        $tahun=$this->input->post('tahun');
        $data = array(
             'nama_barang'=> $nama_barang,
             'id_merek' => $id_merek,
             'spec' => $spec,
             'deskripsi' => $deskripsi,
             'harga' => $harga,
             'tahun' => $tahun
        );   
		if($this->m_barang->cek_kode($nama_barang,'barang')== ""){
			$this->m_barang->tambah($data);
            $this->session->set_userdata('pesan',  'Data '.$nama_barang.' berhasil ditambahkan');
            redirect(base_url('Barang/tambah'));
		}else{
            $this->session->set_userdata('pesan', '0');
            redirect(base_url('Barang/tambah'));
		}
        
	}
	public function hapus(){
		$delete_id=$this->input->post('delete_id');
		$this->m_barang->delete($delete_id);
		$this->session->set_userdata('pesan',  'Data merek dengan id '.$delete_id.' berhasil dihapus');
		redirect(base_url('Barang'));
	}
	function cari($id){    
		$data2['merek'] = $this->m_merek->tampil();
		$where = array('id_barang' => $id);
		$data['barang'] = $this->m_barang->cari($where); 
		$this->load->view('admin/v_editBarang', $data+$data2);
	  }
	  public function ubah(){
		  $id=$this->input->post('id_barang');
			$data = array(
			  "nama_barang" => $this->input->post('nama_barang'),
			  "id_merek" => $this->input->post('id_merek'),
			  "harga" => $this->input->post('harga'),
			  "tahun" => $this->input->post('tahun'),
			  "spec" => $this->input->post('spec'),
			  "deskripsi" => $this->input->post('deskripsi'),
			);
		

			$this->m_barang->edit($id,$data); 
			$this->session->set_userdata('pesan',  'Data merek berhasi diubah menjadi '.$this->input->post('nama_barang'));
			redirect(base_url('Barang'));
	  }	
}
