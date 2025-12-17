<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* ************************************************************************************
		Purpose : To handle all hand_loan functions 2022-08-22
***************************************************************************************/
class Handloan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(array("Handloan_model"));
    	$this->load->library('user_agent');
    	if (isset($this->session->userdata['username']) && $this->session->userdata['username'] == TRUE)
        {
        //do something
        }else{
            redirect('login'); //if session is not there, redirect to login page
        } 
		date_default_timezone_set("Asia/Kolkata");
    	$this->session->set_userdata('comtitle', 'Handloan');
	}

    public function index()
    {

        $page       = isset($_GET['page']) ? $_GET['page'] : 1;
        $limit      = 10;
        $offset     = ($page - 1) * $limit +1;
        $page_limit = $offset+$limit-1;
        // print($page_limit);
        // print_r($offset);exit();

       


         $data['type'] = $this->input->post('hl_lis_type');
         // print_r($data['type']);exit();
         if($data['type']!=''){
         $type =" AND HL_ENTRY_TYPE LIKE'%".$data['type']."%'";
         }
          else{
         $type ='';
         }
        $data['cmp_code'] = $this->input->post('cmp_fill');
        // print_r($data['cmp_code']);exit();
         if($data['cmp_code']!=''){
         $cmp_code =" AND COMPANYCODE LIKE'%".$data['cmp_code']."%'";
         }
          else{
         $cmp_code ='';
        }
         $data['Hl_no'] = $this->input->post('hand_loan_no');

         if($data['Hl_no']!=''){
         $Hl_no =" AND HL_BILLNO LIKE'%".$data['Hl_no']."%'";
         // print_r($Hl_no);exit();
         }
          else{
         $Hl_no ='';
        }
        $data['party_name'] = $this->input->post('hl_party_name');
        // print_r($data['party_name']);exit();
         if($data['party_name']!=''){
         $party_name =" AND HL_PID LIKE'%".$data['party_name']."%'";
         }
          else{
         $party_name ='';
        }


      // $data['hl_id'] = $hl_id; 

        $data['dt_fill'] = $this->input->post('dt_fill_hloan_list');
        // print_r($data['dt_fill']);exit();
        $data['from_date_fillter'] = $this->input->post('from_date_fillter_hloan_list');
        $data['to_date_fillter'] = $this->input->post('to_date_fillter_hloan_list');

        // print_r($data);exit;
        $fdate ='';
        $tdate ='';
        //  print_r($data['dt_fill']);exit();
        if($data['dt_fill']==""){
            $fdate ='';
            $tdate ='';

        }
      
            if($data['dt_fill']=="today"){
            $data['today_date_fillter'] = date("Y-m-d");
            $fdate =" AND HL_DATE='".$data['today_date_fillter']."'";
            $tdate ='';
                
            
        }

        if($data['dt_fill']=="week"){
            $today=date('l');
            if($today=="Sunday"){
                $data['week_from_date_fillter']=date(' Y-m-d', strtotime("sunday 0 week"));
           
                $data['week_to_date_fillter']=date(' Y-m-d', strtotime("saturday 1 week"));
               // print_r($data['week_to_date_fillter']);exit;
                    $fdate =" AND HL_DATE>='".$data['week_from_date_fillter']."'";
                $tdate =" AND HL_DATE<='".$data['week_to_date_fillter']."'";

            }else{
             $data['week_from_date_fillter']=date(' Y-m-d', strtotime("sunday -1 week"));
           
             $data['week_to_date_fillter']=date('Y-m-d', strtotime("saturday 0 week"));
            //  print_r($data['week_to_date_fillter']);exit;
                 $fdate =" AND HL_DATE>='".$data['week_from_date_fillter']."'";
             $tdate =" AND HL_DATE<='".$data['week_to_date_fillter']."'";
            }
                     }
                    if($data['dt_fill']=="monthly"){
                   
                        $first=date('Y-m-01');
                        $last=date('Y-m-t');
                        $fdate =" AND HL_DATE>='".$first."'";
                        
                       
                            $tdate ="AND HL_DATE<='".$last."'";
                        }

                if($data['dt_fill']=="custom_date"){

                if($data['from_date_fillter']!=''){

                    $first=date('Y-m-d',strtotime($data['from_date_fillter']));
                    $fdate =" AND HL_DATE>='".$first."'";
                    
                    }
                    else{
                        $fdate ='';
                    }
                    if($data['dt_fill']=="custom_date"){
                if($data['from_date_fillter']!=''){
                    $first=date('Y-m-d',strtotime($data['from_date_fillter']));
                    $fdate =" AND HL_DATE>='".$first."'";
                    
                    }
                    else{
                        $fdate ='';
                    }
                    if($data['to_date_fillter']!=''){
                        $last=date('Y-m-d',strtotime($data['to_date_fillter']));
                        $tdate =" AND HL_DATE<='".$last."'";
                        
                        }
                        else{
                            $tdate ='';
                        } }
}
       

        

        $ccat = $data['cmp_code'];

        $data['get_cmp_name_fill']  = $this->db->query("SELECT * FROM COMPANY WHERE COMPANYCODE ='".$ccat."' ")->row();



        $data['party_list1'] =  $this->db->query("SELECT  * FROM  ( SELECT HL_PID as hl_pid, ROW_NUMBER() OVER (ORDER BY HL_PID DESC) AS sl FROM HL_TRANS WHERE HL_PID!='0' $type $fdate $tdate $cmp_code $Hl_no $party_name GROUP BY HL_PID  )N  WHERE  sl BETWEEN $offset AND $page_limit ")->result_array();

        $data['count'] = count($this->db->query("SELECT HL_PID as hl_pid FROM HL_TRANS WHERE HL_PID!='' $type   $fdate  $tdate $cmp_code $Hl_no   GROUP BY HL_PID ")->result_array());
 

    

   
    $pid=[];

    foreach ($data['party_list1']  as $key => $value) {

      $pid[] = $this->db->query("SELECT * FROM HL_TRANS WHERE HL_PID='".$value['hl_pid']."' order by ADDED_TIME desc")->row();
      
    }
     $data['pid'] = $pid;





     $data['get_user']  = $this->db->query("SELECT DISTINCT ADDED_USER FROM HL_TRANS ")->result_array();


   
      $data['HL_list_amts']  = $this->db->query("SELECT * FROM HL_TRANS WHERE HL_BILLNO !='' order by HL_DATE desc ")->result_array();
        $hl_tot_amt = 0;
        $ac_tot_amt = 0;
     

         foreach ($data['HL_list_amts'] as $hlrlist) {
        
            $hl_tot_amt += $hlrlist['HL_DEBIT'];
            $ac_tot_amt += $hlrlist['HL_CREDIT'];
           
        }


       
        $data['hl_tot_amt']=$hl_tot_amt;
        $data['ac_tot_amt']=$ac_tot_amt;
        $data['company_list'] = $this->Handloan_model->get_company_list();
      

        $this->load->view('hand_loan/hand_loan_list',$data);
    }
    public function handloan_history($hl_id){

        $page       = isset($_GET['page']) ? $_GET['page'] : 1;
        $limit      = 10;
        $offset     = ($page - 1) * $limit +1;
        $page_limit = $offset+$limit-1;
       


         $data['type'] = $this->input->post('hl_type');
         // print_r($data['type']);exit();
         if($data['type']!=''){
         $type =" AND HL_ENTRY_TYPE LIKE'%".$data['type']."%'";
         }
          else{
         $type ='';
         }
        $data['utype'] = $this->input->post('hl_utype');
         if($data['utype']!=''){
         $utype =" AND ADDED_USER LIKE'%".$data['utype']."%'";
         }
          else{
         $utype ='';
        }


      $data['hl_id'] = $hl_id;

        $data['dt_fill'] = $this->input->post('dt_fill_hl_his_list');

        $data['from_date_fillter'] = $this->input->post('from_date_fillter_hl_his_list');
        $data['to_date_fillter'] = $this->input->post('to_date_fillter_hl_his_list');

        // print_r($data);exit;
        $fdate ='';
        $tdate ='';
        //  print_r($data['dt_fill']);exit();
        if($data['dt_fill']==""){
            $fdate ='';
            $tdate ='';

        }
      
            if($data['dt_fill']=="today"){
            $data['today_date_fillter'] = date("Y-m-d");
            $fdate =" AND HL_DATE='".$data['today_date_fillter']."'";
            $tdate ='';
                
            
        }

        if($data['dt_fill']=="week"){
            $today=date('l');
            if($today=="Sunday"){
                $data['week_from_date_fillter']=date(' Y-m-d', strtotime("sunday 0 week"));
           
                $data['week_to_date_fillter']=date(' Y-m-d', strtotime("saturday 1 week"));
               // print_r($data['week_to_date_fillter']);exit;
                    $fdate =" AND HL_DATE>='".$data['week_from_date_fillter']."'";
                $tdate =" AND HL_DATE<='".$data['week_to_date_fillter']."'";

            }else{
             $data['week_from_date_fillter']=date(' Y-m-d', strtotime("sunday -1 week"));
           
             $data['week_to_date_fillter']=date('Y-m-d', strtotime("saturday 0 week"));
            //  print_r($data['week_to_date_fillter']);exit;
                 $fdate =" AND HL_DATE>='".$data['week_from_date_fillter']."'";
             $tdate =" AND HL_DATE<='".$data['week_to_date_fillter']."'";
            }
                     }
                    if($data['dt_fill']=="monthly"){
                   
                        $first=date('Y-m-01');
                        $last=date('Y-m-t');
                        $fdate =" AND HL_DATE>='".$first."'";
                        
                       
                            $tdate ="AND HL_DATE<='".$last."'";
                        }

                if($data['dt_fill']=="custom_date"){

                if($data['from_date_fillter']!=''){

                    $first=date('Y-m-d',strtotime($data['from_date_fillter']));
                    $fdate =" AND HL_DATE>='".$first."'";
                    
                    }
                    else{
                        $fdate ='';
                    }
                    if($data['dt_fill']=="custom_date"){
                if($data['from_date_fillter']!=''){
                    $first=date('Y-m-d',strtotime($data['from_date_fillter']));
                    $fdate =" AND HL_DATE>='".$first."'";
                    
                    }
                    else{
                        $fdate ='';
                    }
                    if($data['to_date_fillter']!=''){
                        $last=date('Y-m-d',strtotime($data['to_date_fillter']));
                        $tdate =" AND HL_DATE<='".$last."'";
                        
                        }
                        else{
                            $tdate ='';
                        } }
}
        $data['HL_historty_list'] = $this->Handloan_model->get_hl_hst_fill($hl_id,$type,$utype,$fdate,$tdate,$offset,$page_limit);
        
        $data['count'] = count($this->db->query("SELECT * FROM HL_TRANS WHERE HL_PID='".$hl_id."' $fdate $tdate $type $utype order by HL_DATE desc")->result_array());


        // $data['get_type']  = $this->db->query("SELECT DISTINCT HL_ENTRY_TYPE FROM HL_TRANS ")->result_array();
           $data['get_user']  = $this->db->query("SELECT DISTINCT ADDED_USER FROM HL_TRANS ")->result_array();

        $data['HL_his_list']  = $this->db->query("SELECT * FROM HL_TRANS WHERE HL_PID='".$hl_id."' order by HL_DATE desc ")->result_array();
        $hl_tot_amt = 0;
        $ac_tot_amt = 0;

         foreach ($data['HL_his_list'] as $hlrlist) {
        
            $hl_tot_amt += $hlrlist['HL_DEBIT'];
            $ac_tot_amt += $hlrlist['HL_CREDIT'];
      

            // print_r($data['hl_tot_amt']);
        }


    
        // print_r($data['party_idss']);exit();
        $data['hl_tot_amt']=$hl_tot_amt;
        $data['ac_tot_amt']=$ac_tot_amt;

        $bal_at = $hl_tot_amt - $ac_tot_amt;
        $bal_hl_amt = $bal_at.'.00';
        $data['bal_hl_amt'] = $bal_hl_amt;
        // exit();

         $data['hl_his'] = $this->db->query("SELECT * FROM PARTIES WHERE PID='".$hl_id."'")->result_array();

         $data['get_party_name'] = $data['hl_his'][0]['NAME'];
        
         $this->load->view('hand_loan/hand_loan_history',$data);


  
}
  
      
        
      

    

   public function handloan_entry(){

        
       $data['company_list'] = $this->Handloan_model->get_company_list();
     
        
         $this->load->view('hand_loan/hand_loan_add',$data);

         
  
}

