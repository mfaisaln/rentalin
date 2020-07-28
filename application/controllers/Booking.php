<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Booking extends CI_Controller {

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
        $this->load->model('m_booking'); 
      }
	// public function index()
	// {
		
	// 	$data['booking'] = $this->m_info->tampil();
	// 	$this->load->view('admin/v_ubahInfo', $data);

    // }
    public function Ongkir()
	{
		
		$data['ongkir'] = $this->m_booking->tampilOngkir();
		$this->load->view('admin/v_ubahOngkir', $data);

	}
	  public function ubahOngkir(){
		  $id=$this->input->post('id_info');
			$data = array(
			  "alamat_kami" => $this->input->post('alamat_kami'),
			  "email_kami" => $this->input->post('email_kami'),
			  "telp_kami" => $this->input->post('telp_kami')
			);
		

			$this->m_info->edit($id,$data); 
			$this->session->set_userdata('pesan',  'Info berhasi diubah' );
			redirect(base_url('Info'));
	  }	
}
