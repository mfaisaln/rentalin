<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pesan extends CI_Controller {

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
        $this->load->model('m_pesan'); 
      }
	public function index()
	{
		
		$data['pesan'] = $this->m_pesan->tampil();
		$this->load->view('admin/v_tampilPesan', $data);

	}
	  public function ubah(){
		  $id=$this->input->post('id_pesan');
			$data = array(
			  "status" => 1
			);
			$this->m_pesan->edit($id,$data); 
			$this->session->set_userdata('pesan',  'Pesan berhasil Dibaca' );
			redirect(base_url('Pesan'));
	  }	
}
