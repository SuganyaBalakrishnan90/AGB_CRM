<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/***************************************************************
    Purpose : To handle all the Village database details 2022-08-19
****************************************************************/
class Party_model extends CI_Model
{
  function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Calcutta'); 
    }

    // public function get_party_list()
    // {
    //     $this->db->reconnect();
    //     // $result  = $this->db->query("SELECT * FROM PARTIES  ORDER BY PID DESC")->result_array();
    //     // $result  = $this->db->query("SELECT  top 2000 p.*,Z.ZONENAME,a.ZONE_SNO FROM PARTIES p left join AREA a  on a.AREANAME=p.AREA JOIN ZONE_MASTER Z ON A.ZONE_SNO=Z.SNO where PID like 'A005%' ORDER BY P.PID DESC")->result_array();
    //     save_query_in_log();
    //     $this->db->close();
    //     return $result;
    // }
    // SELECT [ZONENAME] FROM AREA A, ZONE_MASTER Z WHERE AREANAME='SKD - VVR NAGAR WEST' AND Z.SNO=A.ZONE_SNO
    
     // To get village list
    public function  get_area_by_zone_id($id)
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM AREA WHERE ZONE_SNO='".$id."'")->result_array();
        // echo "SELECT * FROM AREA WHERE ZONE_SNO='".$id."'";
        // print_r($result);
        // exit();
        save_query_in_log();
        $this->db->close();
        return $result;   
    }
    public function  get_city_by_area_id($id)
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM CITY c join AREA a on a.SNO=c.AREAID  where a.SNO='".$id."'")->result_array();
        // print_r($result);
        // exit();
        save_query_in_log();
        $this->db->close();
        return $result;   
    }
    public function  get_village_by_city_id($id)
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM VILLAGE v join CITY c on c.CITYID=v.CITYID WHERE c.CITYID='".$id."'")->result_array();
        // echo "SELECT * FROM AREA WHERE ZONE_SNO='".$id."'";
        // print_r($result);
        // exit();
        save_query_in_log();
        $this->db->close();
        return $result;   
    }
    public function  get_street_by_village_id($id)
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM STREET s join VILLAGE v on v.VILLAGEID=s.VILLAGEID WHERE v.VILLAGEID='".$id."'")->result_array();
        save_query_in_log();
        $this->db->close();
        return $result;   
    }
    // To add village
    public function party_save($data)
    {   
        $this->db->reconnect();
        $result  = $this->db->query("INSERT INTO PARTIES (PID, NAME, LASTNAME_PREFIX, FATHERSNAME, OTHER_NAME, MOTHER_NAME, DOORNO, ADDRESS1, ADDRESS2, CITY, LANDMARK, AREA, ZONE_SNO, PHONE, PHONE2, WHATSAPP,EMAIL, WORK_TYPE, AADHAAR_NO, ID_TYPE, ID_NUMBER, RATING, PHOTO, SIGNATURE, OTHER_PHOTO, MODIFIED_ON, TYPE_OF_RECORD, ZONE_ID, AREA_ID, CITY_ID, VILLAGE_ID, STREET_ID, PARTY_IMAGE, SIGNATURE_IMAGE, IDPROOF_IMAGE, CREATED_ON)VALUES ('".$data['party_id']."','".$data['party_name']."','".$data['prefix']."','".$data['lname']."','".$data['oname'] ."','".($data['mother_name']) ."','".$data['doorno']."','".$data['address']."','".$data['village']."','".$data['city']."','".$data['landmark'] ."','".$data['area'] ."','".$data['zone']."','".$data['mobile']."','".$data['phone2']."','".$data['w_no'] ."','".$data['email']."','".$data['worktype']."','".$data['aadhar'] ."','".$data['idtype']."','". $data['id_no']."','".$data['rating']."','".$data['party_photo']."','".$data['sign_photo']."','".$data['other_photo']."','".$data['modified_on']."','N', '".$data['zone']."','".$data['area']."','".$data['city']."','".$data['village']."','".$data['street']."','".$data['party_image']."','".$data['sign_image']."','".$data['id_image']."','".$data['modified_on']."')");
        save_query_in_log();
        $key_update=$this->db->query("UPDATE KEYMASTER SET KEYVALUE=KEYVALUE+1 WHERE KEYNAME LIKE 'PARTIES-".$_SESSION['LOANPREFIX']."'");
        save_query_in_log();
        $this->db->close(); 
        return $result;
    }

    public function get_party_by_party_id($pid)
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT * FROM PARTIES WHERE PID = '".$pid."'")->row();
        save_query_in_log();
        $this->db->close();
        return $result;
    }
    public function get_loans_by_party_id($pid)
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT l.*,c.COMPANYNAME FROM LOANS l,COMPANY c WHERE l.PID = '".$pid."' and  l.COMPANYCODE=c.COMPANYCODE order by l.ENDATE desc")->result_array();
        save_query_in_log();
        $this->db->close();
        return $result;
    }
    public function get_receipts_by_party_id($pid)
    {
        $this->db->reconnect();
        $result  = $this->db->query("SELECT c.COMPANYNAME,r.BILLNO,r.RECEIPT_DATE,r.CALC_PRINCIPAL, r.CALC_INTEREST, l.INTERESTTYPE,(r.MAINTAINCHARGE+r.NOTICECHARGE+r.FORMCHARGE)as CHARGES,r.HL_AMOUNT,r.PAIDAMOUNT from  RECEIPT_MASTER r, LOANS l, COMPANY c where l.BILLNO=r.BILLNO and l.COMPANYCODE=c.COMPANYCODE and l.PID='".$pid."' order by RECEIPT_DATE desc")->result_array();
        save_query_in_log();
        $this->db->close();
        return $result;
    }
    
    public function party_delete($uid)
    {
        $this->db->reconnect();
        $result  = $this->db->query("DELETE FROM PARTIES WHERE PID = '".$uid."'");
        save_query_in_log();
        
        $this->db->close();
        return $result;
    }
    public function party_update($data)
    {
        $result = $this->db->query("UPDATE PARTIES SET NAME='".strtoupper($data['party_name'])."',".
                "LASTNAME_PREFIX='".$data['prefix']."', FATHERSNAME='".strtoupper($data['lname'])."',".
                "OTHER_NAME='".strtoupper($data['oname'])."', MOTHER_NAME='".strtoupper($data['mother_name'])."',".
                "DOORNO='".$data['doorno']."', ADDRESS1='".strtoupper($data['address'])."',".
                "ADDRESS2='".strtoupper($data['village'])."', CITY='".strtoupper($data['city'])."',".
                "AREA='".strtoupper($data['area'])."', ZONE_SNO='".$data['zone']."',".
                "PHONE='".$data['mobile']."', PHONE2='".$data['phone2']."',".
                "WHATSAPP='".$data['w_no']."', AADHAAR_NO='".$data['aadhar']."',".
                "ID_TYPE='".$data['idtype']."', ID_NUMBER='".$data['id_no']."',".
                "LANDMARK='".$data['landmark']."', RATING='".$data['rating']."',".
                "WORK_TYPE='".$data['worktype']."', EMAIL='".$data['email']."' ,".
                "PHOTO='".$data['party_photo']."', SIGNATURE='".$data['sign_photo']."' ,".
                "OTHER_PHOTO='".$data['other_photo']."',".
                "MODIFIED_ON='".$data['modified_on']."'".
                " WHERE PID='".$data['party_id']."'");
        save_query_in_log();
        $loan_update=$this->db->query("UPDATE LOANS SET NAME='".strtoupper($data['party_name'])."' WHERE PID='".$data['party_id']."'");
        save_query_in_log();
        return $result;
    }
    public function party_loan_summary($pid)
    {
        $this->db->reconnect();
      $result=$this->db->query("SELECT LOANS.*, R.SELLINGAMOUNT, R.SELLINGREMARKS, R.SELLINGTO FROM LOANS L INNER JOIN REDEMPTIONS R ON L.BILLNO=R.BILLNO WHERE LOANS.PID='".$pid."'")->result_array();
       save_query_in_log();
        $this->db->close();
        return $result; 
    
    // select LOANS.*, REDEMPTIONS.SELLINGAMOUNT, REDEMPTIONS.SELLINGREMARKS, REDEMPTIONS.SELLINGTO
   // from [BANKERS].[dbo].[LOANS] inner join [BANKERS].[dbo].[redemptions] on LOANS.BILLNO=REDEMPTIONS.BILLNO
    }
    public function getStreet($search)
    {
        $this->db->reconnect();
        $query = $this->db->query("select s.* from temp_street s  where s.STREETNAME like '".'%'.$search.'%'."'  ");
        // $query = $this->db->query("select s.* from STREET s, VILLAGE v where s.VILLAGEID=v.VILLAGEID and v.VILLAGEID=".$vid." and s.STREETNAME like '".'%'.$search.'%'."'  ");
    
        $result = $query->result();
        return $result;
    }   
}
?>