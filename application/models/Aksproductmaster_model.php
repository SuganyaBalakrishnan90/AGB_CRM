<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/***************************************************************
    Purpose : To handle all the Area database details 2022-08-22
****************************************************************/
class Aksproductmaster_model extends CI_Model
{
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
   public function add_product($data)
    {
        $this->db->reconnect();

        // $id = $this->input->post('id');
        // $cname = $this->input->post('cname');

        
        
        // // $result = $this->Aksproduct_model->($cname);
        // $data['status'] = $this->input->post('status');
       
        $res = $this->db->query("INSERT INTO AKS_PRD_MASTER
           (AKS_CAT_NAME
           ,AKS_PRD_NAME
           ,AKS_PRD_WT
           ,AKS_PRD_PRICE
           ,AKS_PUR_PRICE
           ,AKS_MIN_STK
           ,AKS_MAX_STK
           ,AKS_PRD_DETAIL
           ,AKS_PRD_IMG
           ,CREATE_BY
           ,CREATE_ON
           ,STATUS
           ,HSN_CODE)
     VALUES
          
          (
          '".$data['cat_name']."',
          '".$data['prd_name']."',
          '".$data['prd_wt']."',
          '".$data['prd_price']."',
          '".$data['pur_price']."',
          '".$data['prd_min_stk']."',
          '".$data['prd_max_stk']."',
          '".$data['prd_details']."',
          '".$data['prd_img']."',
          '".$data['created_by']."',
          '".$data['created_on']."',
          '".$data['status']."',
          '".$data['prd_hsn']."')");

        save_query_in_log();
        $this->db->close(); 
        return $res;
    }

    
 public function get_prd_list()
    {
        $this->db->reconnect();
        // $result  = $this->db->query("SELECT * FROM AKS_PRD_MASTER ORDER BY AKS_PRD_MID ")->result_array();

        $result = $this->db->query("SELECT PRD.AKS_PRD_MID,PRD.AKS_CAT_NAME as AKS_CAT_ID,PRD.AKS_PRD_NAME,PRD.AKS_PRD_WT,PRD.AKS_PRD_PRICE,PRD.AKS_PUR_PRICE,PRD.AKS_MIN_STK,PRD.AKS_MAX_STK,PRD.AKS_PRD_DETAIL,PRD.AKS_PRD_IMG,PRD.STATUS,PRD.HSN_CODE,PRDC.AKSCATEGORY_NAME from   AKS_PRD_MASTER  PRD ,AKSPRODUCT_CATEGORY  PRDC  WHERE PRD.AKS_CAT_NAME=PRDC.AKSCATEGORY_ID  ")->result_array();
       
        // print_r($result);

        save_query_in_log();
        $this->db->close();
        return $result;
      }
  public function get_cat_name()
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM AKSPRODUCT_CATEGORY  ORDER BY AKSCATEGORY_ID ")->result_array();
        save_query_in_log();
        $this->db->close();
        return $result;
    }
    public function prd_delete($uid)
    {
        $this->db->reconnect();
        $result  = $this->db->query("DELETE FROM AKS_PRD_MASTER WHERE AKS_PRD_MID = '".$uid."'");
        save_query_in_log();
        $this->db->close();
        return $result;
    }
    public function prd_update($data)
    {
        $this->db->reconnect();
        // $result  = $this->db->query("UPDATE AKS_PRD_MASTER SET 

        //    AKS_CAT_NAME = '".$data['cat_name']."'
        //   ,AKS_PRD_NAME='".$data['prd_name']."'
        //   ,AKS_PRD_WT='".$data['prd_wt']."'
        //   ,AKS_PRD_PRICE = '".$data['prd_price']."'
        //   ,AKS_PUR_PRICE = '".$data['pur_price']."'
        //   ,AKS_MIN_STK = '".$data['prd_min_stk']."'
        //   ,AKS_MAX_STK = '".$data['prd_max_stk']."'
        //   ,AKS_PRD_DETAIL = '".$data['prd_details']."'
        //   ,AKS_PRD_IMG = '".$data['prd_img']."'
        //   ,STATUS = '".$data['status']."' 
        //   ,MODIFY_BY = '".$data['modified_by']."'
        //   ,MODIFY_ON = '".$data['modified_on']."' WHERE AKS_PRD_MID = '".$data['pr_edit_hid']."'");


       $result  = $this->db->query(" UPDATE AKS_PRD_MASTER SET 

               AKS_CAT_NAME       = '".$data['edit_cat_id']."'
              ,AKS_PRD_NAME       = '".$data['edit_prd_name']."'
              ,AKS_PRD_WT         = '".$data['edit_prd_wt']."'
              ,AKS_PRD_PRICE      = '".$data['edit_prdprice']."'
              ,AKS_PUR_PRICE      = '".$data['edit_pur_price']."'
              ,AKS_MIN_STK        = '".$data['edit_prd_min_stk']."'
              ,AKS_MAX_STK        = '".$data['edit_prd_max_stk']."'
              ,AKS_PRD_DETAIL     = '".$data['edit_prd_details']."'
              ,AKS_PRD_IMG        = '".$data['prd_img']."'
              ,STATUS             = '".$data['status']."'
              ,MODIFY_BY          = '".$data['modified_by']."'
              ,MODIFY_ON          = '".$data['modified_on']."'
              ,HSN_CODE           = '".$data['edit_prd_hsn']."'  

              WHERE AKS_PRD_MID = '".$data['pr_edit_hid']."' ");


        save_query_in_log();
        $this->db->close();
        return $result;
        
    }
    
    public function get_prd_by_prd_id($pid)
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM AKS_PRD_MASTER WHERE AKS_PRD_MID =  '".$pid."' ")->row();
        // print_r($result);
        // exit;
        save_query_in_log();
        $this->db->close();
        return $result;
    }
     public function prd_edits($prd_edit)
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM AKS_PRD_MASTER WHERE AKS_PRD_MID =  '".$prd_edit."' ")->row();
        // print_r($result);
        // exit;
        save_query_in_log();
        $this->db->close();
        return $result;
    }

    public function cat_fill($cname,$offset,$page_limit)
    {
     

      $this->db->reconnect();
       

        

         $result = $this->db->query(" SELECT * FROM ( SELECT  PRD.AKS_PRD_MID,PRD.AKS_CAT_NAME as AKS_CAT_ID,PRD.AKS_PRD_NAME,PRD.AKS_PRD_WT,PRD.AKS_PRD_PRICE,PRD.AKS_PUR_PRICE,PRD.AKS_MIN_STK,PRD.AKS_MAX_STK,PRD.AKS_PRD_DETAIL,PRD.AKS_PRD_IMG,PRD.STATUS,PRD.HSN_CODE,PRDC.AKSCATEGORY_NAME, ROW_NUMBER() OVER (ORDER BY PRD.AKS_PRD_MID  DESC) AS sl from   AKS_PRD_MASTER  PRD , AKSPRODUCT_CATEGORY  PRDC  WHERE PRDC.AKSCATEGORY_ID=PRD.AKS_CAT_NAME $cname)N WHERE sl BETWEEN $offset AND $page_limit ")->result_array();

        // print_r($result);exit();
        

        save_query_in_log();
        $this->db->close();
        return $result;
      
    }
    

}
?>    