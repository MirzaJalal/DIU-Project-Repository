<?php

use config\helpers\Help;
use Intervention\Image\ImageManager as Image;

defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery extends CI_Controller
{

    /*
     !========================================
     ! Constructor and initialization
     !========================================
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('security');
        $this->load->model('photomodel');
        if (!$this->session->has_userdata('login')) {
            redirect('admin');
        }
    }


    /*
    !========================================
    !Default Function Admin for Homepage
    !========================================
    */
    public function album()
    {
        $this->db->select('album.*, count(photo.id) as total_photo');
        $this->db->join('photo','photo.album_id = album.id','left');
        $this->db->group_by('photo.album_id');
        $this->db->order_by('album_name', 'asc');
        $data['albums'] = $this->db->get('album')->result_object();
        $this->load->view('admin/lib/header', $data);
        $this->load->view('admin/lib/sidebar');
        $this->load->view('admin/gallery/album/index');
        $this->load->view('admin/lib/footer');
    }


    /*
    !--------------------------------------------------------
    !     Save Post Categories
    !--------------------------------------------------------
    */
    public function save_album()
    {
        $album_name = $this->input->post('album_name');

        $this->db->where('album_name', $post_category);
        $stmt = $this->db->get('album');
        if ($stmt->result_id->num_rows > 0) {
            $this->session->set_flashdata('error', 'Abbum <strong>' . $album_name . '</strong> Already Exist');
            redirect('admin/gallery/album');
        } else {
            $data = array(
                'album_name' => $album_name
            );
            $this->db->insert('album', $data);
            $this->session->set_flashdata('success', 'Category <strong>' . $album_name . '</strong> Added Successfully');
            redirect('admin/gallery/album');
        }
    }


    /*
    !--------------------------------------------------------
    !     Update ALbum
    !--------------------------------------------------------
    */
    public function update_album($id)
    {
        $this->db->set(array(
            'album_name' => $this->input->post('album_name')
        ));
        $this->db->where('id', $id);
        $stmt = $this->db->update('album');

        $this->session->set_flashdata('success', 'Album Updated Successfully to <strong>' . $this->input->post("album_name") . '</strong>');
        redirect('admin/gallery/album');

    }


    /*
    !--------------------------------------------------------
    !      Delete Album
    !--------------------------------------------------------
    */
    public function delete_album($id)
    {
        $this->db->where(array(
            'id ' => $id
        ));
        $this->db->delete('album');
        $this->session->set_flashdata('success', 'Album (<strong>' . $id . '</strong>) Deleted Successfully');
        redirect('admin/gallery/album');
    }

    /*
    !========================================
    ! Photos
    !========================================
    */
    public function photo($page_id=1)
    {
        $row  = $this->db->get('photo')->num_rows();
        $perpage = PER_PAGE_PHOTO_ADMIN;
        $offset = ($page_id-1) * $perpage;
        $previous_page      = $page_id - 1;
        $next_page          = $page_id + 1;
        $total_no_of_pages  = ceil($row / $perpage);
        
        $this->db->select('photo.*,album.album_name');
        $this->db->order_by('photo.id', 'desc');
        $this->db->join('album','album.id = photo.album_id');
        $this->db->limit($perpage,$offset);
        $data['photos']         = $this->db->get('photo')->result_object();
        $data['page']           = $page_id;
        $data['pages']          = $total_no_of_pages;
        $data['next_page']      = $page_id + 1;
        $data['previous_page']  = $page_id - 1;

        $this->load->view('admin/lib/header', $data);
        $this->load->view('admin/lib/sidebar');
        $this->load->view('admin/gallery/photo/index');
        $this->load->view('admin/lib/footer');
    }

    /*
    !========================================
    ! Add Photo
    !========================================
    */
    public function add_photo()
    {

        $data['albums'] = $this->photomodel->albums();
        $this->load->view('admin/lib/header', $data);
        $this->load->view('admin/lib/sidebar');
        $this->load->view('admin/gallery/photo/add_photo');
        $this->load->view('admin/lib/footer');
    }

    /*
    !========================================
    ! Save Photo
    !========================================
    */
    public function save_photo()
    {
        if ($this->input->post('album_id') == 2) { //for post
            for ($i = 0; $i < count($_FILES['photo_name']['tmp_name']); $i++) {
                if (empty($_FILES['photo_name']['tmp_name'][$i])){
                    continue;
                }
                $obj = new Image;
                $file_name = Help::randomString(25);

                $data['album_id'] = $this->input->post('album_id');
                $data['source'] = $this->input->post('source');
                $data['photo_details'] = $this->input->post('photo_details');

                $img = $obj->make($_FILES['photo_name']['tmp_name'][$i]);
                $img->resize(500, 450);
                $img->save('uploads/gallery/post/image/' . $file_name . '.jpg');
                $data['photo_name'] = $file_name . '.jpg';
                $data['storage_at'] = 'uploads/gallery/post/image/';
                $data['path'] = 'uploads/gallery/post/image/' . $file_name . '.jpg';
                $this->db->insert('photo', $data);
            }
        } elseif($this->input->post('album_id') == 1) { //for blog

            for ($i = 0; $i < count($_FILES['photo_name']['tmp_name']); $i++) {

                if (empty($_FILES['photo_name']['tmp_name'][$i])){

                    continue;
                }
                $obj = new Image;
                $file_name = Help::randomString(25);

                $data['album_id'] = $this->input->post('album_id');
                $data['source'] = $this->input->post('source');
                $data['photo_details'] = $this->input->post('photo_details');

                $img = $obj->make($_FILES['photo_name']['tmp_name'][$i]);
                $img->resize(800, 400);
                $img->save('uploads/gallery/blog/image/' . $file_name . '.jpg');
                $data['photo_name'] = $file_name . '.jpg';
                $data['storage_at'] = 'uploads/gallery/blog/image/';
                $data['path'] = 'uploads/gallery/blog/image/' . $file_name . '.jpg';
                $this->db->insert('photo', $data);
            }
        }

        $this->session->set_flashdata('success', 'Photo Uploaded Successfully');
        redirect('admin/gallery/photo');
    }


    /*
    !========================================
    ! Delete Photo
    !========================================
    */
    public function delete_photo($id)
    {
        $attch_q = $this->db->where('id',$id)->get('photo')->row();

        if (file_exists("./".$attch_q->path)) {
            unlink("./".$attch_q->path);
        }
        $this->db->where('id',$id)->delete('photo');
        $this->session->set_flashdata('success', 'Photo <strong>' . $attch_q->photo_name . '</strong> Deleted Successfully');
        redirect('admin/gallery/photo');
        
    }

    /*
    !========================================
    ! Photo By Album
    !========================================
    */
    public function photo_by_album($album_id,$album_name,$page_id=1)
    {
       
        $this->db->where('album_id',$album_id);
        $row  = $this->db->get('photo')->num_rows();
        $perpage = PER_PAGE_PHOTO_ADMIN;
        $offset = ($page_id-1) * $perpage;
        $previous_page      = $page_id - 1;
        $next_page          = $page_id + 1;
        $total_no_of_pages  = ceil($row / $perpage);
        
        $this->db->select('photo.*,album.album_name');
        $this->db->where('album_id',$album_id);
        $this->db->order_by('photo.id', 'desc');
        $this->db->join('album','album.id = photo.album_id');
        $this->db->limit($perpage,$offset);
        $data['photos']         = $this->db->get('photo')->result_object();
        $data['page']           = $page_id;
        $data['pages']          = $total_no_of_pages;
        $data['next_page']      = $page_id + 1;
        $data['previous_page']  = $page_id - 1;



        $data['album_name'] = $album_name;
        $data['album_id']   = $album_id;

        $this->load->view('admin/lib/header', $data);
        $this->load->view('admin/lib/sidebar');
        $this->load->view('admin/gallery/photo/photo_by_album');
        $this->load->view('admin/lib/footer');

    }

}
