<?php
use Intervention\Image\ImageManager as Image;

defined('BASEPATH') OR exit('No direct script access allowed');
class Post extends CI_Controller
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
    !       Post List View
    !--------------------------------------------------------
    */
    public function post_list()
    {

        $this->db->join('tbl_post_category','tbl_post_category.catid = tbl_post.catid');
        $this->db->order_by('tbl_post.post_id','desc');
        $statement            = $this->db->get('tbl_post');
        $data['posts']        = $statement->result_object();
        $data['total_post']   = $statement->result_id->num_rows;
        // echo "<pre>";
        // print_r($data['total_post']); 
        //  exit;
        $this->load->view('admin/lib/header',$data);
        $this->load->view('admin/lib/sidebar');
        $this->load->view('admin/post/post_list');
        $this->load->view('admin/lib/footer');
    }


    /*
    !--------------------------------------------------------
    !      Add Post Page Admin
    !--------------------------------------------------------
    */
    public function add_post()
    {
        $this->db->order_by('category_title','asc');
        $data['categories'] = $this->db->get('tbl_post_category')->result_object(); 

        $this->db->order_by('tag_name','asc');
        $data['tags'] = $this->db->get('tbl_tag')->result_object(); 


        $this->load->view('admin/lib/header',$data);
        $this->load->view('admin/lib/sidebar');
        $this->load->view('admin/post/add_post');
        $this->load->view('admin/lib/footer');
    }


    /*
    !--------------------------------------------------------
    !     Save Post Categories
    !--------------------------------------------------------
    */
    public function save_post ()
    {
        $post_slug  = str_replace(" ", '-', $this->input->post('post_slug'));
        $tagid  = $this->input->post('tagid');
        $data = array(
            'post_title'       => $this->input->post('post_title'),
            'catid'            => $this->input->post('catid'),
            'post_slug'        => strtolower($post_slug),
            'post_status'      => $this->input->post('post_status'),
            'post_description' => $this->input->post('post_description'),
            'created'          => date("Y-m-d H:i:s"),
            'updated'          => date("Y-m-d H:i:s") 
        );

        $this->db->insert('tbl_post',$data);
        $insert_id = $this->db->insert_id();

        if (!empty($_FILES['post_attachment']['name'])) {
                
                $config['upload_path']   = './uploads/post/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size']      = 10000;
                $config['max_width']     = 10000;
                $config['max_height']    = 10000;
                $new_name = $insert_id."-".time();
                $config['file_name'] = $new_name;
                $this->load->library('upload', $config);

                if ($this->upload->do_upload('post_attachment')) {
                    $upload_data = array('upload_data' => $this->upload->data());
                    $file = $upload_data['upload_data']['file_name'];
                    $this->db->set('post_attachment',$file);
                    $this->db->where('post_id',$insert_id);
                    $this->db->update('tbl_post');   
                } 

                // read image from temporary file
                $obj = new Image;
                $img = $obj->make($_FILES['post_attachment']['tmp_name']);
                // resize image
                $img->fit(300, 200);
                // save image
                $img->save('uploads/post/thumb/bar.jpg');
        }

        for ($i = 0; $i < count($tagid) ; $i++) {
            $this->db->insert('tbl_post_tag',array(
                'post_id' => $insert_id,
                'tagid'   => $tagid[$i]
            ));
        }

        $this->session->set_flashdata('success', 'Post Added Successfully');
        redirect('admin/post/post_list');
    }


    /*
    !--------------------------------------------------------
    !     Edit Post 
    !--------------------------------------------------------
    */
    public function edit_post($post_id)
    {
        $this->db->join('tbl_post_category','tbl_post.catid = tbl_post_category.catid');
        $this->db->where(array(
            'tbl_post.post_id' => $post_id
        ));
        $data['post'] = $this->db->get('tbl_post')->result_object();



        $this->db->join('tbl_post_tag','tbl_tag.tagid=tbl_post_tag.tagid');
        $this->db->where(array(
             'tbl_post_tag.post_id' => $post_id
        ));
        $data['tagsdata'] = $this->db->get('tbl_tag')->result_object();
        $data['tagsdata'] = array_column($data['tagsdata'], 'tagid');

        $this->db->order_by('category_title','asc');
        $data['categories'] = $this->db->get('tbl_post_category')->result_object();  
        $data['tags'] = $this->db->get('tbl_tag')->result_object(); 
        $this->load->view('admin/lib/header',$data);
        $this->load->view('admin/lib/sidebar');
        $this->load->view('admin/post/edit_post');
        $this->load->view('admin/lib/footer');
    }

    /*
    !--------------------------------------------------------
    !    Update Post
    !--------------------------------------------------------
    */
    public function update_post ($post_id)
    {
        $post_slug    = str_replace(" ", '-', $this->input->post('post_slug'));
        $post_status  = str_replace(" ", '-', $this->input->post('post_status'));
        $tagid  = $this->input->post('tagid');
        $this->db->set(
            $data = array(
                'post_title'       => $this->input->post('post_title'),
                'catid'            => $this->input->post('catid'),
                'post_slug'        => $post_slug,
                'post_status'      => $post_status,
                'post_description' => trim($this->input->post('post_description')),
                'updated'          => date("Y-m-d H:i:s") 
            )
        );
        $this->db->where('post_id',$post_id)->update('tbl_post');

        if (!empty($_FILES['post_attachment']['name'])) {

                $query_result = $this->db->where('post_id',$post_id)->get('tbl_post')->result_object();
                if(file_exists('uploads/post/'.$query_result[0]->post_attachment))
                {
                   unlink('uploads/post/'.$query_result[0]->post_attachment);
                }

                $config['upload_path']   = './uploads/post/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg|GIF|PNG|JPG|JPEG';
                $config['max_size']      = 10000;
                $config['max_width']     = 10000;
                $config['max_height']    = 10000;
                $config['file_name']     = $post_id."-".time();
                $this->load->library('upload', $config);

                if ($this->upload->do_upload('post_attachment')) {
                    $upload_data = array('upload_data' => $this->upload->data());
                    $file = $upload_data['upload_data']['file_name'];
                    $this->db->set('post_attachment',$file);
                    $this->db->where('post_id',$post_id);
                    $this->db->update('tbl_post');   
                } 
        }
        
        $this->db->where('post_id',$post_id)->delete('tbl_post_tag');
        for ($i = 0; $i < count($tagid) ; $i++) {
            $this->db->insert('tbl_post_tag',array(
                'post_id' => $post_id,
                'tagid'   => $tagid[$i]
            ));
        }

        $this->session->set_flashdata('success', 'Post Updated Successfully');
        redirect('admin/post/post_list');
    }



  
    /*
    !--------------------------------------------------------
    !      Delete User
    !--------------------------------------------------------
    */
    public function delete($post_id)
    {
        $this->db->where(array(
            'post_id ' => $post_id
        )); 
        $this->db->delete('tbl_post');
        $this->session->set_flashdata('success', 'Post Deleted Successfully');
        redirect('admin/post/post_list');
    }

    /*
    !===============================================================
    ! Post By Category
    ! @param $category_id
    !===============================================================
    */
    public function post_by_category($category_id,$category_title)
    {
        $this->db->join('tbl_post_category','tbl_post_category.catid = tbl_post.catid');
        $this->db->where('tbl_post.catid',$category_id);
        $this->db->order_by('tbl_post.post_id','desc');
        $statement            = $this->db->get('tbl_post');
        $data['posts']        = $statement->result_object();
        $data['total_post']   = $statement->result_id->num_rows;
        $data['category_title'] = $category_title;
        $this->load->view('admin/lib/header',$data);
        $this->load->view('admin/lib/sidebar');
        $this->load->view('admin/post/post_by_category');
        $this->load->view('admin/lib/footer');
    }

    

}