public function userList()
      {
        $search =  $_GET['query']; 
        $rows = $this->Handloan_model->getUsers($search);

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
              
              
              $rating=$row->RATING;
              $phone=$row->PHONE;
              // $party_photo=$row->PHOTO;
              // $id_photo=$row->OTHER_PHOTO;
              // $sign_photo=$row->SIGNATURE;
              $party_photo=base64_encode($row->PHOTO);
              $id_photo=base64_encode($row->OTHER_PHOTO);
              $sign_photo=base64_encode($row->SIGNATURE);
              // $title = $firstname.'&emsp;'.'-'.'&emsp;'.$lastname.'&emsp;'.'-'.'&emsp;'.$address.'&emsp;'.'-'.'&emsp;'.$phone;
              $title = $firstname.'   --   '.$lastname.'   --   '.$address.'   --   '.$phone;
              $res.='{ "title":"'.$title.'","id": "'.$row->PID.'","firstname":"'.$firstname.'","lastname":"'.$lastname.'","member_id":"'.$member_id.'","member_points":"'.$member_points.'","rating":"'.$rating.'","party":"'.$party_photo.'","idproof":"'.$id_photo.'","sign":"'.$sign_photo.'","address":"'.$address.'","phone":"'.$phone.'"},';

              
          }
          $res=rtrim($res,',');
          $res.=']';
        }
        else{
          $res.=']';
        }
        print_r($res);die();
      }
      public function get_card_type()
      {
          $pid=$this->input->post('id');
          $card_type='';
          $card_details=$this->db->query("SELECT * FROM MEMBERSHIP_CARD WHERE PID='".$pid."'")->row();
          if(isset($card_details))
          {
              if($card_details->CARD_TYPE=='Gold'){
                $card_type='<span style="background-color:#ffaa00;border-radius: 8px;padding: 5px 15px 5px 15px;">Gold</span>';
              // $card_type=$card_details->CARD_TYPE;
              // $card_type="gold";

              }
              else if($card_details->CARD_TYPE=='Silver'){
                $card_type='<span style="background-color:#d2d4dc;border-radius: 8px;padding: 5px 15px 5px 15px;">Silver</span>';
              }
              else if($card_details->CARD_TYPE=='Platinum')
              {
                $card_type='<span style="background-color:#f4fdff;border-radius: 8px;padding: 5px 15px 5px 15px;">Platinum</span>';
              }
              echo $card_type;
            }
           
      }
      public function get_nominee_list()
      {
           $pid=$this->input->post('id');
          $nominee_details=$this->db->query("SELECT * FROM NOMINEE WHERE PID='".$pid."'")->result_array();
          $option="<option value=''>Select Nominee</option>";
          if(isset($nominee_details))
          {
            foreach ($nominee_details as $nlist) {
              $option.='<option value="'.$nlist['NOMINEE_ID'].'">'.$nlist['NOMINEE_NAME'].' - '.$nlist['RELATION'].' - '.$nlist['MOBILE_NO'].'</option>';
            }
          }
          else
          {
            $option="<option value=''>Select</option>";
          }
          echo $option;
      }
       public function get_chit_list()
      {
          // $party_id=$this->input->post('id');
          $party_id = $_POST['pid'];
          $chi_sc_id= $_POST['ccid'];
          

            

         $chit_amt = $this->db->query("SELECT * FROM CHIT_LIST WHERE party_id = '".$party_id."' AND scheme_type='".$chi_sc_id."'   ")->result_array();

         // print_r($chit_amt);
         
            
          $option="<option value=''>Select Chit ID</option>";
          if(isset($chit_amt))
          {
         foreach ($chit_amt as $clist) {

              $option.='<option value="'.$clist['chit_id'].'">'.$clist['chit_id'].' - '.$clist['ava_balance'].'.00<input type="hidden" name="cur_amt_hidden" id="cur_amt_hidden" value="'.$clist['ava_balance'].'"></option>';
            }
          }
          else
          {
            // print_r($data['scheme_type']);
            $option="<option value=''>Select</option>";
          }
          echo $option;
         
      }
      public function get_hl_det()
      {
           $pid=$this->input->post('id');


              $amt_det='';
              $deb_amt='';
              

              $amt_det = $this->db->query("SELECT SUM(HL_CREDIT) as CREDIT FROM HL_TRANS WHERE HL_PID='".$pid."'  GROUP BY HL_PID ")->row();
              $deb_amt = $this->db->query("SELECT SUM(HL_DEBIT) as DEBIT FROM HL_TRANS WHERE HL_PID='".$pid."'  GROUP BY HL_PID ")->row();
               

                 if(isset($amt_det)){

                
                 $cr_amt=$amt_det->CREDIT;
                 $db_amt=$deb_amt->DEBIT;
                 $bal_amt = $db_amt - $cr_amt;
                 $bal_hl_amt = $bal_amt;
                 }
                 if(isset($deb_amt)){
                  $cr_amt=$amt_det->CREDIT;
                  $db_amt=$deb_amt->DEBIT;
                  $bal_amt = $db_amt - $cr_amt;
                 $bal_hl_amt = $bal_amt;
                 }
                 

                 


                if($amt_det == ''){
                    // echo $cr_amt.'||'.$db_amt.'||'.$bal_hl_amt;
                 echo  '0.00'.'||'.'0.00'.'||'.'0.00';

                }else

                 // echo  '0.00'.'||'.'0.00'.'||'.'0.00';
                 echo $cr_amt.'||'.$db_amt.'||'.$bal_hl_amt;
                 

                   // echo $cr_amt.'||'.$db_amt.'||'.$bal_hl_amt;

                  // echo $pdet->PID.'||'.$pdet->NAME.'||'.$pdet->LASTNAME_PREFIX.'||'.$pdet->FATHERSNAME.'||'.$pdet->AREA.'||'.$pdet->DOORNO.'||'.$pdet->ADDRESS1.'||'.$pdet->ADDRESS2.'||'.$pdet->CITY.'||'.$pdet->PHONE;
        
      }
       
      public function get_party_bank()
      {
           $pid=$this->input->post('id');
          $party_bank=$this->db->query("SELECT * FROM party_bank_upi_details WHERE party_id='".$pid."'")->result_array();
          $option="<option value=''>Select Bank</option>";
          if(isset($party_bank))
          {
            foreach ($party_bank as $plist) {
              $option.='<option value="'.$plist['phone_account_no'].'">'.$plist['payment_type'].' - '.$plist['phone_account_no'].' - '.$plist['account_holder_name'].'</option>';
            }
          }
          else
          {
            $option="<option value=''>Select</option>";
          }
          echo $option;
      }
      public function get_photo()
      {
         $pid=$this->input->post('id');
         $party_det=$this->db->query("SELECT PHOTO FROM PARTIES WHERE PID='".$pid."'")->row();
         if($party_det->PHOTO!='')
         {
         $div='<img src="data:image/jpg;charset=utf8;base64,'.base64_encode($party_det->PHOTO).'"  height="125px" width="125px">';
         }
         else
         {
          $div='<img src="'.base_url().'assets/images/party.jpg" height="125px" width="125px" >';
         }
         echo $div;
      }
      public function update_party_phone_no()
      {
          $party_id=$this->input->post('pid');
          $new_mobile_no=$this->input->post('new_no');

          $res=$this->db->query("update PARTIES set PHONE='".$new_mobile_no."' where PID='".$party_id."'");
          return true;
      }
      public function get_party_details()
    {
        $pid = $_POST['id'];
        $pdet = $this->Handloan_model->get_party_details_by_party_id($pid);
        echo $pdet->PID.'||'.$pdet->NAME.'||'.$pdet->LASTNAME_PREFIX.'||'.$pdet->FATHERSNAME.'||'.$pdet->AREA.'||'.$pdet->DOORNO.'||'.$pdet->ADDRESS1.'||'.$pdet->ADDRESS2.'||'.$pdet->CITY.'||'.$pdet->PHONE;
    }
        public function get_loan_party_list()
    {
        $search =  $_GET['query']; 
        $rows = $this->Handloan_model->get_loan_party_list($search);
        //print_r($rows);exit;
        $res='[';
        if(count($rows)>0) {
          foreach($rows as $row )
          {
              $title='';
              $title = $row->BILLNO;
              $res.='{ "title":"'.$title.'","id": "'.$row->PID.'"},';
              
          }
          $res=rtrim($res,',');
          $res.=']';
        }
        else{
          $res.=']';
        }
        print_r($res);die();
    }

    public function pay_to_party()
   {
        $data['type']=$this->input->post('pay_type');
        $data['amt']=$this->input->post('pay_amt');
        $data['p_bank']=$this->input->post('p_bank');
        $data['ref_no']=$this->input->post('ref_no');
        $data['c_bank']=$this->input->post('c_bank');
        $data['det']=$this->input->post('pay_details');
        $data['billno']=$this->input->post('p_bill_no');
        $data['pid']=$this->input->post('p_pid');
        $data['created_by']=$_SESSION['username'];;
        $data['created_on']=date('Y-m-d');
        $res=$this->Loan_model->insert_pay_to_party($data);
        if($res)
        {
          echo 1;
        }
        else
        {
          echo 0;
        }
    
   }
      public function handloanentry_save()
    {

      $last_hl_id_detail = $this->Handloan_model->get_hl_id_key_value($_SESSION['LOANPREFIX']);
         if($last_hl_id_detail){

            $last_data= $last_hl_id_detail? $last_hl_id_detail->KEYVALUE :0;



                $year = substr( date("y"), -2);
                $slice = explode("/", $last_data);
                $result = preg_replace('/[^0-9]/',' ', $slice[0]); 
                // print_r( $result);

                function request_num ($input, $pad_len = 3  , $prefix = null) {
                    if ($pad_len <= strlen($input))
                        trigger_error('<strong>$pad_len</strong> cannot be less than or equal to the length of <strong>$input</strong> to generate invoice number', E_USER_ERROR);
                
                    if (is_string($prefix))
                        return sprintf("%s%s", $prefix, str_pad($input, $pad_len, "0", STR_PAD_LEFT));
                
                    return str_pad($input, $pad_len, "0", STR_PAD_LEFT);
                }

                $request =  request_num(((int)$result+1), 4, "HL-");
                
                $request_id =  $request.'/'.$year;

              $HandLoan_id = $request_id;
              }
              else{
                $year = substr( date("y"), -2);
                $HandLoan_id=  'HL-0001/'.$year;
}

$data['HandLoan_id']         = $HandLoan_id;

// print_r($data['HandLoan_id']);exit();


        $data['party_ids'] = $this->input->post('party_id_hidd');



        // $cdate = date('Y-m-d');
        $tdate = $data['h_date'] = $this->input->post('add_date_hand_loan_entrys');

        $hl_dates=date('Y-m-d',strtotime($tdate));

        $data['hl_date'] = $hl_dates;

        $data['hl_pay_date'] = $hl_dates;


        // print_r($data['hl_date']);exit();

        $data['type'] = $this->input->post('hl_type');
        
        
        $pid = $data['party_id'] = $this->input->post('loan_party_id');
        $data['loan_no'] = $this->input->post('loan_party_id');
        




        $data['hl_amount'] = $this->input->post('hl_amount');
        $data['ac_amount'] = $this->input->post('ac_amount');

        
         
        
        $data['paid_from'] = $this->input->post('paid_from');
        $paledid = $data['paid_from_id'] = $this->input->post('paid_from_id');


        

        $hltrans_no = $this->Handloan_model->get_hl_trans_key_value($_SESSION['LOANPREFIX']);
        
        $hltrans = $hltrans_no->KEYVALUE;
        
        
        $data['HL_TRANS_NO'] = $_SESSION['LOANPREFIX'].($hltrans+1);

        $upkey = $hltrans + 1;

        $update_key = $upkey;

        // print_r($update_key); exit();



        $tanskey = "HL_TRANS-".$_SESSION['LOANPREFIX'];
        // print_r($tanskey ); exit();


        $hlpay_nos = $this->Handloan_model->get_hl_pay_key_value($_SESSION['LOANPREFIX']);
        $hlpays = $hlpay_nos->KEYVALUE;

        $upkey = $hlpays + 1;

        $pay_update_key = $upkey;



         $paykey = "HL_PAYMENTS-".$_SESSION['LOANPREFIX'];



         $data['HL_SNO'] =$_SESSION['LOANPREFIX'].($hlpays+1);



         $hlrec_nos = $this->Handloan_model->get_hl_rec_key_value($_SESSION['LOANPREFIX']);
         $hlrec = $hlrec_nos->KEYVALUE;

         // print_r($hlrec);exit();

         $upkey = $hlrec + 1;

         $rec_update_key = $upkey;

         $payrecepit = "HL_RECEIPTS-".$_SESSION['LOANPREFIX'];
         
        // print_r($payrecepit); exit();


         $data['HL_SNO_rec'] =$_SESSION['LOANPREFIX'].($hlrec+1);
       

        
         $data['pay_mode'] =$this->input->post('cash_hand_loan_paid_from_company_add_radio');
         
         $data['cash_amount'] =$this->input->post('hlcashamount');
          $data['cash_detail'] =$this->input->post('hlcashdetail');
           $data['HandLoan_id'] =$HandLoan_id;
           // print_r($data);exit;
           if($result>0){
             $hl_cash = $this->Handloan_model->hl_cashsave($data);
           }
       
        // print_r($cash);exit;
          $data['pay_mode'] =$this->input->post('cheque_hand_loan_paid_from_company_add_radio');
           $data['cheque_amt'] =$this->input->post('hl_chequeamount');
             $data['cheque_refno'] =$this->input->post('hl_chequerefno');
             $data['cheque_cmb'] =$this->input->post('cheque_cmbk');
             $data['cheque_party'] =$this->input->post('bank_details_drop_cq');
              $data['cheque_detail'] =$this->input->post('hl_chequedetail');
               $data['HandLoan_id'] =$HandLoan_id;
               if($result>0){
                 $hl_cheque = $this->Handloan_model->hl_chequesave($data);
               }
         

          // print_r($hl_cheque);exit();



          $data['pay_mode'] =$this->input->post('rtgs_hand_loan_paid_from_company_add_radio');
           $data['rtgs_amt'] =$this->input->post('hl_rtgsamount');
            $data['rtgs_refno'] =$this->input->post('hl_rtgsrefno');
             $data['rtgs_cbank'] =$this->input->post('hl_rtgscbank');
              $data['rtgs_party_bk'] =$this->input->post('bank_details_drop_rtgs');
              $data['rtgs_detail'] =$this->input->post('hl_rtgsdetails');
               $data['HandLoan_id'] =$HandLoan_id; 
               if($result>0){
                $hl_rtgs = $this->Handloan_model->hl_rtgssave($data);
               }
           


             $data['pay_mode'] =$this->input->post('upi_hand_loan_paid_from_company_add_radio');
             $data['upi_amt'] =$this->input->post('hl_upiamount');
             $data['upi_refno'] =$this->input->post('hl_upirefno');
             $data['upi_cbank'] =$this->input->post('hl_upicbank');
             $data['upi_party_bk'] =$this->input->post('bank_details_drop_upi');
             $data['upi_detail'] =$this->input->post('hl_upidetail');
             $data['HandLoan_id'] =$HandLoan_id;
             // print_r($data['upi_amt']);exit;
             if($result>0){
              $hl_upi = $this->Handloan_model->hl_upisave($data);
             }
        
        // print_r($upi);exit;

        
        // print_r($data);exit;
        $data['pay_mode'] =$this->input->post('cash_loan_received_add_radio');
         $data['ac_cash_amount'] =$this->input->post('ac_cashamount');
          $data['ac_cash_detail'] =$this->input->post('ac_cashdetail');
           $data['ac_HandLoan_id'] =$HandLoan_id;
           if($result>0){
            $ac_cash = $this->Handloan_model->ac_cashsave($data);
           }
        
        // print_r($cash);exit;
          $data['ac_pay_mode'] =$this->input->post('cheque_hd_loan_paid_from_party_add_radio');
           $data['ac_cheque_amt'] =$this->input->post('ac_chequeamount');
            $data['ac_cheque_pbk'] =$this->input->post('party_bank_ac');
             $data['ac_cheque_refno'] =$this->input->post('ac_chequerefno');
              $data['ac_cheque_detail'] =$this->input->post('ac_chequedetail');
               $data['ac_HandLoan_id'] =$HandLoan_id;
               if($result>0){
                 $ac_cheque = $this->Handloan_model->ac_chequesave($data);
               }
         



          $data['ac_pay_mode'] =$this->input->post('rtgs_hd_loan_paid_from_party_add_radio');
           $data['ac_rtgs_amt'] =$this->input->post('ac_rtgsamount');
            $data['ac_rtgs_refno'] =$this->input->post('ac_rtgsrefno');
             $data['ac_rtgs_cbank'] =$this->input->post('ac_rtgscbank');
            
              $data['ac_rtgs_detail'] =$this->input->post('ac_rtgsdetails');
               $data['ac_HandLoan_id'] =$HandLoan_id;
               if($result>0){
                 $ac_rtgs = $this->Handloan_model->ac_rtgssave($data);
               } 
          

             $data['ac_pay_mode'] =$this->input->post('upi_hd_loan_paid_from_party_add_radio');
             $data['ac_upi_amt'] =$this->input->post('ac_upiamount');
             $data['ac_upi_refno'] =$this->input->post('ac_upirefno');
           
             $data['ac_upi_cbank'] =$this->input->post('ac_upicbank');
             $data['ac_upi_detail'] =$this->input->post('ac_upidetail');
             $data['ac_HandLoan_id'] =$HandLoan_id;
        
        
        if($result>0){
        $ac_upi = $this->Handloan_model->ac_upisave($data);
        } 
             $data['ac_mempay_mode'] =$this->input->post('mcard_hand_loan_paid_from_party_add_radio');
             $data['ac_mem_card_no'] =$this->input->post('ac_mem_card_num');
             $data['ac_mem_red_point'] =$this->input->post('ac_mem_redeem_point');
             $data['ac_mem_red_detail'] =$this->input->post('ac_mem_redeem_detail');
             $data['ac_HandLoan_id'] =$HandLoan_id;

             // print_r($data);

        if($result>0){
        $ac_mem = $this->Handloan_model->ac_memsave($data);
        }
             



       

        
        // print_r($data['ac_mem_card_no']);
        // print_r($data['ac_mem_red_point']);
        // print_r($data['ac_mem_red_detail']);exit();


        $data['$cur_point'] = $card_details=$this->db->query("SELECT * FROM MEMBERSHIP_CARD WHERE PID='".$data['party_ids']."'")->row();

        $cur_points =  $data['$cur_point']->POINTS;
        $red_point  =   $data['ac_mem_red_point'];
        // print_r($cur_points);exit();
        $bal_points = $cur_points - $red_point;

        $cpoints    = $bal_points;

        if($cpoints>0){

          $mem_car_up  = $this->db->query("UPDATE MEMBERSHIP_CARD SET POINTS='".$cpoints."' WHERE PID='".$data['party_ids']."'");
        }
        if($mem_car_up>0){

          $party_mem_up  = $this->db->query("UPDATE PARTIES SET MEMBERSHIP_POINTS='".$cpoints."' WHERE PID='".$data['party_ids']."'");
        }

        if ($result>0) {

          $mem_card = $this->Handloan_model->mem_points($data);
        }

      

         // print_r($cpoints);exit();

        

        $party_id=$data['party_ids'];

             $data['ac_chitpay_mode'] =$this->input->post('chit_hand_loan_paid_from_party_add_radio');
             $data['ac_chit_red_amount'] =$this->input->post('chit_red_amt');
             $data['chit_id'] =$this->input->post('chit_option');
             $data['ac_chit_red_detail'] =$this->input->post('chit_red_det');
             $data['ac_chit_av_amount'] =$this->input->post('cur_amt_hidden');
             $data['ac_HandLoan_id'] =$HandLoan_id;

             // print_r($data);

        if($result>0){
        $ac_chit = $this->Handloan_model->ac_chitsave($data);
        }

        
        $chit_party_id=$data['chit_id'];
       
       
        

       

        $chit_ava_bal = $data['ac_chit_av_amount'];
        $chit_amtt = $data['ac_chit_red_amount'];


        $curr_ch_amt = $chit_ava_bal - $chit_amtt;

        $curr_chit_amount = $curr_ch_amt;

    
         if($curr_chit_amount>0){

          $chit_list_up  = $this->db->query("UPDATE CHIT_LIST SET ava_balance='".$curr_chit_amount."' 
            WHERE chit_id='".$data['chit_id']."' ");
   
          }

         $data['scm_chit'] =$this->input->post('sch_payment'); 

         $chit_mas = $this->db->query("SELECT * FROM CHIT_MASTER WHERE party_id = '".$data['party_ids']."' ")->row();

         $sm_cm_curr_bal = $chit_mas->sm_cash_ava_amt;

         $sm_up_amt = $sm_cm_curr_bal - $chit_amtt;

         $tm_cm_curr_bal = $chit_mas->tm_cash_ava_amt;

         $tm_up_amt  = $tm_cm_curr_bal - $chit_amtt;

     



          if($data['scm_chit']=='1'){

            $chit_mas_up  = $this->db->query("UPDATE CHIT_MASTER  SET sm_cash_ava_amt='".$sm_up_amt."' 
            WHERE party_id = '".$data['party_ids']."' ");

          }

          if($data['scm_chit']=='2'){
            $chit_mas_up  = $this->db->query("UPDATE CHIT_MASTER  SET tm_cash_ava_amt='".$sm_up_amt."' 
            WHERE party_id = '".$data['party_ids']."' ");
          }

           $trans_detail=$this->db->query("SELECT * FROM CHIT_TRANSACTION ORDER BY sno DESC")->row(); 
           $trans=$trans_detail->sno+1;
           $prefix="TRANS-";
           $data['trans_id']=$prefix.$trans;

           $sch_id = $this->db->query("SELECT * FROM CHIT_LIST WHERE party_id = '".$data['party_ids']."' AND scheme_type='".$data['scm_chit']."'")->row();
           $data['sch_id_chit'] = $sch_id->scheme_id;


           if ($result) {
                $chit_trans = $this->Handloan_model->chit_trans_add($data);
           }
    

      
        $result = $this->Handloan_model->hl_trans_add($data);
        if($result>0){
         $results = $this->Handloan_model->hl_payment_add($data);
        }
        if($result>0){
          $res = $this->db->query("UPDATE KEYMASTER SET KEYVALUE='".$update_key."' WHERE KEYNAME='".$tanskey."' ");

        }
        if($res>0){
          $resu  = $this->db->query("UPDATE KEYMASTER SET KEYVALUE='".$pay_update_key."' WHERE KEYNAME='".$paykey."'");

          
        }
        if($resu>0){

          $resul  = $this->db->query("UPDATE KEYMASTER SET KEYVALUE='".$rec_update_key."' WHERE KEYNAME='".$payrecepit."'");
        }
        
        if($result>0)
        {
            $this->session->set_flashdata('g_success', 'Hand Loan Entry have been Added successfully...');
        }else{
           $this->session->set_flashdata('g_err', 'Could not add Hand Loan Entry details!');
        }
        redirect('Handloan');
        }
    
  
}
?>
