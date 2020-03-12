<?php
use config\helpers\Help;

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

    }

    /*
     !--------------------------------------------------------
     !       Project Homepage
     !--------------------------------------------------------
     */
     public function index($page_id=1)
     {
        $row  = $this->db->get('projects')->num_rows();
        $perpage = 10;
        $offset = ($page_id-1) * $perpage;
        $previous_page      = $page_id - 1;
        $next_page          = $page_id + 1;
        $total_no_of_pages  = ceil($row / $perpage);
        $this->db->select("projects.*,project_categories.category_name,students.name,students.username,departments.department_name");
        $this->db->join('project_categories','project_categories.id = projects.project_category_id');
        $this->db->join('departments','departments.id = projects.department_id');
        $this->db->join('students','projects.author = students.id');
        $this->db->where('projects.status','published');
        $this->db->order_by('projects.id','desc');
        $this->db->limit($perpage,$offset);
        $query          = $this->db->get('projects');
      
        $data['projects']  = $query->result(); 
        $data['row']    = $row;
        $data['page']   = $page_id;
        $data['pages']  = (int)$total_no_of_pages;
        $data['previous_page']  = $previous_page;
        $data['next_page']      = $next_page;

        $this->load->view('web/lib/header',$data);
        $this->load->view('project/index');
        $this->load->view('web/lib/footer');
        
    }


    /*
     !--------------------------------------------------------
     !      Student Profile
     !--------------------------------------------------------
     */
     public function profile($username="")
     {
        // if (!$this->session->has_userdata('student')) {
        //     redirect('/');
        // }

        $status   = $this->db->where(['username' => $username])->get('students');

        if ($status->result_id->num_rows > 0) {
            $data['profile'] = $status->row();
            $this->load->view('web/lib/header');
            $this->load->view('web/student/profile');
            $this->load->view('web/lib/footer');
            
        }else{

            redirect('error404');
        }

    }

    /*
     !--------------------------------------------------------
     !      Student Profile
     !--------------------------------------------------------
     */
     public function view($project_id="")
     {
        $this->db->select('projects.*,project_categories.category_name,students.name,students.username,students.image');
        $this->db->join('project_categories','projects.project_category_id = project_categories.id');
        $this->db->join('students','projects.author = students.id');
        $this->db->where(['project_id' => $project_id]);
        $status = $this->db->order_by('projects.id','desc')->get('projects');

        if ($status->result_id->num_rows > 0) {
            $data['project'] = $status->row();

            $this->db->select('students.name,students.image');
            $this->db->select('comments.comment,comments.id as comment_id,comment_time');
            $this->db->join('students','students.id = comments.student_id');
            $this->db->join('projects','projects.id = comments.project_id');
            $this->db->order_by('comments.id','desc');
            $data['comments'] = $this->db->where(['comments.project_id' => $data['project']->id])->get('comments')->result_object();

            $this->db->set('page_count',$data['project']->page_count+1);
            $this->db->where('project_id',$project_id)->update('projects');

            $data['ratings'] = $this->db->select('rate')->where(['project_id' => $data['project']->id])->get('rating')->result_object();
            $data['total_rating'] = 0;
            foreach ($data['ratings'] as $value) {
                $data['total_rating'] += $value->rate;
            }
            $this->load->view('web/lib/header',$data);
            $this->load->view('project/project_details');
            $this->load->view('web/lib/footer');
            
        }else{

            redirect('error404');
        }

    }

    /*
    !---------------------------
    ! Save Comment 
    !----------------------------------
    */
    public function save_comment()
    {
        if (!$this->session->has_userdata('student')) {
            return false;
        }

        $data['project_id'] = $this->input->post('project_id');
        $data['comment'] = $this->input->post('comment');
        $data['student_id'] = $this->session->student_id;
        $this->db->insert('comments',$data);

        $project = $this->db->where('id',$data['project_id'])->get('projects')->row();
        redirect(base_url().'project/view/'.$project->project_id.'#rating-section');
    }

     /*
    !---------------------------
    ! Save Rating
    !----------------------------------
    */
    public function save_rating()
    {
        if (!$this->session->has_userdata('student')) {
            return false;
        }

        $data['project_id'] = $this->input->post('project_id');
        $data['rate']       = $this->input->post('rate');
        $data['student_id'] = $this->session->student_id;
        $project = $this->db->where('id',$data['project_id'])->get('projects')->row();
        

        $checkStatment = $this->db->where(array(
            'project_id' => $data['project_id'],
            'student_id' => $data['student_id']
        ))->get('rating');
        if ($checkStatment->result_id->num_rows > 0) {
            $this->session->set_flashdata('error', '<span style="color: red;">You already given rating</span>');
            redirect(base_url().'project/view/'.$project->project_id.'#rating-section');
        }

        if($this->db->insert('rating',$data))
        {
            $this->session->set_flashdata('error', '<span style="color: green;">You rating successfully saved.</span>');
            redirect(base_url().'project/view/'.$project->project_id.'#rating-section');
        }
       
    }

    


     /*
     !--------------------------------------------------------
     !      Project Department wise 
     !--------------------------------------------------------
     */
     public function department()
     {
        $this->db->select('departments.department_name, count(projects.id) as total_project, departments.id');
        $this->db->join('students','students.id = projects.author');
        $this->db->join('departments','departments.id = projects.department_id');
        $this->db->group_by('projects.department_id');
        $this->db->order_by('projects.id','desc');
        $data['departments']          = $this->db->get('projects')->result_object();

        $this->load->view('web/lib/header',$data);
        $this->load->view('project/project_department');
        $this->load->view('web/lib/footer');
        
    }


    /*
     !--------------------------------------------------------
     !       Project Department Wise
     !--------------------------------------------------------
     */
     public function department_wise_project($department_id,$page_id=1)
     {
       
        $row  = $this->db->get('projects')->num_rows();
        $perpage = 10;
        $offset = ($page_id-1) * $perpage;
        $previous_page      = $page_id - 1;
        $next_page          = $page_id + 1;
        $total_no_of_pages  = ceil($row / $perpage);
        $this->db->select("projects.*,project_categories.category_name,students.name,students.username,departments.department_name");
        $this->db->join('project_categories','project_categories.id = projects.project_category_id');
        $this->db->join('departments','departments.id = projects.department_id');
        $this->db->join('students','projects.author = students.id');
        $this->db->where('projects.status','published');
        $this->db->where('projects.department_id',$department_id);
        $this->db->order_by('projects.id','desc');
        $this->db->limit($perpage,$offset);
        $query          = $this->db->get('projects');
      
        $data['projects']  = $query->result(); 
        $data['row']    = $row;
        $data['page']   = $page_id;
        $data['pages']  = (int)$total_no_of_pages;
        $data['previous_page']  = $previous_page;
        $data['next_page']      = $next_page;

        $data['department'] = $this->db->where('id',$department_id)->get('departments')->row();

        $this->load->view('web/lib/header',$data);
        $this->load->view('project/project_department_list');
        $this->load->view('web/lib/footer');
        
    }


}