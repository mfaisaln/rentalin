<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Akun extends CI_Controller {

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
        if($this->session->userdata('status_user') != "login"){
          redirect(base_url('login/user'));
        }
        $this->load->model('m_user'); 
        // $this->load->model('m_merek'); 
      }
	public function index($id)
	{
		
		$this->load->view('v_detailAkun');
	}
	public function DetailAkun($id)
	{
		$where = array('id_user' => $id);
		$data['users'] = $this->m_user->cariUsers($where);
		$this->load->view('v_detailAkun',$data);
	}
	public function tambah(){
		// $this->session->set_userdata('pesan', '');
		$this->load->view('admin/v_tambahAdmin');
	}
	public function EditAkun($id){
		// $this->session->set_userdata('pesan', '');
		$where = array('id_user' => $id);
		$data['users'] = $this->m_user->cariUsers($where);
		$this->load->view('v_editAkun',$data);
	}
	public function aksi_EditAkun(){
		$id = $this->session->userdata('id_user');
		$data = array(
			"nama_user" => $this->input->post('nama_user'),
			"telp" => $this->input->post('telp'),
			"alamat" => $this->input->post('alamat'),
			"email" => $this->input->post('email')
		  );
		  $this->m_user->editAkun($id,$data);
		  redirect( base_url('Akun/DetailAkun/'.$this->session->userdata('id_user'))); 
	}
	public function EditPass($id){
		// $this->session->set_userdata('pesan', '');
		$where = array('id_user' => $id);
		$data['users'] = $this->m_user->cariUsers($where); 
		$this->load->view('v_editPass',$data);
	}
	public function aksi_EditPass(){
		$id = $this->session->userdata('id_user');
		$PassLama =  base64_encode($this->input->post('passwordLama'));
		$where = array(
			'id_user' => $id
			);
		$pass = $this->m_user->cek_pass("users",$where);
		
		if($pass == $PassLama){
			$data = array(
				"password" => base64_encode($this->input->post('password'))
			  );
			  $this->m_user->editAkun($id,$data);
			  $this->session->set_userdata('pesan',  'Password Berhasil Diubah');
			redirect( base_url('Akun/EditPass/'.$this->session->userdata('id_user'))); 
		}else{
			$this->session->set_userdata('pesan',  '0');
			redirect( base_url('Akun/EditPass/'.$this->session->userdata('id_user'))); 
		}
		
	}
	public function EditFoto($id){
		// $this->session->set_userdata('pesan', '');
		$where = array('id_user' => $id);
		$data['users'] = $this->m_user->cariUsers($where); 
		$this->load->view('v_editFoto',$data);
	}
	public function EditKTP($id){
		// $this->session->set_userdata('pesan', '');
		$where = array('id_user' => $id);
		$data['users'] = $this->m_user->cariUsers($where); 
		$this->load->view('v_editKTP',$data);
	}
	public function EditKK($id){
		// $this->session->set_userdata('pesan', '');
		$where = array('id_user' => $id);
		$data['users'] = $this->m_user->cariUsers($where); 
		$this->load->view('v_editKK',$data);
	}
	// public function hapus(){
	// 	$delete_id=$this->input->post('delete_id');
	// 	$this->m_user->delete($delete_id);
	// 	$this->session->set_userdata('pesan',  'Data Admin dengan Nama '.$delete_id.' berhasil dihapus');
	// 	redirect(base_url('User'));
    // }
    // public function hapusU(){
	// 	$delete_id=$this->input->post('delete_id');
	// 	$this->m_user->deleteU($delete_id);
	// 	$this->session->set_userdata('pesan',  'Data User dengan Nama '.$delete_id.' berhasil dihapus');
	// 	redirect(base_url('User'));
	// }
	// function cari($id){    
	// 	$where = array('username' => $id);
	// 	$data['admin'] = $this->m_user->cari($where); 
	// 	$this->load->view('admin/v_editAdmin', $data);
	//   }
	public function UbahFoto(){
		$id = $this->session->userdata('id_user');
		//upload gambar
		$config['upload_path']          = './upload/produk/';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['file_name']            = $id."_Akun";
		$config['overwrite']			= true;
		$config['max_size']             = 2048; // 1MB
		// $config['max_width']            = 1024;
		// $config['max_height']           = 768;
		
		$this->load->library('upload', $config);

		if($this->upload->do_upload('gambar')){
			$this->m_user->editF($id);
			if ($this->upload->do_upload('gambar')) {
				$gambar = $this->upload->data("file_name");
			}else{
				$gambar = "default.jpg";
			}
			$data = array(
				"foto_users" => $gambar,
			  );
		  
			  $this->m_user->editFoto($id,$data); 
		}
		
		// echo $gambar;

		
		$this->session->set_userdata('pesan',  'Data merek berhasi diubah menjadi '.$this->input->post('nama_barang'));
		redirect( base_url('Akun/DetailAkun/'.$this->session->userdata('id_user')));
	  }
	public function UbahKTP(){
		$id = $this->session->userdata('id_user');
		//upload gambar
		$config['upload_path']          = './upload/produk/';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['file_name']            = $id."_KTP";
		$config['overwrite']			= true;
		$config['max_size']             = 2048; // 1MB
		// $config['max_width']            = 1024;
		// $config['max_height']           = 768;
		
		$this->load->library('upload', $config);

		if($this->upload->do_upload('ktp')){
			$this->m_user->editKT($id);
			if ($this->upload->do_upload('ktp')) {
				$gambar = $this->upload->data("file_name");
			}else{
				$gambar = "default.jpg";
			}
			$data = array(
				"ktp" => $gambar,
			  );
		  
			  $this->m_user->editFoto($id,$data); 
		}
		
		// echo $gambar;

		
		$this->session->set_userdata('pesan',  'Data merek berhasi diubah menjadi '.$this->input->post('nama_barang'));
		redirect( base_url('Akun/DetailAkun/'.$this->session->userdata('id_user')));
	  }	
	  public function UbahKK(){
		$id = $this->session->userdata('id_user');
		//upload gambar
		$config['upload_path']          = './upload/produk/';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['file_name']            = $id."_KK";
		$config['overwrite']			= true;
		$config['max_size']             = 2048; // 1MB
		// $config['max_width']            = 1024;
		// $config['max_height']           = 768;
		
		$this->load->library('upload', $config);

		if($this->upload->do_upload('kk')){
			$this->m_user->editKK($id);
			if ($this->upload->do_upload('kk')) {
				$gambar = $this->upload->data("file_name");
			}else{
				$gambar = "default.jpg";
			}
			$data = array(
				"kk" => $gambar,
			  );
		  
			  $this->m_user->editFoto($id,$data); 
		}
		
		// echo $gambar;

		
		$this->session->set_userdata('pesan',  'Data merek berhasi diubah menjadi '.$this->input->post('nama_barang'));
		redirect( base_url('Akun/DetailAkun/'.$this->session->userdata('id_user')));
  	}	
}
