<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

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
        $this->load->helper(array('form', 'url'));
        // if($this->session->userdata('status_user') != "login"){
        //   redirect(base_url('login'));
        // }
        $this->load->model('m_user');  
      }
	public function index()
	{
		$this->load->view('v_register');
    }
    public function aksi_tambah()
	{
        $email=$this->input->post('email');
        $nama_user=$this->input->post('nama_user');
        $telp=$this->input->post('telp');
        $alamat=$this->input->post('alamat');
        $password= base64_encode($this->input->post('password'));
        //upload gambar
        $config['upload_path']          = './upload/produk/';
		$config['allowed_types']        = 'gif|jpg|png';
		// $config['file_name']            = $email;
		$config['overwrite']			= true;
		$config['max_size']             = 2048; // 1MB
		// $config['max_width']            = 1024;
		// $config['max_height']           = 768;

		$this->load->library('upload', $config);
		if ($this->upload->do_upload('ktp')) {
			$ktp = $this->upload->data("file_name");
		}else{
			$ktp = "default.jpg";
        }
        if ($this->upload->do_upload('kk')) {
			$kk = $this->upload->data("file_name");
		}else{
			$kk = "default.jpg";
		}
        $data = array(
             'email'=> $email,
             'nama_user'=> $nama_user,
             'telp'=> $telp,
             'kk'=> $kk,
             'ktp'=> $ktp,
             'alamat'=> $alamat,
             'password' => $password
        );   
		if($this->m_user->cek_kodeUser($email,'users')== ""){
			$this->m_user->tambah_user($data);
            $this->session->set_userdata('pesan',  'Registrasi telah berhasil');
            redirect(base_url('Login/User'));
		}else{
            $this->session->set_userdata('pesan', '0');
            redirect(base_url('Register'));
        }
        // echo $kk;
        
	}
}
