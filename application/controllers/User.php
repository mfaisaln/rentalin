<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

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
        $this->load->model('m_user'); 
        // $this->load->model('m_merek'); 
      }
	public function index()
	{
		
        $data['users'] = $this->m_user->tampil();
        $data2['admin'] = $this->m_user->tampilA();
		$this->load->view('admin/v_tampilUser', $data+$data2);
		// $this->session->set_userdata('pesan', '');
	}
	public function tambah(){
		// $this->session->set_userdata('pesan', '');
		$this->load->view('admin/v_tambahAdmin');
	}
	public function DetailAkun(){
		// $this->session->set_userdata('pesan', '');
		$data['users'] = $this->m_user->tampil();
		$this->load->view('v_detailAkun',$data);
	}
	public function aksi_tambah()
	{
        $username=$this->input->post('username');
        $password= base64_encode($this->input->post('password'));
		$nama=$this->input->post('nama_admin');  
        $akses=$this->input->post('akses');
        $data = array(
             'username'=> $username,
             'password' => $password,
             'nama' => $nama,
             'akses' => $akses
        );   
		if($this->m_user->cek_kode($username,'admin')== ""){
			$this->m_user->tambah($data);
            $this->session->set_userdata('pesan',  'Data '.$username.' berhasil ditambahkan');
            redirect(base_url('user/tambah'));
		}else{
            $this->session->set_userdata('pesan', '0');
            redirect(base_url('user/tambah'));
		}
        
	}
	public function hapus(){
		$delete_id=$this->input->post('delete_id');
		$this->m_user->delete($delete_id);
		$this->session->set_userdata('pesan',  'Data Admin dengan Nama '.$delete_id.' berhasil dihapus');
		redirect(base_url('User'));
    }
    public function hapusU(){
		$delete_id=$this->input->post('delete_id');
		$this->m_user->deleteU($delete_id);
		$this->session->set_userdata('pesan',  'Data User dengan Nama '.$delete_id.' berhasil dihapus');
		redirect(base_url('User'));
	}
	function cari($id){    
		$where = array('username' => $id);
		$data['admin'] = $this->m_user->cari($where); 
		$this->load->view('admin/v_editAdmin', $data);
	  }
	  public function ubah(){
		  $id=$this->input->post('username');
			$data = array(
			//   "username" => $this->input->post('username'),
			  "password" => base64_encode($this->input->post('password')),
			  "nama" => $this->input->post('nama'),
			  "akses" => $this->input->post('akses')
			);
			$this->m_user->edit($id,$data); 
			$this->session->set_userdata('pesan',  'Data Admin berhasi diubah menjadi '.$this->input->post('username'));
			redirect(base_url('user'));
	  }	
}
