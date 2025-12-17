<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/***************************************************************
    Purpose : To handle all the Department database details 2022-08-19
****************************************************************/
class Repledge_model extends CI_Model
{
  function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Kolkata');    
    } 

    public function get_repledge_list(){
        $this->db->reconnect();
       
        $result  = $this->db->query("SELECT * FROM REPLEDGE_MASTER WHERE ACTIVE='Y' ORDER BY ENDATE DESC")->result_array();
        save_query_in_log();
        $this->db->close();
        return $result;
    }

    public function get_company_list(){
        $this->db->reconnect();
       
        $result  = $this->db->query("SELECT * FROM COMPANY")->result_array();
        save_query_in_log();
        $this->db->close();
        return $result;
    }
     public function get_bank_list(){
        $this->db->reconnect();
       
          $result  = $this->db->query("SELECT * FROM BANKS WHERE ACTIVE = 'Y'")->result_array();
        save_query_in_log();
        $this->db->close();
        return $result;
    }
     public function get_staff_list(){
        $this->db->reconnect();
       
        $result  = $this->db->query("SELECT * FROM STAFFS ")->result_array();
        save_query_in_log();
        $this->db->close();
        return $result;
    }
     public function get_interest_list(){
        $this->db->reconnect();
       
        $result  = $this->db->query("SELECT * FROM INTERESTLIST")->result_array();
        save_query_in_log();
        $this->db->close();
        return $result;
    }
    public function getkey($prefix)
    {
         $this->db->reconnect();
       
        $result  = $this->db->query("SELECT * FROM KEYMASTER where KEYNAME='REPLEDGE-".$prefix."'")->row();
        save_query_in_log();
        $this->db->close();
        return $result;
    }
    public function getLoan($search)
      {
       
         $query = $this->db->query("SELECT l.BILLNO from LOANS l WHERE l.ACTIVE='Y' and l.CLOSEDATE is null and l.BILLNO LIKE  '".'%'.$search.'%'."' ");
        // $query = $this->db->query("select * from REDEMPTIONS where CLOSING_TYPE='COMPANY_CLOSE' and  NEWBILLNO LIKE '".'%'.$search.'%'."' ");
        $result = $query->result();
        return $result;
      } 
    

}

?>                   