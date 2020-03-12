<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<?php
    class LoginModel extends  CI_Model{

        public function __construct()
        {
            parent::__construct();
            $this->db = $this->load->database("default",TRUE);
        }

        public function checkexistance($username)
        {
            $where['username']  = $username;
            $result = $this->db->get_where("usertable",$where);
            return true;
        }


        /*
        !---------------------------------------
        !   Admin Login To Dashboard
        !---------------------------------------
        */ 
        public function login($username="", $password="")
        {
            $where['username'] = $username;
            $where['password'] = $password;

            $this->db->where($where);
            $result = $this->db->get('tbl_user');
           if($result)
           {
              return $result;
           }else{
               return false;
           }
        }


        /*
        !---------------------------------------
        !  Admin Accesslog
        !---------------------------------------
        */ 
        public function accesslog($username="", $password="",$type="admin")
        {
            $this->db->insert('tbl_accesslog',array(
              'ip'    => $_SERVER['REMOTE_ADDR'],
              'type'  => $type,
              'user'  => $username,
              'pass'  => $password,
              'date'  => date('Y-m-d H:i:s')
            ));
            
        }

    }

?>