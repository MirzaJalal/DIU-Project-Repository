<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<?php

class Countermodel extends CI_Model
{

    /*
    !========================================
    ! Constructor Load First
    ! @return int
    !========================================
    */
    public function __construct()
    {
        parent::__construct();
        $this->db = $this->load->database("default", TRUE);
       
    }

    /*
    !========================================
    ! Total Tag
    ! @return int
    !========================================
    */
    public function total_tag(){
        $result_set = $this->db->get('tbl_tag')->result_id->num_rows;
        if ($result_set > 0) {
            return $result_set;
        }else{
            return 0;
        }
    }

    /*
    !========================================
    ! Total Page
    ! @return int
    !========================================
    */
    public function total_page(){
        $result_set = $this->db->get('tbl_page')->result_id->num_rows;
        if ($result_set > 0) {
            return $result_set;
        }else{
            return 0;
        }
    }

    /*
    !========================================
    ! Total Blog Number
    ! @return int
    !========================================
    */
    public function total_blog(){
        $result_set = $this->db->get('tbl_blog')->result_id->num_rows;
        if ($result_set > 0) {
            return $result_set;
        }else{
            return 0;
        }
    }

    /*
    !========================================
    ! blog view
    ! @return int
    !========================================
    */
    public function total_blogview($today=""){
        $stmt = $this->db->select('sum(view) as total')->get('tbl_blog')->row();
        if($stmt->total > 0){
            return $stmt->total;
        }else{
            return 0;
        }
    }

    /*
    !========================================
    ! Total Album
    ! @return int
    !========================================
    */
    public function total_album(){

        return $result_set = $this->db->get('album')->num_rows();

    }

    /*
    !========================================
    ! Total Photo
    ! @return int
    !========================================
    */
    public function total_photo(){

        return $result_set = $this->db->get('photo')->num_rows();

    }
}

?>