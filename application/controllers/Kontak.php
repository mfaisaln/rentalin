<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kontak extends CI_Controller {

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
        // if($this->session->userdata('status_user') != "login"){
        //   redirect(base_url('login'));
        // }
        $this->load->model('m_pesan');  
      }
	public function index()
	{
		$this->load->view('v_kontak');
	}
	public function aksi_tambah()
	{
        $nama_visit=$this->input->post('nama_visit');
        $email_visit=$this->input->post('email_visit');
        $subjek=$this->input->post('subjek');
        $pesan=$this->input->post('pesan');
        $data = array(
             'nama_visit'=> $nama_visit,
             'email_visit'=> $email_visit,
             'subjek'=> $subjek,
			 'pesan'=> $pesan,
			 'status'=> 0
        );   
			$this->m_pesan->tambah_kontak($data);
            $this->session->set_userdata('pesan',  'Pesan berhasil di kirimkan');
            redirect(base_url('Kontak'));
        // echo $password;
        
	}
}
