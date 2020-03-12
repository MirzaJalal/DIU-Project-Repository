<?php
use config\helpers\Help;

defined('BASEPATH') OR exit('No direct script access allowed');

class Post_categories extends CI_Controller
{

    /*
    !--------------------------------------------------------
    !       Constructor Load During Creation of Object
    !--------------------------------------------------------
    */
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('security'); 
        if (!$this->session->has_userdata('login')) {
            redirect('admin');
        }
    }

    /*
    !--------------------------------------------------------
    !       Default Function Admin for Homepage
    !--------------------------------------------------------
    */
    public function index()
    {
        $this->db->select("tbl_post_category.*,count(tbl_post.post_id) as total_post");
        $this->db->join('tbl_post','tbl_post_category.catid = tbl_post.catid');
        $this->db->group_by('tbl_post.catid');
        $this->db->order_by('tbl_post_category.category_title','asc');
        $data['categories'] = $this->db->get('tbl_post_category')->result_object();
    
        $this->load->view('admin/lib/header',$data);
        $this->load->view('admin/lib/sidebar');
        $this->load->view('admin/post/post_categories');
        $this->load->view('admin/lib/footer');
    }


    /*
    !--------------------------------------------------------
    !     Save Post Categories
    !--------------------------------------------------------
    */
    public function save_categories()
    {

        $post_category = $this->input->post('post_category');
        $category_order = $this->input->post('category_order');
        
        $this->db->where('category_title',$post_category);
        $stmt =  $this->db->get('tbl_post_category');
        if ($stmt->result_id->num_rows >0) {
            $this->session->set_flashdata('error', 'Post Category <strong>'.$post_category.'</strong> Already Exist');
            redirect('admin/post_categories');
        }else{
            $data = array(
                'category_title' => $post_category,
                'category_order' => $category_order
            );
            $this->db->insert('tbl_post_category',$data);
            $this->session->set_flashdata('success', 'Post Category <strong>'.$post_category.'</strong> Added Successfully');
            redirect('admin/post_categories');
        }
		
    }


    /*
    !--------------------------------------------------------
    !     Update Post Category
    !--------------------------------------------------------
    */
    public function update($catid)
    {
        $this->db->set(array(
            'category_title' =>  $this->input->post('category_title'),
            'category_order' =>  $this->input->post('category_order'),
            'updated_at'     => date('Y-m-d H:i:s')
        ));
        $this->db->where('catid',$catid);
        $stmt =  $this->db->update('tbl_post_category');
        
        $this->session->set_flashdata('success', 'Post Category Updated Successfully to <strong>'.$this->input->post("category_title").'</strong>');
        redirect('admin/post_categories');
        
    }


  
    /*
    !--------------------------------------------------------
    !      Delete User
    !--------------------------------------------------------
    */
    public function delete($catid)
    {
        $this->db->where(array(
            'catid ' => $catid
        )); 
        $this->db->delete('tbl_post_category');
        $this->session->set_flashdata('success', 'Post Category (<strong>'.$catid.'</strong>) Deleted Successfully');
        redirect('admin/post_categories');
    }

}