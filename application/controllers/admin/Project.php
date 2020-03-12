<?php
use Intervention\Image\ImageManager as Image;
defined('BASEPATH') OR exit('No direct script access allowed');

class Project extends CI_Controller
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
    !      Project List 
    !--------------------------------------------------------
    */
    public function project_list()
    {
        $this->db->select('projects.*,project_categories.category_name');
        $this->db->join('project_categories','project_categories.id = projects.project_category_id');
        $this->db->order_by('projects.id','desc');
        $data['projects'] = $this->db->get('projects')->result_object();
        //echo '<pre>';
        //print_r($data['projects']); exit;

        $this->load->view('admin/lib/header',$data);
        $this->load->view('admin/lib/sidebar');
        $this->load->view('admin/project/project_list');
        $this->load->view('admin/lib/footer');
    }


    /*
    !--------------------------------------------------------
    !       Page Category Llist
    !--------------------------------------------------------
    */
    public function blog_cat_list()
    {
        $this->db->order_by('tbl_blog_category.category_title','asc');
        $data['blog_categories'] = $this->db->get('tbl_blog_category')->result_object();
        $this->load->view('admin/lib/header',$data);
        $this->load->view('admin/lib/sidebar');
        $this->load->view('admin/blog/blog_cat_list');
        $this->load->view('admin/lib/footer');
    }


    /*
    !--------------------------------------------------------
    !     Save Page Category
    !--------------------------------------------------------
    */
    public function save_blog_category()
    {
        $data = array(
            'category_title' => $this->input->post('category_title'),
            'created_at'     => date('Y-m-d H:i:s'),
            'updated_at'     => date('Y-m-d H:i:s'),
        );

        $this->db->insert('tbl_blog_category',$data);
        $insert_id = $this->db->insert_id();

        $this->session->set_flashdata('success', 'Blog Category <strong>'.$this->input->post("category_title").'</strong> Added Successfully');
        redirect('admin/blog/blog_cat_list');
    }



    /*
    !--------------------------------------------------------
    !     Edit Post Category
    !--------------------------------------------------------
    */
    public function update_blog_cat($tbcid)
    {
        $this->db->set(array(
            'category_title' => $this->input->post('category_title'),
            'updated_at'     => date('Y-m-d H:i:s')
        ));
        $this->db->where('tbcid',$tbcid)->update('tbl_blog_category');
        
        $this->session->set_flashdata('success', 'Blog Category Successfully Updated to <strong>'.$this->input->post("category_title").'</strong>');
        redirect('admin/blog/blog_cat_list');
    }



    /*
    !--------------------------------------------------------
    !      Delete Project
    !--------------------------------------------------------
    */
    public function delete_project($id)
    {
      
        $project = $this->db->where('id',$id)->get('projects')->row();
      
        if (file_exists("./uploads/project/".$project->project_id.'/'.$project->thumbnail)) {
            unlink("./uploads/project/".$project->project_id.'/'.$project->thumbnail);
        }

        if (file_exists("./uploads/project/".$project->project_id.'/'.$project->report)) {
            unlink("./uploads/project/".$project->project_id.'/'.$project->report);
        }

        

        if (file_exists("./uploads/project/".$project->project_id.'/'.$project->zip_file)) {
            unlink("./uploads/project/".$project->project_id.'/'.$project->zip_file);
        }

        if (file_exists("./uploads/project/".$project->project_id.'/'.$project->summary)) {
            unlink("./uploads/project/".$project->project_id.'/'.$project->summary);
        }

        if (file_exists("./uploads/project/".$project->project_id.'/'.$project->flowchart)) {
            unlink("./uploads/project/".$project->project_id.'/'.$project->flowchart);
        }

        unlink("./uploads/project/".$project->project_id);

        $this->db->where(array(
            'id ' => $id
        )); 
        $this->db->delete('projects');
        $this->session->set_flashdata('success', 'Project Deleted Successfully');
        redirect('admin/project/project_list');
    }
  
    /*
    !--------------------------------------------------------
    !      Delete User
    !--------------------------------------------------------
    */
    public function delete_blog_cat($tpcid)
    {
        $this->db->where(array(
            'tbcid ' => $tpcid
        )); 
        $this->db->delete('tbl_blog_category');
        $this->session->set_flashdata('success', 'Page Category(<strong>'.$tpcid.'</strong>) Deleted Successfully');
        redirect('admin/blog/blog_cat_list');
    }


    /*
    !--------------------------------------------------------
    !     Change status 
    !--------------------------------------------------------
    */
    public function update_project_status($status,$id)
    {
        $this->db->set(array(
            'status'       => $status,
            'updated_at'   => date('Y-m-d H:i:s')
        ));
        $this->db->where('id',$id)->update('projects');

        if ($status == 'published') {
            $this->session->set_flashdata('success', 'Project successfully published on website');
        }elseif($status == 'draft')
        {
             $this->session->set_flashdata('success', 'Project successfully moved to draft');
        }else{
            $this->session->set_flashdata('success', 'Project successfully moved to pending list');
        }
        
        redirect('admin/project/project_list');
    }

}