<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* ************************************************************************************
        Purpose : To handle all Department functions 2022-08-19
***************************************************************************************/
class Gallery extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        // $this->load->model(array("jst_inventory_model","Accountsgroup_model"));
        // $this->load->library('user_agent');

        // $fin_year=$this->Accountsgroup_model->get_fin_years_list();
        // $db=substr($fin_year->DBNAME,0,strlen($fin_year->DBNAME)-4);
        // //echo $db;exit;
        // $config_app = switch_db_dynamic($db);
        
        // $this->jst_inventory_model->other_db = $this->load->database($config_app,TRUE);

        if (isset($this->session->userdata['username']) && $this->session->userdata['username'] == TRUE)
        {
            //do something
        }else{
            redirect('login'); //if session is not there, redirect to login page
        } 
        date_default_timezone_set("Asia/Kolkata");
        // $this->session->set_userdata('comtitle', 'Tagentry');
    }


    public function index()

    {

        $data['item'] = $this->input->post('item');
        if($data['item']!=''){
            $data['item_detail']=explode('_',$data['item']);
        $item_id =" AND item_id='".$data['item_detail'][1]."'";
        
        }
        else{
            $item_id ='';
        }

        $data['subitem'] = $this->input->post('subitem');
        if($data['subitem']!=''){
        $subitem_id =" AND SUB_ID='".$data['subitem']."'";
        
        }
        else{
            $subitem_id ='';
        }


        $data['gold_item']  = $this->db->query("SELECT * FROM ITEMS  WHERE jewel_type_id='1' ")->result_array();
        $data['silver_item']  = $this->db->query("SELECT * FROM ITEMS WHERE jewel_type_id='2' ")->result_array();
    
        $data['subitem'] = $this->db->query("SELECT * FROM SUBITEM_LIST WHERE status='Y'  $item_id $subitem_id ")->result_array();
        $this->load->view('gallery/gallery',$data);

    }

    public function gallery_images($id)
    {
     
        $data['subitem'] = $this->db->query("SELECT * FROM SUBITEM_LIST WHERE status='Y' AND SUB_ID='".$id."'  ")->result_array();
        $this->load->view('gallery/gallery_images',$data);
    }

    public function get_subitem()
    {
        $type = $_POST['typeid'];
      //  print_r($type);
        $typelist=$this->db->query("SELECT * FROM SUBITEM_LIST WHERE item_id='".$type."'  ")->result_array();
        $option = '<option value="">All</option>';
        foreach($typelist as $tlist)
        {
            $option.='<option value="'.$tlist['SUB_ID'].'">'.$tlist['SUBITEM_NAME'].'</option>';
        }
        echo $option;
        
    }
}