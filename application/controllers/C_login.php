<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_login extends CI_Controller {
	public function __construct(){
		parent::__construct();
    $this->load->model('M_login');
		$this->CI =& get_instance();
	}

  public function index()
  {
    $this->load->view('v_login');
  }

  function aksilogin()
	{
		$user = $this->input->post('user');
		$pass = $this->input->post('pass');
		$cek = $this->M_login->cek_login($user,$pass)->num_rows();
		$a = $this->M_login->get_data($user,$pass)->row();

		if($cek > 0){
			$datasession = array(
				'nama' => $a->nama,
				'user' => $a->username,
				'status' => "login"
			);

			$this->session->set_userdata($datasession);
			redirect(base_url('C_cro/viewquest'));

		}else{
			$this->CI->session->set_flashdata('gagal','Oops... Username/password salah');
			redirect(base_url('C_login'));
		}
	}

	function logout(){
		$this->session->sess_destroy();
		redirect(base_url('C_login'));
	}

}
