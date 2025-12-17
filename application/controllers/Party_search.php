<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* ************************************************************************************
		Purpose : To handle all Department functions 2022-08-19
***************************************************************************************/
class Party_search extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(array("Party_search_model"));
       	$this->load->library('user_agent');

           $fin_year=$this->Party_search_model->get_fin_years_list();
        $db=substr($fin_year->DBNAME,0,strlen($fin_year->DBNAME)-4);
        // echo $db;exit();

        $config_app = switch_db_dynamic($db);
        $this->Party_search_model->other_db = $this->load->database($config_app,TRUE);


    	if (isset($this->session->userdata['username']) && $this->session->userdata['username'] == TRUE)
        {
            //do something
        }else{
            redirect('login'); //if session is not there, redirect to login page
        } 
		date_default_timezone_set("Asia/Kolkata");
    	$this->session->set_userdata('comtitle', 'Party_search');
	}

    
    public function index()
    {   

        $data['party_search_type'] =$this->input->post('party_search_type');

        $data['party_search'] =$this->input->post('party_search');  

        $data['party_search_id'] =$this->input->post('party_search_id'); 


if($data['party_search_id']==''){
    if($data['party_search_type'] =='2'){
        $data['party_detail'] = $this->db->query("SELECT * from PARTIES where PHONE = '".$data['party_search']."'  ")->row();
    }
    if($data['party_search_type'] =='3'){

        $data['party_detail'] = $this->db->query("SELECT * from PARTIES where MEMBERSHIP_ID = '".$data['party_search']."'  ")->row();
    }
    if($data['party_search_type'] =='4'){
$party_id=$this->db->query("SELECT * from LOANS where BILLNO = '".$data['party_search']."'  ")->row();
        $data['party_detail'] = $this->db->query("SELECT * from PARTIES where PID = '".$data['party_search']."'  ")->row();
    }
    
}
else{
    $data['party_detail'] = $this->db->query("SELECT * from PARTIES where PID = '".$data['party_search_id']."'  ")->row();
}


        $this->load->view('party_search/party_search',$data);
    }



    public function loans()
    {
     
        $data['party_search_type'] =$this->input->post('party_search_type');

        $data['party_search'] =$this->input->post('party_search');  

        $data['party_search_id'] =$this->input->post('party_search_id'); 


if($data['party_search_id']==''){
    if($data['party_search_type'] =='2'){
        $data['party_detail'] = $this->db->query("SELECT * from PARTIES where PHONE = '".$data['party_search']."'  ")->row();
    }
    if($data['party_search_type'] =='3'){

        $data['party_detail'] = $this->db->query("SELECT * from PARTIES where MEMBERSHIP_ID = '".$data['party_search']."'  ")->row();
    }
    if($data['party_search_type'] =='4'){
$party_id=$this->db->query("SELECT * from LOANS where BILLNO = '".$data['party_search']."'  ")->row();
        $data['party_detail'] = $this->db->query("SELECT * from PARTIES where PID = '".$data['party_search']."'  ")->row();
    }
    
}
else{
    $data['party_detail'] = $this->db->query("SELECT * from PARTIES where PID = '".$data['party_search_id']."'  ")->row();
}
if(isset($data['party_detail']->PID)){
$pid=$data['party_detail']->PID;
}
else{
    $pid='0';
}
$data['sel_loan_type']=$loan_type=$this->input->post('sel_loan_type');
if($data['sel_loan_type']==''){
    $data['sel_loan_type']='loan';
}

$data['loan_details'] =$this->db->query("SELECT l.*,c.COMPANYNAME FROM LOANS l,COMPANY c WHERE l.PID = '".$pid."' and  l.COMPANYCODE=c.COMPANYCODE order by l.ENDATE desc")->result_array();
$data['receipt_details'] =$this->db->query("SELECT c.COMPANYNAME,r.BILLNO,r.RECEIPT_DATE,r.CALC_PRINCIPAL, r.CALC_INTEREST, l.INTERESTTYPE,(r.MAINTAINCHARGE+r.NOTICECHARGE+r.FORMCHARGE)as CHARGES,r.HL_AMOUNT,r.PAIDAMOUNT from  RECEIPT_MASTER r, LOANS l, COMPANY c where l.BILLNO=r.BILLNO and l.COMPANYCODE=c.COMPANYCODE and l.PID='".$pid."' order by RECEIPT_DATE desc")->result_array();

        $this->load->view('party_search/party_search_loans',$data);

    }

    public function jewel()
    {
     
        $data['party_search_type'] =$this->input->post('party_search_type');

        $data['party_search'] =$this->input->post('party_search');  

        $data['party_search_id'] =$this->input->post('party_search_id'); 


if($data['party_search_id']==''){
    if($data['party_search_type'] =='2'){
        $data['party_detail'] = $this->db->query("SELECT * from PARTIES where PHONE = '".$data['party_search']."'  ")->row();
    }
    if($data['party_search_type'] =='3'){

        $data['party_detail'] = $this->db->query("SELECT * from PARTIES where MEMBERSHIP_ID = '".$data['party_search']."'  ")->row();
    }
    if($data['party_search_type'] =='4'){
$party_id=$this->db->query("SELECT * from LOANS where BILLNO = '".$data['party_search']."'  ")->row();
        $data['party_detail'] = $this->db->query("SELECT * from PARTIES where PID = '".$data['party_search']."'  ")->row();
    }
    
}
else{
    $data['party_detail'] = $this->db->query("SELECT * from PARTIES where PID = '".$data['party_search_id']."'  ")->row();
}
if(isset($data['party_detail']->PID)){
$pid=$data['party_detail']->PID;
}
{
    $pid='';
}
$data['sel_sale_type']=$loan_type=$this->input->post('sel_sale_type');
if($data['sel_sale_type']=='')
{
    $data['sel_sale_type']='new';
}

    $data['sales_entry_list'] = $this->db->query("SELECT * FROM salesentry WHERE status='Y' AND party_id='".$pid."'  order by id desc")->result_array();
    $data['sales_receipt_list']  = $this->db->query("SELECT * FROM sales_receipt WHERE status='Y' AND party_id='".$pid."'  order by id desc")->result_array();
    $data['sales_order_list']  = $this->db->query("SELECT * FROM sales_order WHERE status!='' AND party_id='".$pid."'  ORDER BY id DESC  ")->result_array();
    $data['sales_return_list'] = $this->db->query("SELECT * FROM sales_return WHERE status!='' AND party_id='".$pid."'  ORDER BY id DESC  ")->result_array();


        $this->load->view('party_search/party_search_jewel',$data);

    }

    public function chit()
    {
     
        $data['party_search_type'] =$this->input->post('party_search_type');

        $data['party_search'] =$this->input->post('party_search');  

        $data['party_search_id'] =$this->input->post('party_search_id'); 


if($data['party_search_id']==''){
    if($data['party_search_type'] =='2'){
        $data['party_detail'] = $this->db->query("SELECT * from PARTIES where PHONE = '".$data['party_search']."'  ")->row();
    }
    if($data['party_search_type'] =='3'){

        $data['party_detail'] = $this->db->query("SELECT * from PARTIES where MEMBERSHIP_ID = '".$data['party_search']."'  ")->row();
    }
    if($data['party_search_type'] =='4'){
$party_id=$this->db->query("SELECT * from LOANS where BILLNO = '".$data['party_search']."'  ")->row();
        $data['party_detail'] = $this->db->query("SELECT * from PARTIES where PID = '".$data['party_search']."'  ")->row();
    }
    
}
else{
    $data['party_detail'] = $this->db->query("SELECT * from PARTIES where PID = '".$data['party_search_id']."'  ")->row();
}
if(isset($data['party_detail']->PID)){
$data['party_chit_master'] = $this->db->query("SELECT * from CHIT_MASTER where party_id = '".$data['party_detail']->PID."'  ")->row();
$data['party_chit_detail'] = $this->db->query("SELECT * from CHIT_LIST where party_id = '".$data['party_detail']->PID."'  ")->result_array();
}

        $this->load->view('party_search/party_search_chit',$data);

    }
    public function karupatti()
    {
     
        $data['party_search_type'] =$this->input->post('party_search_type');

        $data['party_search'] =$this->input->post('party_search');  

        $data['party_search_id'] =$this->input->post('party_search_id'); 


if($data['party_search_id']==''){
    if($data['party_search_type'] =='2'){
        $data['party_detail'] = $this->db->query("SELECT * from PARTIES where PHONE = '".$data['party_search']."'  ")->row();
    }
    if($data['party_search_type'] =='3'){

        $data['party_detail'] = $this->db->query("SELECT * from PARTIES where MEMBERSHIP_ID = '".$data['party_search']."'  ")->row();
    }
    if($data['party_search_type'] =='4'){
$party_id=$this->db->query("SELECT * from LOANS where BILLNO = '".$data['party_search']."'  ")->row();
        $data['party_detail'] = $this->db->query("SELECT * from PARTIES where PID = '".$data['party_search']."'  ")->row();
    }
    
}
else{
    $data['party_detail'] = $this->db->query("SELECT * from PARTIES where PID = '".$data['party_search_id']."'  ")->row();
}
$pid=$data['party_detail']->PID;
$data['aks_list']= $this->db->query("SELECT * FROM AKS_SALE_ENTRY WHERE id_party= '".$pid."'")->result_array();

        $this->load->view('party_search/party_search_karupatti',$data);

    }
    public function realestate()
    {
     
        $data['party_search_type'] =$this->input->post('party_search_type');

        $data['party_search'] =$this->input->post('party_search');  

        $data['party_search_id'] =$this->input->post('party_search_id'); 


if($data['party_search_id']==''){
    if($data['party_search_type'] =='2'){
        $data['party_detail'] = $this->db->query("SELECT * from PARTIES where PHONE = '".$data['party_search']."'  ")->row();
    }
    if($data['party_search_type'] =='3'){

        $data['party_detail'] = $this->db->query("SELECT * from PARTIES where MEMBERSHIP_ID = '".$data['party_search']."'  ")->row();
    }
    if($data['party_search_type'] =='4'){
$party_id=$this->db->query("SELECT * from LOANS where BILLNO = '".$data['party_search']."'  ")->row();
        $data['party_detail'] = $this->db->query("SELECT * from PARTIES where PID = '".$data['party_search']."'  ")->row();
    }
    
}
else{
    $data['party_detail'] = $this->db->query("SELECT * from PARTIES where PID = '".$data['party_search_id']."'  ")->row();
}
if(isset($data['party_detail'])){
$party_id=$data['party_detail']->PID;
}
else{
    $party_id='';
}
$data['sel_realestate_type']=$loan_type=$this->input->post('sel_realestate_type');
if($data['sel_realestate_type']=='')
{
    $data['sel_realestate_type']='purchase';
}


$data['purchase_list'] = $this->db->query("SELECT * FROM realestate_purchase WHERE status='Y' AND party_id='".$party_id."' ")->result_array();
$data['sales_list'] = $this->db->query("SELECT * FROM realestate_purchase WHERE status='Y' AND party_id='".$party_id."' ")->result_array();



        $this->load->view('party_search/party_search_realestate',$data);

    }

    public function membership()
    {
     
        $data['party_search_type'] =$this->input->post('party_search_type');

        $data['party_search'] =$this->input->post('party_search');  

        $data['party_search_id'] =$this->input->post('party_search_id'); 


if($data['party_search_id']==''){
    if($data['party_search_type'] =='2'){
        $data['party_detail'] = $this->db->query("SELECT * from PARTIES where PHONE = '".$data['party_search']."'  ")->row();
    }
    if($data['party_search_type'] =='3'){

        $data['party_detail'] = $this->db->query("SELECT * from PARTIES where MEMBERSHIP_ID = '".$data['party_search']."'  ")->row();
    }
    if($data['party_search_type'] =='4'){
$party_id=$this->db->query("SELECT * from LOANS where BILLNO = '".$data['party_search']."'  ")->row();
        $data['party_detail'] = $this->db->query("SELECT * from PARTIES where PID = '".$data['party_search']."'  ")->row();
    }
    
}
else{
    $data['party_detail'] = $this->db->query("SELECT * from PARTIES where PID = '".$data['party_search_id']."'  ")->row();
}
$pid=$data['party_detail']->PID;

$data['membership']=$this->db->query("SELECT * from MEMBERSHIP_HISTORY where PID = '".$pid."'  ")->result_array();

        $this->load->view('party_search/party_search_membership',$data);

    }

    public function rating_history()
    {
     
        $data['party_search_type'] =$this->input->post('party_search_type');

        $data['party_search'] =$this->input->post('party_search');  

        $data['party_search_id'] =$this->input->post('party_search_id'); 


if($data['party_search_id']==''){
    if($data['party_search_type'] =='2'){
        $data['party_detail'] = $this->db->query("SELECT * from PARTIES where PHONE = '".$data['party_search']."'  ")->row();
    }
    if($data['party_search_type'] =='3'){

        $data['party_detail'] = $this->db->query("SELECT * from PARTIES where MEMBERSHIP_ID = '".$data['party_search']."'  ")->row();
    }
    if($data['party_search_type'] =='4'){
$party_id=$this->db->query("SELECT * from LOANS where BILLNO = '".$data['party_search']."'  ")->row();
        $data['party_detail'] = $this->db->query("SELECT * from PARTIES where PID = '".$data['party_search']."'  ")->row();
    }
    
}
else{
    $data['party_detail'] = $this->db->query("SELECT * from PARTIES where PID = '".$data['party_search_id']."'  ")->row();
}

$pid=$data['party_detail']->PID;

$data['rating']=$this->db->query("SELECT * from MEMBERSHIP_HISTORY where PID = '".$pid."'  ")->result_array();

        $this->load->view('party_search/party_search_rating_history',$data);

    }



    public function userList()
    {
        $type =  $_GET['type'];
// print_r($type);exit;
      $search =  $_GET['query']; 
      $rows = $this->Party_search_model->getUsers($search);
      
      $res='[';

      if(count($rows)>0) {
        
        foreach($rows as $row )
        {
            $title='';
            $name='';
            $firstname=$row->NAME;
            $lastname=$row->LASTNAME_PREFIX.','.$row->FATHERSNAME;
            $address=$row->ADDRESS1.', '.$row->ADDRESS2.', '.$row->CITY;
          $member_id=$row->MEMBERSHIP_ID;
          $member_points=$row->MEMBERSHIP_POINTS;

          $membership_card = $this->db->query("SELECT * from MEMBERSHIP_CARD where PID = '".$row->PID."'  ")->row();
          if(isset($membership_card)){
            $card_type=$membership_card->CARD_TYPE;
              }
              else{
                  $card_type='';
              }
            
           $rating=$row->RATING;
            $phone=$row->PHONE;
            // $title = $firstname.'&emsp;'.'-'.'&emsp;'.$lastname.'&emsp;'.'-'.'&emsp;'.$address.'&emsp;'.'-'.'&emsp;'.$phone;
            $title = $firstname.'   --   '.$lastname.'   --   '.$address.'   --   '.$phone;
            $res.='{ "title":"'.$title.'","id": "'.$row->PID.'","firstname":"'.$firstname.'","lastname":"'.$lastname.'","member_id":"'.$member_id.'","member_points":"'.$member_points.'","rating":"'.$rating.'","address":"'.$address.'","phone":"'.$phone.'","card_type":"'.$card_type.'"},';

           // $res.='{ "title":"'.$title.'","id": "'.$row->PID.'","firstname":"'.$firstname.'","lastname":"'.$lastname.'","address":"'.$address.'","phone":"'.$phone.'"},';

        //    $res.='{ "title":"'.$title.'","id": "'.$row->PID.'","firstname":"'.$firstname.'","lastname":"'.$lastname.'","rating":"'.$rating.'","address":"'.$address.'","phone":"'.$phone.'"},';
        }
        $res=rtrim($res,',');
        $res.=']';
      }
      else{
        $res.=']';
      }
      print_r($res);die();
    }

}