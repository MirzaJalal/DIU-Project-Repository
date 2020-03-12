<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<?php

class Photomodel extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->db = $this->load->database("default", TRUE);
    }

    /*
    !========================================
    ! All Albums
    !========================================
    */
    public function albums($order = 'asc')
    {
        $this->db->order_by('id',$order);
        return $this->db->get('album')->result_object();
    }

    /*
    !========================================
    ! Blog By Category
    ! @limit 12
    !========================================
    */
    public function blog_category($category_id="")
    {
        $this->db->join('tbl_blog_category','tbl_blog_category.tbcid = tbl_blog.tbcid');
        $this->db->where('tbl_blog.tbcid',$category_id);
        $this->db->order_by('tbl_blog.blog_id','desc');
        return $this->db->get('tbl_blog')->result_object();
    }
}

?>