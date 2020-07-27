<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Document extends MY_Controller {

	private $shop_id;
	public function __construct()
	{
		parent::__construct();
		$this->shop_id=$this->tank_auth->get_shop_id();
		$this->is_logged_in();
		$this->load->model('sale_model');
		$this->load->model('config_model');
		$this->load->model('bankcard_model');
		$this->load->library('bangla_ntw');
	}
	
	public function is_logged_in()
	{
		$this->load->library('tank_auth');
		if(!$this->tank_auth->is_logged_in())
		{
			redirect('auth/login','refresh');
		}
	}


	public function salereceipt()
	{
		$data['user_type'] = $this->tank_auth->get_usertype();
		$bd_date = date('Y-m-d');
		$data['bd_date'] = $bd_date;
		$data['user_name'] = $this->tank_auth->get_username();

		$invoice_id=$this->input->post('invoice_id');

		if(isset($invoice_id)){
			$this->db->where('id', $invoice_id);
			$this->db->join('warranty_product_list', 'warranty_product_list.ip_id  = sells_log.w_product_id', 'left');
			$this->db->join('customer_info', 'customer_info.customer_id   = sells_log.customar_id', 'left');
			$this->db->join('product_info', 'product_info.product_id   = warranty_product_list.product_id', 'left');
			$data['invoice'] = $this->db->get('sells_log')->row();
		}
		$this->__renderview('Document/salereceipt',$data);
	}

	public function salereceiptprint($id)
	{

		$lcno=$this->input->post('lcno');
		$vesselname=$this->input->post('vesselname');
		$beno=$this->input->post('beno');

		$daa = Documentm::where('salelogid',$id)->where('type','salereceiptprint')->get();

		if(count($daa)==0){
			$daa = new Documentm();
		}else{
			$daa=Documentm::find($daa[0]->id);
		}

		$daa->lcno=$lcno;
		$daa->vesselname=$vesselname;
		$daa->beno=$beno;
		$daa->type='salereceiptprint';
		$daa->salelogid=$id;
		$daa->save();

    	$data['all']=$this->sale_model->find1($id);
		$this->load->view('Document/salereceiptprint', $data);
	}

	public function salepaperforcustomer()
	{
		$data['user_type'] = $this->tank_auth->get_usertype();
		$bd_date = date('Y-m-d');
		$data['bd_date'] = $bd_date;
		$data['user_name'] = $this->tank_auth->get_username();

		$invoice_id=$this->input->post('invoice_id');

		if(isset($invoice_id)){
			$this->db->where('id', $invoice_id);
			$this->db->join('warranty_product_list', 'warranty_product_list.ip_id  = sells_log.w_product_id', 'left');
			$this->db->join('customer_info', 'customer_info.customer_id   = sells_log.customar_id', 'left');
			$this->db->join('product_info', 'product_info.product_id   = warranty_product_list.product_id', 'left');
			$data['invoice'] = $this->db->get('sells_log')->row();
		}
		$this->__renderview('Document/salepaperforcustomer',$data);
	}

	public function salepaperforcustomerprint($id)
	{
    	$data['all']=$this->sale_model->find1($id);
		$this->load->view('Document/salepaperforcustomerprint', $data);
	}

	public function deliverychallan()
	{
		$data['user_type'] = $this->tank_auth->get_usertype();
		$bd_date = date('Y-m-d');
		$data['bd_date'] = $bd_date;
		$data['user_name'] = $this->tank_auth->get_username();

		$invoice_id=$this->input->post('invoice_id');

		if(isset($invoice_id)){
			$this->db->where('id', $invoice_id);
			$this->db->join('warranty_product_list', 'warranty_product_list.ip_id  = sells_log.w_product_id', 'left');
			$this->db->join('customer_info', 'customer_info.customer_id   = sells_log.customar_id', 'left');
			$this->db->join('product_info', 'product_info.product_id   = warranty_product_list.product_id', 'left');
			$data['invoice'] = $this->db->get('sells_log')->row();
		}
		$this->__renderview('Document/deliverychallan',$data);
	}

	public function deliverychallanprint($id)
	{
    	$data['all']=$this->sale_model->find1($id);
		$this->load->view('Document/deliverychallanprint', $data);
	}

}

/* End of file Document.php */
/* Location: ./application/controllers/Document.php */