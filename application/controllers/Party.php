<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* ************************************************************************************
		Purpose : To handle all the village functions
***************************************************************************************/
class Party extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(array("Party_model"));
		//if ($this->session->userdata['username'] == TRUE)
		if (isset($this->session->userdata['username']) && $this->session->userdata['username'] == TRUE)
        {
            //do something
        }else{
            redirect('login'); //if session is not there, redirect to login page
        } 
		date_default_timezone_set("Asia/Kolkata");
		$this->session->set_userdata('comtitle', 'Party');
	}

	
	public function index()
	{
		$page       = isset($_GET['page']) ? $_GET['page'] : 1;
        $limit      = 25;
        $offset     = ($page - 1) * $limit +1;
        $page_limit=$offset+$limit-1;
        // $data['party_list'] = $this->Party_model->get_party_list();
        $data['party_list'] = $this->db->query(" SELECT  * FROM ( SELECT P.*, ROW_NUMBER() OVER (ORDER BY P.CREATED_ON DESC) AS sl FROM PARTIES P  WHERE P.PID!='' )N WHERE sl BETWEEN $offset AND $page_limit  ")->result_array();
        $res=$this->db->query("SELECT count(*) as party_count from PARTIES WHERE PID!=''")->row();
         $data['party_count'] =$res->party_count;
		$this->load->view('party/party_list',$data);
	}

	public function get_area()
    {
        $zid = $_POST['zoneid'];
        $zone_area = $this->Party_model->get_area_by_zone_id($zid);
        $option = '<option value="">Select Area</option>';
        foreach($zone_area as $arealist)
        {
            $option.='<option value="'.$arealist['SNO'].'">'.$arealist['AREANAME'].'</option>';
        }
        echo $option;
        //return $option;
    }
    public function get_city()
    {
        $aid = $_POST['areaid'];
        $area_city = $this->Party_model->get_city_by_area_id($aid);

        $option = '<option value="">Select City</option>';
        foreach($area_city as $citylist)
        {
            $option.='<option value="'.$citylist['CITYID'].'">'.$citylist['CITYNAME'].'</option>';
        }
        echo $option;
        // exit();
        //return $option;
    }
    public function get_village()
    {
        $cid = $_POST['cityid'];
        $city_village = $this->Party_model->get_village_by_city_id($cid);

        // $option = '<option value="">Select village</option>';
        foreach($city_village as $villagelist)
        {
            $option.='<option value="'.$villagelist['VILLAGEID'].'">'.$villagelist['VILLAGENAME'].'</option>';
        }
        echo $option;
        //return $option;
    }
     public function get_street()
    {
        $cid = $_POST['villageid'];
        $village_street = $this->Party_model->get_street_by_village_id($cid);

        // $option = '<option value="">Select Street</option>';
        // foreach($village_street as $streetlist)
        // {
        //     $option.='<option value="'.$streetlist['STREETID'].'">'.$streetlist['STREETNAME'].'</option>';
        // }
        // echo $option;
        $res=$this->db->query(" delete from  temp_street ");
        foreach($village_street as $slist)
        {
            $res=$this->db->query("INSERT INTO temp_street (STREETID, STREETNAME, ZONEID, AREAID, CITYID, VILLAGEID, CREATED_BY, CREATED_ON) VALUES(".$slist['STREETID'].",'".$slist['STREETNAME']."','".$slist['ZONEID']."','".$slist['AREAID']."',".$slist['CITYID'].",".$slist['VILLAGEID'].",'".$_SESSION['username']."','".date('Y-m-d H:i:s')."')");
        }
        print_r($res);
        //return $option;
    }

    public function party_add()
    {
        // $pid = $_POST['id'];
        // $data['party_details'] = $this->Party_model->get_party_by_party_id($pid);
        $this->load->view('party/party_add');
    }
    public function party_save()
	{
		// print_r($_POST);
		// exit();
        
        $prefix=$_SESSION['LOANPREFIX'];
        $pidqry=$this->db->query("SELECT TOP 1 PID FROM PARTIES WHERE PID LIKE '".$prefix."%' ORDER BY PID DESC");
        $pidres=$pidqry->row();
        $last_data=$pidres->PID;
        $exlno = substr($last_data,1);
        $next_value = (int)$exlno + 1;
        $p_id1=str_pad($next_value,6,0,STR_PAD_LEFT);
        $p_id=$prefix.$p_id1;
		// $data['party_id'] = $this->input->post('party_id');
        $data['party_id'] = $p_id;
        $data['party_name'] = $this->input->post('party_name');
        $data['party_image'] = '';
        $data['sign_image'] = '';
        $data['id_image']= '';
        $data['prefix'] = $this->input->post('prefix');
		$data['lname'] = $this->input->post('lname');
		$data['oname'] = $this->input->post('oname');
		$data['mother_name'] = $this->input->post('mother_name');
        $data['zone'] = $this->input->post('zone');
        $data['area'] = $this->input->post('area');
        $data['doorno'] = $this->input->post('doorno');
        $data['address'] = $this->input->post('address');        
        $data['city'] = $this->input->post('city');
        $data['village'] = $this->input->post('village');
        $data['street_val'] = $this->input->post('street');


        $res=$this->db->query("select top 1 * from STREET where ZONEID='".$data['zone']."' and AREAID='".$data['area']."' and CITYID='".$data['city']."' and VILLAGEID='".$data['village']."' and STREETNAME like '%".$data['street_val']."%'")->row();
        if(isset($res->STREETID))
        {
            $data['street']=$res->STREETID;
        }
        else
        {
            $res=$this->db->query("INSERT INTO STREET(STREETNAME, ZONEID, AREAID, CITYID, VILLAGEID, CREATED_BY,CREATED_ON, STATUS) VALUES('".$data['street_val']."','".$data['zone']."','".$data['area']."','".$data['city']."','".$data['village']."','".$_SESSION['USERID']."','".date('Y-m-d H:i:s')."','1')");
            $st_det=$this->db->query("select Top 1 * from STREET where CREATED_BY='".$_SESSION['USERID']."' order by CREATED_ON DESC ")->row();
            $data['street']=$st_det->STREETID;

        }
		$data['landmark'] = $this->input->post('landmark');
		$data['mobile'] = $this->input->post('mobile');
		$data['phone2'] = $this->input->post('phone2');
        $data['w_no']='';
		// $data['w_chk'] = $this->input->post('w_chk');
		if($this->input->post('w_chk')==false)
		{
			$data['w_no'] = $this->input->post('w_no');
		}
		else
		{
			$data['w_chkno']=$this->input->post('mobile');
		}
		$data['email'] = $this->input->post('email');
		$data['aadhar'] = $this->input->post('aadhar');
		$data['idtype'] = ($this->input->post('idtype')=='Select ID')?'':$this->input->post('idtype');
		$data['id_no'] = $this->input->post('id_no');
		$data['worktype'] = ($this->input->post('worktype')=='Select Work')?'':$this->input->post('worktype');
		$data['rating'] = $this->input->post('rating');
        // $str_photo=str_replace('data:image/jpeg;base64,', '', $this->input->post('party_photo_data'));
        $data['party_photo']=$this->input->post('party_photo_data');
        $data['sign_photo']=$this->input->post('sign_photo_data');
        $data['other_photo']=$this->input->post('other_photo_data');

        $data['party_img_file']=$this->input->post('party_photo');
        $data['sign_img_file']=$this->input->post('sign_photo');
        $data['other_img_file']=$this->input->post('id_photo');
        
          if(!empty($_FILES['party_img_file']['name'])){
            $ext = pathinfo($_FILES['party_img_file']['name'], PATHINFO_EXTENSION);
            
             // print_r($_FILES['party_img_file']['name'][$i]);exit;
            $_FILES['file']['name'] = $_FILES['party_img_file']['name'];
            $_FILES['file']['type'] = $_FILES['party_img_file']['type'];
            $_FILES['file']['tmp_name'] = $_FILES['party_img_file']['tmp_name'];
            $_FILES['file']['error'] = $_FILES['party_img_file']['error'];
            $_FILES['file']['size'] = $_FILES['party_img_file']['size'];
                  $ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
            $config['upload_path'] = 'assets/images/party_image'; 
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['max_size'] = '50000';
            $config['file_name'] = $data['party_id'];
     
            $this->load->library('upload',$config); 
      
            if($this->upload->do_upload('file')){
              $uploadData = $this->upload->data();
              $filename = $uploadData['file_name'];
     
              $data['totalFiles'] = $filename;
            }
          }
          if($data['party_img_file']!='')
         {
          $data['party_image']=$data['party_id'].".".$ext;;
          }
        

          if(!empty($_FILES['sign_img_file']['name'])){
            // $ext = pathinfo($_FILES['sign_img_file']['name'], PATHINFO_EXTENSION);
            
            // print_r($_FILES['sign_img_file']['name'][$i]);exit;
            $_FILES['file']['name'] = $_FILES['sign_img_file']['name'];
            $_FILES['file']['type'] = $_FILES['sign_img_file']['type'];
            $_FILES['file']['tmp_name'] = $_FILES['sign_img_file']['tmp_name'];
            $_FILES['file']['error'] = $_FILES['sign_img_file']['error'];
            $_FILES['file']['size'] = $_FILES['sign_img_file']['size'];
                  $ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
            $config['upload_path'] = 'assets/images/party_sign_image'; 
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['max_size'] = '50000';
            $config['file_name'] = "sign_".$data['party_id'];
     
            $this->load->library('upload',$config); 
      
            if($this->upload->do_upload('file')){
              $uploadData = $this->upload->data();
              $filename = $uploadData['file_name'];
     
              $data['totalFiles'] = $filename;
            }
          }

         if($data['sign_img_file']!='')
         {
          $data['sign_image']="sign_".$data['party_id'].".".$ext;;
         }
          if(!empty($_FILES['other_img_file']['name'])){
            // $ext = pathinfo($_FILES['other_img_file']['name'], PATHINFO_EXTENSION);
            
            // print_r($_FILES['other_img_file']['name'][$i]);exit;
            $_FILES['file']['name'] = $_FILES['other_img_file']['name'];
            $_FILES['file']['type'] = $_FILES['other_img_file']['type'];
            $_FILES['file']['tmp_name'] = $_FILES['other_img_file']['tmp_name'];
            $_FILES['file']['error'] = $_FILES['other_img_file']['error'];
            $_FILES['file']['size'] = $_FILES['other_img_file']['size'];
            $ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
            $config['upload_path'] = 'assets/images/party_idproof_image'; 
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['max_size'] = '50000';
            $config['file_name'] = "id_".$data['party_id'];
     
            $this->load->library('upload',$config); 
      
            if($this->upload->do_upload('file')){
              $uploadData = $this->upload->data();
              $filename = $uploadData['file_name'];
     
              $data['totalFiles'] = $filename;
            }
          }

         if($data['other_img_file']!='')
         {
          $data['id_image']="id_".$data['party_id'].".".$ext;;
        }
        // $data['bank_details'] = $this->input->post('bank_details');

        $type=explode(",",implode(",",$this->input->post('add_type')));
        // echo $type. "<br>";
        $bank_name=explode(",",implode(",",$this->input->post('add_bank_name')));
        // echo $bank_name. "<br>";
        $branch_name=explode(",",implode(",",$this->input->post('add_branch_name')));
        // echo $branch_name. "<br>";
        $acc_hol_name=explode(",",implode(",",$this->input->post('add_acc_name')));
        // echo $acc_hol_name. "<br>";
        $acc_no=explode(",",implode(",",$this->input->post('add_acc_no')));
        // echo $acc_no. "<br>";
        $ifsc_code=explode(",",implode(",",$this->input->post('add_ifsc_code')));
        // echo $ifsc_code. "<br>";
        $subcount = count($this->input->post('add_bank_name'));
         
        if($subcount>0)
        {
            for($i=0;$i<$subcount;$i++)
            {
                if($bank_name[$i]=='' || is_null($bank_name[$i]))
               {}
                else
                {
                $res=$this->db->query("INSERT INTO party_bank_upi_details (payment_type, account_name, account_holder_name, phone_account_no, branch_name, ifsc_code, party_id, created_by, created_on) VALUES('".$type[$i]."','".$bank_name[$i]."','".$acc_hol_name[$i]."','".$acc_no[$i]."','".$branch_name[$i]."','".$ifsc_code[$i]."','".$data['party_id']."','".$_SESSION['username']."','".date('Y-m-d H:i:s')."')");
                save_query_in_log();
                }

            }
        }


        $nom_name=explode(",",implode(",",$this->input->post('add_nominee_name')));
        $relation=explode(",",implode(",",$this->input->post('add_relation')));
        $phone_no=explode(",",implode(",",$this->input->post('add_ph_no')));
        $ncount= count($this->input->post('add_nominee_name'));

        if($ncount>0)
        {
            for($j=0;$j<$ncount;$j++)
            {
               if($nom_name[$j]=='' || is_null($nom_name[$j]))
               {}
                else
                {
                $res=$this->db->query("INSERT INTO NOMINEE (NOMINEE_NAME, RELATION, MOBILE_NO, PID, CREATED_BY, CREATED_ON) VALUES('".$nom_name[$j]."','".$relation[$j]."','".$phone_no[$j]."','".$data['party_id']."','".$_SESSION['username']."','".date('Y-m-d H:i:s')."')");
                save_query_in_log();
                }

            }
        }

         // print_r ($bank_details);
        // $data['bank_details']=serialize($bank_details);
        $data['modified_on'] = date('Y-m-d H:i:s');
        // echo $str;
        // $array[]=unserialize($str); 
        // print_r ($array);
        // exit();
    	$result = $this->Party_model->party_save($data);
        $res=$this->db->query("UPDATE KEYMASTER SET KEYVALUE =KEYVALUE+1 where KEYNAME ='PARTIES-".$_SESSION['LOANPREFIX']."'");
	      if($result){
				$this->session->set_flashdata('g_success', $data['party_id'].' - '.$data['party_name'].' - '.$data['mobile'].' <br> Party have been Added successfully...');
	      }else{
	      	   $this->session->set_flashdata('g_err', 'Could not add Party details!');
	      }
		redirect('party'); 

	}
	public function party_view($pid)
    {
        // $pid = $_POST['id'];
        $data['party_details'] = $this->Party_model->get_party_by_party_id($pid);
        $this->load->view('party/party_view',$data);
    }
    public function party_loan_view($pid)
    {
        
        $data['party_details'] = $this->Party_model->get_party_by_party_id($pid);

        $data['sel_loan_type']=$loan_type=$this->input->post('sel_loan_type');

        if($loan_type=='loan' || $loan_type=='')
        {
            $data['sel_loan_type']='loan';
            $data['loan_details'] = $this->Party_model->get_loans_by_party_id($pid);
        }
        if($loan_type=='receipts')        
        {
            $data['receipt_details'] = $this->Party_model->get_receipts_by_party_id($pid); 
        }
        // loan
                // receipts
                // redemption
                // repledge
                // mri_loan
                // mri_receipts
                // mri_redemption
                // hand_loan
        $this->load->view('party/party_loan_view',$data);
    }
    public function party_history_view()
    {
        $pid = $_POST['id'];
        $data['party_details'] = $this->Party_model->get_party_by_party_id($pid);
        $this->load->view('party/party_history_detail',$data);
    }
    public function party_delete()
    {
        $uid = $data['bid']=$_POST['id'];
        $data['party_details'] = $this->db->query("SELECT * FROM PARTIES WHERE PID='".$uid."'")->row();
        $this->load->view('party/party_delete',$data);
    }
    public function delete()
    { 
        $pid=$_POST['field'];
        $loanqry=$this->db->query(" SELECT COUNT(L.PID) AS LOANCOUNT FROM LOANS L  WHERE L.PID='".$pid."'")->row();
        save_query_in_log();
        $chitqry=$this->db->query(" SELECT COUNT(CH.PID) AS CHITCOUNT FROM CHIT_CUSTOMERS CH  WHERE CH.PID='".$pid."'")->row();
        save_query_in_log();
        $creditqry=$this->db->query(" SELECT COUNT(CR.PID) AS CREDITCOUNT FROM CREDIT_CUSTOMERS CR  WHERE CR.PID='".$pid."'")->row();
        save_query_in_log();
        if($loanqry->LOANCOUNT>0)
        {
            $info="Party Have Loans, could not Delete";
        }
        elseif($chitqry->CHITCOUNT>0)
        {
            $info="Party has Chits, could not Delete";
        }
        elseif($creditqry->CREDITCOUNT>0)
        {
            $info="Party has Credits, could not Delete";
        }
        else
        {
        	$result = $this->Party_model->party_delete($pid);
    	}
        if ($result) {
            $this->session->set_flashdata('g_success', 'Party has been Deleted successfully.');
        }
        else{
            $this->session->set_flashdata('g_err', $info);
        }
    }
    //Party Edit
    public function party_edit()
    {
        print_r($_POST['id']);
        $cid = $_POST['id'];

        $data['party_details'] = $this->Party_model->get_party_by_party_id($cid);
        $this->load->view('party/party_edit',$data);
    }
    public function party_update()
    {
        $data['party_id'] = $this->input->post('party_id_edit');
        $data['party_name'] = $this->input->post('party_name_edit');
        $data['prefix'] = $this->input->post('prefix_edit');
        $data['lname'] = $this->input->post('lname_edit');
        $data['oname'] = $this->input->post('oname_edit');
        $data['mother_name'] = $this->input->post('mother_name_edit');
        $data['zone'] = $this->input->post('zone_edit');
        $data['area'] = $this->input->post('area_edit');
        $data['doorno'] = $this->input->post('doorno_edit');
        $data['address'] = $this->input->post('address_edit');        
        $data['city'] = $this->input->post('city_edit');
        $data['village'] = $this->input->post('village_edit');
        $data['landmark'] = $this->input->post('landmark_edit');
        $data['mobile'] = $this->input->post('mobile_edit');
        $data['phone2'] = $this->input->post('phone2_edit');
        // $data['w_chk'] = $this->input->post('w_chk');
        if($this->input->post('w_chk')==false)
        {
            $data['w_no'] = $this->input->post('w_no_edit');
        }
        else
        {
            $data['w_no']=$this->input->post('mobile_edit');
        }
        $data['email'] = $this->input->post('email_edit');
        $data['aadhar'] = $this->input->post('aadhar_edit');
        $data['idtype'] = $this->input->post('idtype_edit');
        $data['id_no'] = $this->input->post('id_no_edit');
        $data['worktype'] = $this->input->post('worktype_edit');
        $data['rating'] = $this->input->post('rating_edit');
        $data['modified_on'] = date('Y-m-d H:i:s');
        
        $result = $this->Party_model->party_update($data);
          if($result){
                $this->session->set_flashdata('g_success', 'Party have been Updated successfully...');
          }else{
               $this->session->set_flashdata('g_err', 'Could not update party details!');
          }
        redirect('party'); 
    }
    public function get_area_edit()
    {
        $zid = $_POST['zoneid'];
        $zone_area = $this->Party_model->get_area_by_zone_id($zid);
        $option = '<option value="">Select Area</option>';
        foreach($zone_area as $arealist)
        {
            $option.='<option value="'.$arealist['SNO'].'">'.$arealist['AREANAME'].'</option>';
        }
        echo $option;
        //return $option;
    }

    public function streetList()
      {
        $search =  $_GET['query']; 
        // $vid =  $_GET['vid']; 
        // $vid =  $this->input->post('village'); 
        // echo $vid;
        // $rows = $this->Party_model->getStreet($search,$vid);
        $rows = $this->Party_model->getStreet($search);
        $res='[';
        if(count($rows)>0) {
          foreach($rows as $row )
          {
              $title='';
              // $billno='';
              $street_id=$row->STREETID;
              $street_name=$row->STREETNAME;
              

              $title = $street_name;
              $res.='{ "title":"'.$title.'","street_id": "'.$street_id.'","street_name":"'.$street_name.'"},';
             
              
          }
          $res=rtrim($res,',');
          $res.=']';
        }
        else{
          $res.=']';
        }
        print_r($res);die();
      }
      public function check_phno_exists()
      {
          $ph=$_POST['mob'];

          $ph_res=$this->db->query("select * from PARTIES WHERE PHONE='".$ph."'")->result_array();
          $tr_data='';
          $cnt=count((array)$ph_res);
          if($cnt>0)
          {
              foreach($ph_res as $plist)
              { 
                    $tr_data.="<tr><td>".$plist['NAME']." - ".$plist['FATHERSNAME']." - ".$plist['CITY']." - ".$plist['PHONE']."</td></tr>";
              }
          }
          else
          {
                $tr_data='0';
          }
          echo $tr_data;
      }
}
?>