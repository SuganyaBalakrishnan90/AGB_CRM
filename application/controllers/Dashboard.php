<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* ************************************************************************************
		Purpose : To handle all dashboard functions
		Date    : 23-10-2018 
***************************************************************************************/
class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
    	$this->load->model(array('Dashboard_model'));
		
		if (isset($this->session->userdata['username']) && $this->session->userdata['username'] == TRUE)
        {
            
        }else{
            redirect('login'); //if session is not there, redirect to login page
        } 
		date_default_timezone_set("Asia/Kolkata");
		$this->session->set_userdata('comtitle', 'Dashboard');
	}
	
	/* ************************************************************************************
						Purpose : To handle dashboard Functions
	        **********************************************************************/
	public function index()
	{

		
		$this->load->view('dashboard');
	}
	public function real_estate()
	{

		$data['property_list'] = $this->db->query("SELECT r.*,p.PHOTO,p.TYPE_OF_RECORD FROM realestate_purchase r,PARTIES p WHERE r.property_status='Existing' AND r.status='Y' AND r.party_id=p.PID ")->result_array();
		$data['purchase_list'] = $this->db->query("SELECT r.*,p.PHOTO,p.TYPE_OF_RECORD FROM realestate_purchase r,PARTIES p WHERE r.property_status='New' AND r.status='Y' AND r.party_id=p.PID")->result_array();
		$data['booked_list'] = $this->db->query("SELECT r.*,p.PHOTO,p.TYPE_OF_RECORD FROM realestate_sale r,PARTIES p WHERE r.status='Y' AND r.party_id=p.PID AND balance_amount>0")->result_array();
		$data['registered_list'] = $this->db->query("SELECT r.*,p.PHOTO,p.TYPE_OF_RECORD FROM realestate_sale r,PARTIES p WHERE r.status='Y' AND r.party_id=p.PID AND balance_amount<=0")->result_array();
		$data['purchase_receipt_list'] = $this->db->query("SELECT * FROM realestate_purchase_receipt WHERE status='Y'")->result_array();
		$data['sale_receipt_list'] = $this->db->query("SELECT * FROM realestate_sale_receipt WHERE status='Y'")->result_array();
		
		$data['purchase_receipt_balance'] = $this->db->query("SELECT SUM(cr_balance_amount) as amount FROM realestate_purchase_receipt WHERE status='Y'")->row();
		$data['sale_receipt_balance'] = $this->db->query("SELECT SUM(cr_balance_amount) as amount FROM realestate_sale_receipt WHERE status='Y'")->row();
		// print_r($data['purchase_receipt_balance']);exit;

		$data['property_list_count'] = count($data['property_list'] );
		$data['purchase_list_count'] = count($data['purchase_list']); 
		$data['booked_list_count'] = count($data['booked_list']); 
		$data['registered_list_count'] = count($data['registered_list']); 

		
		$monday = strtotime("last sunday");
		$monday = date('w', $monday)==date('w') ? $monday+7*86400 : $monday;
		$sunday = strtotime(date("d-m-Y",$monday)." +6 days");
		$this_week_start = date("d-m-Y",$monday);
		$this_week_end = date("d-m-Y",$sunday);
		// echo "$this_week_start to $this_week_end ";
		$i=0;
		for($currentDate = strtotime($this_week_start); $currentDate <= strtotime($this_week_end); 
		$currentDate += (86400))
		{

			$data['weekly_purchase_amount'] = $this->db->query("SELECT sum(pro_amount) as amount FROM realestate_purchase WHERE status='Y' and date='".date('Y-m-d',$currentDate)."' ")->row();
			if($data['weekly_purchase_amount']->amount !=''){
				$data['weekly_purchase'][$i]= $data['weekly_purchase_amount']->amount;
			}
			else{
				$data['weekly_purchase'][$i]= 0;
			}
			$data['weekly_sale_amount'] = $this->db->query("SELECT sum(pro_amount) as amount FROM realestate_sale WHERE status='Y' and date='".date('Y-m-d',$currentDate)."' ")->row();
			if($data['weekly_sale_amount']->amount !=''){
				$data['weekly_sale'][$i]= $data['weekly_sale_amount']->amount;
			}
			else{
				$data['weekly_sale'][$i]= 0;
			}
			$i++;
		}
		$fdate=date('01-m-Y');
		$ldate=date('t-m-Y');
		$i=0;
		for($currentDate = strtotime($fdate); $currentDate <= strtotime($ldate); 
		$currentDate += (86400))
		{
			$data['monthly_sale_amount'] = $this->db->query("SELECT sum(pro_amount) as amount FROM realestate_sale WHERE status='Y' and date='".date('Y-m-d',$currentDate)."' ")->row();
			if($data['monthly_sale_amount']->amount !=''){
				$data['monthly_sale'][$i]= $data['monthly_sale_amount']->amount;
			}
			else{
				$data['monthly_sale'][$i]= 0;
			}
			$i++;
		}


		$this->load->view('dashboard_real_estate',$data);
	}
	public function karupatti()
	{
		$today=date('Y-m-d');
		$data['sale_list'] = $this->db->query("select sum(c.product_wgt) as weight,c.product_id from AKS_SALE_CART c,AKS_SALE_ENTRY e where e.sale_id=c.sale_id and e.sale_date='".$today."'  group by c.product_id ")->result_array();
		$data['top_customers_list']=$this->db->query("select sum(sale_net_amt) as sale_amount,id_party from AKS_SALE_ENTRY group by id_party order by sale_amount desc")->result_array();
		$data['order_list']=$this->db->query("select * from AKS_SALE_CART ")->result_array();
		$data['minimum_stock_list']=$this->db->query("SELECT * FROM AKS_PRD_MASTER WHERE STATUS='Y' AND AKS_MIN_STK>=PRD_CUR_QTY")->result_array();
		$data['maximum_stock_list']=$this->db->query("SELECT * FROM AKS_PRD_MASTER WHERE STATUS='Y' AND AKS_MAX_STK<=PRD_CUR_QTY")->result_array();
		$data['payment_mode_list']=$this->db->query("SELECT 
		SUM(CASE WHEN module_name = 'AKS_PURCHASE' THEN amount ELSE 0 END) AS samount,
		SUM(CASE WHEN module_name = 'Sale' THEN amount ELSE 0 END) AS pamount,type_of_payment
		FROM payment_inward_outward WHERE module_name in ('AKS_PURCHASE','Sale')   GROUP BY type_of_payment")->result_array();
		
		$data['sale_list_count']=count($data['sale_list']);
		$data['top_customers_count']=count($data['top_customers_list']);
		$data['minimum_stock_count']=count($data['minimum_stock_list']);
		$data['maximum_stock_count']=count($data['maximum_stock_list']);
		$data['payment_mode_count']=count($data['payment_mode_list']);
		$this->load->view('dashboard_karupatti',$data);
	}
	public function chit()
	{
		$this->load->view('dashboard_chit');
	}
}
/********************** END: Dashboard Controller   **************************************/
?>