<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller
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
    !       Page List 
    !--------------------------------------------------------
    */
    public function page_list()
    {

        $this->db->join('tbl_page_category','tbl_page_category.tpcid = tbl_page.tpcid');
        $this->db->order_by('tbl_page.page_id','desc');
        $data['pages'] = $this->db->get('tbl_page')->result_object();

        $this->load->view('admin/lib/header',$data);
        $this->load->view('admin/lib/sidebar');
        $this->load->view('admin/page/page_list');
        $this->load->view('admin/lib/footer');
    }


    /*
    !--------------------------------------------------------
    !       Page Category Llist
    !--------------------------------------------------------
    */
    public function page_cat_list()
    {
        $this->db->order_by('tbl_page_category.tpcid','asc');
        $data['page_categories'] = $this->db->get('tbl_page_category')->result_object();
        $this->load->view('admin/lib/header',$data);
        $this->load->view('admin/lib/sidebar');
        $this->load->view('admin/page/page_cat_list');
        $this->load->view('admin/lib/footer');
    }


    /*
    !--------------------------------------------------------
    !      Add Page Admin
    !--------------------------------------------------------
    */
    public function add_page()
    {
        
        $this->db->order_by('category_title','asc');
        $data['categories'] = $this->db->get('tbl_page_category')->result_object(); 

        $this->db->order_by('tag_name','asc');
        $data['tags'] = $this->db->get('tbl_tag')->result_object(); 

        $this->load->view('admin/lib/header',$data);
        $this->load->view('admin/lib/sidebar');
        $this->load->view('admin/page/add_page');
        $this->load->view('admin/lib/footer');
    }


    /*
    !--------------------------------------------------------
    !     Save Page
    !--------------------------------------------------------
    */
    public function save_page ()
    {

        $page_slug  = str_replace(" ", '-', $this->input->post('page_slug'));
        $tagid  = $this->input->post('tagid');
        $data = array(
            'page_title'       => $this->input->post('page_title'),
            'tpcid'            => $this->input->post('tpcid'),
            'page_slug'        => $page_slug,
            'page_status'      => $this->input->post('page_status'),
            'page_description' => $this->input->post('page_description'),
            'create'           => date("Y-m-d H:i:s"),
            'update'           => date("Y-m-d H:i:s") 
        );

        $this->db->insert('tbl_page',$data);
        $insert_id = $this->db->insert_id(); 

        if (!empty($_FILES['page_attachment']['name'])) {
                
                $config['upload_path']   = './uploads/page/';
                $config['allowed_types'] = 'gif|jpg|png|GIF|PNG|JPG|JPEG';
                $config['max_size']      = 10000;
                $config['max_width']     = 10000;
                $config['max_height']    = 10000;
                $config['file_name']     =   $insert_id."-".time();

                $this->load->library('upload', $config);
                $this->upload->initialize($config);



                if ($this->upload->do_upload('page_attachment')) {
                    $upload_data = array('upload_data' => $this->upload->data());
                    $file = $upload_data['upload_data']['file_name'];
                    $this->db->set('page_attachment',$file);
                    $this->db->where('page_id',$insert_id);
                    $this->db->update('tbl_page');   
                } 
        } 

        $this->session->set_flashdata('success', 'Page Added Successfully');
        redirect('admin/page/page_list');
    }


    /*
    !--------------------------------------------------------
    !     Edit Page Admin
    !--------------------------------------------------------
    */
    public function edit_page($page_id)
    {
        
        $this->db->order_by('category_title','asc');
        $data['categories'] = $this->db->get('tbl_page_category')->result_object(); 


        $this->db->where('page_id',$page_id);
        $data['page'] = $this->db->get('tbl_page')->result_object(); 
        $this->load->view('admin/lib/header',$data);
        $this->load->view('admin/lib/sidebar');
        $this->load->view('admin/page/edit_page');
        $this->load->view('admin/lib/footer');
    }

    /*
    !--------------------------------------------------------
    !     Update Page
    !--------------------------------------------------------
    */
    public function update_page ($page_id)
    {

        //$page_slug  = str_replace(" ", '-', $this->input->post('page_slug'));
        $tagid  = $this->input->post('tagid');
        $data = array(
            'page_title'       => $this->input->post('page_title'),
            'tpcid'            => $this->input->post('tpcid'),
            'page_status'      => $this->input->post('page_status'),
            'page_description' => $this->input->post('page_description'),
            'update'           => date("Y-m-d H:i:s") 
        );
        $this->db->set($data)->where('page_id',$page_id)->update('tbl_page');
      
        if (!empty($_FILES['page_attachment']['name'])) {

                $attch_q = $this->db->where('page_id',$page_id)->get('tbl_page')->result_object();
                if (file_exists("./uploads/page/".$attch_q[0]->page_attachment)) {
                    unlink("./uploads/page/".$attch_q[0]->page_attachment);
                }
               
                $config['upload_path']   = './uploads/page/';
                $config['allowed_types'] = 'gif|jpg|png|GIF|PNG|JPG|JPEG';
                $config['max_size']      = 10000;
                $config['max_width']     = 10000;
                $config['max_height']    = 10000;
                $config['file_name']     =   $page_id."-".time();

                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if ($this->upload->do_upload('page_attachment')) {
                    $upload_data = array('upload_data' => $this->upload->data());
                    $file = $upload_data['upload_data']['file_name'];
                    $this->db->set('page_attachment',$file);
                    $this->db->where('page_id',$page_id);
                    $this->db->update('tbl_page');   
                } 
        } 

        $this->session->set_flashdata('success', 'Page Updated Successfully');
        redirect('admin/page/page_list');
    }



    /*
    !--------------------------------------------------------
    !     Save Page Category
    !--------------------------------------------------------
    */
    public function save_page_category()
    {
        $data = array(
            'category_title' => $this->input->post('category_title'),
            'created_at'     => date('Y-m-d H:i:s'),
            'updated_at'     => date('Y-m-d H:i:s'),
        );

        $this->db->insert('tbl_page_category',$data);
        $insert_id = $this->db->insert_id();

        $this->session->set_flashdata('success', 'Page Category <strong>'.$this->input->post("category_title").'</strong> Added Successfully');
       redirect('admin/page/page_cat_list');
    }


    /*
    !--------------------------------------------------------
    !     Update Page Category
    !--------------------------------------------------------
    */
    public function update_page_cat($tpcid)
    {
        $this->db->set(array(
            'category_title' => $this->input->post('category_title'),
            'updated_at'     => date('Y-m-d H:i:s')
        ));
        $this->db->where('tpcid',$tpcid)->update('tbl_page_category');
        
        $this->session->set_flashdata('success', 'Paga Category Successfully Updated to <strong>'.$this->input->post("category_title").'</strong>');
        redirect('admin/page/page_cat_list');
    }

    /*
    !--------------------------------------------------------
    !      Delete Page
    !--------------------------------------------------------
    */
    public function delete_page($page_id)
    {
        $this->db->where(array(
            'page_id ' => $page_id
        )); 
        $this->db->delete('tbl_page');
        $this->session->set_flashdata('success', 'Page (<strong>'.$page_id.'</strong>) Deleted Successfully');
        redirect('admin/page/page_list');
    }
  
    /*
    !--------------------------------------------------------
    !      Delete User
    !--------------------------------------------------------
    */
    public function delete_page_cat($tpcid)
    {
        $this->db->where(array(
            'tpcid ' => $tpcid
        )); 
        $this->db->delete('tbl_page_category');
        $this->session->set_flashdata('success', 'Page Category(<strong>'.$tpcid.'</strong>) Deleted Successfully');
        redirect('admin/page/page_cat_list');
    }

}