<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_cro extends CI_Controller {

	function __construct(){
    parent:: __construct();
		$this->load->model('M_cro');

		if($this->session->userdata('status') != "login"){
			redirect(base_url());
		}
  }

	public function index()
	{
    $data['content_page'] = 'tes';
		$this->load->view('index',$data);
	}

	function viewquest()
	{
		$data['quest'] = $this->M_cro->getquest()->result();
    	$data['content_page'] = 'v_quest';
		$data['page'] = 'Master';
		$this->load->view('index',$data);
	}
	function viewresp()
	{
		$data['resp'] = $this->M_cro->getresp()->result();
    	$data['content_page'] = 'v_respon';
		$data['page'] = 'Master';
		$this->load->view('index',$data);
	}
	function viewsurvey()
	{
		$data['cust'] = $this->M_cro->get_allcustmonth()->result();
		$data['area'] = $this->M_cro->get_allarea()->result();
    	$data['content_page'] = 'v_survey';
		$data['page'] = 'Modul';
		$this->load->view('index',$data);
	}
	//start add coding filter table survey 
	function getcustmonthcbg(){
		$area = $this->input->post('area');
		$id_cabang = $this->input->post('cabang');
		$data['cust'] = $this->M_cro->get_allcustmonth_filter($id_cabang)->result();
		$data['area'] = $this->M_cro->get_allarea()->result();
    	$data['content_page'] = 'v_survey';
		$data['page'] = 'Modul';
		$this->load->view('index',$data);
	}
	//end add coding filter table survey
	function getcustmonth()
	{
		$bln = $this->input->post('bulan');
		$thn = $this->input->post('tahun');
		$custslskws = $this->M_cro->get_custmonthslskws($bln,$thn)->result();
		$custservkws = $this->M_cro->get_custmonthservkws($bln,$thn)->result();
		foreach($custslskws as $a){
			$telp1 = null;
			$telp2 = null;
			$hp = null;
			if(substr($a->telepon_1,0,2) == '08'){
				$telp1 = $a->telepon_1;
			}
			if(substr($a->telepon_2,0,2) == '08'){
				$telp2 = $a->telepon_2;
			}
			if(substr($a->hp,0,2) == '08'){
				$hp = $a->hp;
			}
			$ex = explode(".", $a->diskon);
			$diskon = $ex[0];
			$date = date('Y-m-d',$a->tgl_invoice);
			$x= array(
				'tgl_surv' => null,
				'id_comp' => $a->id_company,
				'id_cust' => $a->id,
				'nama_cust' => $a->nama_customer,
				'telepon1' => $telp1,
				'telepon2' => $telp2,
				'hp' => $hp,
				'type' => $a->type,
				'tgl_inv' => $date,
				'diskon' => $diskon,
				'id_respon' => null,
				'tipe_cust' => 1
			);
			$this->M_cro->add_custslskws($x);
		}
		foreach ($custservkws as $a) {
			$telp1 = null;
			$telp2 = null;
			$hp = null;
			if(substr($a->telepon_1,0,2) == '08'){
				$telp1 = $a->telepon_1;
			}
			if(substr($a->telepon_2,0,2) == '08'){
				$telp2 = $a->telepon_2;
			}
			if(substr($a->hp,0,2) == '08'){
				$hp = $a->hp;
			}
			$ex = explode(".", $a->discount);
			$diskon = $ex[0];
			$date = date('Y-m-d',$a->date_sinv);
			$x= array(
					'tgl_surv' => null,
					'id_comp' => $a->id_company,
					'id_cust' => $a->id_customer,
					'nama_cust' => $a->nama_customer,
					'telepon1' => $telp1,
					'telepon2' => $telp2,
					'hp' => $hp,
					'type' => $a->nama,
					'tgl_inv' => $date,
					'diskon' => $diskon,
					'id_respon' => null,
					'tipe_cust' => 2
				);
				$this->M_cro->add_custservkws($x);
		}
		redirect(base_url('C_cro/viewsurvey'));
	}
	function getcabangjs()
	{
		$id = $this->input->post('id');
		$data = $this->M_cro->get_cabangjs($id)->result();
		echo json_encode($data);
	}
	function detsurv($id)
	{
		$data['det'] = $this->M_cro->get_detsurv($id)->row();
		$data['resp'] = $this->M_cro->getresp()->result();
		$data['quest'] = $this->M_cro->getquest()->result();
    	// $data['content_page'] = 'v_detsurvey';//old
    	$data['content_page'] = 'v_detsurvey_new';//new
		$data['page'] = 'Modul';
		$this->load->view('index',$data);
	}
	function save_detsurvey(){
		$nama_cust = $this->input->post('nama_cust');
		$nama_cabang = $this->input->post('nama_cabang');
		$tgl_inv = $this->input->post('tgl_inv');
		$tipe_motor = $this->input->post('tipe_motor');
		$diskon = $this->input->post('diskon');
		$id_respon = $this->input->post('id_respon');
		$x = $this->M_cro->countRowRespon();
		foreach ($x as $row_respon){
			// print_r($row_respon->id_respon);
			$totalRowRespon = $row_respon->id_respon;
		}
		$paramQuest = 'quest_'.$totalRowRespon;
		$paramNilai = 'nilai_'.$totalRowRespon;
		// die();
	}
}
