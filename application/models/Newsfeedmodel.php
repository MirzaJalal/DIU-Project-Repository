<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<?php

class Newsfeedmodel extends CI_Model
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
    ! News Feed
    !========================================
    */
    public function test()
    {
        $this->db->select('students.name,students.image,projects.project_title,projects.project_id,projects.thumbnail,projects.created_at');
        $this->db->join('students','follower.following = students.id');
        $this->db->join('projects','projects.author = students.id');
        //$this->db->where(['follower.student_id !='=>$this->session->student_id]);
        $this->db->where("follower.following !=",$this->session->student_id);
        $this->db->order_by('students.id','desc');
        $this->db->limit(5);
        return$this->db->get('follower')->result_object();
    }

}

?>