<?php
use config\helpers\Help;

defined('BASEPATH') OR exit('No direct script access allowed');

class Frontpage extends CI_Controller
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

    }

    /*
     !--------------------------------------------------------
     !       Page View
     !       @param slug
     !--------------------------------------------------------
     */
    public function view_page($slug)
    {
        $data['title'] = ucfirst(str_replace('-', ' ', $slug));
        $this->db->where('page_slug',$slug);
        $statement = $this->db->get('tbl_page');
        if ($statement->result_id->num_rows > 0) {
            $data['page'] = $statement->result_object();
            $this->load->view('front/lib/header',$data);
            $this->load->view('front/frontpage/frontpage');
            $this->load->view('front/lib/footer');
        }else{
            $data['post_categories'] = $this->db->order_by('category_order','asc')->limit(8)->get('tbl_post_category')->result_object();
            $data['title'] = 'Error404! Page Not Found - PHPDark.com';
            $data['requested_url'] = Help::current_url();
            $this->load->view('front/lib/header.php',$data);
            $this->load->view('front/lib/sidebar.php',$data);
            $this->load->view('errors/cli/publicerror_404');
            $this->load->view('front/lib/footer.php');
        }
    }

}