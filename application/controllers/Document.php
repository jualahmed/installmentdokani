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
			$this->db->select('sells_log.*,product_info.*,warranty_product_list.*,customer_info.*,sells_log.id as sid');
			$this->db->where('sells_log.id', $invoice_id);
			$this->db->join('warranty_product_list', 'warranty_product_list.ip_id  = sells_log.w_product_id', 'left');
			$this->db->join('customer_info', 'customer_info.customer_id   = sells_log.customar_id', 'left');
			$this->db->join('product_info', 'product_info.product_id   = warranty_product_list.product_id', 'left');
			$data['invoice'] = $this->db->get('sells_log')->row();

			$this->db->where('documents.type', 'salereceiptprint');
			$this->db->where('documents.salelogid', $invoice_id);
			$data['documents']=$this->db->get('documents')->row();
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

    	$this->db->where('documents.type', 'salereceiptprint');
		$this->db->where('documents.salelogid', $id);
		$data['documents']=$this->db->get('documents')->row();

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
			$this->db->select('sells_log.*,product_info.*,warranty_product_list.*,customer_info.*,sells_log.id as sid');
			$this->db->where('id', $invoice_id);
			$this->db->join('warranty_product_list', 'warranty_product_list.ip_id  = sells_log.w_product_id', 'left');
			$this->db->join('customer_info', 'customer_info.customer_id   = sells_log.customar_id', 'left');
			$this->db->join('product_info', 'product_info.product_id   = warranty_product_list.product_id', 'left');
			$data['invoice'] = $this->db->get('sells_log')->row();

			$this->db->where('documents.type', 'salepaperforcustomer');
			$this->db->where('documents.salelogid', $invoice_id);
			$data['documents']=$this->db->get('documents')->row();

		}
		$this->__renderview('Document/salepaperforcustomer',$data);
	}

	public function salepaperforcustomerprint($id)
	{
    	$model=$this->input->post('model');
		$class=$this->input->post('class');
		$cylinder=$this->input->post('cylinder');
		$vehicle=$this->input->post('vehicle');
		$typesize=$this->input->post('typesize');
		$manufactureyear=$this->input->post('manufactureyear');
		$horsepower=$this->input->post('horsepower');
		$ladenweight=$this->input->post('ladenweight');
		$whellbase=$this->input->post('whellbase');
		$seatingcapacity=$this->input->post('seatingcapacity');
		$makersname=$this->input->post('makersname');

		$daa = Documentm::where('salelogid',$id)->where('type','salepaperforcustomer')->get();

		if(count($daa)==0){
			$daa = new Documentm();
		}else{
			$daa=Documentm::find($daa[0]->id);
		}

		$daa->model=$model;
		$daa->class=$class;
		$daa->cylinder=$cylinder;
		$daa->vehicle=$vehicle;
		$daa->typesize=$typesize;
		$daa->manufactureyear=$manufactureyear;
		$daa->horsepower=$horsepower;
		$daa->ladenweight=$ladenweight;
		$daa->whellbase=$whellbase;
		$daa->seatingcapacity=$seatingcapacity;
		$daa->makersname=$makersname;
		$daa->type='salepaperforcustomer';
		$daa->salelogid=$id;
		$daa->save();

    	$data['all']=$this->sale_model->find1($id);

    	$this->db->where('documents.type', 'salepaperforcustomer');
		$this->db->where('documents.salelogid', $id);
		$data['documents']=$this->db->get('documents')->row();
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
			$this->db->select('sells_log.*,product_info.*,warranty_product_list.*,customer_info.*,sells_log.id as sid');
			$this->db->where('id', $invoice_id);
			$this->db->join('warranty_product_list', 'warranty_product_list.ip_id  = sells_log.w_product_id', 'left');
			$this->db->join('customer_info', 'customer_info.customer_id   = sells_log.customar_id', 'left');
			$this->db->join('product_info', 'product_info.product_id   = warranty_product_list.product_id', 'left');
			$data['invoice'] = $this->db->get('sells_log')->row();

			$this->db->where('documents.type', 'deliverychallan');
			$this->db->where('documents.salelogid', $invoice_id);
			$data['documents']=$this->db->get('documents')->row();
			
		}
		$this->__renderview('Document/deliverychallan',$data);
	}

	public function deliverychallanprint($id)
	{
    	$model=$this->input->post('model');
		$class=$this->input->post('class');
		$cylinder=$this->input->post('cylinder');
		$vehicle=$this->input->post('vehicle');
		$typesize=$this->input->post('typesize');
		$manufactureyear=$this->input->post('manufactureyear');
		$seatingcapacity=$this->input->post('seatingcapacity');
		$remarks=$this->input->post('remarks');

		$daa = Documentm::where('salelogid',$id)->where('type','deliverychallan')->get();

		if(count($daa)==0){
			$daa = new Documentm();
		}else{
			$daa=Documentm::find($daa[0]->id);
		}

		$daa->model=$model;
		$daa->class=$class;
		$daa->cylinder=$cylinder;
		$daa->vehicle=$vehicle;
		$daa->typesize=$typesize;
		$daa->manufactureyear=$manufactureyear;
		$daa->seatingcapacity=$seatingcapacity;
		$daa->remarks=$remarks;
		$daa->type='deliverychallan';
		$daa->salelogid=$id;
		$daa->save();

    	$data['all']=$this->sale_model->find1($id);

    	$this->db->where('documents.type', 'deliverychallan');
		$this->db->where('documents.salelogid', $id);
		$data['documents']=$this->db->get('documents')->row();
		$this->load->view('Document/deliverychallanprint', $data);
	}

}

/* End of file Document.php */
/* Location: ./application/controllers/Document.php */