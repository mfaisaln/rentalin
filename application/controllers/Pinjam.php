<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pinjam extends CI_Controller {

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
        $this->load->model('m_barang');  
      }
	public function index()
	{
        $data['barang'] = $this->m_barang->tampil();
		$this->load->view('v_pinjam',$data);
    }
    function detail_pinjaman($id){    
		$where = array('id_barang' => $id);
		$data['barang'] = $this->m_barang->cariDetail($where); 
		$this->load->view('v_pinjamanDetail', $data);
	  }
    // public function aksi_tambah()
	// {
    //     $email=$this->input->post('email');
    //     $nama_user=$this->input->post('nama_user');
    //     $telp=$this->input->post('telp');
    //     $alamat=$this->input->post('alamat');
    //     $password= base64_encode($this->input->post('password'));
    //     $data = array(
    //          'email'=> $email,
    //          'nama_user'=> $nama_user,
    //          'telp'=> $telp,
    //          'alamat'=> $alamat,
    //          'password' => $password
    //     );   
	// 	if($this->m_user->cek_kodeUser($email,'users')== ""){
	// 		$this->m_user->tambah_user($data);
    //         $this->session->set_userdata('pesan',  'Registrasi telah berhasil');
    //         redirect(base_url('Login/User'));
	// 	}else{
    //         $this->session->set_userdata('pesan', '0');
    //         redirect(base_url('Register'));
    //     }
    //     // echo $password;
        
	// }
}
