<?php

class M_cro extends CI_Model{

  function getquest()
  {
    return $this->db->get('mst_quest');
  }
  function getresp()
  {
    return $this->db->get('mst_respon');
  }
  function get_custmonthslskws($bln,$thn)
  {
    $awal = gmmktime(0,0,0,$bln,01,$thn);
    $akhir = gmmktime(0,0,0,$bln+1,00,$thn);
    $db3 = $this->load->database('db3', TRUE);
    $db3->select(['id','nama_customer','customer.telepon_1','customer.telepon_2','customer.hp','type','tgl_invoice','warna','diskon','rpt_sales_bbn.id_company']);
    // $db3->select(['customer.id_customer','customer.nama','customer.telepon_1','customer.telepon_2','customer.hp','tgl_invoice','type','warna','diskon']);
    $db3->from('rpt_sales_bbn');
    $db3->join('pj_so','pj_so.no_so=rpt_sales_bbn.no_spk');
    $db3->join('customer','customer.id_customer=pj_so.id_customer');
    $db3->where('tgl_invoice >=', $awal);
    $db3->where('tgl_invoice <=', $akhir);
    $db3->where('cons_group', 'PERORANGAN');
    $db3->where("(customer.telepon_1 not in('','0') or customer.telepon_2 not in('','0') or customer.hp not in('','0'))");
    // $db3->limit(1);
    return $db3->get();
  }
  function get_custmonthservkws($bln,$thn)
  {
    $awal = gmmktime(0,0,0,$bln,01,$thn);
    $akhir = gmmktime(0,0,0,$bln+1,00,$thn);
    $db3 = $this->load->database('db3', TRUE);
    $db3->select(['customer.id_customer','nama_customer','telepon_1','telepon_2','hp','inventori.nama','date_sinv','discount','id_company']);
    $db3->from('pj_sinv');
    $db3->join('customer','customer.id_customer=pj_sinv.id_customer');
    $db3->join('cus_has_motor','cus_has_motor.id_customer=customer.id_customer');
    $db3->join('inventori','inventori.id_inventori=cus_has_motor.id_inventori');
    $db3->where('date_sinv >=', $awal);
    $db3->where('date_sinv <=', $akhir);
    $db3->where('customer.kode_cusgrup', 'PERORANGAN');
    $db3->where('auto_type', 2);
    $db3->where('approval1', 't');
    $db3->where("(customer.telepon_1 not in('','0') or customer.telepon_2 not in('','0') or customer.hp not in('','0'))");
    // $db3->limit(1);
    return $db3->get();
  }
  function add_custslskws($x)
  {
    $this->db->insert('tb_surv', $x);
  }
  function add_custservkws($x)
  {
    $this->db->insert('tb_surv', $x);
  }
  function get_allcustmonth()
  {
    $this->db->from('tb_surv');
    $this->db->join('mst_company','mst_company.id_company=tb_surv.id_comp');
    return $this->db->get();
  }
  //start add filter get all cust
  function get_allcustmonth_filter($id_cabang)
  {
    $this->db->where('id_comp', $id_cabang);
    $this->db->from('tb_surv');
    $this->db->join('mst_company','mst_company.id_company=tb_surv.id_comp');
    return $this->db->get();
  }
  //end add filter get all cust
  function get_allarea()
  {
    $this->db->where('id_parent', 1);
    $this->db->where('id_company !=', 30);
    return $this->db->get('mst_company');
  }
  function get_cabangjs($id)
  {
    $this->db->where('id_parent', $id);
    return $this->db->get('mst_company');
  }
  function get_detsurv($id)
  {
    $this->db->where('id_surv', $id);
    $this->db->from('tb_surv');
    $this->db->join('mst_company','mst_company.id_company=tb_surv.id_comp');
    return $this->db->get();
  }

  function countRowRespon(){
    $query = $this->db->query("SELECT *,count(id_respon) AS id_respon FROM mst_respon");
    // print_r($query->result());
    return $query->result();
  }

}
