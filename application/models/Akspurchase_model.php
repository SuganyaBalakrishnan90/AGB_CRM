<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/***************************************************************
    Purpose : To handle all the Area database details 2022-08-22
****************************************************************/
class Akspurchase_model extends CI_Model
{
    public $other_db;
  function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Calcutta'); 
    }

  public function  get_category_name($id)
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM AKSPRODUCT_CATEGORY WHERE AKSCATEGORY_ID='".$id."'")->result_array();
        
        // print_r($result);
        // exit();
        save_query_in_log();
        $this->db->close();
        return $result;
    }
    public function get_purc_list($pid)
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM AKS_PURCHASE_ENTRY WHERE pid= '".$pid."'")->result_array();
        save_query_in_log();
        $this->db->close();
        return $result;
    }
    public function get_category($cid){

      $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM AKSPRODUCT_CATEGORY WHERE AKSCATEGORY_ID  = '".$cid."'")->row();
        print_r($result);
        // $id = $this->input->post('id');
        // $cname = $this->input->post('cname');
        save_query_in_log();
        $this->db->close();
      
        return $result;
    }
    public function get_cart_view($pid){
       $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM AKS_PURCHASE_CART WHERE pur_id = '".$pid."'")->result_array();
        // print_r($result);
        // $id = $this->input->post('id');
        // $cname = $this->input->post('cname');
        save_query_in_log();
        $this->db->close();
      
        return $result;

    }

    public function get_cash($pid){
       $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM payment_inward_outward where bill_no='".$pid."' AND type_of_payment='Cash' ")->row();
        // print_r($result);
        // $id = $this->input->post('id');
        // $cname = $this->input->post('cname');
        save_query_in_log();
        $this->db->close();
      
        return $result;

    }
    public function get_cheque($pid){
       $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM payment_inward_outward where bill_no='".$pid."' AND type_of_payment='Cheque' ")->row();
        // print_r($result);
        // $id = $this->input->post('id');
        // $cname = $this->input->post('cname');
        save_query_in_log();
        $this->db->close();
      
        return $result;

    }
    public function get_rtgs($pid){
       $this->db->reconnect();
         $result  = $this->db->query("SELECT * FROM payment_inward_outward where bill_no='".$pid."' AND type_of_payment='RTGS' ")->row();
        // print_r($result);
        // $id = $this->input->post('id');
        // $cname = $this->input->post('cname');
        save_query_in_log();
        $this->db->close();
      
        return $result;

    }
    public function get_upi($pid){
       $this->db->reconnect();
         $result  = $this->db->query("SELECT * FROM payment_inward_outward where bill_no='".$pid."' AND type_of_payment='UPI' ")->row();
        // print_r($result);
        // $id = $this->input->post('id');
        // $cname = $this->input->post('cname');
        save_query_in_log();
        $this->db->close();
      
        return $result;

    }
    public function get_payment_details($pdid){
       $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM payment_inward_outward where bill_no='".$pdid."'  ")->result_array();
        // print_r($result);
        // $id = $this->input->post('id');
        // $cname = $this->input->post('cname');
        save_query_in_log();
        $this->db->close();
      
        return $result;

    }
    public function get_prd_detail($pdid)
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM AKS_PRD_MASTER WHERE AKS_PRD_MID = '".$pdid."'")->row();
        // print_r($result);
        // $id = $this->input->post('id');
        // $cname = $this->input->post('cname');
        save_query_in_log();
        $this->db->close();
      
        return $result;

        


    }

    
     public function get_stk_hst_list($slid)
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM AKS_PRD_MASTER WHERE AKS_PRD_MID = '".$slid."'")->row();
        // print_r($result);
        
        save_query_in_log();
        $this->db->close();
      
        return $result;


    }
   public function get_cart_list($plid)
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM AKS_PRD_MASTER WHERE AKS_PRD_MID = '".$plid."'")->row();
        // print_r($result);
        // $id = $this->input->post('id');
        // $cname = $this->input->post('cname');
        save_query_in_log();
        $this->db->close();
      
        return $result;


        
        
        // $result = $this->Aksproduct_model->($cname);
        // $data['status'] = $this->input->post('status');
       
        $res = $this->db->query(" INSERT INTO AKS_PUR_CART
                                           (pur_prd_img
                                           ,pur_prd_name
                                           ,pur_prd_wgt
                                           ,pur_prd_price
                                           ,status
                                           ,create_by
                                           ,create_on)
                                     VALUES
                                            ('".$data['pur_prd_img']."',
                                             '".$data['pur_prd_name']."',
                                             '".$data['pur_prd_wgt']."',
                                             '".$data['pur_prd_price']."',
                                             '".$data['status']."',
                                             '".$data['created_by']."',
                                             '".$data['created_on']."')");
        save_query_in_log();
        $this->db->close(); 
        return $res;
    }

    // public function cat_count($data)
    // {
    //     $this->db->reconnect();
         
    // }
   public function purchase_entry($data){

     // $this->db->reconnect(); 
     //       $i=0; 
     //       foreach ($data['pur_id'] as $key => $value) {
               
     //        $last_sno_detail = $this->db->query("SELECT * FROM AKS_PURCHASE_ENTRY ORDER BY id DESC")->row();
     //         print_r($last_sno_detail) ;exit;
     //        $last_data= $last_sno_detail->id;
     //        //echo $last_data;exit;
     //        //$exlno = substr($last_data,5);
     //        $next_value = (int)$last_data + 1;
     //        $uid=str_pad($next_value,3,0,STR_PAD_LEFT);
     //        //$s_no=$r_no1;
     //        $data['pur_id'] = $uid;
     //        // print_r($data);exit;
            $pur_date = date("Y-m-d",strtotime($data['pur_date'])); 
         $result  = $this->db->query("INSERT INTO AKS_PURCHASE_ENTRY
           (
            pur_date
           ,pur_id
           ,pur_sup
           ,prd_count
           ,prd_tot_amt
           ,pur_dis_amt
           ,pur_net_amt
         
           ,pur_cash
           ,balance_cash
          
           ,create_by
           ,create_on
           ,status)
     VALUES
           (
           '".$pur_date."',
           '".$data['pur_id']."',
           '".$data['pur_sup']."',
           '".$data['prd_count']."',
           '".$data['prd_tot_amt']."',
           '".$data['pur_dis_amt']."',
           '".$data['pur_net_amt']."',
      
           '".$data['pur_cash']."',
           '".$data['balance_cash']."',
          
           
           '".$data['create_by']."',
           '".$data['create_on']."',
           '".$data['status']."')");
           // print_r($pur_date);exit;
             save_query_in_log();
             $this->db->close(); 
             return $result;

    }
    // INSERT INTO [BANKERS].[dbo].[payment_inward_outward]
           // ([module_name]
           // ,[type_of_payment]
           // ,[amount]
           // ,[party_bank]
           // ,[cheque_ref_no]
           // ,[company_bank]
           // ,[remarks]
           // ,[bill_no]
           // ,[party_id]
           // ,[payment_side]
           // ,[metal_type]
           // ,[quality]
           // ,[purity]
           // ,[weight]
           // ,[pure_metal_weight]
           // ,[created_by]
           // ,[created_on]
           // ,[record_status])
    //  VALUES
    //        ()

    public function cashsave($data)
    {
     if($data['cash_amount']>0) {
    $cash = $this->db->query("INSERT INTO payment_inward_outward
                                           (module_name
                                           ,type_of_payment
                                           ,amount
                                           ,remarks
                                           ,bill_no
                                           ,party_id
                                           ,payment_side
                                           ,metal_type
                                           ,quality
                                           ,purity
                                           ,weight
                                           ,pure_metal_weight
                                           )
                                           
                                           VALUES(
                                            'AKS_PURCHASE',
                                            '".$data['pay_mode']."',
                                            '".$data['cash_amount']."',
                                            '".$data['cash_detail']."',
                                            '".$data['pur_id']."'
                                            ,'-','-','-','-','0','0','0'
                                            )");


             save_query_in_log();
             $this->db->close(); 
             return $cash;
           }
    }

    public function chequesave($data)
    {
      if($data['cheque_amt']>0) {
      $cheque = $this->db->query("INSERT INTO payment_inward_outward
                                           (module_name
                                           ,type_of_payment
                                           ,amount
                                           ,party_bank
                                           ,cheque_ref_no 
                                           ,remarks
                                           ,bill_no
                                           ,party_id
                                           ,payment_side
                                           ,metal_type
                                           ,quality
                                           ,purity
                                           ,weight
                                           ,pure_metal_weight)
                                           
                                           
                                           VALUES(
                                            'AKS_PURCHASE',
                                            '".$data['pay_mode']."',
                                            '".$data['cheque_amt']."',
                                            '".$data['cheque_supbk']."',
                                            '".$data['cheque_refno']."',
                                            '".$data['cheque_detail']."',
                                            '".$data['pur_id']."'
                                             ,'-','-','-','-','0','0','0'
                                            )");
             save_query_in_log();
             $this->db->close(); 
             return $cheque;
           }

    }
    public function rtgssave($data)
    {
         if($data['rtgs_amt']>0) {
    $rtgs = $this->db->query("INSERT INTO payment_inward_outward
                                           (module_name
                                           ,type_of_payment
                                           ,amount
                                           ,cheque_ref_no
                                           ,company_bank
                                           ,remarks
                                           ,bill_no
                                           ,party_id
                                           ,payment_side
                                           ,metal_type
                                           ,quality
                                           ,purity
                                           ,weight
                                           ,pure_metal_weight)
                                           
                                           VALUES(
                                             'AKS_PURCHASE',
                                            '".$data['pay_mode']."',
                                            '".$data['rtgs_amt']."',
                                            '".$data['rtgs_refno']."',
                                            '".$data['rtgs_bank']."',
                                            '".$data['rtgs_detail']."',
                                            '".$data['pur_id']."'
                                             ,'-','-','-','-','0','0','0'
                                            )");
             save_query_in_log();
             $this->db->close(); 
             return $rtgs;
      }
    }
    public function upisave($data)
    {
     if($data['upi_amt']>0) {
    $upi = $this->db->query("INSERT INTO payment_inward_outward
                                           (module_name
                                           ,type_of_payment
                                           ,amount
                                           ,cheque_ref_no
                                           ,company_bank
                                           ,remarks
                                           ,bill_no
                                           ,party_id
                                           ,payment_side
                                           ,metal_type
                                           ,quality
                                           ,purity
                                           ,weight
                                           ,pure_metal_weight)
                                           
                                           VALUES(
                                            'AKS_PURCHASE',
                                            '".$data['pay_mode']."',
                                            '".$data['upi_amt']."',
                                            '".$data['upi_refno']."',
                                            '".$data['upi_bank']."',
                                            '".$data['upi_detail']."',
                                            '".$data['pur_id']."',
                                             '-','-','-','-','0','0','0'
                                            )");
             save_query_in_log();
             $this->db->close(); 
             return $upi;
  }
}


    public function last_pid_details()
        {
            $this->db->reconnect();
            // $result  = $this->db->query("SELECT TOP 1 * FROM PRODUCTS ORDER BY ITEM_SNO DESC")->row();
            $result  = $this->db->query("SELECT * FROM AKS_PURCHASE_ENTRY ORDER BY pid DESC")->row();
            // print_r($result);exit;
            save_query_in_log();
            $this->db->close(); 
            return $result;
        }
    
    
 public function get_pur_list($fdate,$tdate,$sup_name,$pur_id,$offset,$page_limit)
    {
        $this->db->reconnect();
        // $result  = $this->db->query("SELECT * FROM AKS_PURCHASE_ENTRY WHERE status='Y' $fdate $tdate $sup_name $pur_id $offset $page_limitorder by pid desc")->result_array();
        $result = $this->db->query(" SELECT  * FROM  ( SELECT *, ROW_NUMBER() OVER (ORDER BY pid DESC) AS sl FROM AKS_PURCHASE_ENTRY WHERE  status='Y' $fdate $tdate $sup_name $pur_id )N  WHERE  sl BETWEEN $offset AND $page_limit ")->result_array();

        // print_r($result);

        save_query_in_log();
        $this->db->close();
        return $result;
       
    }
  public function get_supplier_name_list($sup_name)
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM AKS_PURCHASE_ENTRY WHERE status='Y' $sup_name order by pid desc")->result_array();
        save_query_in_log();
        $this->db->close();

        //print_r($result);exit();
        return $result;
    }
public function get_pur_price($pid)
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM   AKS_PRD_MASTER WHERE AKS_PRD_MID = '".$pid."'")->row();
        save_query_in_log();
        $this->db->close();
        return $result;
    }

public function get_pur_detail()
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM AKS_PRD_MASTER")->result_array();
        // print_r($result);
        // exit;
        save_query_in_log();
        $this->db->close();
        return $result;
    }
 public function prd_delete($uid)
    {
        $this->db->reconnect();
        $result  = $this->db->query("DELETE FROM AKS_PURCHASE_ENTRY WHERE pur_id = '".$uid."'");
        save_query_in_log();
        $this->db->close();
        return $result;
    }
    public function pur_cur_up($uid)
    {
        $this->db->reconnect();

        $res= $this->db->query("UPDATE AKS_PRD_MASTER set PRD_CUR_QTY='". $curt_stk."' where AKS_PRD_MID=". $prd_ids);
       
          save_query_in_log();
          $this->db->close();
          return $res;
    }
    public function getSupplier()
      {
        $this->other_db->reconnect();
        $result  = $this->other_db->query("SELECT * FROM ACC_LEDGERS WHERE GROUP_NAME='Karupatti' ORDER BY LEDGER_NAME")->result_array();
    //   print_r($result);exit;
        save_query_in_log();
        return $result;
      }

}
?>    