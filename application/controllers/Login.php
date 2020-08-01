<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

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
	function __construct(){
		parent::__construct();		
		$this->load->model('m_login');
		
 
	}
	function index()
	{
		// $Clogin['login'] = 1;
		if($this->session->userdata('status') == "login"){
			redirect(base_url('Dashboard'));
		}else{
			$this->load->view('admin/v_login');
		}
		
	}
	function User(){
		// $Clogin['login'] = 1;
		if($this->session->userdata('status2') == "login"){
			redirect(base_url('v_login'));
		}else{
			$this->load->view('v_login');
		}
	}

	function aksi_login(){
		$Clogin['login'] = 1;
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		
		$where = array(
			'username' => $username,
			'password' => base64_encode($password)
			);
		$cek = $this->m_login->cek_login("admin",$where)->num_rows();
		if($cek > 0){
			$data_session = array(
				'nama' => $username,
				'status' => "login"
				);
 
			$this->session->set_userdata($data_session);
 
			redirect(base_url('dashboard'));
 
		}else{
			// $Clogin['login'] = 0;
			$this->session->set_userdata('pesan',  '0');
			redirect(base_url('Login'));
			

		}
	}
	function aksi_loginUser(){
		$Clogin['login'] = 1;
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		
		$where = array(
			'email' => $email,
			'password' => base64_encode($password)
			);
		$cek = $this->m_login->cek_loginUser("users",$where)->num_rows();
		if($cek > 0){
			$data_session = array(
				'nama_user' => $email,
				'status_user' => "login"
				);
 
			$this->session->set_userdata($data_session);
 
			redirect(base_url('Home'));
 
		}else{
			$this->session->set_userdata('pesan',  '0');
			redirect(base_url('Login/User'));
			

		}
	}
	function logout(){
		$this->session->sess_destroy();
		redirect(base_url('Login'));
	}
	function logoutUser(){
		$this->session->sess_destroy();
		redirect(base_url('Login/User'));
	}
}
