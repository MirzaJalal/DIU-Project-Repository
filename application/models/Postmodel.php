<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<?php

class Postmodel extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->db = $this->load->database("default", TRUE);
    }

    /*
    !========================================
    ! Post Categories
    !========================================
    */
    public function post_categories($limit=8,$order='asc')
    {
        $this->db->where_not_in('category_title', 'Codeigniter');
        $this->db->where_not_in('category_title', 'Laravel');
        $this->db->order_by('category_order',$order);
        $this->db->limit($limit);
        return $this->db->get('tbl_post_category')->result_object();
    }
}

?>