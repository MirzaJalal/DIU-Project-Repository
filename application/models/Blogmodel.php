<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<?php

class Blogmodel extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->db = $this->load->database("default", TRUE);
    }

    /*
    !========================================
    ! Single Blog 
    !========================================
    */
    public function single_blog($id)
    {
        $this->db->join('tbl_blog_category','tbl_blog_category.tbcid = tbl_blog.tbcid');
        $this->db->order_by('tbl_blog.blog_id','desc');
        $this->db->where('blog_id',$id);
        return $this->db->get('tbl_blog')->result_object();
    }

    /*
    !========================================
    ! Related Blog 
    ! @limit 3
    !========================================
    */
    public function related_blog($category,$id,$limit=3)
    {
        $this->db->join('tbl_blog_category','tbl_blog_category.tbcid = tbl_blog.tbcid')->order_by('rand()');
        $this->db->where(['tbl_blog.tbcid'=>$category]);
        $this->db->limit($limit);
        $this->db->where(['tbl_blog.blog_id !='=>$id]);
        return$this->db->get('tbl_blog')->result_object();
    }


    /*
    !========================================
    ! Popular Blog 
    ! @limit 12
    !========================================
    */
    public function popular_blog($limit=12)
    {
        $this->db->join('tbl_blog_category','tbl_blog_category.tbcid = tbl_blog.tbcid')->order_by('tbl_blog.view','desc');
        $this->db->limit($limit);
        return $this->db->get('tbl_blog')->result_object();
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