<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Dashboard_model extends CI_Model 
{
  public function __construct() {
    parent::__construct();
    $this->load->database();
  }

  public function get_appraisal_list()
  {
    $result = $this->db->query("SELECT * FROM appraisal")->result_array();
    save_query_in_log();
    return $result;
  }

  public function get_reviewer_employee()
  {
    $result = $this->db->query("SELECT * FROM t_emp_mstr WHERE app_reviewer=1")->result_array();
    save_query_in_log();
    return $result;
  }

}
?>