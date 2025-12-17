<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* ************************************************************************************
		Purpose : To handle all Aksproduct_master functions 2022-08-22
***************************************************************************************/
class Aks_sale extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(array("Aks_sale_model"));
    	$this->load->library('user_agent');
        $fin_year=$this->Aks_sale_model->get_fin_years_list();
        $db=substr($fin_year->DBNAME,0,strlen($fin_year->DBNAME)-4);
        $config_app = switch_db_dynamic($db);
        $this->Aks_sale_model->other_db = $this->load->database($config_app,TRUE);

    	if (isset($this->session->userdata['username']) && $this->session->userdata['username'] == TRUE)
        {
        //do something
        }else{
            redirect('login'); //if session is not there, redirect to login page
        } 
		date_default_timezone_set("Asia/Kolkata");
    	$this->session->set_userdata('comtitle','Aks_sale');
	}

    public function index()
    {

        $delivery_status_alert=$this->db->query("SELECT * FROM AKS_SALE_ENTRY WHERE sale_deliverymode='courier' AND sale_track_id is null AND sale_dl_sts is null")->result_array();
        foreach($delivery_status_alert as $alert_list){
add_notification(date('Y-m-d H:i:s'), '', "Others", "Karupatti doesn't delivered", $alert_list['sale_id']. ' created By ' .$_SESSION['username'],'', $_SESSION['USERID'], '0', $alert_list['sale_id']);
$update=$this->db->query("UPDATE AKS_SALE_ENTRY SET sale_dl_sts='1' WHERE sale_id ='". $alert_list['sale_id']."'");
}
        
        $page       = isset($_GET['page']) ? $_GET['page'] : 1;
        $limit      = 10;
        $offset     = ($page - 1) * $limit +1;
        $page_limit =$offset+$limit-1;
       
         $data['party_name'] = $this->input->post('party_name');
         if($data['party_name']!=''){
         $party_name =" AND sale_party LIKE'%".$data['party_name']."%'";
         }
          else{
         $party_name ='';
        }
        $data['bill_id'] = $this->input->post('bill_id');
         if($data['bill_id']!=''){
         $sale_id =" AND sale_id LIKE'%".$data['bill_id']."%'";
         }
          else{
         $sale_id ='';
        }

        // print_r($data['party_name']);
        // print_r($data['bill_id']);
         

        // exit;

//         
          $data['dt_fill'] = $this->input->post('dt_fill_sale_list');

        $data['from_date_fillter'] = $this->input->post('from_date_fillter_nontag_list');
        $data['to_date_fillter'] = $this->input->post('to_date_fillter_nontag_list');

        // print_r($data['from_date_fillter']);exit;
        $fdate ='';
        $tdate ='';
        //  print_r($data['dt_fill']);exit();
        if($data['dt_fill']=="all"){
            $fdate ='';
            $tdate ='';

        }
      
            if($data['dt_fill']=="today"){
            $data['today_date_fillter'] = date("Y-m-d");
            $fdate =" AND sale_date='".$data['today_date_fillter']."'";
            $tdate ='';
                
            
        }

        if($data['dt_fill']=="week"){
            $today=date('l');
            if($today=="Sunday"){
                $data['week_from_date_fillter']=date(' Y-m-d', strtotime("sunday 0 week"));
           
                $data['week_to_date_fillter']=date(' Y-m-d', strtotime("saturday 1 week"));
               // print_r($data['week_to_date_fillter']);exit;
                    $fdate =" AND sale_date>='".$data['week_from_date_fillter']."'";
                $tdate =" AND sale_date<='".$data['week_to_date_fillter']."'";

            }else{
             $data['week_from_date_fillter']=date(' Y-m-d', strtotime("sunday -1 week"));
           
             $data['week_to_date_fillter']=date('Y-m-d', strtotime("saturday 0 week"));
            //  print_r($data['week_to_date_fillter']);exit;
                 $fdate =" AND sale_date>='".$data['week_from_date_fillter']."'";
             $tdate =" AND sale_date<='".$data['week_to_date_fillter']."'";
            }
                     }
                    if($data['dt_fill']=="monthly"){
                   
                        $first=date('Y-m-01');
                        $last=date('Y-m-t');
                        $fdate =" AND sale_date>='".$first."'";
                        
                       
                            $tdate ="AND sale_date<='".$last."'";
                        }

                if($data['dt_fill']=="custom_date"){

                if($data['from_date_fillter']!=''){

                    $first=date('Y-m-d',strtotime($data['from_date_fillter']));
                    $fdate =" AND sale_date>='".$first."'";
                    
                    }
                    else{
                        $fdate ='';
                    }
                    if($data['dt_fill']=="custom_date"){
                if($data['from_date_fillter']!=''){
                    $first=date('Y-m-d',strtotime($data['from_date_fillter']));
                    $fdate =" AND sale_date>='".$first."'";
                    
                    }
                    else{
                        $fdate ='';
                    }
                    if($data['to_date_fillter']!=''){
                        $last=date('Y-m-d',strtotime($data['to_date_fillter']));
                        $tdate =" AND sale_date<='".$last."'";
                        
                        }
                        else{
                            $tdate ='';
                        } }
}
                        $this->db->reconnect();
                        // print_r($data['dt_fill']);
                        // print_r($fdate);
                        // print_r($tdate);
                        // exit;

           $data['sale_list'] = $this->Aks_sale_model->get_sale_list_fill($fdate,$tdate,$party_name,$sale_id,$offset,$page_limit);
           $data['count'] = count($this->db->query("SELECT * FROM AKS_SALE_ENTRY WHERE status!='N' AND partial_packing='0' $fdate $tdate $party_name 
            $sale_id order by sid desc")->result_array());
           // print_r($data['counts']);exit;

        $this->load->view('Aks_sale/aks_sale_list',$data);
    }
    public function prd_delete()
    {
        $uid = $data['bid']=$_POST['id'];
        $data['prd_details'] = $this->db->query("SELECT * FROM AKS_PRD_MASTER WHERE id=".$uid)->row();
        $this->load->view('aksproduct_master/aks_products_delete',$data);
    }
    public function delete()
    { 
        $bid=$_POST['field'];
        $result = $this->Aksproductmaster_model->prd_delete($bid);
        if ($result) {
            $this->session->set_flashdata('g_success', 'Product has been Deleted successfully.');
        }
        else{
            $this->session->set_flashdata('g_err', 'Something went wrong');
        }

    }
    public function sales_view()
    {
        $sid = $_GET['id'];
        $data = $this->Aks_sale_model->get_sale_list_view($sid);
        echo json_encode($data[0]);
    }


    public function sale_view()
    {
        $pid = $_POST['id'];
        $data['pur_details'] = $this->Aks_sale_model->get_sale_list($pid);
        $this->load->view('Aks_sale/',$data);
    }

     public function sale_print($sprint)
    {

        
        
        // $getid = $this->db->query("SELECT * FROM AKS_SALE_ENTRY where sid='".$sprint."' ")->row();

        // $product_id = $getid->sale_id;

       
        // print_r($product_id); exit;
       
        $data['sale_print'] = $this->Aks_sale_model->get_sale_print($sprint);


        // $pr_id = $data['sale_print'];

        // $product = $pr_id->sale_id;

         $getid = $this->db->query("SELECT * FROM AKS_SALE_ENTRY where sid='".$sprint."' ")->row();


        

        $product_id = $getid->sale_id;


        $data['print_cart_view'] = $this->Aks_sale_model->get_cart_print($product_id);


        // $data['party_d'] = $this->db->query("SELECT * FROM PARTIES WHERE id=".$sprint)->row();
        // print_r($data['sale_print']); exit;


        $this->load->view('Aks_sale/aks_sales_receipt_print',$data);
    }
    public function sale_print_pos($spos)
    {

        
        
        // $getid = $this->db->query("SELECT * FROM AKS_SALE_ENTRY where sid='".$spos."' ")->row();

        // $product_id = $getid->sale_id;

       
        // print_r($product_id); exit;
       
        $data['sale_pos'] = $this->Aks_sale_model->get_sale_print($spos);

        // print_r($data['sale_pos']); exit;
        // $pr_id = $data['sale_print'];

        // $product = $pr_id->sale_id;

         $getid= $this->db->query("SELECT * FROM AKS_SALE_ENTRY where sid='".$spos."' ")->row();


        // print_r($data['print_pos_prd_detail']); exit;

        $product_id = $getid->sale_id;


        $data['print_cart_view_pos'] = $this->Aks_sale_model->get_cart_pos($product_id);


        // $data['party_d'] = $this->db->query("SELECT * FROM PARTIES WHERE id=".$spos)->row();
        // print_r($data['sale_print']); exit;


        $this->load->view('Aks_sale/aks_shipping_pos',$data);
    }

  public function change_delivery(){


        $sid = $_GET['id'];
        $data = $this->Aks_sale_model->get_sale_list_view($sid);
        echo json_encode($data[0]);
}



    public function  delivery_update(){

       $data['sid'] = $this->input->post('delivery_approved');
       // print_r($data['sid']);exit;
       $sid=$data['sid'];

       // $delivery_approved  = $this->db->query("SELECT * FROM AKS_SALE_ENTRY WHERE sid='".$sid ."' ")->row();
       // // print_r($delivery_approved);exit;
       $data['sale_del_by']         = $this->input->post('del_by');
       // $sale_del_by = $data['sale_del_by'];
       // $delivery_approved = $sale_del_by;
        $res= $this->db->query("UPDATE AKS_SALE_ENTRY set sale_deliverymode='Courier' where sid=". $sid);

       $data['sale_track_id']         = $this->input->post('tracking_id');
       $sale_track_id = $data['sale_track_id'];
       $delivery_approved = $sale_track_id;
        $res= $this->db->query("UPDATE AKS_SALE_ENTRY set sale_track_id='". $delivery_approved."' where sid=". $sid);
       

       // $data['sale_del_by']         = $this->input->post('del_by');
       // $data['sale_track_id']       = $this->input->post('tracking_id');
       redirect('Aks_sale/');
       // $res = $this->Aks_sale_model->del_approve($data);
    }
    

    public function add_cart_list()
    {
        $plid = $_POST['id'];
        $count = $_POST['count'];
        $data['cart_list'] = $this->Aks_sale_model->get_cart_list($plid);
      
        // // print_r($data['cart_list']);exit;
         $prd_img =$data['cart_list']->AKS_PRD_IMG;


         $prd_name =$data['cart_list']->AKS_PRD_NAME;
         $prd_hsn =$data['cart_list']->HSN_CODE;
         // print_r($prd_name);exit;
         $prd_sale_price =$data['cart_list']->AKS_PRD_PRICE;
          $unit_price    =$data['cart_list']->AKS_PRD_WT;

         // $img= '<div style="background-image: url('.base_url().'assets/images/Aks_prd_images/'.$prd_img.'border-radius: 10px;"></div>';

         $image_url =  base_url().'assets/images/aks_product_image/'. $prd_img; 
         if(@getimagesize($image_url)){
          $img_div='<div class="image-input d-flex align-items-center fs-8" data-kt-image-input="true">
        <div class="image-input-wrapper w-40px h-40px" style="background-image: url('.$image_url.')"></div>
        </div>';
           }
           else{
            $image_url =  base_url().'assets/images/karupatti.jpg'; 
            $img_div='<div class="image-input d-flex align-items-center fs-8" data-kt-image-input="true">
        <div class="image-input-wrapper w-40px h-40px" style="background-image: url('.$image_url.')"></div>
        </div>';
           }
         $row='<tr onclick="add_cart()" name="count"><td>'.($count+1).'<input type="hidden" name="item_count_hidden[]"  id="item_count_hidden'.$count.'" value="'.($count+1).'"></td><td><input type="hidden" name="prd_id_hidden[]" id="prd_id_hidden'.$count.'" value="'.$plid.'">'.$img_div.$prd_name.'</td><td>

         <div><input type="text" name="sale_wgt[]" id="prd_wgt'.$count.'" value="1000"  onkeyup="cart_prd_cal('.$count.')" onfocusout="cart_prd_cal_total('.$count.')" value="0" class="form-control form-control-lg form-control-solid fs-7"></div></td>

         <td onkeyup="cart_prd_cal()" name="lb_prd_price" id="lb_prd_price'.$count.'">'.$prd_sale_price.'/'.$unit_price.
          
         '<input type="hidden" name="prd_unit[]" id="prd_unit'.$count.'" value="'.$unit_price.'">
           
         <input type="hidden" name="prd_sale_price_hidden[]" id="prd_sale_price_hidden" value="'.$prd_sale_price.'">
         <input type="hidden" name="prd_hsn_hidden[]" id="prd_hsn_hidden" value="'.$prd_hsn.'"></td></td>
          
         <td id="lbl_price_tot'.$count.'">0.00</td>
         
         <td>
            <a href="#" name="'.$count.'"  class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm btnDelete" data-bs-toggle="modal">
                <span class="svg-icon svg-icon-3">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="currentColor"></path>
                        <path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="currentColor"></path>
                        <path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="currentColor"></path>
                    </svg>
                </span>
            </a>
           </td></tr>';
           

           echo $row;

    }

   public function aks_new_sale(){

        $data['category_list1']  = $this->db->query("SELECT * FROM AKSPRODUCT_CATEGORY WHERE Status='Y'  ")->result_array();
      
        $data['supplier_list']  = $this->Aks_sale_model->get_supplier_list();
       
        $data['sale_menu'] = $this->Aks_sale_model->get_sale_detail();
        // print_r($data['supplier_list']);exit;
        $data['sale_price'] = $this->Aks_sale_model->get_sale_detail();
        // print_r($data['pur_price']);exit;

         $this->load->view('Aks_sale/aks_new_sale',$data);
        
}
   
     public function image_view()
    {
        $id = $_POST['id'];
         $response='<div class="image-input-wrapper w-250px h-250px" style="background-image: url(<?php echo base_url() ?>assets/images/aks_product_image/<?php echo $id; ?>)"></div>';
   echo $response;
    }
    
  public function category_select(){

        $clid = $_POST['id'];

        if($clid != 'all'){
          $result  = $this->db->query("SELECT * FROM AKS_PRD_MASTER WHERE AKS_CAT_NAME = '".$clid."'")->result_array();
        }else{
          $result  = $this->db->query("SELECT * FROM AKS_PRD_MASTER ")->result_array();
        }
        // echo $clid;                  
                                  
         $menuchange='';                      
         foreach($result as $plist){ 
          $image_url =  base_url().'assets/images/aks_product_image/'.$plist['AKS_PRD_IMG']; 

          
          $menuchange = $menuchange.'<div class="col-lg-3 fv-row fv-plugins-icon-container" onclick="add_cart('.$plist["AKS_PRD_MID"].')"><a href="javascript:;" id="add_cart"><div class="image-input-wrapper overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover w-90px h-80px me-3" style="background-image: url('.$image_url.'); border-radius: 10px; "> </div> </a><div class="d-flex flex-column"> <a href="javascript:;" id="add_cart" class="text-gray-600 text-hover-primary fs-8">'.$plist["AKS_PRD_NAME"].'</a></div><span  class="fs-6 fw-bold"><i class="fa-sharp fa-solid fa-indian-rupee-sign eyc fs-6" id="add_cart"></i>'.$plist["AKS_PUR_PRICE"].'/g</span></div>';
          
         }   

          echo $menuchange;           
         // print_r($result);
         // exit;
    }
    public function sale_view_table()
    {
        $sid = $_POST['id'];
        // print_r($plid); exit;
        // $count = $_POST['count'];
        $getid = $this->db->query("SELECT * FROM AKS_SALE_ENTRY where sid='".$sid."' ")->row();
        $product_id = $getid->sale_id;
        // print_r($product_id);exit;
       
        $data['cart_view'] = $this->Aks_sale_model->get_cart_view($product_id);

      // print_r($data['cart_view']);exit;
         $i=1;
         $row='';
         $tr_id=str_replace('/','_',$product_id);
        
        foreach ($data['cart_view'] as $view)

         {
         $prdname  = $this->db->query("SELECT * FROM AKS_PRD_MASTER WHERE AKS_PRD_MID ='".$view['product_id']."' ")->row();
         
         $row.='<tr id="tr"><td>'.($i).'</td><td>'.$prdname->AKS_PRD_NAME.'</td><td>'.$view["product_wgt"].'</td><td>'.$view["sale_price"].'/'.$prdname->AKS_PRD_WT.'</td><td>'.$view["price"].'</td></tr>';
          $i++;
        }

        echo $row;
       
         
   }
 public function payment_details(){

      $sdid = $_POST['id'];
      // print_r($sdid); exit;
      
      $getid = $this->db->query("SELECT * FROM AKS_SALE_ENTRY where sid='".$sdid."' ")->row();
      // print_r($getid ); exit;
      $payment_id = $getid->sale_id;
    $partial_packing=$getid->partial_packing;
      $data['payment_detail'] = $this->Aks_sale_model->get_payment_details($payment_id);

      // print_r($data['payment_detail']); exit;

      // foreach ($data['payment_detail'] as $pur_det) {
  

         $cash = $this->Aks_sale_model->get_cash($payment_id);
         // print_r($cash);exit;

         $cash_amount   =$cash->amount;
         $cash_detail   =$cash->remarks;

         // print_r($cash_detail);exit;
         
          $cheque = $this->Aks_sale_model->get_cheque($payment_id);
         // print_r($cheque);
          $cheque_amount    =$cheque->amount;
          $chq_refno        =$cheque->cheque_ref_no;
          $chq_sup_bank     =$cheque->party_bank;
          $chq_detail       =$cheque->remarks;


          $rtgs = $this->Aks_sale_model->get_rtgs($payment_id);
          // print_r($rtgs);
          $rtgs_amount      =$rtgs->amount;
          $rtgs_refno       =$rtgs->cheque_ref_no;
          $rtgs_cbank       =$rtgs->company_bank;
          $rtgs_detail      =$rtgs->remarks;

           $upi = $this->Aks_sale_model->get_upi($payment_id);
        //    print_r($upi);exit;
           $upi_amount      =$upi->amount;
           $upi_refno       =$upi->cheque_ref_no;
           $upi_cbank       =$upi->company_bank;
           $upi_detail      =$upi->remarks;


           if($cash_amount>0){
           $cash_tr='
                    <tr>
                    <td><label class="col-form-label fw-bold fs-3">Cash</label></td>
                    <td><label class="col-form-label fw-bold fs-7">'.$cash_amount.'</label></td>
                    <td></td>
                    <td></td>
                    <td><label class="col-form-label fw-bold fs-7">'.$cash_detail.'</label></td>
                    </tr>
                    ';
            }else{
               $cash_tr ='';
            }
            if($cheque_amount>0){
            $cheque_tr='
                    <tr>
                    <td><label class="col-form-label fw-bold fs-3">Cheque</label></td>
                    <td><label class="col-form-label fw-bold fs-7">'.$cheque_amount.'</label></td>
                    <td><label class="col-form-label fw-bold fs-7">'.$chq_refno.'</label></td>
                    <td><label class="col-form-label fw-bold fs-7">'.$chq_sup_bank.'</label></td>
                    <td><label class="col-form-label fw-bold fs-7">'.$chq_detail.'</label></td>
                    </tr>';
            }
            else{$cheque_tr=''; }

            if($rtgs_amount>0){
            $rtgs_tr='<tr><td><label class="col-form-label fw-bold fs-2">RTGS</label></td>
                      <td><label class="col-form-label fw-bold">'.$rtgs_amount.'</label></td>
                      <td><label class="col-form-label fw-bold">'.$rtgs_refno.'</label></td>
                      <td><label class="col-form-label fw-bold">'.$rtgs_cbank.'</label></td>
                      <td><label class="col-form-label fw-bold">'.$rtgs_detail.'</label></td></tr>';   
            }
            else{
               $rtgs_tr=''; 
            }

            if($upi_amount>0){
            $upi_pay=
                     '<tr><td><label class="col-form-label fw-bold fs-3">UPI</label></td>
                      <td><label class="col-form-label fw-bold">'.$upi_amount.'</label></td>
                      <td><label class="col-form-label fw-bold">'.$upi_refno.'</label></td>
                      <td><label class="col-form-label fw-bold">'.$upi_cbank.'</label></td>
                      <td><label class="col-form-label fw-bold">'.$upi_detail.'</label></td></tr>';  
                    // echo  $upi_pay;  
                  }
                  else{
                    $upi_pay='';
                  }
             
                    // print_r($cheque_tr);exit;
             // echo ''.'||'.$cash_tr;


             echo ''.'||'.$cash_tr.'||'.$cheque_tr.'||'.$rtgs_tr.'||'. $upi_pay.'||'. $partial_packing;   

           // echo ''.'||'.$cash_amount.'||'.$cash_detail.'||'.$cheque_amount.'||'.$chq_refno.'||'.$chq_sup_bank.'||'.$chq_detail.'||'.$rtgs_amount.'||'.$rtgs_refno.'||'.$rtgs_cbank.'||'.$rtgs_detail.'||'.$upi_amount.'||'.$upi_refno.'||'.$upi_cbank.'||'.$upi_detail.'||'.$cash_tr.'||'.$cheque_tr.'||'.$rtgs_tr.'||'. $upi_pay; 

    }


     public function sale_save()
    {   
        
        $data['sale_date']  = $this->input->post('sale_date');

        $saledate=date('Y-m-d',strtotime($data['sale_date']));

         $last_sid_detail = $this->Aks_sale_model->last_sid_details();
         if($last_sid_detail){

            $last_data= $last_sid_detail? $last_sid_detail->sale_id :0;



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

                $request =  request_num(((int)$result+1), 3, "AKSS-");
                
                $request_id =  $request.'/'.$year;

              $sale_id = $request_id;
              }
              else{
                $year = substr( date("y"), -2);
                $sale_id=  'AKSS-001/'.$year;
}
        //     $y = date("Y");
        //     echo $last_data;exit;
        //     $exlno = substr($last_data,5);           
        //    $next_value = (int)$last_data + 1;
        //    $uid=str_pad($next_value,3,0,STR_PAD_LEFT);
        //   $s_no=$r_no1;
        //   $data['sale_id'] = $next_value;
        
        // $pur_no=str_pad($next_value,4,0,STR_PAD_LEFT);
        
        // $prefix="AKSP-";
        // $suffix="/$y";
        // $sale_id['pur_no']=$prefix.$pur_no.$suffix;
        // print_r($sale_id['pur_no']);exit;

        // $ext='0';

        $data['sale_id']         = $sale_id;
        // print_r($data['sale_date']);
        // 

        $data['sale_party']        = $this->input->post('sale_party');
        // print_r($data['sale_party']);exit();

        $data['sale_wgt']        = $this->input->post('sale_wgt');


        $data['sale_price']        = $this->input->post('prd_sale_price_hidden');
        $data['unit']        = $this->input->post('prd_unit');
        $data['prd_id']        = $this->input->post('prd_id_hidden');
        $data['HSN_CODE']   = $this->input->post('prd_hsn_hidden');
        $data['id_partys']   = $this->input->post('party_id_hidden');


        // print_r($data);exit();

        // if($data['sale_deliverymode']!='Courier'){

        //    $data['sale_deliverymode'] = $this->input->post('delivery_add_mode_courier');

        // }
        // else{

          $data['sale_deliverymode'] = $this->input->post('delivery_add_mode_courier');

          $data['sale_delivery'] = $this->input->post('del_select');
          $data['sale_shipment'] = $this->input->post('shipment_to'); 
          $data['shipment_charges'] = $this->input->post('shipment_charges');  
          $data['remarks'] = $this->input->post('remarks');  
        // }
        // $del_mode = $this->Aks_sale_model->sale_entry($data);
        // print_r(['sale_deliverymode']);exit();

        // $data['sale_deliverymode']    = $this->input->post('');;

        $data['sale_prd_tot_amt']    = $this->input->post('totalamount');
        $data['sale_dis_amt']    = $this->input->post('dis_cart_amt');
        $data['sale_net_amt']    = $this->input->post('netamount');
        
        // print_r($data['prd_tot_amt']);
        // print_r($data['sale_net_amt']);
        // print_r($data['sale_dis_amt']);exit();

        $data['pay_mode'] =$this->input->post('cashcheck');
         $data['cash_amount'] =$this->input->post('cashamount');
          $data['cash_detail'] =$this->input->post('cashdetail');
           $data['sale_id'] =$sale_id;

        $cash = $this->Aks_sale_model->cashsave($data);
        // print_r($cash);exit;
          $data['pay_mode'] =$this->input->post('chequechk');
           $data['cheque_amt'] =$this->input->post('chequeamount');
            $data['cheque_supbk'] =$this->input->post('chequesupbank');
             $data['cheque_refno'] =$this->input->post('chequerefno');
              $data['cheque_detail'] =$this->input->post('chequedetail');
               $data['sale_id'] =$sale_id;
          $cheque = $this->Aks_sale_model->chequesave($data);



          $data['pay_mode'] =$this->input->post('rtgschk');
           $data['rtgs_amt'] =$this->input->post('rtgsamount');
            $data['rtgs_refno'] =$this->input->post('rtgsrefno');
             $data['rtgs_bank'] =$this->input->post('rtgsbank');
              $data['rtgs_detail'] =$this->input->post('rtgsdetails');
               $data['sale_id'] =$sale_id; 
           $rtgs = $this->Aks_sale_model->rtgssave($data);

             $data['pay_mode'] =$this->input->post('upichk');
             $data['upi_amt'] =$this->input->post('upiamount');
             $data['upi_refno'] =$this->input->post('upirefno');
             $data['upi_bank'] =$this->input->post('upibank');
             $data['upi_detail'] =$this->input->post('upidetail');
             $data['sale_id'] =$sale_id;
             // print_r($data['upi_amt']);exit; 
        $upi = $this->Aks_sale_model->upisave($data);
        // print_r($upi);exit;

        $data['sale_pay_mode']   = $this->input->post('pay_mode');
        $data['sale_cash']       = $this->input->post('paid_amount');
        $data['balance_cash']   = $this->input->post('balance_amount');

        // print_r($data['sale_cash']); exit;

        // $data['sale_cbank_name'] = $this->input->post('');
        // $data['pur_ref_no']     = $this->input->post('');
        $data['create_by']      = $_SESSION['username'];
        $data['create_on']      = date('Y-m-d H:i:s');
        $data['status']         = 'Y';
        // $data['sale_dl_sts']    = 'D';
        
        $data['sale_del_by']         = $this->input->post('del_by');
        $data['sale_track_id']       = $this->input->post('tracking_id');
        
        // print_r($data['sale_del_by']);exit;

        $count=count( $data['sale_price'] );

        $count1 = $count;

        $data['sale_prd_count']   = $count1;

        for($i=0;$i<$count1;$i++){

        $wgt        =  $data['sale_wgt'][$i] ;

        $unit_price =  $data['unit'][$i];

        $purprice   = $data['sale_price'][$i];
        
        $tot =( $wgt  / $unit_price  ) * $purprice ;

        // ( prd_wgt / prd_unit  ) * rc_tot;

        $total_price = $tot;
       // print_r($total_price);exit;
          
          $res=$this->db->query("INSERT INTO AKS_SALE_CART
            (product_id,product_wgt,HSN_CODE,sale_price,price,sale_id) values ('".$data['prd_id'][$i]."','".$data['sale_wgt'][$i]."','".$data['HSN_CODE'][$i]."','".$data['sale_price'][$i]."','".$total_price."','".$data['sale_id']."')");
         // print_r($res);exit;

          $prd_ids = $data['prd_id'][$i];
         
          $data['crt_qty'] =($this->db->query("SELECT * FROM AKS_PRD_MASTER WHERE AKS_PRD_MID = '".$prd_ids."' ")->row());
          // print_r($ress);
          $crt_qty    =$data['crt_qty']->PRD_CUR_QTY;

          $crt_qty_tot =  $crt_qty;

          $wgts        =  $data['sale_wgt'][$i] ;

          $bal_qty =  $crt_qty_tot - $wgts ;

          // print_r($bal_qty);
          $stk_bal_qty = $bal_qty;
          

          $min_stock=$data['crt_qty']->AKS_MIN_STK;
          if($bal_qty< $min_stock){
            add_notification(date('Y-m-d H:i:s'), '', "Others", "Minimum Stock Alert", $data['crt_qty']->AKS_PRD_NAME. 'Minimum Stock Reached ' .$_SESSION['username'],'', $_SESSION['USERID'], '0', $data['crt_qty']->AKS_PRD_NAME);

          }

          // print_r($crt_qty);
           // $purc_date = date("Y-m-d",strtotime($data['pur_date'])); 

            $res=$this->db->query("INSERT INTO AKS_STOCK
            (
            prd_id
           ,stk_date
           ,stk_cur_qty
           ,stk_type
           ,stk_status
           ,stk_count
           ,stk_bal_qty
           ,created_by
           ,created_on
           )

            values ('".$data['prd_id'][$i]."'
            ,'".$saledate."'
            ,'".$crt_qty."'
            ,'Sale'
            ,'OUT'
            ,'".$data['sale_wgt'][$i]."'
            ,'".$stk_bal_qty."'
            ,'".$data['create_by']."'
            ,'".$data['create_on']."')");
         
         
         
         $curt_stk = $stk_bal_qty;
         
         $res= $this->db->query("UPDATE AKS_PRD_MASTER set PRD_CUR_QTY='". $curt_stk."' where AKS_PRD_MID=". $prd_ids);


         }
         // exit();

        $result = $this->Aks_sale_model->sale_entry($data,$saledate);

        // print_r($result);exit;
add_notification(date('Y-m-d H:i:s'), '', "Others", "New Sale", $sale_id. ' created By ' .$_SESSION['username'],'', $_SESSION['USERID'], '0', $sale_id);


        if($result)
        {
            $this->session->set_flashdata('g_success',  $data['sale_id'].' New Sales have been added successfully...');
        }else{
           $this->session->set_flashdata('g_err', 'Could not add purchase !');
        }
        redirect('Aks_sale/');
         
    }
    public function sale_list_det()
    {
     
      $search =  $_GET['query']; 
      $rows = $this->Aks_sale_model->getParty($search);
      // print_r($rows);
      // exit;
      
      $res='[';
      if(count($rows)>0) {
         foreach($rows as $row )
          {
              $title='';
              $name='';
              
             
              $firstname=$row->NAME;
              $id_party=$row->PID;
             
              $address=$row->ADDRESS1.', '.$row->CITY;

              $shipping=$this->db->query("select * from AKS_SHIPPING_ADDRESS where party_id='".$row->PID."'")->row();
              if(isset($shipping)){
                $shipment_address=$shipping->address.', '.$shipping->city;
                
              }else{
                 $shipment_address=$row->ADDRESS1.', '.$row->CITY;
              }
              $phone=$row->PHONE;
              $email=$row->EMAIL;
             
              $title = $firstname.'-'.$phone.'-'.$address;
              $res.='{ "title":"'.$title.'","id_party": "'.$row->PID.'","firstname":"'.$firstname.'","address":"'.$address.'","shipment_address":"'.$shipment_address.'","phone":"'.$phone.'","email":"'.$email.'"},';

              
          }
        $res=rtrim($res,',');
        $res.=']';
      }
      else{
        $res.=']';
      }
      print_r($res);die();
      // print_r($res);
      // print_r($data);
      // exit();
    
      }
      public function delivery_approve()
    {

       $id=$_POST['id'];

      
     $del  = $this->db->query("SELECT * FROM AKS_SALE_ENTRY WHERE sid='".$id ."' ")->row();
     echo $del->sid;   
     //$this->load->view('lotentry/lotentry_approve',$data);
    }

    public function add_party()
    {
       $name = $this->input->post('new_party_name');
       $lname = $this->input->post('new_party_lname');
       $company_name = $this->input->post('company_name');
       $country = $this->input->post('country');
       $state = $this->input->post('state');
       $bill_address = $this->input->post('new_party_bill_address');
       $town_city = $this->input->post('town_city');
       $pincode = $this->input->post('pincode');
       $mobile = $this->input->post('new_party_mobile');
       $email = $this->input->post('new_party_email');
       $gst_no = $this->input->post('new_party_gst_no');


       $name1 = $this->input->post('new_party_name1');
       $lname1 = $this->input->post('new_party_lname1');
       $company_name1 = $this->input->post('company_name1');
       $country1 = $this->input->post('country1');
       $state1 = $this->input->post('state1');
       $bill_address1 = $this->input->post('new_party_bill_address1');
       $town_city1 = $this->input->post('town_city1');
       $pincode1 = $this->input->post('pincode1');
       $mobile1 = $this->input->post('new_party_mobile1');
       $email1 = $this->input->post('new_party_email1');

       $userlist=$this->db->query("SELECT * FROM USERLIST WHERE NAME='".$_SESSION['username']."' ")->row();
       $prefix=$userlist->LOANPREFIX;
       $id_get=$this->db->query("SELECT * FROM KEYMASTER WHERE KEYNAME='PARTIES-".$prefix."' ")->row();
       $suffix=str_pad($id_get->KEYVALUE+1, 6, '0', STR_PAD_LEFT);
      $party_id=$prefix.$suffix;
    
$res=$this->db->query("INSERT INTO  PARTIES (PID,NAME,FATHERSNAME,COMPANY_NAME,PHONE,COUNTRY,STATE,PINCODE,ADDRESS1,CITY,EMAIL,IS_KARUPATTI,GST_NO) VALUES('".$party_id."','".$name."','".$lname."','".$company_name."','".$mobile."','".$country."','".$state."','".$pincode."','".$bill_address."','".$town_city."','".$email."','1','".$gst_no."')");
$res=$this->db->query("INSERT INTO  AKS_SHIPPING_ADDRESS (party_id,name,lname,company_name,mobile,country,state,pincode,address,city,email) VALUES('".$party_id."','".$name1."','".$lname1."','".$company_name1."','".$mobile1."','".$country1."','".$state1."','".$pincode1."','".$bill_address1."','".$town_city1."','".$email1."')");
 $update=$this->db->query("UPDATE KEYMASTER SET KEYVALUE= KEYVALUE+1 WHERE KEYNAME='PARTIES-".$prefix."'");
redirect('Aks_sale/aks_new_sale');
    }
    public function sale_packing_list()
    {

$data['sale_list']=$this->db->query("SELECT * FROM AKS_SALE_ENTRY WHERE status='s' AND sale_deliverymode='courier' AND sale_track_id is NULL  order by sid asc")->result_array();
$data['count']=count($data['sale_list']);
$data['supplier_list']  = $this->Aks_sale_model->get_supplier_list();

$this->load->view('aks_sale/aks_sale_packing_list',$data);
}
public function sale_shipping_list()
{

$data['sale_list']=$this->db->query("SELECT * FROM AKS_SALE_ENTRY WHERE status='f' order by sid asc")->result_array();
$data['count']=count($data['sale_list']);
$this->load->view('aks_sale/aks_sale_shipping_list',$data);
}

public function courier_delivery()
{

    $tracking_id=$_POST['tracking_id'];
    $charges=$_POST['charges'];
    $courier_edit=$_POST['courier_edit'];
    $id=$_POST['id'];
    $date=date('Y-m-d');
$sale_id=str_replace('_','/',$id);
if($courier_edit!=''){
$update=$this->db->query("UPDATE AKS_SALE_ENTRY SET delivery_by='".$courier_edit."'  WHERE sale_id='".$sale_id."'");

}

$update=$this->db->query("UPDATE AKS_SALE_ENTRY SET sale_track_id='".$tracking_id."',shipment_charges='".$charges."',status='D'  WHERE sale_id='".$sale_id."'");

$update=$this->db->query("UPDATE AKS_SALE_CART SET tracking_id='".$tracking_id."',delivery_charges='".$charges."',delivery_date='".$date."'   WHERE sale_id='".$sale_id."'");



}
   
   public function packing($id)
   {
   
    $data['sale_detail']=$this->db->query("select * from  AKS_SALE_ENTRY where sid='".$id."'")->row();
    $data['sale_list_detail']=$this->db->query("select * from  AKS_SALE_CART where sale_id='".$data['sale_detail']->sale_id."'")->result_array();
// print_r($data['sale_list_detail']);exit;
       $this->load->view('aks_sale/aks_sale_packing',$data);
   }
   public function partial_packing()
   {
    //  print_r(1);exit;
    $sale_id = $this->input->post('sale_id');
    $sale_count = $this->input->post('sale_count');
    $packed_weight = $this->input->post('packed_weight');
    $checked = $this->input->post('checked');
    $checkbox = $this->input->post('checkbox');
    // print_r($packed_weight);
    // print_r($checked);
    // print_r($checkbox);
    // exit;
$partial_packing_count=0;
    for($i=0;$i<$sale_count;$i++){
        if($checkbox[$i]!=''){
            $j=round($checkbox[$i]);
    // print_r($packed_weight[$j]);

$res=$this->db->query("update AKS_SALE_CART set packed_wgt=packed_wgt+'".$packed_weight[$j]."' where product_id= '".$checked[$j]."' and  sale_id= '".$sale_id."' ");
$partial_packing_count++;
}
    }
    // exit;
    $data=$this->db->query("select sum(product_wgt) as product_wgt,sum(packed_wgt) as packed_wgt from AKS_SALE_CART where sale_id= '".$sale_id."'")->row();
    // print_r($data->product_wgt); print_r($data->product_wgt);exit;
    
    if(($data->product_wgt) > ($data->packed_wgt)){
        $sale_detail=$this->db->query("select * from AKS_SALE_ENTRY where sale_id= '".$sale_id."'")->row();

        $last_sid_detail = $this->Aks_sale_model->last_sid_details();

           $last_data= $last_sid_detail? $last_sid_detail->sale_id :0;
                                
               $year = substr( date("y"), -2);
               $slice = explode("/", $last_data);
               $result = preg_replace('/[^0-9]/',' ', $slice[0]); 
            //    print_r( $result);exit;

               function request_num ($input, $pad_len = 3  , $prefix = null) {
                   if ($pad_len <= strlen($input))
                       trigger_error('<strong>$pad_len</strong> cannot be less than or equal to the length of <strong>$input</strong> to generate invoice number', E_USER_ERROR);
               
                   if (is_string($prefix))
                       return sprintf("%s%s", $prefix, str_pad($input, $pad_len, "0", STR_PAD_LEFT));
               
                   return str_pad($input, $pad_len, "0", STR_PAD_LEFT);
               }
$get_id=$this->db->query("select * from AKS_SALE_ENTRY where sale_id like '".$sale_id."%' order by sid desc ")->row();
$partial_id=explode('-',$get_id->sale_id);

if($partial_id[2]==''){
$packing_id=$sale_id.'-1';

}
else{
   $partial= $partial_id[2]+1;
    $packing_id=$sale_id.'-'.$partial;

}
 
               $created_by    = $_SESSION['username'];
               $created_on    = date('Y-m-d H:i:s');
        
               $today = date('Y-m-d');

            
$total_amount=0;$j=0;
        for($i=0;$i<$sale_count;$i++){
            if($checkbox[$i]!=''){
                // for($j=0;$j<$sale_count;$j++){
                   $j= round($checkbox[$i]);

                $cart_detail=  $this->db->query("select * from  AKS_SALE_CART where sale_id='".$sale_id."' and product_id='".$checked[$j]."'")->row();
                $product_detail= $this->db->query("select * from AKS_PRD_MASTER where AKS_PRD_MID='".$checked[$j]."'")->row();
                
                $total_price=($product_detail->AKS_PRD_PRICE*$packed_weight[$j])/($product_detail->AKS_PRD_WT);
                $res=$this->db->query("INSERT INTO AKS_SALE_CART
                (product_id,product_wgt,packed_wgt,HSN_CODE,sale_price,price,sale_id) values ('".$checked[$j]."','".$packed_weight[$j]."','".$packed_weight[$j]."','".$cart_detail->HSN_CODE."','".$cart_detail->sale_price."','".$total_price."','".$packing_id."')");
    $res=$this->db->query("update AKS_SALE_CART set packed_wgt=packed_wgt+'".$packed_weight[$j]."' where product_id= '".$checked[$j]."' and  sale_id= '".$packing_id."' ");
    $total_amount+=$packed_weight[$j]*$cart_detail->sale_price;
 }   
        }
        $result  = $this->db->query("INSERT INTO AKS_SALE_ENTRY
        (sale_date
        ,sale_id
        ,sale_party
        ,sale_prd_count
        ,sale_deliverymode
        ,delivery_by
        ,shipment_to
        ,sale_prd_tot_amt
        ,sale_dis_amt
        ,sale_net_amt
        ,sale_cash
        ,balance_cash
        ,create_by
        ,create_on
        ,status
        ,id_party
        ,shipment_charges
        ,partial_packing
        )
  VALUES
        (
        '".$today."',
        '".$packing_id."',
        '".$sale_detail->sale_party."',
        '".$partial_packing_count."',
        '".$sale_detail->sale_deliverymode."',
        '".$sale_detail->delivery_by."',
        '".$sale_detail->shipment_to."',
        '".$total_price."',
        '0',
        '".$total_price."',
        '".$sale_detail->sale_cash."',
        '".$sale_detail->balance_cash."',
        '".$created_by."',
        '".$created_on."',
        'F',
        '".$sale_detail->id_party."',
        '".$sale_detail->shipment_charges."'
        ,'1'
        )");
        $update=$this->db->query("update  AKS_SALE_ENTRY set status='P' where sale_id= '".$sale_id."'");

    }
    else{
        $update=$this->db->query("update  AKS_SALE_ENTRY set status='F' where sale_id= '".$sale_id."'");
    }
    
    // exit;
    redirect('Aks_sale');
   }
   public function full_packing()
   {
    $sale_count = $this->input->post('sale_count');
        $checked = $this->input->post('checked');
    for($i=0;$i<$sale_count;$i++){
        if($checked[$i]!=''){
            $res=$this->db->query("update AKS_SALE_CART set packed_wgt=product_wgt+'".$packed_weight[$i]."' where sale_id= '".$checked[$i]."'  ");
            $update=$this->db->query("update  AKS_SALE_ENTRY set status='F' where sale_id= '".$checked[$i]."'");
            
        }

   }

   redirect('Aks_sale');
}
public function shipping_status()
{
    $id=$_POST['id'];
    // print_r($id);
    $sale_id=str_replace('_','/',$id);
    $update=$this->db->query("update AKS_SALE_ENTRY set status='S' where sale_id= '".$sale_id."'");
}
}


?>


