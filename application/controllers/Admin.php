<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
class admin extends MY_controller{

	public function __construct()
	{
			parent::__construct();
		$this->is_logged_in();
		$this->load->model('admin_model');
		$this->load->library('session');
	}

	public function is_logged_in()
	{
		if(!$this->tank_auth->is_logged_in())
		{
			redirect('auth/login');
		}
	}

	public function index()
	{
		$data['user_type'] = $this->tank_auth->get_usertype();
		$data['user_name'] = $this->tank_auth->get_username();
		$data['alltodayinstallment'] = $this->admin_model->alltodayinstallment();
		$data['messsage'] = $this->session->userdata('success');
		$data['vuejscomp'] = "home.js";
		$this->__renderview('home', $data);
	}

	public function allsmssend($value='')
	{
		$alltodayinstallment = $this->admin_model->alltodayinstallment();
		foreach ($alltodayinstallment->result() as $key => $value) {
			echo $value->customer_contact_no;
		}
		$this->session->set_flashdata('success', 'Message send successfully');
		redirect('admin','refresh');
	}

	public function singlesmssend($n='')
	{
		$this->session->set_flashdata('success', 'Message send successfully');
		echo $n;
		// http://sms.dhost247.net/index.php?number=8801676065851&text=bangladesh
		redirect('admin','refresh');
	}

	public function download_database(){
		$temp = $this->admin_model->backup_database();
		echo json_encode($temp);
	}

	public function findinstlalment($id='')
	{
		$this->db->where('all_installment_id', $id);
		$this->db->join('sells_log', 'sells_log.id = all_installment.sells_log_id');
		$this->db->join('product_info', 'product_info.product_id = sells_log.product_id');
		$this->db->join('warranty_product_list', 'warranty_product_list.ip_id = sells_log.w_product_id');
		$this->db->join('customer_info', 'customer_info.customer_id = sells_log.customar_id');
		$d= $this->db->get('all_installment')->result();
		echo json_encode($d);
	}

	public function updateinstall()
	{
		$data = $this->db->get('sells_log')->result();

		foreach ($data as $key => $value) {
			if($value->totaldue>1 && $value->totalkisti==0){
				$this->db->set('gap',1);
				$this->db->set('month',1);
				$this->db->set('totalkisti',1);
				$this->db->set('permonthpay',$value->permonthpay);
				$this->db->set('seconddate',$value->date);
				$this->db->set('alldate',json_encode([$value->date]));
				$this->db->where('id', $value->id);
				$this->db->update('sells_log');

				$this->db->where('id', $value->id);
				$dddddd = $this->db->get('sells_log')->row();

				$dd= array(
					'sells_log_id' => $value->id,
					'date' => $dddddd->seconddate,
					'amount' => $dddddd->totaldue,
					'status' => 1,
				);
				$this->db->insert('all_installment', $dd);
			}
		}
	}
}
