<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Merek extends CI_Controller {

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
        $this->load->model('m_merek'); 
      }
	public function index()
	{
		
		$data['merek'] = $this->m_merek->tampil();
		$this->load->view('Admin/v_tampilMerek', $data);
		// $this->session->set_userdata('pesan', '');
		
	}
	public function tambah(){
		// $this->session->set_userdata('pesan', '');
		$this->load->view('Admin/v_tambahMerek');
	}
	public function aksi_tambah()
	{
		$nama_merek=$this->input->post('nama_merek');
		if($this->m_merek->cek_kode($nama_merek,'merek')== ""){
			$this->m_merek->tambah($nama_merek);
			$this->session->set_userdata('pesan',  'Data '.$nama_merek.' berhasil ditambahkan');
			redirect(base_url('Merek/tambah'));
		}else{
			$this->session->set_userdata('pesan',  '0');
			redirect(base_url('Merek/tambah'));
		}
	}
	public function hapus(){
		$delete_id=$this->input->post('delete_id');
		$this->m_merek->delete($delete_id);
		$this->session->set_userdata('pesan',  'Data merek dengan id '.$delete_id.' berhasil dihapus');
		redirect(base_url('Merek'));
	  }
	  function cari($id){    
		$where = array('id_merek' => $id);
		$data['merek'] = $this->m_merek->cari($where); 
		$this->load->view('admin/v_editMerek', $data);
	  }
	  public function ubah(){
		  $id=$this->input->post('id_merek');
			$data = array(
			  "nama_merek" => $this->input->post('nama_merek'),
			);
			$this->m_merek->edit($id,$data); 
			$this->session->set_userdata('pesan',  'Data merek berhasi diubah menjadi '.$this->input->post('nama_merek'));
			redirect(base_url('Merek'));
	  }	
}
