<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<?php


class Usermodel extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->db = $this->load->database("default", TRUE);
       
    }


    public function showusers()
    {
        $this->db->order_by('applicant_name', 'ASC');
        $result_set = $this->db->get('tbl_user');
        return $result_set->result_object();
    }


    public function adduser($data)
    {
        return $this->db->insert("usertable", $data);
    }


    public function edituser($userid)
    {
        $where['id'] = $userid;

    }


    public function getsingleuser($userid)
    {
        $where['id'] = $userid;
        $result = $this->db->get_where("usertable", $where);
        return $result->result_array();
    }


    public function updateuser($id, $new_data)
    {
        return $this->db->where('id', $id)->update('usertable', $new_data);
    }


    public function deleteuser($userid)
    {
        $where['id'] = $userid;
        $result = $this->db->query("delete from usertable WHERE id ='$userid'");
        return $result;
    }


    public function totalUser()
    {
        $result = $this->db->query("select * from usertable");
        //return $result->result_array();
        return $result->result_id->num_rows;
    }


    public function totalAdmin()
    {
        $result = $this->db->query("select * from usertable where designation='admin'");
        return $result->result_id->num_rows;
    }


    public function lastUser()
    {
        $result = $this->db->query("select * from usertable order by id desc limit 1");
        //return $result->result_array();
        return $result->result_object();
    }

    public function profile($id)
    {
        $result = $this->db->query("select * from usertable where id='$id' limit 1");
        //return $result->result_array();
        return $result->result_object();
    }


}

?>