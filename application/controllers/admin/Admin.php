<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller
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
    !       Admin Login View
    !--------------------------------------------------------
    */
    public function index()
    {
        if ($this->session->has_userdata('login')) {
            redirect('admin/dashboard');
        }
        $this->load->view('admin/login');

    }

    /*
    !--------------------------------------------------------
    !       Default Function for Dashboard
    !--------------------------------------------------------
    */
    public function dashboard()
    {
        if (!$this->session->has_userdata('login')) {
            redirect('admin');
        }

        

        $this->load->view('admin/lib/header');
        $this->load->view('admin/lib/sidebar');
        $this->load->view('admin/dashboard');
        $this->load->view('admin/lib/footer');
    }


    /*
    !--------------------------------------------------------
    !       Login Handeller
    !--------------------------------------------------------
    */
    public function login()
    {
        if ($this->session->has_userdata('login') && $this->session->role == 'admin')
        {
            redirect('admin/dashboard');
        }
        $username = $this->input->post("username");
        $password = sha1(md5($this->input->post("password")));


        $this->load->model('loginmodel');


        $status   = $this->loginmodel->login($username,$password);
        if ($status->result_id->num_rows > 0) {

           $data     = $status->result_object();
           $session  = array(
                    'login'             => true,
                    'admin'             => 'admin',
                    'admin_email'       => $data[0]->email,
                    'organization_name' => $data[0]->organization_name,
                    'admin_address'     => $data[0]->address,
                    'admin_role'        => $data[0]->role,
                    'admin_logo'        => $data[0]->logo,
                    'admin_status'      => $data[0]->status,
                    'admin_id'          => $data[0]->user_id,
            );
           $this->session->set_userdata($session);
           $this->session->set_flashdata('success', 'Successfully Loggedin');
           redirect('admin/dashboard');
       }else{
            //save admin accesslog
            $this->loginmodel->accesslog($this->input->post('username'),$this->input->post('password'));
            $this->session->set_flashdata('error', 'Login Failed.<br> Please check username & password');
            redirect("admin");
       }

    }

    /*
    !--------------------------------------------------------
    !       Admin Logout
    !--------------------------------------------------------
    */
    public function logout()
    {
        $this->session->sess_destroy();
        redirect('admin');
    }

    /*
    !--------------------------------------------------------
    !      User List for Institutions
    !--------------------------------------------------------
    */
    public function user_list()
    {
        if (!$this->session->has_userdata('login')) {
            redirect('admin');
        }

        $data['users'] = $this->db->get('tbl_user')->result_object();
        $this->load->view('admin/lib/header',$data);
        $this->load->view('admin/lib/sidebar');
        $this->load->view('admin/user_list');
        $this->load->view('admin/lib/footer');
    }

    /*
    !--------------------------------------------------------
    !      Delete User
    !--------------------------------------------------------
    */
    public function delete_user($user_id="")
    {
        if (!$this->session->has_userdata('login')) {
            redirect('admin');
        }

        $this->db->where(array(
            'user_id ' => $user_id
        ));
        $this->db->delete('tbl_user');
        $this->session->set_flashdata('success', 'User Deleted Successfully');
        redirect('admin/dashboard');
    }


    /*
    !--------------------------------------------------------
    !      Admin Settings
    !--------------------------------------------------------
    */
    public function settings()
    {
        if (!$this->session->has_userdata('login')) {
            redirect('admin');
        }

        $this->load->helper('directory');
        $data['highlights'] = directory_map('./assets/front/plugins/hightlight/styles/', FALSE, TRUE);
        $data['website'] = $this->db->get('website')->result_object();

        $this->load->view('admin/lib/header',$data);
        $this->load->view('admin/lib/sidebar');
        $this->load->view('admin/settings');
        $this->load->view('admin/lib/footer');
    }


    /*
    !--------------------------------------------------------
    !      Save Settings
    !--------------------------------------------------------
    */
    public function save_settings()
    {
        if (!$this->session->has_userdata('login')) {
            redirect('admin');
        }

        $data['site_name']  = $this->input->post('site_name');
        $data['title']      = $this->input->post('title');
        $data['highlighter']= $this->input->post('highlighter');
        $data['email']      = $this->input->post('email');
        $data['mobile']     = $this->input->post('mobile');
        $data['address']    = $this->input->post('address');
        $data['facebook']   = $this->input->post('facebook');
        $data['youtube']    = $this->input->post('youtube');
        $data['github']     = $this->input->post('github');
        $data['short_introduction'] = $this->input->post('short_introduction');

        $this->db->set($data);
        $this->db->update('website');
        $this->session->set_flashdata('success', 'Website Settings Updated Successfully');
        redirect('admin/dashboard');
    }

    /*
    !--------------------------------------------------------
    !      Change Password
    !--------------------------------------------------------
    */
    public function change_password()
    {
        if (!$this->session->has_userdata('login')) {
            redirect('admin');
        }

        $this->load->view('admin/lib/header');
        $this->load->view('admin/lib/sidebar');
        $this->load->view('admin/change_password');
        $this->load->view('admin/lib/footer');
    }


    /*
    !--------------------------------------------------------
    !      Update Password
    !--------------------------------------------------------
    */
    public function update_password()
    {
        if (!$this->session->has_userdata('login')) {
            redirect('admin');
        }

        $this->db->set(array(
            'password' => sha1(md5($this->input->post('password')))
        ));

        $this->db->update('tbl_user');
        $this->session->set_flashdata('success', 'Password Updated Successfully');
        redirect('admin/dashboard');
    }

    /*
    !--------------------------------------------------------
    !      Admin Settings
    !--------------------------------------------------------
    */
    public function accesslog()
    {
        if (!$this->session->has_userdata('login')) {
            redirect('admin');
        }
        $data['accesslogs'] = $this->db->order_by('id','desc')->get('tbl_accesslog')->result_object();

        $this->load->view('admin/lib/header',$data);
        $this->load->view('admin/lib/sidebar');
        $this->load->view('admin/accesslog');
        $this->load->view('admin/lib/footer');
    }

    
}
